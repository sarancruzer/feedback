<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login_model extends CI_Model {
    function __construct(){
        parent::__construct();
		    $this->load->database();
    }
	  function staffData($username,$password){		  
        return $this->db->get_where('organization',array('email' => $username,'password' => $password))->row();
    }

} ?>

