<?php include_once('confi.php');
error_reporting(E_ALL);
ini_set('display_errors', 1);
 if(!empty($_REQUEST)){
         $team_department = $_REQUEST['team_department'];
        
       	
		
		$result = mysql_query("Select a.id, a.category_id ,sum(b.quiz_value) / SUM(CASE WHEN b.quiz_status = 1 AND b.quiz_value !='YES' AND b.quiz_value !='No' THEN 1 ELSE 0 END)  as quiz_value, SUM(CASE WHEN b.quiz_status = 1 AND b.quiz_value !='YES' AND b.quiz_value !='No' THEN 1 ELSE 0 END) AS test From questions a,quiz b,organization c Where a.id=b.question_id AND b.emp_id=c.id AND (b.team ='".$team_department."' OR b.department='".$team_department."')  Group by a.category_id");
	
		
			while ($row = mysql_fetch_assoc($result)) {
				if($row['quiz_value']!=''){
					$hed=
				$rst[]=array('name'=>$row['category_id'].' ('.$row['test'].')','score'=>$row['quiz_value']);
				}else{
					$rst[]=array('name'=>$row['category_id'],'score'=>"0");
				}
			}
			
			
		
			
			
			
			
		
	     $json = $rst;
 

		 @mysql_close($conn);
		 
		 /* Output header */
		 header('Content-type: application/json');
		 echo json_encode($json);	
			
			
			
 }
else{
	 $r['errors'] = 'Something Wrong please try again.';
     return $r;
	}
   
?>

