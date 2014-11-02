<?php
class Calendar extends CI_Controller {
	
	//叫出連線的model
	public function __construct()
	{
		//這個function不能透過construct內 因為舊的css會影響到fullcalendar的樣式
		parent::__construct();
		$this->load->model('clpsg_model');
		$this->load->helper(array('html','url'));
		$this->load->library(array('parser','session'));
//		Html_Header();
//		jquery_time_require();
//		jquery_calendar();
//		if($this->session->userdata('name')=="")
//		{
//			echo "<script>alert('請先登入');window.location='".base_url('')."';</script>";
//		}
	}
	public function index()
	{
		Html_Header();
		$this->load->view("clpsg/templates/header");
		$this->load->view('clpsg/templates/main_navigation');
		$this->load->view('clpsg/calendar/main_page');
		$this->load->view("clpsg/templates/footer");
	}
	public function main_calendar()
	{
		jquery_calendar();
		$this->load->view('clpsg/calendar/main_calendar');
	}
	public function ajax_calendar()
	{
		$return_array[0]['title'] ='做肥皂';
		$return_array[0]['start'] ='2014-11-01';
		$return_array[0]['end'] ='';
		$return_array[0]['content'] ='這個活動很簡單 就是做肥皂 減肥皂 做肥皂 減肥皂  很激烈 所以說三次';
		$return_array[1]['title'] ='做肥皂2';
		$return_array[1]['start'] ='2014-11-02';
		$return_array[1]['content'] ='這個活動很簡單 就是做肥皂 減肥皂 做肥皂 減肥皂  很激烈 所以說三次';

		echo json_encode($return_array);
	}
	public function add_calendar()
	{
		Html_Header();
		//jQuery Validation
		echo script_tag('assets/js/validation/jquery.validate.min.js');
		echo script_tag('assets/js/validation/localization/messages_zh_TW.min.js');
		$this->load->view("clpsg/templates/header");
		$this->load->view('clpsg/templates/main_navigation');
		$this->load->view('clpsg/calendar/add_calendar');
		$this->load->view("clpsg/templates/footer");
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
	echo link_tag(array('href'=>'assets/js/jquery/jquery-ui.css', 'rel' => 'stylesheet','type' => 'text/css','media'=>'screen,projection,print'));
	echo link_tag(array('href'=>'assets/css/layout2_setup.css', 'rel' => 'stylesheet','type' => 'text/css','media'=>'screen,projection,print'));
	echo link_tag(array('href'=>'assets/css/layout2_text.css', 'rel' => 'stylesheet','type' => 'text/css','media'=>'screen,projection,print'));
	echo link_tag(array('href'=>'assets/css/bootstrap.css', 'rel' => 'stylesheet','type' => 'text/css','media'=>'screen,projection,print'));
	echo script_tag('assets/js/jquery/jquery-2.1.1.min.js');
	echo script_tag('assets/js/jquery/jquery-ui.js');	
}
function jquery_time_require()
{
//	echo script_tag('assets/js/jquery/jquery-2.1.1.min.js');
//	echo script_tag('assets/js/jquery/jquery-ui.js');	
	echo script_tag('assets/js/jquery/jquery-ui-timepicker-addon.js');	
	echo script_tag('assets/js/jquery/jquery-ui-sliderAccess.js');
	echo script_tag('assets/js/control/datepickerCHT.js');	
	echo script_tag('assets/js/control/timepicker.js');	
	echo script_tag('assets/js/control/slider.js');	
	echo script_tag('assets/js/highcharts/highcharts.js');	
//	echo script_tag('assets/js/control/reason.js');	
//	echo link_tag(array('href'=>'assets/js/jquery/jquery-ui.css', 'rel' => 'stylesheet','type' => 'text/css','media'=>'screen,projection,print'));
	echo link_tag(array('href'=>'assets/js/jquery/jquery-ui-timepicker-addon.css', 'rel' => 'stylesheet','type' => 'text/css','media'=>'screen,projection,print'));
}
function jquery_calendar()
{
	echo doctype();
	$meta = array(
	        array('name' => 'robots', 'content' => 'no-cache'),
	        array('name' => 'description', 'content' => '中壢國小 綠苑 內部統計系統'),
	        array('name' => 'keywords', 'content' => '中壢, 國小, 綠苑, 環境教育中心 , 綠建築'),
	        array('name' => 'Content-type', 'content' => 'text/html; charset=utf-8', 'type' => 'equiv')
	);
	echo meta($meta);
	echo link_tag(array('href'=>'assets/js/jquery/jquery-ui.css', 'rel' => 'stylesheet','type' => 'text/css','media'=>'screen,projection,print'));
	echo script_tag('assets/js/jquery/jquery-2.1.1.min.js');
	echo script_tag('assets/js/jquery/jquery-ui.js');	
	echo link_tag(array('href'=>'assets/js/fullcalendar/fullcalendar.css', 'rel' => 'stylesheet','type' => 'text/css','media'=>'screen,projection,print'));
//	echo link_tag(array('href'=>'assets/js/fullcalendar/fullcalendar.min.css', 'rel' => 'stylesheet','type' => 'text/css','media'=>'screen,projection,print'));
//	echo link_tag(array('href'=>'assets/js/fullcalendar/fullcalendar.print.css', 'rel' => 'stylesheet','type' => 'text/css','media'=>'screen,projection,print'));
	echo script_tag('assets/js/fullcalendar/moment.min.js');
//	echo script_tag('assets/js/fullcalendar/gcal.js');	
	echo script_tag('assets/js/fullcalendar/fullcalendar.min.js');	
	echo script_tag('assets/js/fullcalendar/lang-all.js');
	echo script_tag('assets/js/jquery/jquery.blockUI.js');
}