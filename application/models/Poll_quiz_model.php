<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Poll_quiz_model extends CI_Model {

    function __construct() {

        parent::__construct();

		    $this->load->database();

    }

    function quiz_fetch_data($emp_id){
       $date = date('Y-m-d');
  
		$this->db->select('*'); // <-- There is never any reason to write this line!
		$this->db->from('poll_questions');
		$this->db->join('poll_quiz', 'poll_quiz.question_id = poll_questions.id AND poll_quiz.quiz_status=0 AND poll_quiz.emp_id="'.$emp_id.'"  AND poll_quiz.quiz_date="'.$date.'"'); 
		$query = $this->db->get();
           return $query; 
 
		
	}
	
	 function quiz_fetch_data_old($emp_id,$old_dte){
        $this->db->select('*'); // <-- There is never any reason to write this line!
		$this->db->from('poll_questions');
		$this->db->join('poll_quiz', 'poll_quiz.question_id = poll_questions.id AND poll_quiz.quiz_status=0 AND poll_quiz.emp_id="'.$emp_id.'" AND poll_quiz.quiz_date="'.$old_dte.'"'); 
		$query = $this->db->get();
        return $query; 
 
		
	}
	
	
	  function old_quiz_fetch_data($emp_id){
        $this->db->select('*'); // <-- There is never any reason to write this line!
		$this->db->from('poll_questions');
		$this->db->join('poll_quiz', 'poll_quiz.question_id = poll_questions.id AND poll_quiz.quiz_status=0 AND poll_quiz.emp_id="'.$emp_id.'" GROUP BY poll_quiz.quiz_date'); 
		$query = $this->db->get();
        return $query; 
	}
	
  function fetch_single_data($id)  
      {  
           $this->db->where("id", $id);  
           $query = $this->db->get("team");  
           return $query;  
           //Select * FROM tbl_user where id = '$id'  
      }  
	

     function delete_data($id){  
           $this->db->where("id", $id);  
           $this->db->delete("team");  
           //DELETE FROM tbl_user WHERE id = $id  
      }  
	  


} ?>



