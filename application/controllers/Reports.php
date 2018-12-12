<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends CI_Controller {

	function Reports(){
		parent::__construct();
		$this->load->database();
		header("Access-Control-Allow-Origin: *");
	}

	 function index()	{		if(is_login() == 0){ redirect(base_url(''),'refresh');}		        $this->load->view('header');		$this->load->view('report');		        $this->load->view('footer');	}
} ?>
