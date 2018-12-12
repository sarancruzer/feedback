<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Category_model extends CI_Model {
    function __construct() {
        parent::__construct();
		    $this->load->database();
    }
    function category_fetch_data(){				   $this->db->select("*")->order_by('id',"desc");             $this->db->from("category");             $query = $this->db->get();             return $query;  			}	  function fetch_single_data($id)        {             $this->db->where("id", $id);             $query = $this->db->get("category");             return $query;                    }  	
     function delete_data($id){             $this->db->where("id", $id);             $this->db->delete("category");                   }  
	   function getAllorganization(){          $query = $this->db->query('SELECT id,name FROM organization where login_type=0');        return $query->result();                    }

} ?>

