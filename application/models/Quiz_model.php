<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Quiz_model extends CI_Model {

    function __construct() {

        parent::__construct();

		    $this->load->database();

    }

    function quiz_fetch_data($emp_id){
       $date = date('Y-m-d');
  
		$this->db->select('*'); // <-- There is never any reason to write this line!
		$this->db->from('questions');
		$this->db->join('quiz', 'quiz.question_id = questions.id AND quiz.quiz_status=2 AND quiz.emp_id="'.$emp_id.'"  AND quiz.quiz_date="'.$date.'"'); 
		$query = $this->db->get();
           return $query; 
 
		
	}
	
	 function quiz_fetch_data_old($emp_id,$old_dte,$department){
        $this->db->select('*'); // <-- There is never any reason to write this line!
		$this->db->from('questions');
		$this->db->join('quiz', 'quiz.question_id = questions.id AND quiz.quiz_status=0 AND quiz.emp_id="'.$emp_id.'" AND quiz.department="'.$department.'" AND quiz.quiz_date="'.$old_dte.'"'); 
		$query = $this->db->get();
        return $query; 
 
		
	}
	
	 function quiz_fetch_data_old2($emp_id,$old_dte,$team){
		//echo $teams=str_replace(' ', '',$team);
        $this->db->select('*'); // <-- There is never any reason to write this line!
		$this->db->from('questions');
		$this->db->join('quiz', 'quiz.question_id = questions.id AND quiz.quiz_status=0 AND quiz.emp_id="'.$emp_id.'" AND quiz.team="'.$team.'" AND quiz.quiz_date="'.$old_dte.'"'); 
		$query = $this->db->get();
        return $query; 
 
		
	}
	
	
	  function old_quiz_fetch_data($emp_id){
        $this->db->select('*'); // <-- There is never any reason to write this line!
		$this->db->from('questions');
		$this->db->join('quiz', 'quiz.question_id = questions.id AND quiz.quiz_status=0 AND quiz.department!="" AND quiz.emp_id="'.$emp_id.'" GROUP BY quiz.department'); 
		$query = $this->db->get();
        return $query; 
	}
	
	  function old_quiz_fetch_data2($emp_id){
        $this->db->select('*'); // <-- There is never any reason to write this line!
		$this->db->from('questions');
		$this->db->join('quiz', 'quiz.question_id = questions.id AND quiz.quiz_status=0 AND quiz.team!="" AND quiz.emp_id="'.$emp_id.'" GROUP BY quiz.team'); 
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



