<?php


defined('BASEPATH') OR exit('No direct script access allowed');





class Organization extends CI_Controller {





	function Organization(){


		parent::__construct();


		$this->load->database();

         $this->load->model('organization_model');
$this->load->helper('form');
$this->load->helper('url');
$this->load->library('session');
		header("Access-Control-Allow-Origin: *");


	}



	 function index()

	{

		if(is_login() == 0){ redirect(base_url(''),'refresh');}




        $this->load->view('header');

		$data["fetch_data"] = $this->organization_model->organization_fetch_data();  
		$this->load->view("organization", $data);
		
        $this->load->view('footer');

	}

function savingdata($id = 0)  
    {  
    
    
    //echo 'OK';  
            
          
         
        $tempass= random_string('alnum',20);
        //this array is used to get fetch data from the view page.  
        $datas = array(  
                        'name'     => $this->input->post('name'),  
                        'cvr_number'  => $this->input->post('cvr_number'),  
                        'email'   => trim($this->input->post('email')),  
						'password'   => $tempass, 
                        'mobile_number' => $this->input->post('mobile_number')  
                        );  
        //insert data into database table.  
        //$this->db->insert('organization',$data);  
		//$last_insert_id=$this->db->insert_id(); 
		
		
		if ($id == 0) {
             $this->db->insert('organization', $datas);
			 $from_email = "vigneswaran@thoughtbuzz.in"; 
             $to_email = $this->input->post('email'); 
             $this->load->helper('string');

             
   
         //Load email library 
        
			
			$this->load->library('email');

$config['protocol']    = 'sendmail';

$config['smtp_host']    = 'localhost';

$config['smtp_port']    = '25';

$config['smtp_timeout'] = '2';

$config['smtp_user']    = 'vigneswaran@thoughtbuzz.in';

$config['smtp_pass']    = 'waran@123';

$config['charset']    = 'utf-8';

$config['newline']    = "\r\n";

$config['mailtype'] = 'html'; // or html

$config['validation'] = TRUE; // bool whether to validate email or not      

$this->email->initialize($config);


		 
   
         $this->email->from($from_email, 'Feedback System'); 
         $this->email->to($to_email);
         $this->email->subject('Feedback System - Username & Password'); 
		 
		 $data = array(

       'username'=> $to_email,
	   'Password'=> $tempass

         );
		 
		 $body = $this->load->view('email.html',$data,TRUE);
		 
         $this->email->message($body); 
         
         

   
         //Send mail 
         if($this->email->send()) 
         $this->session->set_flashdata("email_sent","Email sent successfully."); 
         else 
         $this->session->set_flashdata("email_sent","Error in sending Email."); 
		
		
        //$data["fetch_data"] = $this->organization_model->organization_fetch_data();  
        redirect("organization/index/0");
        } else {
             $this->db->where('id', $id);
             $this->db->update('organization', $datas);
			 //$data["fetch_data"] = $this->organization_model->organization_fetch_data();  
			 redirect("organization/index/0");
        }	
            
			
        
		  
    }  
	
	public function update_data(){  
           $user_id = $this->uri->segment(3);  
          
           $data["user_data"] = $this->organization_model->fetch_single_data($user_id);  
           $data["fetch_data"] = $this->organization_model->organization_fetch_data();  
		   $this->load->view('header');
           $this->load->view("organization", $data);  
		   $this->load->view('footer');
      }  
      
       public function delete_data(){  
           $id = $this->uri->segment(3);  
           
           $this->organization_model->delete_data($id);  
           redirect("organization/index/0");
      }  
      

} ?>


