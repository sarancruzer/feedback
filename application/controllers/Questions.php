<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Questions extends CI_Controller {
	function Questions(){
		parent::__construct();

		$this->load->database();

        $this->load->model('questions_model');

		header("Access-Control-Allow-Origin: *");

	}


	 function index(){
		if(is_login() == 0){ redirect(base_url('login'),'refresh');}
		$this->load->view('header');
		 $data['organization'] = $this->questions_model->getAllorganization();
		$data["fetch_data"] = $this->questions_model->questions_fetch_data();  
		$data['groups'] = $this->questions_model->getAllCategory();
		$this->load->view("questions", $data);
        $this->load->view('footer');
	}
	
	
	function getcat(){  
	
	 $Organization_id=$_GET['Organization_id'];
	   
	      $this->db->where('org_id', $Organization_id);
		  $this->db->order_by('id', 'ASC');
		  $query = $this->db->get('category');
		  $output = ' <option value="">Select category</option>';
		  foreach($query->result() as $row)
		  {
		   $output .= '<option value="'.$row->category.'">'.$row->category.'</option>';
		  }
		   //$output .= ' </select>';
		  echo $output;
			   
	   
	   
	}
	
     function savingdata($id = 0)  {  
        //this array is used to get fetch data from the view page.  
        $datas = array(  
                        'questions'     => $this->input->post('questions'), 
						'questions_type'     => $this->input->post('questions_type'), 
						'leavel_type'     => $this->input->post('leavel_type'), 
						'category_id'     => $this->input->post('category')
                        ); 
		$datain= array(  
                        'questions'     => $this->input->post('questions'), 
						'questions_type'     => $this->input->post('questions_type'), 
						'leavel_type'     => $this->input->post('leavel_type'), 
						'category_id'     => $this->input->post('category'),
						'org_id' => $this->input->post('org_id'),
						'leavel1' => $this->input->post('leavel1'),
						'leavel2' => $this->input->post('leavel2'),
						'leavel3' => $this->input->post('leavel3'),
						'leavel4' => $this->input->post('leavel4'),
						'leavel5' => $this->input->post('leavel5')
                        ); 
		if ($id == 0) {
             $this->db->insert('questions', $datain);
             redirect("questions/index/0");
        } else {
             $this->db->where('id', $id);
             $this->db->update('questions', $datas);
			 
			 redirect("questions/index/0");
        }	
		  
    }  
	
	public function update_data(){  
           $user_id = $this->uri->segment(3);  
          
           $data["user_data"] = $this->questions_model->fetch_single_data($user_id);  
           $data["fetch_data"] = $this->questions_model->questions_fetch_data();  
		   $this->load->view('header');
           $this->load->view("questions", $data);  
		   $this->load->view('footer');
      }  

public function active(){  
           $status_quc = $this->uri->segment(3);  
          
           $this->questions_model->active($status_quc);  
           $data["fetch_data"] = $this->questions_model->questions_fetch_data();  
		   $this->load->view('header');
           $this->load->view("questions", $data);  
		   $this->load->view('footer');
      }  
	  
	  public function inactive(){  
           $status_quc = $this->uri->segment(3);  
          
           $this->questions_model->inactive($status_quc);  
           $data["fetch_data"] = $this->questions_model->questions_fetch_data();  
		   $this->load->view('header');
           $this->load->view("questions", $data);  
		   $this->load->view('footer');
      }

	  	  function upload_file(){
		$csvMimes = array('application/vnd.ms-excel','text/plain','text/csv','text/tsv');
	    if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'],$csvMimes)){
	        if(is_uploaded_file($_FILES['file']['tmp_name'])){
	            $org_id=$this->input->post('org_id');
				$category=$this->input->post('category');
	            //open uploaded csv file with read only mode
	            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
	            
	            // skip first line
	            // if your csv file have no heading, just comment the next line
	            fgetcsv($csvFile);
	            
	            //parse data from csv file line by line
	            while(($line = fgetcsv($csvFile)) !== FALSE){
	                //check whether member already exists in database with same email
	                $result = $this->db->get_where("questions", array("questions"=>$line[0],"category_id"=>$category))->result();
	                if(count($result) > 0){
	                
	             $this->session->set_flashdata('update','questions already exist. Please try another questions or CSV file' );
	              
	                    
	                }else{
	                   $this->session->set_flashdata('update', 'SUCCESS : This file has been added. ');
	                
	               
	                    //insert member data into database
	                    $this->db->insert("questions", array("questions"=>$line[0], "questions_type"=>trim($line[1]), "category_id"=>$category, "leavel_type"=>"Level_one", "leavel1"=>$line[2], "leavel2"=>$line[3], "leavel3"=>$line[4], "leavel4"=>$line[5], "leavel5"=>$line[6],"org_id"=>$org_id));
	                    
	                    
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
	    redirect("questions/index/0");
	}
	
} ?>


