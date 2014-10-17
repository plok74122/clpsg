<?php
class Clpsg_model extends CI_Model {

	public function __construct()
	{
		$this->DB_clpsg = $this->load->database('clpsg',TRUE);
	}
	public function login_check($input_array)
	{
		$query = $this->DB_clpsg->get_where('user',$input_array);
		return $query->first_row('array');
	}
	public function insert_headcount($input_array)
	{
		$this->DB_clpsg->select('public');
		$query = $this->DB_clpsg->get_where('reason',array('private' => $input_array['reason_private']));
		$public = $query->first_row('array');
		$input_array['reason_public']=$public['public'];
		//如果是新增的話no_group清空
		if($input_array['no_group']=="new")
		{
			unset($input_array['no_group']);
		}
		$check_array=$input_array;
		//辨識是不是重複資料
		unset($check_array['username']);
		unset($check_array['no_group']);
		$query = $this->DB_clpsg->get_where('headcount',$check_array);
		if ($query->num_rows() > 0)
		{
			return "dbrepeat";
		}
		else
		{
			$query = $this->DB_clpsg->insert('headcount',$input_array);
			if($query==1)
			{
				if($input_array['no_group'] == NULL)
				{
					$this->DB_clpsg->select('no');
					$query = $this->DB_clpsg->get_where('headcount',$input_array);
					$row = $query->result();
					$no = $query->first_row('array');
					$this->DB_clpsg->where($input_array);
					$this->DB_clpsg->update('headcount' , array('no_group' => $no['no']));
				}
				return "success";
			}
		}
	}	
	public function list_headcount()
	{
		$this->DB_clpsg->select('no,unit,region,date,,reason_public,reason_private,entry_time,departure_time,headcount,username,SEC_TO_TIME(TIME_TO_SEC(departure_time) -TIME_TO_SEC(entry_time)) as stay_time');
		$this->DB_clpsg->order_by('date','desc');
		$this->DB_clpsg->order_by('no','desc');
		$this->DB_clpsg->limit('30');
		$query = $this->DB_clpsg->get('headcount');
		if ($query->num_rows() > 0)
		{
		   foreach ($query->result() as $row)
		   {
		      $return_array['no'][]=$row->no;
		      $return_array['unit'][]=$row->unit;
		      $return_array['region'][]=$row->region;
		      $return_array['date'][]=$row->date;
		      $return_array['reason_private'][]=$row->reason_private;
		      $return_array['entry_time'][]=$row->entry_time;
		      $return_array['departure_time'][]=$row->departure_time;
		      $return_array['headcount'][]=$row->headcount;
		      $return_array['stay_time'][]=$row->stay_time;
		   }
		}
		return $return_array;
	}
	public function query_reason()
	{
		$this->DB_clpsg->select('private');
		$query = $this->DB_clpsg->get('reason');
		foreach ($query->result() as $row)
		{
			$return_array[]=$row->private;
	  }
	  return $return_array;
	}
	public function query_headcount($no)
	{
		$query = $this->DB_clpsg->get_where('headcount',array('no'=>$no));
		if ($query->num_rows() > 0)
		{
			return $query->first_row('array');
		}
		else
		{
			return 0;
		}
	}
	public function update_db_headcount($input_array)
	{
		$this->DB_clpsg->select('public');
		$query = $this->DB_clpsg->get_where('reason',array('private' => $input_array['reason_private']));
		$public = $query->first_row('array');
		$input_array['reason_public']=$public['public'];
		if($input_array['no_group']=="new")
		{
			unset($input_array['no_group']);
		}
		$check_array = $input_array;
		unset($check_array['username']);
		unset($check_array['no']);
		$query = $this->DB_clpsg->get_where('headcount',$check_array);
		if ($query->num_rows() > 0)
		{
			return "dbrepeat";
		}
		else
		{
			$update_array = $input_array;
			unset($update_array['no']);
			$this->DB_clpsg->where('no' , $input_array['no']);
			$query = $this->DB_clpsg->update('headcount', $update_array);
			if($input_array['no_group'] == NULL)
			{
				$this->DB_clpsg->where('no' , $input_array['no']);
				$this->DB_clpsg->update('headcount', array('no_group' => $input_array['no']));
			}
			if($query==1)
			{
				return "success";
			}
			else
			{
				return "fail";
			}
		}
	}
	public function get_two_week_headcount($date)
	{
		$this->DB_clpsg->select('no,unit,date,reason_private,headcount');
		$where = "DATE_SUB('".$date."', INTERVAL 14 DAY) <= `date` and `date` <= '".$date."'";
		$this->DB_clpsg->where($where);
		$this->DB_clpsg->order_by('date');
		$this->DB_clpsg->group_by('no_group');
		$query = $this->DB_clpsg->get('headcount');
		$return_array['no'][]="new";
		$return_array['no_info'][]="新增來訪";
		if ($query->num_rows() > 0)
		{
		   foreach ($query->result() as $row)
		   {
		      $return_array['no'][]=$row->no;
		      $return_array['no_info'][]="同".$row->date."因[".$row->reason_private."]來訪的'".$row->unit."'(".$row->headcount."人)";
		   }
		}
		return $return_array;
	}
	
	//查詢問卷清單
	public function list_need_question()
	{
		$str = "SELECT  `no`, `no_group`, `unit`, `region`, `date`, `reason_public`, `reason_private`, `entry_time`, `departure_time`, `headcount`, `username`,'0' as `total_finish` FROM `headcount`  where `headcount`.`no` not in (select `question_answer`.`headcount_id` from `question_answer`) and `headcount`.`reason_private`='體驗課程' and `headcount`.`date` > '2014-09-30' union select `t1`.`no`, `t1`.`no_group`, `t1`.`unit`, `t1`.`region`, `t1`.`date`, `t1`.`reason_public`, `t1`.`reason_private`, `t1`.`entry_time`, `t1`.`departure_time`, `t1`.`headcount`, `t1`.`username` ,`t2`.`sum_of_qusetion` from (SELECT  `no`, `no_group`, `unit`, `region`, `date`, `reason_public`, `reason_private`, `entry_time`, `departure_time`, `headcount`, `username` from `headcount` where `reason_private` ='體驗課程' and `date` > '2014-09-30' group by `no_group`) as `t1` ,(SELECT `headcount_id`,count(distinct(`headcount_question_id`)) as `sum_of_qusetion` FROM `question_answer` group by `headcount_id`) as `t2` where `t2`.`headcount_id` = `t1`.`no` and `t1`.`headcount` >`t2`.`sum_of_qusetion`";
		$query = $this->DB_clpsg->query($str);
		if ($query->num_rows() > 0)
		{
		   foreach ($query->result() as $row)
		   {
		      $return_array['no'][]=$row->no;
		      $return_array['unit'][]=$row->unit;
		      $return_array['region'][]=$row->region;
		      $return_array['date'][]=$row->date;
		      $return_array['reason_private'][]=$row->reason_private;
		      $return_array['entry_time'][]=$row->entry_time;
		      $return_array['departure_time'][]=$row->departure_time;
		      $return_array['headcount'][]=$row->headcount;
		      $return_array['total_finish'][]=$row->total_finish;
		   }
		}
		return $return_array;
	}
	//查詢單筆參訪有多少問卷
	public function query_how_many_question($headlist_id)
	{
		$str = "SELECT  `no`, `no_group`, `unit`, `region`, `date`, `reason_public`, `reason_private`, `entry_time`, `departure_time`, `headcount`, `username`,'0' as `total_finish` FROM `headcount`  where `headcount`.`no` not in (select `question_answer`.`headcount_id` from `question_answer`) and `headcount`.`reason_private`='體驗課程' and `headcount`.`date` > '2014-09-30' and `no` ='".$headlist_id."' union select `t1`.`no`, `t1`.`no_group`, `t1`.`unit`, `t1`.`region`, `t1`.`date`, `t1`.`reason_public`, `t1`.`reason_private`, `t1`.`entry_time`, `t1`.`departure_time`, `t1`.`headcount`, `t1`.`username` ,`t2`.`sum_of_qusetion` from (SELECT  `no`, `no_group`, `unit`, `region`, `date`, `reason_public`, `reason_private`, `entry_time`, `departure_time`, `headcount`, `username` from `headcount` where `reason_private` ='體驗課程' and `date` > '2014-09-30' and `no`='".$headlist_id."' group by `no_group`) as `t1` ,(SELECT `headcount_id`,count(distinct(`headcount_question_id`)) as `sum_of_qusetion` FROM `question_answer` group by `headcount_id`) as `t2` where `t2`.`headcount_id` = `t1`.`no` and `t1`.`headcount` >`t2`.`sum_of_qusetion`";
		$query = $this->DB_clpsg->query($str);
		$return_array = $query->first_row('array');
		return $return_array;
	}
	//查詢階段日期需要的時間
	public function query_how_many_question_by_date($headlist_id)
	{
		$str = "SELECT  `no`, `no_group`, `unit`, `region`, `date`, `reason_public`, `reason_private`, `entry_time`, `departure_time`, `headcount`, `username`,'0' as `total_finish` FROM `headcount`  where `headcount`.`no` not in (select `question_answer`.`headcount_id` from `question_answer`) and `headcount`.`reason_private`='體驗課程' and `headcount`.`date` > '2014-09-30' and `no` in ('".implode("','",$headlist_id)."') union select `t1`.`no`, `t1`.`no_group`, `t1`.`unit`, `t1`.`region`, `t1`.`date`, `t1`.`reason_public`, `t1`.`reason_private`, `t1`.`entry_time`, `t1`.`departure_time`, `t1`.`headcount`, `t1`.`username` ,`t2`.`sum_of_qusetion` from (SELECT  `no`, `no_group`, `unit`, `region`, `date`, `reason_public`, `reason_private`, `entry_time`, `departure_time`, `headcount`, `username` from `headcount` where `reason_private` ='體驗課程' and `date` > '2014-09-30' and `no` in ('".implode("','",$headlist_id)."') group by `no_group`) as `t1` ,(SELECT `headcount_id`,count(distinct(`headcount_question_id`)) as `sum_of_qusetion` FROM `question_answer` group by `headcount_id`) as `t2` where `t2`.`headcount_id` = `t1`.`no` and `t1`.`headcount` >=`t2`.`sum_of_qusetion`";
		$query = $this->DB_clpsg->query($str);
		foreach ($query->result() as $row)
		{
			$return_array['no'][]=$row->no;
			$return_array['unit'][]=$row->unit;
			$return_array['date'][]=$row->date;
			$return_array['no_group'][]=$row->no_group;
			$return_array['date'][]=$row->date;
			$return_array['reason_private'][]=$row->reason_private;
			$return_array['reason_public'][]=$row->reason_public;
			$return_array['headcount'][]=$row->headcount;
			$return_array['total_finish'][]=$row->total_finish;
			$return_array['region'][]=$row->region;
		}
		return $return_array;
	}

	//查詢問卷題目與其html語法
	public function query_questions_and_htmlcode()
	{
		$query=$this->DB_clpsg->get('question_list');
		foreach ($query->result() as $row)
		{
			$return_array['no'][]=$row->no;
			$return_array['question'][]=$row->question;
			$return_array['ansmode'][]=$row->ansmode;
		}
		return $return_array;
	}	
	public function insert_question($input_array)
	{
		$headcount_id = $input_array['headcount_id'];
		$headcount_question_id = $input_array['headcount_question_id'];
		unset($input_array['headcount_id']);
		unset($input_array['headcount_question_id']);
		$array_key = array_keys($input_array);
		for($i = 0 ; $i<count($array_key); $i++)
		{
			for($j = 0 ; $j < count($input_array[$array_key[$i]]); $j++)
			{
				$insert_array['headcount_id']=$headcount_id;
				$insert_array['headcount_question_id']=$headcount_question_id;
				$insert_array['question_list_id']=$array_key[$i];
				$insert_array['answer']=$input_array[$array_key[$i]][$j];
				if($insert_array['answer']!="")
				{
					$this->DB_clpsg->insert('question_answer',$insert_array);
				}
			}
		}
	}
	public function query_question_by_headcount_list()
	{
		$str = "SELECT  `no`, `no_group`, `unit`, `region`, `date`, `reason_public`, `reason_private`, `entry_time`, `departure_time`, `headcount`, `username`,'0' as `total_finish` FROM `headcount`  where `headcount`.`no` not in (select `question_answer`.`headcount_id` from `question_answer`) and `headcount`.`reason_private`='體驗課程' and `headcount`.`date` > '2014-09-30' union select `t1`.`no`, `t1`.`no_group`, `t1`.`unit`, `t1`.`region`, `t1`.`date`, `t1`.`reason_public`, `t1`.`reason_private`, `t1`.`entry_time`, `t1`.`departure_time`, `t1`.`headcount`, `t1`.`username` ,`t2`.`sum_of_qusetion` from (SELECT  `no`, `no_group`, `unit`, `region`, `date`, `reason_public`, `reason_private`, `entry_time`, `departure_time`, `headcount`, `username` from `headcount` where `reason_private` ='體驗課程' and `date` > '2014-09-30' group by `no_group`) as `t1` ,(SELECT `headcount_id`,count(distinct(`headcount_question_id`)) as `sum_of_qusetion` FROM `question_answer` group by `headcount_id`) as `t2` where `t2`.`headcount_id` = `t1`.`no` and `t1`.`headcount` >=`t2`.`sum_of_qusetion`";
		$query = $this->DB_clpsg->query($str);
		if ($query->num_rows() > 0)
		{
		   foreach ($query->result() as $row)
		   {
		      $return_array['no'][]=$row->no;
		      $return_array['unit'][]=$row->unit;
		      $return_array['region'][]=$row->region;
		      $return_array['date'][]=$row->date;
		      $return_array['reason_private'][]=$row->reason_private;
		      $return_array['entry_time'][]=$row->entry_time;
		      $return_array['departure_time'][]=$row->departure_time;
		      $return_array['headcount'][]=$row->headcount;
		      $return_array['total_finish'][]=$row->total_finish;
		   }
		}
		return $return_array;
	}
	public function question_headcount_id_array_by_date($date1,$date2)
	{
		$str = "SELECT `no` FROM `headcount` where (`date` BETWEEN '".$date1."' and '".$date2."') and `reason_private`='體驗課程'";
		$query = $this->DB_clpsg->query($str);
		foreach ($query->result() as $row)
		{
			$return_array[]=$row->no;
		}
		return $return_array;
	}
	public function question_statistics_by_headlist_id($headlist_id)
	{
		$str = "SELECT `question_answer_type`.`question_list_id`, `question_answer_type`.`answer_type` , (SELECT count(*) from `question_answer` where `question_answer_type`.`question_list_id` = `question_answer`.`question_list_id` and `question_answer_type`.`answer_type` =`question_answer`.`answer` and `question_answer`.`headcount_id` in ('".implode("','",$headlist_id)."')) as `total` FROM `question_answer_type`";
		$query = $this->DB_clpsg->query($str);
		foreach ($query->result() as $row)
		{
			$return_array[$row->question_list_id]['answer_type'][]=$row->answer_type;
			$return_array[$row->question_list_id]['total'][]=$row->total;
		}
		return $return_array;
	}
//	public function question_str_by_headlist_id($headlist_id)
//	{
//		$str = "SELECT  `question_list`.`question` as `question` , group_concat(`question_answer`.`answer` , '<br>') as `answer` FROM `question_answer` , `question_list` where `question_answer`.`headcount_id`='".$headlist_id."' and `question_list`.`no`= '10' and `question_answer`.`question_list_id`='10'";
//		foreach ($query->result() as $row)
//		{
//			$return_array['question'][]=$row->question;
//			$return_array['answer'][]=$row->answer;
//		}
//		$str =  "SELECT  `question_list`.`question` as `question` , group_concat(`question_answer`.`answer` , '<br>') as `answer` FROM `question_answer` , `question_list` where `question_answer`.`headcount_id`='".$headlist_id."' and `question_list`.`no`= '11' and `question_answer`.`question_list_id`='11'";
//		foreach ($query->result() as $row)
//		{
//			$return_array['question'][]=$row->question;
//			$return_array['answer'][]=$row->answer;
//		}
//	}
	public function query_headcount_id_array_by_date($date1,$date2)
	{
		$str = "SELECT `no` FROM `headcount` where (`date` BETWEEN '".$date1."' and '".$date2."')";
		$query = $this->DB_clpsg->query($str);
		foreach ($query->result() as $row)
		{
			$return_array[]=$row->no;
		}
		return $return_array;
	}
	public function query_headlist_id_info_list($headlist_id)
	{
		$str = "SELECT * FROM `headcount` WHERE `no` in ('".implode("','",$headlist_id)."') group by `no_group`";
		$query = $this->DB_clpsg->query($str);
		foreach ($query->result() as $row)
		{
			$return_array['no'][]=$row->no;
			$return_array['unit'][]=$row->unit;
			$return_array['region'][]=$row->region;
			$return_array['date'][]=$row->date;
			$return_array['reason_public'][]=$row->reason_public;
			$return_array['reason_private'][]=$row->reason_private;
			$return_array['headcount'][]=$row->headcount;
		}
		return $return_array;
	}
	public function headcount_statistics_by_headlist_id_private($headlist_id)
	{
		$str = "SELECT `reason`.`no`,  `reason`.`private` , (select  IF(sum(`headcount`.`headcount`) is NULL,0,sum(`headcount`.`headcount`))  FROM `headcount` where `reason`.`private`=`headcount`.`reason_private` and `headcount`.`no` in ('".implode("','",$headlist_id)."')   group by `headcount`.`reason_private`) as `total` FROM `reason` order by `reason`.`no`";
		$query = $this->DB_clpsg->query($str);
		foreach ($query->result() as $row)
		{
			$return_array['reason_private'][]=$row->private;
			if($row->total=="")
			{
				$return_array['total'][]=0;
			}
			else
			{
				$return_array['total'][]=$row->total;
			}
		}
		return $return_array;
	}
	public function headcount_statistics_by_headlist_id_public($headlist_id)
	{
		$str = "SELECT `reason`.`no`, `reason`.`public` , sum((select  IF(sum(`headcount`.`headcount`) is NULL,0,sum(`headcount`.`headcount`))  FROM `headcount` where `reason`.`private`=`headcount`.`reason_private` and `headcount`.`no` in ('".implode("','",$headlist_id)."')   group by `headcount`.`reason_public`)) as `total` FROM `reason` group by `public` order by `reason`.`no`";
		$query = $this->DB_clpsg->query($str);
		foreach ($query->result() as $row)
		{
			$return_array['reason_public'][]=$row->public;
			if($row->total=="")
			{
				$return_array['total'][]=0;
			}
			else
			{
				$return_array['total'][]=$row->total;
			}
		}
		return $return_array;
	}
	public function headcount_statistics_by_headlist_id_week_in_private($date1,$date2)
	{
		$str = "SELECT `t1`.`year`,`t1`.`week` , concat(`t1`.`year`,'年 第',`t1`.`week`,'周') as `show_time`,`t2`.`private` ,(select IF(sum(`headcount`.`headcount`) is NULL , 0 , sum(`headcount`.`headcount`)) from `headcount` where YEAR(`headcount`.`date`)=`t1`.`year` and week(`headcount`.`date`)=`t1`.`week` and `headcount`.`reason_private`=`t2`.`private`) as `total` from
						(select YEAR(`t_allday`.`selected_date`) as `year` , week(`t_allday`.`selected_date`) as `week` from (
							select * from 
						 (select adddate('".$date1."',  t2.i*100 + t1.i*10 + t0.i) selected_date from
						 (select 0 i union select 1 union select 2 union select 3 union select 4 union select 5 union select 6 union select 7 union select 8 union select 9) t0,
						 (select 0 i union select 1 union select 2 union select 3 union select 4 union select 5 union select 6 union select 7 union select 8 union select 9) t1,
						 (select 0 i union select 1 union select 2 union select 3 union select 4 union select 5 union select 6 union select 7 union select 8 union select 9) t2) v
						where selected_date between '".$date1."' and '".$date2."') as `t_allday` group by YEAR(`t_allday`.`selected_date`) ,week(`t_allday`.`selected_date`)) as `t1` 
						 join (SELECT `no`,`private` FROM `reason` order by `no` ) as `t2` 
						order by `t1`.`year`,`t1`.`week`,`t2`.`no` , `t2`.`private`";
		$query = $this->DB_clpsg->query($str);
		foreach ($query->result() as $row)
		{
			$return_array['year'][]=$row->year;
			$return_array['week'][]=$row->week;
			$return_array['show_time'][]=$row->show_time;
			$return_array['private'][]=$row->private;
			$return_array['total'][]=$row->total;
		}
		return $return_array;
	}
	public function headcount_statistics_by_headlist_id_month_in_private($date1,$date2)
	{
		$str = "SELECT `t1`.`year`,`t1`.`month` ,concat(`t1`.`year`,'年',`t1`.`month`,'月') as `show_time`, `t2`.`private` ,(select IF(sum(`headcount`.`headcount`) is NULL , 0 , sum(`headcount`.`headcount`)) from `headcount` where YEAR(`headcount`.`date`)=`t1`.`year` and MONTH(`headcount`.`date`)=`t1`.`month` and `headcount`.`reason_private`=`t2`.`private`) as `total` from 
						(select YEAR(`t_allday`.`selected_date`) as `year` , MONTH(`t_allday`.`selected_date`) as `month` from (
						select * from 
						(select adddate('".$date1."',  t2.i*100 + t1.i*10 + t0.i) selected_date from
						 (select 0 i union select 1 union select 2 union select 3 union select 4 union select 5 union select 6 union select 7 union select 8 union select 9) t0,
						 (select 0 i union select 1 union select 2 union select 3 union select 4 union select 5 union select 6 union select 7 union select 8 union select 9) t1,
						 (select 0 i union select 1 union select 2 union select 3 union select 4 union select 5 union select 6 union select 7 union select 8 union select 9) t2) v
						where selected_date between '".$date1."' and '".$date2."') as `t_allday` group by YEAR(`t_allday`.`selected_date`) , MONTH(`t_allday`.`selected_date`)) as `t1` join 
						(SELECT `no`,`private` FROM `reason` order by `no`) as `t2` 
						order by `t1`.`year`,`t1`.`month`,`t2`.`no` , `t2`.`private`";
		$query = $this->DB_clpsg->query($str);
		foreach ($query->result() as $row)
		{
			$return_array['year'][]=$row->year;
			$return_array['month'][]=$row->month;
			$return_array['show_time'][]=$row->show_time;
			$return_array['private'][]=$row->private;
			$return_array['total'][]=$row->total;
		}
		return $return_array;
	}
	public function headcount_statistics_by_headlist_id_week_in_public($date1,$date2)
	{
		$str = "SELECT `t1`.`year`,`t1`.`week` , concat(`t1`.`year`,'年 第',`t1`.`week`,'周') as `show_time`,`t2`.`public` ,(select IF(sum(`headcount`.`headcount`) is NULL , 0 , sum(`headcount`.`headcount`)) from `headcount` where YEAR(`headcount`.`date`)=`t1`.`year` and week(`headcount`.`date`)=`t1`.`week` and `headcount`.`reason_public`=`t2`.`public`) as `total` from
						(select YEAR(`t_allday`.`selected_date`) as `year` , week(`t_allday`.`selected_date`) as `week` from (
							select * from 
						 (select adddate('".$date1."',  t2.i*100 + t1.i*10 + t0.i) selected_date from
						 (select 0 i union select 1 union select 2 union select 3 union select 4 union select 5 union select 6 union select 7 union select 8 union select 9) t0,
						 (select 0 i union select 1 union select 2 union select 3 union select 4 union select 5 union select 6 union select 7 union select 8 union select 9) t1,
						 (select 0 i union select 1 union select 2 union select 3 union select 4 union select 5 union select 6 union select 7 union select 8 union select 9) t2) v
						where selected_date between '".$date1."' and '".$date2."') as `t_allday` group by YEAR(`t_allday`.`selected_date`) ,week(`t_allday`.`selected_date`)) as `t1` 
						 join (SELECT `no`,`public` FROM `reason` group by `public` order by `no` ) as `t2` 
						order by `t1`.`year`,`t1`.`week`,`t2`.`no` , `t2`.`public`";
		$query = $this->DB_clpsg->query($str);
		foreach ($query->result() as $row)
		{
			$return_array['year'][]=$row->year;
			$return_array['week'][]=$row->week;
			$return_array['show_time'][]=$row->show_time;
			$return_array['public'][]=$row->public;
			$return_array['total'][]=$row->total;
		}
		return $return_array;
	}
	public function headcount_statistics_by_headlist_id_month_in_public($date1,$date2)
	{
		$str = "SELECT `t1`.`year`,`t1`.`month` ,concat(`t1`.`year`,'年',`t1`.`month`,'月') as `show_time`, `t2`.`public` ,(select IF(sum(`headcount`.`headcount`) is NULL , 0 , sum(`headcount`.`headcount`)) from `headcount` where YEAR(`headcount`.`date`)=`t1`.`year` and MONTH(`headcount`.`date`)=`t1`.`month` and `headcount`.`reason_public`=`t2`.`public`) as `total` from 
						(select YEAR(`t_allday`.`selected_date`) as `year` , MONTH(`t_allday`.`selected_date`) as `month` from (
						select * from 
						(select adddate('".$date1."',  t2.i*100 + t1.i*10 + t0.i) selected_date from
						 (select 0 i union select 1 union select 2 union select 3 union select 4 union select 5 union select 6 union select 7 union select 8 union select 9) t0,
						 (select 0 i union select 1 union select 2 union select 3 union select 4 union select 5 union select 6 union select 7 union select 8 union select 9) t1,
						 (select 0 i union select 1 union select 2 union select 3 union select 4 union select 5 union select 6 union select 7 union select 8 union select 9) t2) v
						where selected_date between '".$date1."' and '".$date2."') as `t_allday` group by YEAR(`t_allday`.`selected_date`) , MONTH(`t_allday`.`selected_date`)) as `t1` join 
						(SELECT `no`,`public` FROM `reason` group by `public` order by `no`) as `t2` 
						order by `t1`.`year`,`t1`.`month`,`t2`.`no` , `t2`.`public`";
		$query = $this->DB_clpsg->query($str);
		foreach ($query->result() as $row)
		{
			$return_array['year'][]=$row->year;
			$return_array['month'][]=$row->month;
			$return_array['show_time'][]=$row->show_time;
			$return_array['public'][]=$row->public;
			$return_array['total'][]=$row->total;
		}
		return $return_array;
	}
}
?>