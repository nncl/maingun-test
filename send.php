<?php

require 'vendor/autoload.php';
use Mailgun\Mailgun;
//Your credentials
$mg = new Mailgun("key-c8129ecf8fb6cbb61df0a47fa0d1d7e3");
$domain = "cauealmeida.com";

// getting values from fields
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

//Customise the email - self explanatory
$mg->sendMessage($domain, array(
'from'=>$email,
'to'=> 'nncl@live.com',
'subject' => 'Contact from ' . $name . ': ' . $subject,
'text' => $message
    )
)

?>