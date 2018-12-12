<?php defined('BASEPATH') OR exit('No direct script access allowed');class Email extends CI_Controller {
	function Email(){
		parent::__construct();
		$this->load->database();        //$this->load->model('team_model');
		header("Access-Control-Allow-Origin: *");
	}
	 function index(){
														$from_email = "vigneswaran@thoughtbuzz.in"; 		        $to_email = "offybox@gmail.com"; 		          						$this->load->library('email');			$config['protocol']    = 'sendmail';						$config['smtp_host']    = 'ssl://smtp.gmail.com';						$config['smtp_port']    = '465';						$config['smtp_timeout'] = '7';						$config['smtp_user']    = 'vigneswaran@thoughtbuzz.in';						$config['smtp_pass']    = 'waran@123';						$config['charset']    = 'utf-8';						$config['newline']    = "\r\n";						$config['mailtype'] = 'html'; // or html						$config['validation'] = TRUE; // bool whether to validate email or not      						$this->email->initialize($config);		             $this->email->from($from_email, 'Feedback System');          $this->email->to($to_email);         $this->email->subject('Feedback System - Username & Password'); 		 		 $data = array(       'username'=> "HAI",	   'Password'=> "HAI"         );		 		 $body = $this->load->view('email3.html',$data,TRUE);		          $this->email->message($body);                               //Send mail          if($this->email->send()) {			          echo "Email sent successfully."; 		 }         else {         echo "email_sent","Error in sending Email."; 		 }				   				   				   
	         
	
    } }?>
