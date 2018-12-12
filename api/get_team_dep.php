<?php include_once('confi.php');
error_reporting(E_ALL);
ini_set('display_errors', 1);
 if(!empty($_REQUEST)){
         $user_id = $_REQUEST['user_id'];
        
       	$query_getorg_id = mysql_query("SELECT org_id FROM organization WHERE id =' ". $user_id. " '");
		$row_getShows = mysql_fetch_assoc($query_getorg_id);
        $row_getShows["org_id"];
		$rst=array();
		
		$result = mysql_query("SELECT team FROM team WHERE org_id ='".$row_getShows["org_id"]."'");
	
		   // $rst[]=array('team_department'=>"Select option");
			while ($row = mysql_fetch_assoc($result)) {
				$rst[]=array('team_department'=>$row['team']);
			}
			
			
		$result2 = mysql_query("SELECT department FROM organization WHERE org_id ='".$row_getShows["org_id"]."' GROUP BY department");
	
		
			while ($row = mysql_fetch_assoc($result2)) {
				$rst[]=array('team_department'=>$row['department']);
			}	
			
			
			
			
		
	     $json = array("success" => 1, "Name" => $rst);
 

		 @mysql_close($conn);
		 
		 /* Output header */
		 header('Content-type: application/json');
		 echo json_encode($json);	
			
			
			
 }
else{
	 $r['errors'] = 'Something Wrong please try again.';
     return $r;
	}
   
 
 