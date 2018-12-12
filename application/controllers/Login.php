<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();



		$this->load->database();

		$this->load->model('Login_model');


		header("Access-Control-Allow-Origin: *");

	}



	public function index()

	{

		if(is_login() == 1){ redirect(base_url('dashboard'),'refresh');}

		$this->load->view('login');

	}



	function loginprocess()

	{



			 $smail = $this->input->post('emp_mail_id');
			 $emp_pass = $this->input->post('emp_pass');
			
			

			$staffdata = $this->Login_model->staffData($smail,$emp_pass);
             if(!empty($staffdata)){
				 
				  $data = array(  
                        'login_date_time'     => date("Y-m-d H:i:s")
                        ); 
		  
             $this->db->where('id', $staffdata->id);
             $this->db->update('organization', $data);

				 
				 
			$session_data = array(

								"user_id"     => $staffdata->id,

								"user_email"  => $staffdata->email,

								"user_type"   => $staffdata->login_type,

								"user_name"   => $staffdata->name,
								
								"org_id"      => $staffdata->org_id

							);

			$this->session->set_userdata($session_data);

			//echo 1;
           $this->abc();
	    }
		else{
			 $this->session->set_flashdata("Error","Username or Password incorrect."); 
			 return redirect(''); 
		}



	}
	
  function abc(){
	  $this->load->helper('url');
	     return redirect('dashboard/index/0'); 
	       
  }

}