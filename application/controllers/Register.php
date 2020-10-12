<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends NFLGAMES_Controller 
{
	public function __construct()
	{
		parent::__construct();
	}	
	public function index()
	{
		// Page specific code ----------------------------------------------------------------------- starts here
		$data 				= $this->common_page_load_call();
		// Page specific code ----------------------------------------------------------------------- starts here
		$data['page_id']				= "register";
		$data['page_name']				= "register";
		$data['ajax_path']				= "register-info-content";
		$data['page_title']				= "Register";
		$data['body_class']				= "leaderboard-wrap";
		// Page specific code ----------------------------------------------------------------------- ends here
		$this->load->view("shared/viw_body", $data);
		// Page specific code ----------------------------------------------------------------------- ends here
	}	
	public function get_content_by_ajax()
	{
		$input							= clean_text($this->input->get());
		$active_url = array_filter(explode('/',rtrim($input['active_url'],'/')));
		$group_id = end($active_url);
		$matches = $input['matches'];	
		$user= '-'.rand('10000','99999');
		$data['link']  = base_url().'my-picks?uk=3dafd108-0a1a-46ef-b3e7-5cebeb7b0b5c'.$user.'&user=zzz-isportgenius-nro&selections='.$matches;
		$this->load->view("register", $data);
	}
}