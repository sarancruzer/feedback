<?php include_once('confi.php');
error_reporting(E_ALL);
ini_set('display_errors', 1);
    $user_id = isset( $_REQUEST['user_id']) ? mysql_real_escape_string( $_REQUEST['user_id']) :  "";
   

 $qur = mysql_query("select *  from `quiz` where quiz_status ='0' AND emp_id='$user_id' AND department!=''  GROUP BY department");
 $qur2 = mysql_query("select *  from `quiz` where quiz_status ='0' AND emp_id='$user_id' AND team!='' GROUP BY team");
 $result =array();
 while($r = mysql_fetch_array($qur)){
 extract($r);
 $result[] = array("quiz_date" => $quiz_date, "emp_id" => $emp_id,'created_at'=>$quiz_date,'question_type_ans'=>'department','question_type_value'=>$department); 
 }
 
  while($r = mysql_fetch_array($qur2)){
 extract($r);
 $result[] = array("quiz_date" => $quiz_date, "emp_id" => $emp_id,'created_at'=>$quiz_date,'question_type_ans'=>'team','question_type_value'=>$team); 
 }
 
 
 
 
 
 if(!empty($result)){
	  $json = array("status" => 1, "info" => $result);
 }
 else{
	  $json = array("status" => 0, "msg" => "Empty");
 }

 @mysql_close($conn);
 
 /* Output header */
 header('Content-type: application/json');
 echo json_encode($json);