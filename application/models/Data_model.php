<?php ini_set('display_errors', 'Off');
class Data_model extends CI_Model {
 
    /**
     * @desc load  db
     */
    function __construct() {
        parent::__Construct();
        $this->db = $this->load->database('default', TRUE, TRUE);
    }
 
    /**
     * @desc: Get data from company_performance table
     * @return: Array()
     */
    function getdata(){
		
			 $query = $this->db->query('Select a.id, a.category_id ,sum(b.quiz_value) / SUM(CASE WHEN b.quiz_status = 1 AND b.quiz_value !="YES" AND b.quiz_value !="No" THEN 1 ELSE 0 END) as quiz_value , SUM(CASE WHEN b.quiz_status = 1 AND b.quiz_value !="YES" AND b.quiz_value !="No" THEN 1 ELSE 0 END) AS test  From questions a,quiz b Where a.id=b.question_id Group by a.category_id');
        return $query->result_array();
		
 
    }
	
	
	function get_all_yes_or_no(){
		
        $query = $this->db->query("SELECT SUM(CASE WHEN quiz_value = 'yes' THEN 1 ELSE 0 END) AS number_of_yes, SUM(CASE WHEN quiz_value = 'no' THEN 1 ELSE 0 END) AS number_of_no FROM quiz");
        return $query->result_array();
 
    }
	
	function get_all_yes_or_no_poll(){
		
        $query = $this->db->query("SELECT SUM(CASE WHEN quiz_value = 'yes' THEN 1 ELSE 0 END) AS number_of_yes, SUM(CASE WHEN quiz_value = 'no' THEN 1 ELSE 0 END) AS number_of_no FROM poll_quiz");
        return $query->result_array();
 
    }
	
	function getAllCategory_yes_no()
        {
           
        $user_type = $this->session->userdata('user_type');
		$user_id = $this->session->userdata('user_id');
		$org_id = $this->session->userdata('org_id');
		
					   
					  if($user_type==0){
						
				$query = $this->db->query('SELECT * FROM questions where org_id="'.$user_id.'" AND questions_type="YES_or_No"');
						 return $query->result();
					  }elseif($user_type==3){ 
					  
					   $query = $this->db->query('SELECT * FROM questions where org_id="'.$org_id.'" AND questions_type="YES_or_No"');
					    return $query->result();
					  }elseif($user_type==2){ 
					  
					   $query = $this->db->query('SELECT * FROM questions where org_id="'.$org_id.'" AND questions_type="YES_or_No"');
					    return $query->result();
					  }else{
						$query = $this->db->query('SELECT * FROM questions  where questions_type="YES_or_No"');  
						 return $query->result();
					  } 
         
        
       
            
        }
		
		function getAllCategory_Rating()
        {
           
        $user_type = $this->session->userdata('user_type');
		$user_id = $this->session->userdata('user_id');
		$org_id = $this->session->userdata('org_id');
		
					   
					  if($user_type==0){
						
				$query = $this->db->query('SELECT * FROM organization where org_id="'.$user_id.'" Group by team');
						 return $query->result();
					  }elseif($user_type==3){ 
					  
					   $query = $this->db->query('SELECT * FROM organization where org_id="'.$org_id.'" Group by team');
					    return $query->result();
					  }elseif($user_type==2){ 
					  
					   $query = $this->db->query('SELECT * FROM organization where org_id="'.$org_id.'" Group by team');
					    return $query->result();
					  }else{
						$query = $this->db->query('SELECT * FROM organization where login_type!=1 AND login_type!=0 Group by team');  
						 return $query->result();
					  } 
            
        }
		
		
		function getAllCategory_department()
        {
           
        $user_type = $this->session->userdata('user_type');
		$user_id = $this->session->userdata('user_id');
		$org_id = $this->session->userdata('org_id');
		
					   
					  if($user_type==0){
						
				$query = $this->db->query('SELECT * FROM organization where org_id="'.$user_id.'" Group by department');
						 return $query->result();
					  }elseif($user_type==3){ 
					  
					   $query = $this->db->query('SELECT * FROM organization where org_id="'.$org_id.'" Group by department');
					    return $query->result();
					  }elseif($user_type==2){ 
					  
					   $query = $this->db->query('SELECT * FROM organization where org_id="'.$org_id.'" Group by department');
					    return $query->result();
					  }else{
						$query = $this->db->query('SELECT * FROM organization where login_type!=1 AND login_type!=0 Group by department ');  
						 return $query->result();
					  } 
            
        }
		
		function getAllCategory_department_res($department)
        {
           
           $user_type = $this->session->userdata('user_type');
				$user_id = $this->session->userdata('user_id');
				$org_id = $this->session->userdata('org_id');
							   
		               if($user_type==0){
						$query = $this->db->query("Select a.id, a.category_id ,sum(b.quiz_value) / SUM(CASE WHEN b.quiz_status = 1 AND b.quiz_value !='YES' AND b.quiz_value !='No' THEN 1 ELSE 0 END) as quiz_value, SUM(CASE WHEN b.quiz_status = 1 AND b.quiz_value !='YES' AND b.quiz_value !='No' THEN 1 ELSE 0 END) AS test From questions a,quiz b,organization c Where a.id=b.question_id AND b.emp_id=c.id AND c.department='".$department."' AND a.org_id='".$user_id."' Group by a.category_id");  
						return $query->result();
					  }elseif($user_type==3){
						$query = $this->db->query("Select a.id, a.category_id ,sum(b.quiz_value) / SUM(CASE WHEN b.quiz_status = 1 AND b.quiz_value !='YES' AND b.quiz_value !='No' THEN 1 ELSE 0 END)  as quiz_value, SUM(CASE WHEN b.quiz_status = 1 AND b.quiz_value !='YES' AND b.quiz_value !='No' THEN 1 ELSE 0 END) AS test From questions a,quiz b,organization c Where a.id=b.question_id AND b.emp_id=c.id AND c.department='".$department."' AND a.org_id='".$org_id."' Group by a.category_id");  
					    return $query->result();
					  }elseif($user_type==2){
						  $query = $this->db->query("Select a.id, a.category_id ,sum(b.quiz_value) / SUM(CASE WHEN b.quiz_status = 1 AND b.quiz_value !='YES' AND b.quiz_value !='No' THEN 1 ELSE 0 END)  as quiz_value, SUM(CASE WHEN b.quiz_status = 1 AND b.quiz_value !='YES' AND b.quiz_value !='No' THEN 1 ELSE 0 END) AS test From questions a,quiz b,organization c Where a.id=b.question_id AND b.emp_id=c.id AND c.department='".$department."' AND a.org_id='".$org_id."' Group by a.category_id");  
					      return $query->result();
					  }else{
						$query = $this->db->query("Select a.id, a.category_id ,sum(b.quiz_value) / SUM(CASE WHEN b.quiz_status = 1 AND b.quiz_value !='YES' AND b.quiz_value !='No' THEN 1 ELSE 0 END)  as quiz_value, SUM(CASE WHEN b.quiz_status = 1 AND b.quiz_value !='YES' AND b.quiz_value !='No' THEN 1 ELSE 0 END) AS test From questions a,quiz b,organization c Where a.id=b.question_id AND b.emp_id=c.id AND c.department='".$department."' Group by a.category_id");  
						return $query->result();
					  }    
            
        }
		
		
		
		function getAllCategory_Rating_team($team){
				$user_type = $this->session->userdata('user_type');
				$user_id = $this->session->userdata('user_id');
				$org_id = $this->session->userdata('org_id');
							   
		               if($user_type==0){
						$query = $this->db->query("Select a.id, a.category_id ,sum(b.quiz_value) / SUM(CASE WHEN b.quiz_status = 1 AND b.quiz_value !='YES' AND b.quiz_value !='No' THEN 1 ELSE 0 END)  as quiz_value, SUM(CASE WHEN b.quiz_status = 1 AND b.quiz_value !='YES' AND b.quiz_value !='No' THEN 1 ELSE 0 END) AS test From questions a,quiz b,organization c Where a.id=b.question_id AND b.emp_id=c.id AND (b.team ='".$team."' OR b.department='".$team."') AND a.org_id='".$user_id."' Group by a.category_id");  
						return $query->result();
					  }elseif($user_type==3){
						$query = $this->db->query("Select a.id, a.category_id ,sum(b.quiz_value) / SUM(CASE WHEN b.quiz_status = 1 AND b.quiz_value !='YES' AND b.quiz_value !='No' THEN 1 ELSE 0 END)  as quiz_value, SUM(CASE WHEN b.quiz_status = 1 THEN AND b.quiz_value !='YES' AND b.quiz_value !='No' 1 ELSE 0 END) AS test From questions a,quiz b,organization c Where a.id=b.question_id AND b.emp_id=c.id AND (b.team ='".$team."' OR b.department='".$team."') AND a.org_id='".$org_id."' Group by a.category_id");  
					    return $query->result();
					  }elseif($user_type==2){
						  $query = $this->db->query("Select a.id, a.category_id ,sum(b.quiz_value) / SUM(CASE WHEN b.quiz_status = 1 AND b.quiz_value !='YES' AND b.quiz_value !='No' THEN 1 ELSE 0 END)  as quiz_value, SUM(CASE WHEN b.quiz_status = 1 AND b.quiz_value !='YES' AND b.quiz_value !='No' THEN 1 ELSE 0 END) AS test From questions a,quiz b,organization c Where a.id=b.question_id AND b.emp_id=c.id AND (b.team ='".$team."' OR b.department='".$team."') AND a.org_id='".$org_id."' Group by a.category_id");  
					      return $query->result();
					  }else{
						$query = $this->db->query("Select a.id, a.category_id ,sum(b.quiz_value) / SUM(CASE WHEN b.quiz_status = 1 AND b.quiz_value !='YES' AND b.quiz_value !='No' THEN 1 ELSE 0 END)  as quiz_value, SUM(CASE WHEN b.quiz_status = 1 AND b.quiz_value !='YES' AND b.quiz_value !='No' THEN 1 ELSE 0 END) AS test From questions a,quiz b,organization c Where a.id=b.question_id AND b.emp_id=c.id AND (b.team ='".$team."' OR b.department='".$team."')  Group by a.category_id");  
						return $query->result();
					  }                       
            
        }
		
		
		function getAllCategory_Rating_compere($bar1,$bar2){
				$user_type = $this->session->userdata('user_type');
				$user_id = $this->session->userdata('user_id');
				$org_id = $this->session->userdata('org_id');
							   
		               if($user_type==0){
						$query = $this->db->query("Select a.id, a.category_id ,sum(b.quiz_value) / SUM(CASE WHEN b.quiz_status = 1 AND b.quiz_value !='YES' AND b.quiz_value !='No' THEN 1 ELSE 0 END)  as quiz_value,sum(b.quiz_value) / SUM(CASE WHEN b.quiz_status = 1 AND (c.team ='".$bar1."' OR c.department='".$bar1."') THEN 1 ELSE 0 END)  as bar1 ,
sum(b.quiz_value) / SUM(CASE WHEN b.quiz_status = 1 AND (c.team ='".$bar2."' OR c.department='".$bar2."') THEN 1 ELSE 0 END)  as bar2, SUM(CASE WHEN b.quiz_status = 1 AND b.quiz_value !='YES' AND b.quiz_value !='No' THEN 1 ELSE 0 END) AS test From questions a,quiz b,organization c Where a.id=b.question_id AND b.emp_id=c.id AND (c.team ='".$bar1."' OR c.department='".$bar1."') AND (c.team ='".$bar2."' OR c.department='".$bar2."') AND a.org_id='".$user_id."' AND a.category_id!='' Group by a.category_id");  
						return $query->result();
					  }elseif($user_type==3){
						$query = $this->db->query("Select a.id, a.category_id ,sum(b.quiz_value) / SUM(CASE WHEN b.quiz_status = 1 AND b.quiz_value !='YES' AND b.quiz_value !='No' THEN 1 ELSE 0 END)  as quiz_value,sum(b.quiz_value) / SUM(CASE WHEN b.quiz_status = 1 AND (c.team ='".$bar1."' OR c.department='".$bar1."') THEN 1 ELSE 0 END)  as bar1 ,
sum(b.quiz_value) / SUM(CASE WHEN b.quiz_status = 1 AND (c.team ='".$bar2."' OR c.department='".$bar2."') THEN 1 ELSE 0 END)  as bar2, SUM(CASE WHEN b.quiz_status = 1 THEN AND b.quiz_value !='YES' AND b.quiz_value !='No' 1 ELSE 0 END) AS test From questions a,quiz b,organization c Where a.id=b.question_id AND b.emp_id=c.id AND (c.team ='".$bar1."' OR c.department='".$bar1."') AND (c.team ='".$bar2."' OR c.department='".$bar2."') AND a.org_id='".$org_id."' AND a.category_id!='' Group by a.category_id");  
					    return $query->result();
					  }elseif($user_type==2){
						  $query = $this->db->query("Select a.id, a.category_id ,sum(b.quiz_value) / SUM(CASE WHEN b.quiz_status = 1 AND b.quiz_value !='YES' AND b.quiz_value !='No' THEN 1 ELSE 0 END)  as quiz_value,sum(b.quiz_value) / SUM(CASE WHEN b.quiz_status = 1 AND (c.team ='".$bar1."' OR c.department='".$bar1."') THEN 1 ELSE 0 END)  as bar1 ,
sum(b.quiz_value) / SUM(CASE WHEN b.quiz_status = 1 AND (c.team ='".$bar2."' OR c.department='".$bar2."') THEN 1 ELSE 0 END)  as bar2, SUM(CASE WHEN b.quiz_status = 1 AND b.quiz_value !='YES' AND b.quiz_value !='No' THEN 1 ELSE 0 END) AS test From questions a,quiz b,organization c Where a.id=b.question_id AND b.emp_id=c.id AND (c.team ='".$bar1."' OR c.department='".$bar1."') AND (c.team ='".$bar2."' OR c.department='".$bar2."') AND a.org_id='".$org_id."' AND a.category_id!='' Group by a.category_id");  
					      return $query->result();
					  }else{
						$query = $this->db->query("Select a.id, a.category_id,sum(b.quiz_value) / SUM(CASE WHEN b.quiz_status = 1 AND b.quiz_value !='YES' AND b.quiz_value !='No'AND (b.team ='".$bar1."' OR b.department='".$bar1."') THEN 1 ELSE 0 END)  as bar1 From questions a,quiz b,organization c Where a.id=b.question_id AND b.emp_id=c.id AND (b.team ='".$bar1."' OR b.department='".$bar1."') Group by a.category_id ");  


					$query2 = $this->db->query("Select a.id, a.category_id,sum(b.quiz_value) / SUM(CASE WHEN b.quiz_status = 1 AND b.quiz_value !='YES' AND b.quiz_value !='No'AND (b.team ='".$bar2."' OR b.department='".$bar2."') THEN 1 ELSE 0 END)  as bar2  From questions a,quiz b,organization c Where a.id=b.question_id AND b.emp_id=c.id AND (b.team ='".$bar2."' OR b.department='".$bar2."') Group by a.category_id"); 	
						
						
						
						
						
						
		$rst=array();
		$rst2=array();
		    foreach($query->result() as $row)
			  {
				 $rst[]=$row;
			  }
			  
			  foreach($query2->result() as $row)
			  {
				  $rst2[]=$row->bar2;
			  }
			$rst3=array();		
        for($i=0;$i<count($rst);$i++){
		   //array_push($rst, ['bar2' => $rst2[$i]['bar2']]);
	           
		     // var_dump($rst[$i]->bar1);
			  $rst3[]=array('category_id' =>$rst[$i]->category_id,'bar1' => $rst[$i]->bar1,'bar2' => $rst2[$i]);
			 
			 
		  }
					
						
						






						return $rst3;
					  }                       
            
        }
		
		
		
		
		function get_all_yes_or_no_qus($category_id){
		
		$user_type = $this->session->userdata('user_type');
				$user_id = $this->session->userdata('user_id');
				$org_id = $this->session->userdata('org_id');
							   
		               if($user_type==0){
						   
						    $query = $this->db->query("SELECT SUM(CASE WHEN quiz_value = 'yes' THEN 1 ELSE 0 END) AS number_of_yes, SUM(CASE WHEN quiz_value = 'no' THEN 1 ELSE 0 END) AS number_of_no FROM quiz where question_id='".$category_id."'"); 
						   
						
						return $query->result_array();
					  }elseif($user_type==3){
						  
						    $query = $this->db->query("SELECT SUM(CASE WHEN quiz_value = 'yes' THEN 1 ELSE 0 END) AS number_of_yes, SUM(CASE WHEN quiz_value = 'no' THEN 1 ELSE 0 END) AS number_of_no FROM quiz where question_id='".$category_id."'");
						  
						
					    return $query->result_array();
					  }elseif($user_type==2){
						  
						  $query = $this->db->query("SELECT SUM(CASE WHEN quiz_value = 'yes' THEN 1 ELSE 0 END) AS number_of_yes, SUM(CASE WHEN quiz_value = 'no' THEN 1 ELSE 0 END) AS number_of_no FROM quiz where   question_id='".$category_id."'");
						  
						  
					      return $query->result_array();
					  }else{
						  $query = $this->db->query("SELECT SUM(CASE WHEN quiz_value = 'yes' THEN 1 ELSE 0 END) AS number_of_yes, SUM(CASE WHEN quiz_value = 'no' THEN 1 ELSE 0 END) AS number_of_no FROM quiz where question_id='".$category_id."'");
						 
						return $query->result_array();
					  }      
		
 
    }
	
	
	function get_all_yes_no_pollsearch($category_id){
		
		$user_type = $this->session->userdata('user_type');
				$user_id = $this->session->userdata('user_id');
				$org_id = $this->session->userdata('org_id');
							   
		               if($user_type==0){
						   
						    $query = $this->db->query("SELECT SUM(CASE WHEN quiz_value = 'yes' THEN 1 ELSE 0 END) AS number_of_yes, SUM(CASE WHEN quiz_value = 'no' THEN 1 ELSE 0 END) AS number_of_no FROM poll_quiz where question_id='".$category_id."'"); 
						   
						
						return $query->result_array();
					  }elseif($user_type==3){
						  
						    $query = $this->db->query("SELECT SUM(CASE WHEN quiz_value = 'yes' THEN 1 ELSE 0 END) AS number_of_yes, SUM(CASE WHEN quiz_value = 'no' THEN 1 ELSE 0 END) AS number_of_no FROM poll_quiz where question_id='".$category_id."'");
						  
						
					    return $query->result_array();
					  }elseif($user_type==2){
						  
						  $query = $this->db->query("SELECT SUM(CASE WHEN quiz_value = 'yes' THEN 1 ELSE 0 END) AS number_of_yes, SUM(CASE WHEN quiz_value = 'no' THEN 1 ELSE 0 END) AS number_of_no FROM poll_quiz where   question_id='".$category_id."'");
						  
						  
					      return $query->result_array();
					  }else{
						  $query = $this->db->query("SELECT SUM(CASE WHEN quiz_value = 'yes' THEN 1 ELSE 0 END) AS number_of_yes, SUM(CASE WHEN quiz_value = 'no' THEN 1 ELSE 0 END) AS number_of_no FROM poll_quiz where   question_id='".$category_id."'");
						 
						return $query->result_array();
					  }      
		
 
    }
	
	function getorganization(){
          $query = $this->db->query('SELECT id,name FROM organization where login_type=0');
        return $query->result();
	}
     
}