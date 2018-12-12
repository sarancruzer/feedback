<?php include_once('confi.php');
error_reporting(E_ALL);
ini_set('display_errors', 1);
 if(!empty($_REQUEST)){
        $user_id = $_REQUEST['user_id'];
        $password = $_REQUEST['password'];
		//$quiz_value = $_REQUEST['quiz_value'];
       	
        $query = mysql_query("UPDATE organization SET password ='".$password."' WHERE id ='".$user_id."'");

			 
 }
else{
	 $r['errors'] = 'Something Wrong please try again.';
     return $r;
	}
   
 
 