<?php include_once('confi.php');
error_reporting(E_ALL);
ini_set('display_errors', 1);
 if(!empty($_REQUEST)){
        $user_id = $_REQUEST['user_id'];
        $question_id = $_REQUEST['question_id'];
		$quiz_value = $_REQUEST['quiz_value'];
       	
        $query = mysql_query("UPDATE quiz SET quiz_value ='".$quiz_value."',quiz_status=1 WHERE emp_id ='".$user_id."' AND question_id='".$question_id."'");

			 
 }
else{
	 $r['errors'] = 'Something Wrong please try again.';
     return $r;
	}
   
 
 