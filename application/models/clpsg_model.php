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
}
?>