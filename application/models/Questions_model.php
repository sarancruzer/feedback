
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Questions_model extends CI_Model {

    function __construct() {

        parent::__construct();

		    $this->load->database();

    }

    function questions_fetch_data(){
		
		    $user_type = $this->session->userdata('user_type');
		$user_id = $this->session->userdata('user_id');
		$org_id = $this->session->userdata('org_id');
		
					$this->db->select("*");   
					  if($user_type==0){
						$this->db->where("org_id", $user_id ); 
						
					  }elseif($user_type==3){ 
					  $this->db->where("org_id", $org_id);
					   
					  }else{
						  
					  } 
           $this->db->from("questions");  
           $query = $this->db->get();  
           return $query;  
		
	}
	
  function fetch_single_data($id)  
      {  
           $this->db->where("id", $id);  
           $query = $this->db->get("questions");  
           return $query;  
           //Select * FROM tbl_user where id = '$id'  
      }  
	  
	 function active($id)  
      {  $datas = array(  
                        'status_quc'     => 0 
                        ); 
           $this->db->where("id", $id);  
           $query =  $this->db->update('questions', $datas);  
           return $query;  
           //Select * FROM tbl_user where id = '$id'  
      }  
	  
	  function inactive($id)  
      {  $datas = array(  
                        'status_quc'     => 1 
                        ); 
           $this->db->where("id", $id);  
           $query =  $this->db->update('questions', $datas);  
           return $query;  
           //Select * FROM tbl_user where id = '$id'  
      }  
	

function delete_data($id){  
           $this->db->where("id", $id);  
           $this->db->delete("questions");  
           //DELETE FROM tbl_user WHERE id = $id  
      }  
	  
function getAllCategory()
        {
           
 $user_type = $this->session->userdata('user_type');
		$user_id = $this->session->userdata('user_id');
		$org_id = $this->session->userdata('org_id');
		
					   
					  if($user_type==0){
						
						$query = $this->db->query('SELECT * FROM category where org_id="'.$user_id.'"');
						 return $query->result();
					  }elseif($user_type==3){ 
					  
					   $query = $this->db->query('SELECT * FROM category where org_id="'.$org_id.'"');
					    return $query->result();
					  }else{
						$query = $this->db->query('SELECT * FROM category');  
						 return $query->result();
					  } 
         
        
       
            
        }
		function getAllorganization(){
          $query = $this->db->query('SELECT id,name FROM organization where login_type=0');
        return $query->result();
            
        }

} ?>



