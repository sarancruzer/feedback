<?php


defined('BASEPATH') OR exit('No direct script access allowed');





class Hr_profile extends CI_Controller {





	function Hr_profile(){


		parent::__construct();

       $this->load->model('hr_profile_model');
		$this->load->database();




		header("Access-Control-Allow-Origin: *");


	}

 function index(){
		if(is_login() == 0){ redirect(base_url(''),'refresh');}
		
		$this->load->view('header');
		$data["fetch_data"] = $this->hr_profile_model->hr_profile_fetch_data();  
		$data['organization'] = $this->hr_profile_model->getAllorganization();
		$this->load->view("hr_profile", $data);
                 $this->load->view('footer');
	}
	
	function getDepartmentname(){
		$keyword=$this->input->post('keyword');
        $data=$this->hr_profile_model->GetRow($keyword);        
        echo json_encode($data);
	}
	
     function savingdata($id = 0)  {  
        //this array is used to get fetch data from the view page.  
		$tempass= random_string('alnum',20);
        $datas = array(  
                        'name'     => $this->input->post('name'), 
						'email'     => trim($this->input->post('email')),
						'department'     => $this->input->post('department'),
						'designation'     => $this->input->post('designation'),	
						'login_type'     => 3,					
						'mobile_number'     => $this->input->post('mobile_number') 
                        ); 
		 $datain = array(  
                        'name'     => $this->input->post('name'), 
						'email'     => trim($this->input->post('email')),
						'department'     => $this->input->post('department'),
						'designation'     => $this->input->post('designation'),	
						'login_type'     => 3,		
                        'password'   => $tempass, 						
						'mobile_number'     => $this->input->post('mobile_number'), 
						'org_id' => $this->input->post('org_id')
                        ); 				
		
		if ($id == 0) {
		
		            $from_email = "vigneswaran@thoughtbuzz.in"; 
		             $to_email = $this->input->post('email'); 
		             $this->load->helper('string');

            // $tempass= random_string('alnum',20);
		             
		             
		             $result = $this->db->get_where("organization", array("email"=>$to_email ))->result();
	                if(count($result) > 0){
	                $this->session->set_flashdata('update', 'This  '. $to_email .' already exist. Please try another Email');
	                redirect("hr_profile/index/0");
	                }
		             
   
         //Load email library 
        
			
			$this->load->library('email');

			$config['protocol']    = 'sendmail';
			
			$config['smtp_host']    = 'localhost';
			
			$config['smtp_port']    = '25';
			
			$config['smtp_timeout'] = '7';
			
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
		 
		 $body = $this->load->view('email2.html',$data,TRUE);
		 
         $this->email->message($body); 
         
         

   
         //Send mail 
         if($this->email->send()) 
         $this->session->set_flashdata("email_sent","Email sent successfully."); 
         else 
         $this->session->set_flashdata("email_sent","Error in sending Email."); 
		
		  $this->session->set_flashdata('SUSS', 'SUCCESS : This email '. $to_email .' has been added. ');
		
             $this->db->insert('organization', $datain);
             redirect("hr_profile/index/0");
        } else {
             $this->db->where('id', $id);
             $this->db->update('organization', $datas);
			 
			 redirect("hr_profile/index/0");
        }	
		  
    }  
	
	public function update_data(){  
           $user_id = $this->uri->segment(3);  
          
           $data["user_data"] = $this->hr_profile_model->fetch_single_data($user_id);  
           $data["fetch_data"] = $this->hr_profile_model->hr_profile_fetch_data();  
		   $this->load->view('header');
           $this->load->view("hr_profile", $data);  
		   $this->load->view('footer');
      }  

 public function delete_data(){  
           $id = $this->uri->segment(3);  
           
           $this->hr_profile_model->delete_data($id);  
           redirect("hr_profile/index/0");
      }  

	  
	  function upload_file(){
		$csvMimes = array('application/vnd.ms-excel','text/plain','text/csv','text/tsv');
	    if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'],$csvMimes)){
	        if(is_uploaded_file($_FILES['file']['tmp_name'])){
	            $org_id=$this->input->post('org_id');
	            //open uploaded csv file with read only mode
	            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
	            
	            // skip first line
	            // if your csv file have no heading, just comment the next line
	            fgetcsv($csvFile);
	            
	            //parse data from csv file line by line
	            while(($line = fgetcsv($csvFile)) !== FALSE){
	                //check whether member already exists in database with same email
	                $result = $this->db->get_where("organization", array("email"=>$line[1]))->result();
	                if(count($result) > 0){
	                
	             $this->session->set_flashdata('update','Email already exist. Please try another Email or CSV file' );
	              
	                    //update member data
	                   //$this->db->update("organization", array("name"=>$line[0], "department"=>$line[2], "designation"=>$line[3], "	mobile_number"=>$line[4]), array("email"=>$line[1]));
	                }else{
	                   $this->session->set_flashdata('update', 'SUCCESS : This file has been added. ');
	                $tempass= random_string('alnum',20);
	               // $this->session->set_flashdata('SUSS', 'SUCCESS : This email '. $to_email .' has been added. ');
	                    //insert member data into database
	                    $this->db->insert("organization", array("name"=>$line[0], "email"=>trim($line[1]), "department"=>$line[2], "designation"=>$line[3],"login_type"=>3,"password"=>$tempass, "mobile_number"=>$line[4],"org_id"=>$org_id));
	                    
	                    
	                    $from_email = "vigneswaran@thoughtbuzz.in"; 
             $to_email = $line[1]; 
            $this->load->helper('string');

             
   
         //Load email library 
        
			
			$this->load->library('email');

			$config['protocol']    = 'sendmail';
			
			$config['smtp_host']    = 'localhost';
			
			$config['smtp_port']    = '25';
			
			$config['smtp_timeout'] = '3';
			
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
		 
		 $body = $this->load->view('email2.html',$data,TRUE);
		 
         $this->email->message($body); 
         
         

   
         //Send mail 
         if($this->email->send()) 
         $this->session->set_flashdata("email_sent","Email sent successfully."); 
         else 
         $this->session->set_flashdata("email_sent","Error in sending Email."); 
		
	                    
	                   
	                    
	                }
	            }
	            
	            //close opened csv file
	            fclose($csvFile);
	            $qstring["status"] = 'Success';
	        }else{
	            $qstring["status"] = 'Error';
	        }
	    }else{
	        $qstring["status"] = 'Invalid file';
	    }
	    redirect("hr_profile/index/0");
	}
	
} ?>
