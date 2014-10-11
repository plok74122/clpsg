<?php
class Headcount extends CI_Controller {

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
	public function add_count()
	{
		Html_Header();
		jquery_time_require();
		//本文內容
		$this->load->view("clpsg/templates/header");
		$this->load->view('clpsg/templates/main_navigation');
		$this->load->view('clpsg/headcount/add_headcount');
		$this->load->view("clpsg/templates/footer");
		$view_array['reason']=$this->clpsg_model->query_reason();
		$this->load->view('clpsg/headcount/add_headcount_reason_js',$view_array);
	}
	public function insert_headcount()
	{
		Html_Header();
		$input_array = $this->input->post();
		$return = $this->clpsg_model->insert_headcount($input_array);
		if($return =="success")
		{
			echo "<script>alert('新增成功');history.go(-1);</script>";
		}
		else if($return =="dbrepeat")
		{
			echo "<script>alert('重複的資料');history.go(-1);</script>";
		}
		else
		{
			echo "<script>alert('資料庫寫入出現錯誤');history.go(-1);</script>";
		}
	}	
	public function list_headcount()
	{
		Html_Header();
		$return_array = $this->clpsg_model->list_headcount();
		$this->load->view("clpsg/templates/header");
		$this->load->view('clpsg/templates/main_navigation');
		$view_array['list_array']=$return_array;
		$this->load->view('clpsg/headcount/list_headcount',$view_array);
		$this->load->view("clpsg/templates/footer");
	}
	public function edit_headcount()
	{
		Html_Header();
		jquery_time_require();
		$headlist_id = $this->uri->segment(3, 0);
		$return_array = $this->clpsg_model->query_headcount($headlist_id);
		$view_array['edit']=$return_array;
		$this->load->view("clpsg/templates/header");
		$this->load->view('clpsg/templates/main_navigation');
		$this->load->view('clpsg/headcount/edit_headcount',$view_array);
		$this->load->view("clpsg/templates/footer");	
		$view_array['reason']=$this->clpsg_model->query_reason();
		$this->load->view('clpsg/headcount/edit_headcount_reason_js',$view_array);	
	}
	public function edit_db_headcount()
	{
		Html_Header();
		jquery_time_require();
		$input_array=$this->input->post();
		$return = $this->clpsg_model->update_db_headcount($input_array);
		if($return =="success")
		{
			echo "<script>alert('修改成功');location.href='".base_url('headcount/list_headcount')."';</script>";
		}
		else if($return =="dbrepeat")
		{
			echo "<script>alert('重複的資料');location.href='".base_url('headcount/list_headcount')."';</script>";
		}
		else
		{
			echo "<script>alert('資料庫寫入出現錯誤');history.go(-1);</script>";
		}
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