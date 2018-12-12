<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function Dashboard(){
		parent::__construct();
		$this->load->database();
		 $this->load->model('data_model');
		header("Access-Control-Allow-Origin: *");
	}

	 function index()	{		
		 if(is_login() == 0){ redirect(base_url(''),'refresh');}		        
		 $this->load->view('header');	
         $data['yes_no'] = $this->data_model->getAllCategory_yes_no();	
		 $data['Rating'] = $this->data_model->getAllCategory_Rating();
		 $data['department'] = $this->data_model->getAllCategory_department();
		 $data['organization'] = $this->data_model->getorganization();
		 $this->load->view('dashboard',$data);		        
		 $this->load->view('footer');	
	 }
	 
	 public function get_all_yes_no() 
    { 
	    $category_id=$_GET['category_id'];
        $data = $this->data_model->get_all_yes_or_no($category_id); 
 
        //         //data to json 
 
        $responce->cols[] = array( 
            "id" => "", 
            "label" => "Topping", 
            "pattern" => "", 
            "type" => "string" 
        ); 
        $responce->cols[] = array( 
            "id" => "", 
            "label" => "Total", 
            "pattern" => "", 
            "type" => "number" 
        ); 
        foreach($data as $cd) 
            { 
			
			//echo "<pre>".print_r($cd)."</pre>";
            $responce->rows[]["c"] = array( 
                array( 
                    "v" => "YES", 
                    "f" => null 
                ) , 
                array( 
                    "v" => (int)$cd['number_of_yes'], 
                    "f" => null 
                ) 
            ); 
			 $responce->rows[]["c"] = array( 
                array( 
                    "v" => "No", 
                    "f" => null 
                ) , 
                array( 
                    "v" => (int)$cd['number_of_no'], 
                    "f" => null 
                ) 
            ); 
            } 
 
        echo json_encode($responce);
    } 
	
	
	 public function get_all_yes_no_poll() 
    { 
	    $category_id=$_GET['category_id'];
        $data = $this->data_model->get_all_yes_or_no_poll($category_id); 
 
        //         //data to json 
 
        $responce->cols[] = array( 
            "id" => "", 
            "label" => "Topping", 
            "pattern" => "", 
            "type" => "string" 
        ); 
        $responce->cols[] = array( 
            "id" => "", 
            "label" => "Total", 
            "pattern" => "", 
            "type" => "number" 
        ); 
        foreach($data as $cd) 
            { 
			
			//echo "<pre>".print_r($cd)."</pre>";
            $responce->rows[]["c"] = array( 
                array( 
                    "v" => "YES", 
                    "f" => null 
                ) , 
                array( 
                    "v" => (int)$cd['number_of_yes'], 
                    "f" => null 
                ) 
            ); 
			 $responce->rows[]["c"] = array( 
                array( 
                    "v" => "No", 
                    "f" => null 
                ) , 
                array( 
                    "v" => (int)$cd['number_of_no'], 
                    "f" => null 
                ) 
            ); 
            } 
 
        echo json_encode($responce);
    } 
	
	
	function getdatateam(){
		$team=$_GET['team'];
        $data  = $this->data_model->getAllCategory_Rating_team($team);
		//print_r($data);
        print_r(json_encode($data, true));
    }
	
	
		function getdatadepartment(){
		$department=$_GET['department'];
        $data  = $this->data_model->getAllCategory_department_res($department);
		//print_r($data);
        print_r(json_encode($data, true));
    }
	
		function getcompere(){
		$bar1=$_GET['bar1'];
		$bar2=$_GET['bar2'];
        $data  = $this->data_model->getAllCategory_Rating_compere($bar1,$bar2);
		//print_r($data);
        print_r(json_encode($data, true));
    }
	
	
	
	 public function get_all_yes_no_qus() 
    { 
	    $category_id=$_GET['category_id'];
        $data = $this->data_model->get_all_yes_or_no_qus($category_id); 
 //print_r($data);
        //         //data to json 
 
        $responce->cols[] = array( 
            "id" => "", 
            "label" => "Topping", 
            "pattern" => "", 
            "type" => "string" 
        ); 
        $responce->cols[] = array( 
            "id" => "", 
            "label" => "Total", 
            "pattern" => "", 
            "type" => "number" 
        ); 
        foreach($data as $cd) 
            { 
			
			//echo "<pre>".print_r($cd)."</pre>";
            $responce->rows[]["c"] = array( 
                array( 
                    "v" => "YES", 
                    "f" => null 
                ) , 
                array( 
                    "v" => (int)$cd['number_of_yes'], 
                    "f" => null 
                ) 
            ); 
			 $responce->rows[]["c"] = array( 
                array( 
                    "v" => "No", 
                    "f" => null 
                ) , 
                array( 
                    "v" => (int)$cd['number_of_no'], 
                    "f" => null 
                ) 
            ); 
            } 
 
        echo json_encode($responce);
    } 
	
	
	 public function get_all_yes_no_pollsearch() 
    { 
	    $category_id=$_GET['category_id'];
        $data = $this->data_model->get_all_yes_no_pollsearch($category_id); 
 //print_r($data);
        //         //data to json 
 
        $responce->cols[] = array( 
            "id" => "", 
            "label" => "Topping", 
            "pattern" => "", 
            "type" => "string" 
        ); 
        $responce->cols[] = array( 
            "id" => "", 
            "label" => "Total", 
            "pattern" => "", 
            "type" => "number" 
        ); 
        foreach($data as $cd) 
            { 
			
			//echo "<pre>".print_r($cd)."</pre>";
            $responce->rows[]["c"] = array( 
                array( 
                    "v" => "YES", 
                    "f" => null 
                ) , 
                array( 
                    "v" => (int)$cd['number_of_yes'], 
                    "f" => null 
                ) 
            ); 
			 $responce->rows[]["c"] = array( 
                array( 
                    "v" => "No", 
                    "f" => null 
                ) , 
                array( 
                    "v" => (int)$cd['number_of_no'], 
                    "f" => null 
                ) 
            ); 
            } 
 
        echo json_encode($responce);
    } 
	
	
	
	function getteam(){  
	
	 $Organization_id=$_GET['Organization_id'];
	   
	      $this->db->where('org_id', $Organization_id);
		 $this->db->group_by('team'); 
		  $query = $this->db->get('organization');
		  $output = ' <option value="">Select Team</option>';
		  foreach($query->result() as $row)
		  {
		   $output .= '<option value="'.$row->team.'">'.$row->team.'</option>';
		  }
		   //$output .= ' </select>';
		  echo $output;
			   
	   
	   
	}
	
		function getteamanddep(){  
	
	 $Organization_id=$_GET['Organization_id'];
	   
	      $this->db->where('org_id', $Organization_id);
		  $this->db->group_by('department');
		  $query = $this->db->get('organization');
		  
		  $this->db->where('org_id', $Organization_id);
		  $this->db->group_by('team'); 
		  $query2 = $this->db->get('team');
		  $rst=array();
		   foreach($query->result() as $row)
			  {
				  $rst[]=$row->department;
			  }
			  foreach($query2->result() as $row)
			  {
				  $rst[]=$row->team;
			  }  
			  
			  
		  $output = ' <option value="">Select Your Option</option>';
		  for($i=0;$i<count($rst);$i++)
		  {
		
			  
		   $output .= '<option value="'.$rst[$i].'">'.$rst[$i].'</option>';
		   
		 
		  }
		   //$output .= ' </select>';
		  echo $output;
			   
	   
	   
	}
	
		function getdep(){  
	
	 $Organization_id=$_GET['Organization_id'];
	   
	      $this->db->where('org_id', $Organization_id);
		 $this->db->group_by('department'); 
		  $query = $this->db->get('organization');
		  $output = ' <option value="">Select Department</option>';
		  foreach($query->result() as $row)
		  {
		   $output .= '<option value="'.$row->department.'">'.$row->department.'</option>';
		  }
		   //$output .= ' </select>';
		  echo $output;
			   
	   
	   
	}
	
		function getqus(){  
	
	 $Organization_id=$_GET['Organization_id'];
	   
	      $this->db->where('org_id', $Organization_id);
		  $this->db->where('questions_type', 'YES_or_No');
		  $this->db->order_by('id', 'ASC'); 
		  $query = $this->db->get('questions');
		  $output = ' <option value="">Select Questions</option>';
		  foreach($query->result() as $row)
		  {
		   $output .= '<option value="'.$row->id.'">'.$row->questions.'</option>';
		  }
		   //$output .= ' </select>';
		  echo $output;
			   
	   
	   
	}
	
		function getquspoll(){  
	
	 $Organization_id=$_GET['Organization_id'];
	   
	      $this->db->where('org_id', $Organization_id);
		  $this->db->where('questions_type', 'YES_or_No');
		  $this->db->order_by('id', 'ASC'); 
		  $query = $this->db->get('poll_questions');
		  $output = ' <option value="">Select Questions</option>';
		  foreach($query->result() as $row)
		  {
		   $output .= '<option value="'.$row->id.'">'.$row->questions.'</option>';
		  }
		   //$output .= ' </select>';
		  echo $output;
			   
	   
	   
	}
	
	
} 
?>
