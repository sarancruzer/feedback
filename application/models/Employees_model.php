<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Employees_model extends CI_Model {

    function __construct() {
        parent::__construct();
		    $this->load->database();

    }

    function employees_fetch_data(){
		$user_type = $this->session->userdata('user_type');
		$user_id = $this->session->userdata('user_id');
		$org_id = $this->session->userdata('org_id');
		
					$this->db->select("*");   
					  if($user_type==0){
						$this->db->where("org_id", $user_id ); 
						 $this->db->where("login_type", 2);
					  }elseif($user_type==3){ 
					  $this->db->where("org_id", $org_id);
					   $this->db->where("login_type", 2);
					  }else{
						  $this->db->where("login_type", 2);
					  }
		    
		   
           $this->db->from("organization");  
           $query = $this->db->get();  
           return $query;  
		
	}
	
  function fetch_single_data($id)  
      {  
           $this->db->where("id", $id);  
           $query = $this->db->get("organization");  
           return $query;  
           //Select * FROM tbl_user where id = '$id'  
      }  
	
function delete_data($id){  
           $this->db->where("id", $id);  
           $this->db->delete("organization");  
           //DELETE FROM tbl_user WHERE id = $id  
      }  

	  
  public function GetRow($keyword) {        
         $this->db->order_by('id', 'DESC');
		  $this->db->select('id, department as name');
        $this->db->like("department", $keyword);
        return $this->db->get('organization')->result();
		
		
    }
	
	 public function GetRowTeam($keyword) {        
         $this->db->order_by('id', 'DESC');
		  $this->db->select('id, team as name');
        $this->db->like("team", $keyword);
        return $this->db->get('team')->result();
		
		
    }
	
	
	function getAllorganization(){
          $query = $this->db->query('SELECT id,name FROM organization where login_type=0');
        return $query->result();
            
        }

} ?>



