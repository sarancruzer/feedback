<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Employees_model2 extends CI_Model {

    function __construct() {
        parent::__construct();
		    $this->load->database();

    }

    function employees_fetch_data($org_id){
		
		   $this->db->select("*");  
		  
		   $this->db->where("org_id", $org_id);
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

} ?>



