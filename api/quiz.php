<?php include_once('confi.php');
error_reporting(E_ALL);
ini_set('display_errors', 1);
    $user_id = isset( $_REQUEST['user_id']) ? mysql_real_escape_string( $_REQUEST['user_id']) :  "";
	$quiz_date = isset( $_REQUEST['quiz_date']) ? mysql_real_escape_string( $_REQUEST['quiz_date']) :  "";
	$question_type_ans = isset( $_REQUEST['question_type_ans']) ? mysql_real_escape_string( $_REQUEST['question_type_ans']) :  "";
	$question_type_value = isset( $_REQUEST['question_type_value']) ? mysql_real_escape_string( $_REQUEST['question_type_value']) :  "";
	$question_type_value = isset( $_REQUEST['question_type_value']) ? mysql_real_escape_string( $_REQUEST['question_type_value']) :  "";
   
if($question_type_ans=='department'){  
 $qur = mysql_query('SELECT * FROM `questions` JOIN `quiz` ON `quiz`.`question_id` = `questions`.`id` AND `quiz`.`quiz_status`=0 AND `quiz`.`emp_id`="'.$user_id.'" AND `quiz`.`quiz_date`="'.$quiz_date.'" AND `quiz`.`department`="'.$question_type_value.'"  ORDER BY `questions`.`questions_type` ASC');
}
else{  
  $qur = mysql_query('SELECT * FROM `questions` JOIN `quiz` ON `quiz`.`question_id` = `questions`.`id` AND `quiz`.`quiz_status`=0 AND `quiz`.`emp_id`="'.$user_id.'" AND `quiz`.`team`="'.$question_type_value.'" AND `quiz`.`quiz_date`="'.$quiz_date.'"  ORDER BY `questions`.`questions_type` ASC');
}
 
 
 $result =array();
 while($r = mysql_fetch_array($qur)){
 extract($r);
	 if($questions_type=='Rating'){
	 $result[] = array("id" => $question_id, "question" => $questions,'possible_answers'=>$leavel1.','.$leavel2.','.$leavel3.','.$leavel4.','.$leavel5, "correct_answer" => '1',"question_type"=>'1'); 
	 }else{
	 $result[] = array("id" => $question_id, "question" => $questions,'possible_answers'=>"YES,No", "correct_answer" => '1',"question_type"=>'2'); 	 
	 }
 }
 if(!empty($result)){
	  $json = array("status" => 1, "quiz_questions" => $result);
 }
 else{
	  $json = array("status" => 0, "msg" => "Empty");
 }

 @mysql_close($conn);
 
 /* Output header */
 header('Content-type: application/json');
 echo json_encode($json);