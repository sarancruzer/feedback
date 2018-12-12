<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Organization_model extends CI_Model {

    function __construct() {
        parent::__construct();
		    $this->load->database();

    }

    function organization_fetch_data(){
		
	   $this->db->select("*");  
           $this->db->where("login_type", 0); 
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



