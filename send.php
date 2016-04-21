<?php
/*
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
'to'=> 'ctropiani@yahoo.com',
'subject' => 'Contact from ' . $name . ': ' . $subject,
'text' => $message
    )
)
*/

if(empty($_POST) || !isset($_POST)) {

  ajaxResponse('error', 'Post cannot be empty.');

} else {

  $postData = $_POST;
  $dataString = implode($postData,",");

  $mailgun = sendMailgun($postData);

  if($mailgun) {

    ajaxResponse('success', 'Great success.', $postData, $mailgun);

  } else {

    ajaxResponse('error', 'Mailgun did not connect properly.', $postData, $mailgun);

  }

}

function ajaxResponse($status, $message, $data = NULL, $mg = NULL) {
  $response = array (
    'status' => $status,
    'message' => $message,
    'data' => $data,
    'mailgun' => $mg
    );
  $output = json_encode($response);
  exit($output);
}

function sendMailgun($data) {

  $api_key = 'key-c8129ecf8fb6cbb61df0a47fa0d1d7e3';
  $api_domain = 'cauealmeida.com';
  $send_to = 'ctropiani@yahoo.com';

  $name = $data['name'];
  $email = $data['email'];
  $content = $data['message'];

  $messageBody = "Contact: $name ($email)\n\nMessage: $content";

  $config = array();
  $config['api_key'] = $api_key;
  $config['api_url'] = 'https://api.mailgun.net/v2/'.$api_domain.'/messages';

  $message = array();
  $message['from'] = $email;
  $message['to'] = $send_to;
  $message['h:Reply-To'] = $email;
  $message['subject'] = $data['subject'];
  $message['text'] = $messageBody;

  $curl = curl_init();

  curl_setopt($curl, CURLOPT_URL, $config['api_url']);
  curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
  curl_setopt($curl, CURLOPT_USERPWD, "api:{$config['api_key']}");
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 10);
  curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt($curl, CURLOPT_POST, true);
  curl_setopt($curl, CURLOPT_POSTFIELDS,$message);

  $result = curl_exec($curl);

  curl_close($curl);
  return $result;

}

?>