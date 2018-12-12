<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Quiz extends CI_Controller {
	function Quiz(){
		parent::__construct();

		$this->load->database();

        $this->load->model('quiz_model');

		header("Access-Control-Allow-Origin: *");

	}


	 function index(){
		if(is_login() == 0){ redirect(base_url(''),'refresh');}
		$this->load->view('header');
		$emp_id = $this->session->userdata('user_id');
		$data["fetch_data"] = $this->quiz_model->quiz_fetch_data($emp_id); 
	    $data["old_fetch_data"] = $this->quiz_model->old_quiz_fetch_data($emp_id);
         $data["old_fetch_data2"] = $this->quiz_model->old_quiz_fetch_data2($emp_id);		
		$this->load->view("quiz", $data);
        $this->load->view('footer');
	}
	
	 function old_quiz(){
		$this->load->view('header');
		$emp_id = $this->session->userdata('user_id');
		$old_dte = $_GET['quiz_date'];
		 if(!empty($_GET['department']))  { 
		  $department = $_GET['department'];
		     $data["fetch_data"] = $this->quiz_model->quiz_fetch_data_old($emp_id,$old_dte,$department);
			 
			 //echo "<pre>".print_r($data,1)."</pre>";
		 }
		 if(!empty($_GET['team']))  { 
		  $team = $_GET['team'];
		  $data["fetch_data"] = $this->quiz_model->quiz_fetch_data_old2($emp_id,$old_dte,$team);
		  echo "<pre>".print_r($data,1)."</pre>";
		 }
		
	    $data["old_fetch_data"] = $this->quiz_model->old_quiz_fetch_data($emp_id);	
        $data["old_fetch_data2"] = $this->quiz_model->old_quiz_fetch_data2($emp_id);		
		$this->load->view("quiz", $data);
        $this->load->view('footer');
	}
	
     function savingdata($id = 0)  {  
        //this array is used to get fetch data from the view page.  
                         
						$emp_id = $this->session->userdata('user_id');
						$quiz_value=$this->input->post('quiz_value');
						
						$question_id=$this->input->post('question_id');
						
						//echo count($question_id);
						
						//echo "<pre>".print_r($question_id,1)."</pre>";
						
						//echo "<pre>".print_r($quiz_value,1)."</pre>";
						
						
						for($i=0;$i<count($question_id);$i++){
							
							//echo $question_id[$i]."</br>";
							 $datas = array( 'quiz_status' => 1 ,
							                 'quiz_value' => $quiz_value[$question_id[$i]]
                        ); 
							$this->db->where('question_id', $question_id[$i]);
							$this->db->where('emp_id', $emp_id);
                            $this->db->update('quiz', $datas);
							
						}
						
						redirect("quiz/index/0");
		
		if ($id == 0) {
           //  $this->db->insert('quiz', $datas);
           //  redirect("quiz/index/0");
        } else {
            // $this->db->where('id', $id);
             //$this->db->update('quiz', $datas);
			 
			 redirect("quiz/index/0");
        }	
		  
    }  
	
	public function update_data(){  
           $user_id = $this->uri->segment(3);  
          
           $data["user_data"] = $this->quiz_model->fetch_single_data($user_id);  
           $data["fetch_data"] = $this->quiz_model->quiz_fetch_data();  
		   $this->load->view('header');
           $this->load->view("quiz", $data);  
		   $this->load->view('footer');
      }  

 public function delete_data(){  
           $id = $this->uri->segment(3);  
           
           $this->quiz_model->delete_data($id);  
           redirect("quiz/index/0");
      }  

	
} ?>


