<?php
require_once 'google/appengine/api/mail/Message.php';

use google\appengine\api\mail\Message;

$sender = "minggn3461@gmail.com";
$to = $_POST['email'];
$subject = "Your Download Link:";
$message = "hello";

try
{
  $message = new Message();
  $message->setSender($sender);
  $message->addTo($to);
  $message->setSubject($subject);
  $message->setTextBody($message);
  $message->send();
    
    echo "sent";
} catch (InvalidArgumentException $e) {
    echo "not sent";

}
   
?>
