<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Login_history extends CI_Controller {

	function Login_history(){

		parent::__construct();
		$this->load->database();

       $this->load->model('login_history_model');

		header("Access-Control-Allow-Origin: *");
	}





	 function index(){

		if(is_login() == 0){ redirect(base_url(''),'refresh');}


        $this->load->view('header');
		$data["fetch_data"] = $this->login_history_model->login_history_fetch_data();  

		$this->load->view('login_history', $data);
		
        $this->load->view('footer');

	}

function hr_profile_list(){

		if(is_login() == 0){ redirect(base_url(''),'refresh');}


        $this->load->view('header');

		$this->load->view('hr_profile_list');
		
        $this->load->view('footer');

	}



	
} ?>


