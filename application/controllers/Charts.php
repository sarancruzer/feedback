<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Charts extends CI_Controller {
	function Charts(){
		parent::__construct();

		$this->load->database();

        $this->load->model('data_model');

		header("Access-Control-Allow-Origin: *");

	}


	 function index(){
		if(is_login() == 0){ redirect(base_url('login'),'refresh');}
		$this->load->view('header');
		
		$this->load->view("barchart");
        $this->load->view('footer');
	}
	
    function getdata(){
		
        $data  = $this->data_model->getdata();
		//print_r($data);
		
        print_r(json_encode($data, true));
    }
	
} ?>


