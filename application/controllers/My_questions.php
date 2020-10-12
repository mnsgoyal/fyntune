<?php defined('BASEPATH') OR exit('No direct script access allowed');
class My_questions extends MCQ_Controller {
	function __construct() 
	{
		parent::__construct();
		$this->load->model('Common_model');
	}

	public function index()
	{
		$data 					= $this->common_page_load_call();
		
		$data['page_name']		= 'my-questions';	
		$data['ajax_path']		= "my-questions";
		$data['body_class']		= "my-questions";
		$data['page_id']		= "my-questions";
		$data['page_title']		= "Questions List";
		
		if($data['is_user_played']){
			$user_key_val = "?user=".$data['user'];
			redirect('my-result'.$user_key_val);
			return;
		}

		$data['questions_list'] = $this->api->get_my_questions();
			
		foreach($data['questions_list'] as $key => $question){
			$question->question_id = $key+1;
			$question->all_options = $question->incorrect_answers;
			$question->all_options[] =  $question->correct_answer;
			//----------Shuffle the options
			for($i=1;$i<count($question->all_options);$i++){
				$r = rand(0,$i);
				if($i != $r){
					$temp = $question->all_options[$i];
					$question->all_options[$i] = $question->all_options[$r];
					$question->all_options[$r] = $temp;
				} 
			}
			$add_user_question	=	$this->Common_model->insert_user_question($data['user'],$question);
			$data['questions_list'][$key] = $question;
		}
		//echo "<pre>";print_r($data['questions_list']);die;
		$this->load->view("shared/viw_body",$data);		
	}
	
	//Submit My Questions by ajax 
	public function submit_my_questions()
	{
		$input				= $this->input->post();
		$user 				= $input['user'];
		$user_submission 	= $input['user_submission'];
		if($user != '')
		{
			if(!empty($user_submission))
			{
				foreach($user_submission as $question_id => $option_id){
					$is_updated	=	$this->Common_model->update_user_tips($user,$question_id+1,$option_id);
					if(!$is_updated){
						$return_json 	= array('status'=>'error','message'=>"Error at the time of answer submission");
						echo json_encode($return_json);
						return;
					}
				}			
				$return_json 	= array('status'=>'success','message'=>'Question submitted successfully!');
			}
			else
			{
				$return_json 	= array('status'=>'error','message'=>'Your selection is not valid please try again');
			}
		}
		elseif($user_key == '')
		{
			$return_json 	= array('status'=>'','message'=>'User not found');
		}
		echo json_encode($return_json);
	}
}


