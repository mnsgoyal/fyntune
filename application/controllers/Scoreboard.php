<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Scoreboard extends MCQ_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Common_model');
		$this->load->library('pagination');
	}
	
	public function index()
	{
		$data 				= $this->common_page_load_call();
		// Page specific code ----------------------------------------------------------------------- starts here
		$data['page_id']				= "scoreboard";
		$data['page_name']				= "scoreboard";
		$data['ajax_path']				= "scoreboard";
		$data['page_title']				= "scoreboard";
		$data['body_class']				= "scoreboard";
		$config = array();
		$user_search = (isset($_GET['user_search']))?$_GET['user_search']:"";
		$sort_search = (isset($_GET['sort']))?$_GET['sort']:"";
		$user_search_string = "";
		if($user_search != ""){
			$user_search_string = $user_search_string."&user_search=".$user_search;
		}
		if($sort_search == "asc" || $sort_search == "desc"){
			$user_search_string = $user_search_string."&sort=".$sort_search;
		}

		$config['base_url'] = base_url().'scoreboard?user=admin'.$user_search_string;
		$total_user = $this->Common_model->get_users_score("","",$user_search,"");
		$config['total_rows'] = count($total_user);
		$config['per_page'] = SCOREBOARD_LIMIT;
		$config['use_page_numbers'] = TRUE;
		$config["uri_segment"] = 2;
		$page = (isset($_GET['page']))?$_GET['page']:0;
		$config['num_links']=($page<5)?9-$page:4;
		$config['cur_page'] = $page;
		$config['full_tag_open'] = '<div class="dataTables_paginate paging_bootstrap"><ul class="pagination">';
        $config['full_tag_close'] = '</ul></div>';
        $config['prev_link'] = '&lt; Prev';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = 'Next &gt;';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="javascript:;">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['page_query_string'] = TRUE;
		$config['query_string_segment'] = 'page';
		$config['first_link'] = FALSE;
        $config['last_link'] = FALSE;
		
		$this->pagination->initialize($config);
		$data["links"] = $this->pagination->create_links();
		$users_score					= $this->Common_model->get_users_score(SCOREBOARD_LIMIT,$page,$user_search,$sort_search);
		$data['users_score']			= $users_score;
		$data['scoreboard_count']		= count($users_score);
		
		// Page specific code ----------------------------------------------------------------------- ends here
		$this->load->view("shared/viw_body", $data);
	}
}
