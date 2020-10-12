<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Result extends MCQ_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Common_model');
	}
	
	public function index()
	{
		$data 				= $this->common_page_load_call();
		// Page specific code ----------------------------------------------------------------------- starts here
		$data['page_name']				= "my-result";
		$data['page_id']				= "my-result";
		$data['ajax_path']				= "my-result";
		$data['page_title']				= "My Result";
		$data['body_class']				= "results-wrap";
		// Page specific code ----------------------------------------------------------------------- ends here
		$user_result = $this->Common_model->get_user_result($data['user']);
		if(count($user_result)==0){
			$user_key_val = "?user=".$data['user'];
			redirect('home'.$user_key_val);
			return;
		}
		$total_score = 0;
		foreach($user_result as $result){
			if($result->result == "win"){
				$total_score++;
			}
		}
		$data['total_score']				= $total_score;
		$data['user_result']				= $user_result;
		$this->load->view("shared/viw_body", $data);
	}
}