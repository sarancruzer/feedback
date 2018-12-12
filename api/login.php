<?php include_once('confi.php');
error_reporting(E_ALL);
ini_set('display_errors', 1);
   $username = isset($_REQUEST['username']) ? mysql_real_escape_string($_REQUEST['username']) :  "";
   $password = isset($_REQUEST['password']) ? mysql_real_escape_string($_REQUEST['password']) :  "";
  
		
        $access_key = md5(uniqid($username, true));
		//echo "UPDATE login SET access_key= '$access_key' , login_at=now() WHERE UserId='$username' AND Password='$password'";
		$done= mysql_query("UPDATE organization SET access_key= '$access_key' , login_date_time=now() WHERE email='$username' AND password='$password'");
		if ($done)
        {
           
       
			 if(!empty($username) && !empty($password)){
			  $qur = mysql_query("select *  from `organization` where email='$username' AND password='$password'");
			 $result =array();
					 while($r = mysql_fetch_array($qur)){
					 extract($r);
					 $result[] = array("username" => $email, "name" => $name, 'login_at' => $login_date_time,'access_key'=>$access_key,'user_id'=>$id ,'login_type'=>$login_type ); 
					 }
						if(!empty($result)){
							  $json = array("error"=> false,"status" => 1, "info" => $result);
						 }
						 else{
							  $json = array("status" => 0, "msg" => "Empty");
						 }
			 }else{
			 $json = array("status" => 0, "msg" => "username or password not define");
			 }
 
		}
 @mysql_close($conn);
 
 /* Output header */
 header('Content-type: application/json');
 echo json_encode($json);