<?php  ob_start();  
$ch = curl_init();  
curl_setopt($ch, CURLOPT_URL,'http://thoughtbuzz.in/Feedback_system/index.php/poll_cron');  
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  
$response = curl_exec($ch);  echo $response;  
?>