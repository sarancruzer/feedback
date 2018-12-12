<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	function is_login()
	{
      $CI =& get_instance();
			$CI->load->model("Login_model");
			$emp_id = $CI->session->userdata('user_id');
			if( $emp_id == '' ) {
				return 0;
			} else {
				return 1;
			}
	}

  
?>
