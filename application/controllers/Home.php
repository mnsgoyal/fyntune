<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(E_ALL);
		
class Home extends MCQ_Controller 
{
	public function __construct()
	{
		parent::__construct();
		// $this->load->model('Question_model');
	}
	
	public function index()
	{
		$data 							= $this->common_page_load_call();

		// Page specific code ------------------------------------------------------------ starts here
		$data['page_id']				= "home";
		$data['page_name']				= "home";
		$data['ajax_path']				= "home";
		$data['page_title']				= "Home";
		$data['body_class']				= "home-wrap";
		$data['user']					= $data['user'];
		$data['button_text'] 			= 'Take Test';
		$data['button_link'] 			= 'my-questions?user='.$data['user'];
		$data['button_show'] 			= true;
		$data['data_page_name'] 		= "my-questions";
		$data['data_page_title'] 		= "My Questions";
		$data['page_id'] 				= "my-questions";
		
		if($data['is_user_played']){
			$data['button_link'] 		= 'my-result?user='.$data['user'];
			$data['button_text'] 		= 'My Result';
			$data['data_page_name'] 	= "my-result";
			$data['data_page_title'] 	= "My Result";
			$data['page_id']			= "my-result";
		}
		if($data['user'] == ""){
			$data['button_text'] 		= 'Enter User';
		}

		// Page specific code ------------------------------------------------------------ ends here
		$this->load->view("shared/viw_body", $data);
	}
}