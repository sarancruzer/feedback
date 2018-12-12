<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Poll_voting extends CI_Controller {
	function Poll_voting(){
		parent::__construct();

		$this->load->database();

        $this->load->model('poll_voting_model');

		header("Access-Control-Allow-Origin: *");

	}


	 function index(){
		if(is_login() == 0){ redirect(base_url('login'),'refresh');}
		$this->load->view('header');
		 $data['organization'] = $this->poll_voting_model->getAllorganization();
		$data["fetch_data"] = $this->poll_voting_model->questions_fetch_data();  
		
		$this->load->view("poll_voting", $data);
        $this->load->view('footer');
	}
	
     function savingdata($id = 0)  {  
        //this array is used to get fetch data from the view page.  
        $datas = array(  
                        'status'     => '0' 
                        ); 
		$datain= array(  
                        'questions'     => $this->input->post('subject'), 
						'org_id' => $this->input->post('org_id'),
						'questions_type' => 'YES_or_No',
						'status_quc' => 0
                        ); 
						
						
						
		if ($id == 0) {
             $this->db->insert('poll_questions', $datain);
			 			 
             redirect("poll_voting/index/0");
        } else {
             $this->db->where('id', $id);
             $this->db->update('polls', $datas);
			 
			 redirect("poll_voting/index/0");
        }	
		  
    }  
	
	public function update_data(){  
           $user_id = $this->uri->segment(3);  
          
           $data["user_data"] = $this->poll_voting_model->fetch_single_data($user_id);  
           $data["fetch_data"] = $this->poll_voting_model->questions_fetch_data();  
		   $this->load->view('header');
           $this->load->view("poll_voting", $data);  
		   $this->load->view('footer');
      }  

public function active(){  
           $status_quc = $this->uri->segment(3);  
          
           $this->poll_voting_model->active($status_quc);  
           $data["fetch_data"] = $this->poll_voting_model->questions_fetch_data();  
		   $this->load->view('header');
           $this->load->view("poll_voting", $data);  
		   $this->load->view('footer');
      }  
	  
	  public function inactive(){  
           $status_quc = $this->uri->segment(3);  
          
           $this->poll_voting_model->inactive($status_quc);  
           $data["fetch_data"] = $this->poll_voting_model->questions_fetch_data();  
		   $this->load->view('header');
           $this->load->view("poll_voting", $data);  
		   $this->load->view('footer');
      }

	
} ?>


