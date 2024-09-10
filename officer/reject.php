<?php
 
include('authentication.php');
require_once '../Twilio/autoload.php'; 
    
use Twilio\Rest\Client;

$sid    = ""; 
$token  = ""; 
$twilio = new Client($sid, $token);
include('../includes/db.php');
$id=$_REQUEST['id'];

$result1 = mysqli_query($con,"SELECT * FROM userrequest where `id` ='$id'");
$row = mysqli_fetch_array($result1);
$mono="+91".$row['mono'];
$result = mysqli_query($con,"delete FROM userrequest where id='$id'");

if($result)
{
  $_SESSION['status']="Rejected Succesfully";
  header('Location:pending.php');
      $mess = "Your Request is Rejected.";
      $message = $twilio->messages 
          ->create("$mono", // to 
                  array(  
                      "messagingServiceSid" => "MG0535c9faa64da0563de8c3385883e536",      
                      "body" => "$mess" ,
                  ) 
          );
}
else{
  mysqli_error();
}




?>

