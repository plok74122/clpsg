<?php
class Clpsg extends CI_Controller {

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
		Html_Header();
		//本文內容
		$this->load->view("clpsg/templates/header");
		$this->load->view('clpsg/templates/main_navigation');
		$this->load->view('clpsg/templates/main_content');
		$this->load->view("clpsg/templates/footer");
	}
	public function login_check()
	{
		Html_Header();
		$input_array = $this->input->post();
		$return = $this->clpsg_model->login_check($input_array);
		if($return['no']!="")
		{
			$this->session->set_userdata($return);
			redirect(base_url());	
		}
		else
		{
			$this->session->sess_destroy();
			redirect(base_url());	
		}
	}
	public function logut()
	{	
		$this->session->sess_destroy();
		redirect(base_url());
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
//	echo link_tag(array('href'=>'assets/css/bootstrap.min.css', 'rel' => 'stylesheet','type' => 'text/css','media'=>'screen,projection,print'));
//	echo link_tag(array('href'=>'assets/lwtCountdown/style/main.css', 'rel' => 'stylesheet','type' => 'text/css','media'=>'screen,projection,print'));
//	echo link_tag(array('href'=>'assets/img/favicon.jpg', 'rel' => 'icon','type' => 'image/x-icon'));
//	echo script_tag('assets/js/jquery-2.1.1.min.js');	
//	echo script_tag('assets/lwtCountdown/js/jquery.lwtCountdown-1.0.js');
//	echo script_tag('assets/lwtCountdown/js/misc.js');
//	echo script_tag('assets/js/jquery-ui-1.10.3.js');
//	echo script_tag('assets/js/datepickerCHT.js');
}