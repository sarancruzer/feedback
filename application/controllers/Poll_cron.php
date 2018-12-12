<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Poll_cron extends CI_Controller {
	function Poll_cron(){
		parent::__construct();
		$this->load->database();        //$this->load->model('team_model');
		header("Access-Control-Allow-Origin: *");
	}
	 public function index(){        
			 $this->db->select("id,email,org_id");  		
			 $this->db->where("login_type", 2);        
			 $this->db->from("organization");          
			 $query = $this->db->get();	
             $question_id=$_GET['question_id'];			 
			 foreach($query->result() as $row){ 				
					 $from_email = "vigneswaran@thoughtbuzz.in"; 		        
					 $to_email = $row->email; 						 
					 $query5 = $this->db->query('SELECT group_concat(id order by rand() ) as id FROM poll_questions WHERE org_id="'.$row->org_id.'" AND id not in(SELECT question_id FROM poll_quiz WHERE emp_id="'.$row->id.'")');  
					    $studentID=array();
						 foreach($query5->result() as $key => $val){                          
							$studentID = array($val->id);                       
						 }	
						 
						 $datas = array( 'status_quc' => 1 
							                 
                        ); 
                     			
                            $this->db->where('id', $question_id);
                            $this->db->update('poll_questions', $datas);

								
                      //if(!empty($studentID[0]))  {
						  
						$kwame = explode(',', $studentID[0]);
						
							 for($i=0;$i<1;$i++){	
  							   $date = date('Y-m-d');					  
							   $updateData = array('question_id' => $question_id,'emp_id'=>$row->id,'quiz_date'=>$date);
							   $this->db->insert('poll_quiz', $updateData);				   				   
							 }	

					// }						 
			 }		redirect("poll_voting/index/0");	
	
    } 
	
}
