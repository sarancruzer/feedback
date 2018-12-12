<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_voting extends CI_Controller {
	function Admin_voting(){
		parent::__construct();
		$this->load->database();
		$this->load->model('category_model');
		header("Access-Control-Allow-Origin: *");
	}
	 function index(){
		if(is_login() == 0){ redirect(base_url(''),'refresh');}
		$this->load->view('header');	
        $data['organization'] = $this->category_model->getAllorganization();		
		$data["fetch_data"] = $this->category_model->category_fetch_data();  		
		$this->load->view("voting", $data);        
		$this->load->view('footer');
	}	     
	function savingdata($id = 0)  {          
	         
		$datain = array(  'category' => $this->input->post('category'),
		'org_id' => $this->input->post('org_id')
  		); 
       $datas = array(  'category'     => $this->input->post('category') ); 		
	
		if ($id == 0) {             
		  $this->db->insert('category', $datain);             
		   redirect("category/index/0");        
		} else {             
		    $this->db->where('id', $id);             
		    $this->db->update('category', $datas);			 			 
		redirect("voting/index/0");        
		}			      
	}  		
	public function update_data(){             
	$user_id = $this->uri->segment(3);                       
	$data["user_data"] = $this->category_model->fetch_single_data($user_id);             
	$data["fetch_data"] = $this->category_model->category_fetch_data();  		   
	$this->load->view('header');           
	$this->load->view("category", $data);  		   
	$this->load->view('footer');      
	}  
 public function delete_data(){             
 $id = $this->uri->segment(3);                        
 $this->category_model->delete_data($id);             
 redirect("category/index/0");      
 }  
	
} ?>
