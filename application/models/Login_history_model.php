<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_history_model extends CI_Model {

    function __construct() {
        parent::__construct();
		    $this->load->database();

    }

    function login_history_fetch_data(){
		
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
	  


} ?>



