<?php 
  class Common_model extends CI_Model
  {
  	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

  	Public function insert_user_question($user_id,$inputs)
	{	
		$query = $this->db->query("INSERT INTO user_question SET 
			user_id 				= ?,
			question_id 			= ?, 
			question 				= ?, 
			category 				= ?,
			type 					= ?, 
			difficulty 				= ?, 
			correct_answer 			= ?, 
			incorrect_answers 		= ?,
			all_options 		= ? ",
			array($user_id, $inputs->question_id, $inputs->question, $inputs->category, $inputs->type, $inputs->difficulty, $inputs->correct_answer, serialize($inputs->incorrect_answers),serialize($inputs->all_options)));
		
		$insert_id = $this->db->insert_id();	
		return $insert_id;
	}

	Public function get_user_question($user_id)
	{
		
		$this->db->select('question.question');
		$this->db->from('user_question question');
		$this->db->where('question.user_id', $user_id);
		$query  = $this->db->get();
		return $query->result();
	}

	public function update_user_tips($user_id, $question_id,$user_answer)
    {

    	//------------get answer
    	$this->db->select('question.correct_answer');
		$this->db->from('user_question question');
		$this->db->where('question.user_id', $user_id);
		$this->db->where('question.question_id', $question_id);
		$query  = $this->db->get();
		$result = $query->result();
		$user_result = "loss";
		if($result[0]->correct_answer == $user_answer){
			$user_result = "win";
		}

	    $update = $this->db->update('user_question', array('user_selection'=>$user_answer,'result'=>$user_result,'status'=>1), array('user_id'=>$user_id,'question_id'=>$question_id));
		return $update?true:false;
    }

	Public function get_user_result($user_id)
	{
		
		$this->db->select('question_id,question,category,type,difficulty,correct_answer,incorrect_answers,all_options,user_selection,result,status');
		$this->db->from('user_question ');
		$this->db->where('user_id', $user_id);
		$query  = $this->db->get();
		return $query->result();
	}

	Public function get_users_score($limit,$page,$user_id,$orderby)
	{
		
		$this->db->select("user_id,SUM(CASE result WHEN  'win' THEN 1 ELSE 0 END) AS score,status");
		$this->db->from('user_question ');
		if($user_id != ""){
			$this->db->like('user_id', $user_id);
		}
		$this->db->group_by('user_id'); 
		if($orderby != ""){
			$this->db->order_by('score',$orderby); 
		}
		if($limit!=""){
			if($page > 0){
				$page = ($page-1) * $limit;
			}
			$this->db->limit($limit, $page);
		}
		$query  = $this->db->get();
		return $query->result();
	}
  }
?>