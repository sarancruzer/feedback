<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Cron3 extends CI_Controller {
	function Cron3(){
		parent::__construct();
		$this->load->database();        //$this->load->model('team_model');
		header("Access-Control-Allow-Origin: *");
	}
	 public function index(){        
			 $this->db->select("id,email,org_id,team2");  		
			 //$this->db->where("login_type", 2);  
			 //$this->db->or_where("login_type", 3); 
             $where = '(login_type=2 or login_type = 3)';	
             $this->db->where($where);			 
			 $this->db->from("organization");          
			 $query = $this->db->get();		  
			 foreach($query->result() as $row){ 				
					 $from_email = "vigneswaran@thoughtbuzz.in"; 		        
					 $to_email = $row->email; 
                     $team=$row->team2;
                     if(!empty($team))  { 					 
					 $query5 = $this->db->query('SELECT group_concat(id order by rand() ) as id FROM questions WHERE org_id="'.$row->org_id.'" AND id not in(SELECT question_id FROM quiz WHERE emp_id="'.$row->id.'")');  
					    $studentID=array();
						 foreach($query5->result() as $key => $val){                          
							$studentID = array($val->id);                       
						 }	
                     				 
                      if(!empty($studentID[0]))  {
						  //Load email library 
							$this->load->library('email');
							$config['protocol']    = 'sendmail';
							$config['smtp_host']    = 'ssl://smtp.gmail.com';
							$config['smtp_port']    = '465';
							$config['smtp_timeout'] = '7';
							$config['smtp_user']    = 'vigneswaran@thoughtbuzz.in';
							$config['smtp_pass']    = 'waran@123';
							$config['charset']    = 'utf-8';
							$config['newline']    = "\r\n";
							$config['mailtype'] = 'html'; // or html
							$config['validation'] = TRUE; // bool whether to validate email or not      
							$this->email->initialize($config);
							$this->email->from($from_email, 'Response System'); 
							$this->email->to($to_email);
							$this->email->subject('Response System - Today questions'); 
							$data = array('username'=> $row->id,'Password'=> $row->email);
							$body = $this->load->view('email3.html',$data,TRUE);
							$this->email->message($body);
						    $kwame = explode(',', $studentID[0]);
						
							 for($i=0;$i<3;$i++){	
  							   $date = date('Y-m-d');					  
							   $updateData = array('question_id' => $kwame[$i],'team'=>$team,'emp_id'=>$row->id,'quiz_date'=>$date);
							   $this->db->insert('quiz', $updateData);				   				   
							 }	

					 }						 
			    }
			 }			 
	
    } 
	
}
