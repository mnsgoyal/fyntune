<?php
date_default_timezone_set("Asia/Calcutta");

class MCQ_Controller extends CI_Controller 
{
	function __construct() 
	{	
		parent::__construct();	
		$this->load->library('API');
		$this->load->model('Common_model');	
		$this->load->helper('common_helper');		
	}
	
	public function common_page_load_call()
	{
		$data 					= array();
		$user					= isset($_GET['user']) ? $_GET['user'] : '';
		$data['user']			= $user;
		$user_old_question = $this->Common_model->get_user_question($data['user']);
		$is_user_played = false;
		if(count($user_old_question)>0){
			$is_user_played = true;
		}

		$data['user_old_question'] 	= $user_old_question;
		$data['is_user_played'] 	= $is_user_played;
		$current_page  				= $this->uri->segment(1);
		if($current_page != "home" && $user == ""){
			redirect('home');
		} 
		return $data;
	}
}
?>