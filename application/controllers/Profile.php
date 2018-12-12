<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Profile extends CI_Controller {
	function Profile(){
		parent::__construct();
		$this->load->database();
		$this->load->model('profile_model');
		header("Access-Control-Allow-Origin: *");
	}
	 function index(){
		if(is_login() == 0){ redirect(base_url(''),'refresh');}
		$this->load->view('header');
        $id=$this->session->userdata('user_id');	
		$data["user_data"] = $this->profile_model->profile_fetch_data($id);  
		
		//var_dump($data);
        		
		$this->load->view("profile", $data);        
		$this->load->view('footer');
	}	     
	function savingdata($id = 0)  {   

	          $name=$this->input->post('name');
			  $password=$this->input->post('password');
			  $file=$_FILES['file']['name'];
			  $user_id=$this->input->post('user_id');
			 
	         if(!empty($password)){
					$this->form_validation->set_rules('name','First Name','trim|required');
					$this->form_validation->set_rules('password', 'Password', 'required');
					$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');
								 
				if($this->form_validation->run() == FALSE){
					  $this->load->view('header');
					  $id=$this->session->userdata('user_id');	
					  $data["user_data"] = $this->profile_model->profile_fetch_data($id);  
					  $this->load->view("profile", $data);        
					  $this->load->view('footer');
				} 
			 }
			 if(!empty($name) && !empty($password) && !empty($file)){
				
				  $datain = array(  'name' => $this->input->post('name'),
				  'profile_pic' =>$_FILES['file']['name'],
				  'password' => $this->input->post('password'),
				); 
				
				
				
				   $config['upload_path'] = './uploadsimg/';
					$config['allowed_types'] = 'gif|jpg|jpeg|png';
					$config['max_size'] = '1024';
					$config['max_width']  = '1024';
					$config['max_height']  = '1024';

					$this->load->library('upload', $config);

					if (!$this->upload->do_upload('file'))
					{
						$error = array('error' => $this->upload->display_errors());
						echo json_encode($error);
					}
					else
					{
						//$file_data = array('upload_data' => $this->upload->data());
						//$data['img'] = base_url().'/uploadsimg/'.$file_data['file_name'];
						//echo json_encode($data);
						
						$this->db->where('id', $user_id);             
				        $this->db->update('organization', $datain);			 			 
			            redirect("profile/index/0");      
					}
				
				
				
				          
				
			 }
			
		  		
		
			          
				
				
	}  		
	public function update_data(){             
	$user_id = $this->uri->segment(3);                       
	$data["user_data"] = $this->profile_model->fetch_single_data($user_id);             
	$data["fetch_data"] = $this->profile_model->category_fetch_data();  		   
	$this->load->view('header');           
	$this->load->view("profile", $data);  		   
	$this->load->view('footer');      
	}  
 public function delete_data(){             
 $id = $this->uri->segment(3);                        
 $this->profile_model->delete_data($id);             
 redirect("profile/index/0");      
 }  
	
} ?>
