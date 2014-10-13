<?php
class Question extends CI_Controller {

	//叫出連線的model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('clpsg_model');
		$this->load->helper(array('html','url'));
		$this->load->library(array('parser','session'));
	}
	public function index()
	{
	}
	public function list_need_question()
	{
		Html_Header();
		$this->load->view("clpsg/templates/header");
		$this->load->view('clpsg/templates/main_navigation');
		$view_array['list_need_question']=$this->clpsg_model->list_need_question();
		$this->load->view('clpsg/question/list_need_question',$view_array);
		$this->load->view("clpsg/templates/footer");
	}
	public function write_answer_question()
	{
		Html_Header();
		jquery_time_require();
		$headlist_id = $this->uri->segment(3, 0);
		$return_array = $this->clpsg_model->query_how_many_question($headlist_id);
		if($return_array['total_finish']=="")
		{
			echo "<script>alert('此參訪不需填寫問卷');window.location='".base_url('question/list_need_question')."';</script>";
		}
		else if($return_array['total_finish'] >= $return_array['headcount'])
		{
			echo "<script>alert('此參訪已完成所有問卷');window.location='".base_url('question/list_need_question')."';</script>";
		}
		else
		{
			$return_array['next_question_no']=$return_array['total_finish']+1;
			$this->load->view("clpsg/templates/header");
			$this->load->view('clpsg/templates/main_navigation');
			$view_array['write_question_info']=$return_array;
			$view_array['question_html_list']=$this->clpsg_model->query_questions_and_htmlcode();
			$this->load->view('clpsg/question/write_question',$view_array);
			$this->load->view("clpsg/templates/footer");
		}
	}
	public function insert_question()
	{
		Html_Header();
		$input_array = $this->input->post();
		$this->clpsg_model->insert_question($input_array);
		echo "<script>window.location='".base_url('question/write_answer_question/'.$input_array['headcount_id'])."'</script>";
	}
}

function Html_Header()
{
	//產生表頭
	echo doctype();
	$meta = array(
	        array('name' => 'robots', 'content' => 'no-cache'),
	        array('name' => 'description', 'content' => '中壢國小 綠苑 內部統計系統'),
	        array('name' => 'keywords', 'content' => '中壢, 國小, 綠苑, 環境教育中心 , 綠建築'),
	        array('name' => 'Content-type', 'content' => 'text/html; charset=utf-8', 'type' => 'equiv')
	);
	echo meta($meta);
//	echo link_tag(array('href'=>'assets/css/jquery-ui-1.10.3.css', 'rel' => 'stylesheet','type' => 'text/css','media'=>'screen,projection,print'));	
	echo link_tag(array('href'=>'assets/css/layout2_setup.css', 'rel' => 'stylesheet','type' => 'text/css','media'=>'screen,projection,print'));
	echo link_tag(array('href'=>'assets/css/layout2_text.css', 'rel' => 'stylesheet','type' => 'text/css','media'=>'screen,projection,print'));
	echo link_tag(array('href'=>'assets/css/bootstrap.css', 'rel' => 'stylesheet','type' => 'text/css','media'=>'screen,projection,print'));
//	echo link_tag(array('href'=>'assets/css/bootstrap.min.css', 'rel' => 'stylesheet','type' => 'text/css','media'=>'screen,projection,print'));
//	echo link_tag(array('href'=>'assets/lwtCountdown/style/main.css', 'rel' => 'stylesheet','type' => 'text/css','media'=>'screen,projection,print'));
//	echo link_tag(array('href'=>'assets/img/favicon.jpg', 'rel' => 'icon','type' => 'image/x-icon'));
//	echo script_tag('assets/js/jquery-2.1.1.min.js');	
//	echo script_tag('assets/lwtCountdown/js/jquery.lwtCountdown-1.0.js');
//	echo script_tag('assets/lwtCountdown/js/misc.js');
//	echo script_tag('assets/js/jquery-ui-1.10.3.js');
//	echo script_tag('assets/js/datepickerCHT.js');
}
function jquery_time_require()
{
	echo script_tag('assets/js/jquery/jquery-2.1.1.min.js');	
	echo script_tag('assets/js/jquery/jquery-ui.js');	
	echo script_tag('assets/js/jquery/jquery-ui-timepicker-addon.js');	
	echo script_tag('assets/js/jquery/jquery-ui-sliderAccess.js');
	echo script_tag('assets/js/control/datepickerCHT.js');	
	echo script_tag('assets/js/control/timepicker.js');	
	echo script_tag('assets/js/control/slider.js');	
//	echo script_tag('assets/js/control/reason.js');	
	echo link_tag(array('href'=>'assets/js/jquery/jquery-ui.css', 'rel' => 'stylesheet','type' => 'text/css','media'=>'screen,projection,print'));
	echo link_tag(array('href'=>'assets/js/jquery/jquery-ui-timepicker-addon.css', 'rel' => 'stylesheet','type' => 'text/css','media'=>'screen,projection,print'));
}