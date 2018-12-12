<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/*
 * Poll Management Class
 * This class is used to manage the online poll & voting system
 * @author    CodexWorld.com
 * @url       http://www.codexworld.com
 * @license   http://www.codexworld.com/license
 */
class Poll{
    private $dbHost  = 'localhost';
    private $dbUser  = 'fsuser123';
    private $dbPwd   = 'fsuser123';
    private $dbName  = 'feedback_system';            
    private $db      = false;
    private $pollTbl = 'polls';
    private $optTbl  = 'poll_options';
    private $voteTbl = 'poll_votes';
    
    public function __construct(){
        if(!$this->db){ 
            // Connect to the database
            $conn = new mysqli($this->dbHost, $this->dbUser, $this->dbPwd, $this->dbName);
            if($conn->connect_error){
                die("Failed to connect with MySQL: " . $conn->connect_error);
            }else{
                $this->db = $conn;
            }
        }
    }
    
    /*
     * Runs query to the database
     * @param string SQL
     * @param string count, single, all
     */
    private function getQuery($sql,$returnType = ''){
        $result = $this->db->query($sql);
        if($result){
            switch($returnType){
                case 'count':
                    $data = $result->num_rows;
                    break;
                case 'single':
                    $data = $result->fetch_assoc();
                    break;
                default:
                    if($result->num_rows > 0){
                        while($row = $result->fetch_assoc()){
                            $data[] = $row;
                        }
                    }
            }
        }
        return !empty($data)?$data:false;
    }
    
    /*
     * Get polls data
     * Returns single or multiple poll data with respective options
     * @param string single, all
     */
    public function getPolls($pollType = 'single'){
        $pollData = array();
        $sql = "SELECT * FROM ".$this->pollTbl." WHERE status = '1' ORDER BY created DESC";
        $pollResult = $this->getQuery($sql, $pollType);
        if(!empty($pollResult)){
            if($pollType == 'single'){
                $pollData['poll'] = $pollResult;
                $sql2 = "SELECT * FROM ".$this->optTbl." WHERE poll_id = ".$pollResult['id']." AND status = '1'";
                $optionResult = $this->getQuery($sql2);
                $pollData['options'] = $optionResult;
            }else{
                $i = 0;
                foreach($pollResult as $prow){
                    $pollData[$i]['poll'] = $prow;
                    $sql2 = "SELECT * FROM ".$this->optTbl." WHERE poll_id = ".$prow['id']." AND status = '1'";
                    $optionResult = $this->getQuery($sql2);
                    $pollData[$i]['options'] = $optionResult;
                }
            }
        }
        return !empty($pollData)?$pollData:false;
    }
    
    /*
     * Submit vote
     * @param array of poll option data
     */
    public function vote($data = array()){
		//echo "yyyyyyyyyyyyyyyyyyyyyyyyyyyyy";
		// var_dump($data);
      /*   if(empty($data['poll_id']) || empty($data['poll_option_id']) || empty($_COOKIE[$data['poll_id']])) {
			$url="Location: http://thoughtbuzz.in/Feedback_system/index.php/admin_voting/index/?pollID=".$data['poll_id'];
            return false;
        }else{  */
		
            $sql = "SELECT * FROM ".$this->voteTbl." WHERE poll_id = ".$data['poll_id']." AND poll_option_id = ".$data['poll_option_id'];
            $preVote = $this->getQuery($sql, 'count');
			if($preVote > 0){
                $query = "UPDATE ".$this->voteTbl." SET vote_count = vote_count+1 WHERE poll_id = ".$data['poll_id']." AND poll_option_id = ".$data['poll_option_id'];
                $update = $this->db->query($query);
				$url="Location: http://thoughtbuzz.in/Feedback_system/index.php/admin_voting/index/?pollID=".$data['poll_id'];
				header($url);
            }else{
                $query = "INSERT INTO ".$this->voteTbl." (poll_id,poll_option_id,vote_count) VALUES (".$data['poll_id'].",".$data['poll_option_id'].",1)";
                $insert = $this->db->query($query);
				$url="Location: http://thoughtbuzz.in/Feedback_system/index.php/admin_voting/index/?pollID=".$data['poll_id'];
			header($url);
            }
            return true;
        //}
    }
    
    /*
     * Get poll result
     * @param poll ID
     */
    public function getResult($pollID){
        $resultData = array();
        if(!empty($pollID)){
            $sql = "SELECT p.subject, SUM(v.vote_count) as total_votes FROM ".$this->voteTbl." as v LEFT JOIN ".$this->pollTbl." as p ON p.id = v.poll_id WHERE poll_id = ".$pollID;
            $pollResult = $this->getQuery($sql,'single');
            if(!empty($pollResult)){
                $resultData['poll'] = $pollResult['subject'];
                $resultData['total_votes'] = $pollResult['total_votes'];
                $sql2 = "SELECT o.id, o.name, v.vote_count FROM ".$this->optTbl." as o LEFT JOIN ".$this->voteTbl." as v ON v.poll_option_id = o.id WHERE o.poll_id = ".$pollID;
                $optResult = $this->getQuery($sql2);
                if(!empty($optResult)){
                    foreach($optResult as $orow){
                        $resultData['options'][$orow['name']] = $orow['vote_count']; 
                    }
                }
            }
        }
        return !empty($resultData)?$resultData:false;
    }
}
?>

<style>
.pollContent{
    float: left;
    
}
.pollContent h3 {
    font-size: 18px;
    color: #333;
    text-align: left;
    float: left;
    border-bottom: 2px solid #333;
    width: 100%;
    margin: 0 auto;
    padding-bottom: 10px;
}
.pollContent ul{
    list-style: none;
    float: left;
    width: 100%;
    padding: 10px;
}
.pollContent input[type="submit"], .pollContent a{
    border: none;
    font-size: 16px;
    color: #fff;
    border-radius: 3px;
    padding: 10px 15px 10px 15px; 
    background-color: #34a853;
    text-decoration: none;
    cursor: pointer;
}
.stmsg{font-size: 16px;color:#FBBC05;}

#container { text-align: center; }
#container p{font-size: 16px;font-weight: bold;color: #1CA86F;}
h2 { color: #CCC; }
h3 { font-weight:bold}
a { text-decoration: none; color: #EC5C93; }

.bar-main-container {
  margin: 10px auto;
  width: 300px;
  height: 55px;
  -webkit-border-radius: 4px;
  -moz-border-radius: 4px;
  border-radius: 4px;
  font-family: sans-serif;
  font-weight: normal;
  font-size: 0.8em;
  color: #FFF;
}

.wrap { padding: 8px; }

.bar-percentage {
  float: left;
  background: rgba(0,0,0,0.13);
  -webkit-border-radius: 4px;
  -moz-border-radius: 4px;
  border-radius: 4px;
  padding: 9px 0px;
  width: 18%;
  height: 30px;
  margin-top: -15px;
}

.bar-container {
  float: right;
  -webkit-border-radius: 10px;
  -moz-border-radius: 10px;
  border-radius: 10px;
  height: 10px;
  background: rgba(0,0,0,0.13);
  width: 78%;
  margin: 0px 0px;
  overflow: hidden;
}

.bar-main-container .txt{
    padding-top: 5px;
    font-size: 16px;
    font-weight: bold;
}

.bar {
  float: left;
  background: #FFF;
  height: 100%;
  -webkit-border-radius: 10px 0px 0px 10px;
  -moz-border-radius: 10px 0px 0px 10px;
  border-radius: 10px 0px 0px 10px;
  -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
  filter: alpha(opacity=100);
  -moz-opacity: 1;
  -khtml-opacity: 1;
  opacity: 1;
}

/* COLORS */
.azure   { background: #38B1CC; }
.emerald { background: #2CB299; }
.violet  { background: #8E5D9F; }
.yellow  { background: #EFC32F; }
.red     { background: #E44C41; }

.h3 {
    font-size: 18px;
    color: #333;
    text-align: center;
    float: left;
    border-bottom: 2px solid #333;
    width: 100%;
    margin: 0 auto;
    padding-bottom: 10px;
}



</style>
<link href="../../../vendors/data-tables/css/jquery.dataTables.min.css" type="text/css" rel="stylesheet">
<!-- START CONTENT -->
        <section id="content">
          <!--start container-->
          <div class="container">
		  
		   <div class="row">
              <div class="col s12 m12 l12">
                <div class="card-panel">
                  <div class="row">
		  
		<?php
    //include and initialize Poll class 
    //include '../../../poll.class.php';
    $poll = new Poll;

    //get poll and options data
    $pollData = $poll->getPolls();
	//var_dump($pollData);
?>


<?php 




if(!isset($_GET['pollID'])){ 

//var_dump($pollData['options'][0]['emp_id']);
//echo "<pre>".print_r($pollData,1)."</pre>";

if(isset($_COOKIE[$pollData['poll']['id']] )==1) {
	
			$url="Location: http://thoughtbuzz.in/Feedback_system/index.php/admin_voting/index/?pollID=".$pollData['poll']['id'];
            header($url);
        }

?>
<div class="container" id="container">
    <div class="row">
        <div class="col-lg-12">
<h4 style="color: #00bfa5;">Today's Poll</h4>
</div>
</div>
</div>
<div class="pollContent">
    <?php echo !empty($statusMsg)?'<p class="stmsg">'.$statusMsg.'</p>':''; ?>
	
    <form action="" method="post" name="pollFrm">
    <h3 style="color: red;"><?php echo $pollData['poll']['subject']; ?></h3>
	</br>
    <span class="rating">
	</br>
        <?php foreach($pollData['options'] as $opt){
			 echo "</br>";
             echo '<input id="rating'.$opt['id'].'" type="radio" name="voteOpt" value="'.$opt['id'].'" >';
			 echo '<label for="rating'.$opt['id'].'">'.$opt['name'].'</label>';
			 echo "</br>";
        } ?>
    </span>
	</br>
	<input type="hidden" name="emp_id" value="<?php echo $this->session->userdata('user_id');; ?>">
    <input type="hidden" name="pollID" value="<?php echo $pollData['poll']['id']; ?>">
    <input type="submit" name="voteSubmit" class="button" value="Vote">
    <a style="display: none;" href="http://thoughtbuzz.in/Feedback_system/index.php/admin_voting/index/?pollID=<?php echo $pollData['poll']['id']; ?>">Results</a>
    </form>
</div>


<?php } ?>


<?php
//include and initialize Poll class 
//include 'Poll.class.php';
//$poll = new Poll;

//get poll result data

if(isset($_GET['pollID'])){
$pollResult = $poll->getResult($_GET['pollID']);
?>
   <div class="container" id="container">
    <div class="row">
        <div class="col-lg-12">


<h5 ><?php echo $pollResult['poll']; ?></h5>
<p ><b>Total Votes:</b> <?php echo $pollResult['total_votes']; ?></p>
<?php
if(!empty($pollResult['options'])){ $i=0;
    //Option bar color class array
    $barColorArr = array('azure','emerald','violet','yellow','red');
    //Generate option bars with votes count
    foreach($pollResult['options'] as $opt=>$vote){
        //Calculate vote percent
        $votePercent = round(($vote/$pollResult['total_votes'])*100);
        $votePercent = !empty($votePercent)?$votePercent.'%':'0%';
        //Define bar color class
        if(!array_key_exists($i, $barColorArr)){
            $i=0;
        }
        $barColor = $barColorArr[$i];
?>
<div class="bar-main-container <?php echo $barColor; ?>">
  <div class="txt"><?php echo $opt; ?></div>
  <div class="wrap">
    <div class="bar-percentage"><?php echo $votePercent; ?></div>
    <div class="bar-container">
      <div class="bar" style="width: <?php echo $votePercent; ?>;"></div>
    </div>
  </div>
</div>
<?php $i++; } }  } ?>

</div>
</div>
</div>


</div>
</div>
</div>
</div>

		  
		  
		   <!-- //////////////////////////////////////////////////////////////////////////// -->
          </div>
          <!--end container-->
        </section>
        <!-- END CONTENT -->
		<?php
//if vote is submitted
if(isset($_POST['voteSubmit'])){
    $voteData = array(
        'poll_id' => $_POST['pollID'],
        'poll_option_id' => $_POST['voteOpt']
    );
	
	var_dump($voteData);
    //insert vote data
    $voteSubmit = $poll->vote($voteData);
    if($voteSubmit){
        //store in $_COOKIE to signify the user has voted
        setcookie($_POST['pollID'], 1, time()+60*60*24*365);
        //echo "xxxx";
        $statusMsg = 'Your vote has been submitted successfully.';
    }else{
        $statusMsg = 'Your vote already had submitted.';
    }
} ?>
<script>  
$(document).ready(function(){
	
	fetch_poll_data();

	function fetch_poll_data()
	{
		$.ajax({
			url:"http://thoughtbuzz.in/Feedback_system/fetch_poll_data.php",
			method:"POST",
			success:function(data)
			{
				$('#poll_result').html(data);
			}
		});
	}
	
	$('#poll_form').on('submit', function(event){
		event.preventDefault();
		var poll_option = '';
		$('.poll_option').each(function(){
			if($(this).prop("checked"))
			{
				poll_option = $(this).val();
			}
		});
		if(poll_option != '')
		{
			$('#poll_button').attr('disabled', 'disabled');
			var form_data = $(this).serialize();
			$.ajax({
				url:"http://thoughtbuzz.in/Feedback_system/poll.php",
				method:"POST",
				data:form_data,
				success:function()
				{
					$('#poll_form')[0].reset();
					$('#poll_button').attr('disabled', false);
					fetch_poll_data();
					alert("Poll Submitted Successfully");
				}
			});
		}
		else
		{
			alert("Please Select Option");
		}
	});
	
	
	
});  
</script>

 <script>  
      $(function() {
  $('#Poll1').addClass('active');
});
      </script> 