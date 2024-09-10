<?php 
 
// Update the path below to your autoload.php, 
// see https://getcomposer.org/doc/01-basic-usage.md 
require_once 'Twilio/autoload.php'; 
 
use Twilio\Rest\Client; 
 
$sid    = ""; 
$token  = ""; 
$twilio = new Client($sid, $token); 
 
$message = $twilio->messages 
                  ->create("+917043479269", // to 
                           array(  
                               "messagingServiceSid" => "MG0535c9faa64da0563de8c3385883e536",      
                               "body" => "Collect Your Ration" ,
                           ) 
                  ); 
 
print($message->sid);