<?php
$phone_number = $_GET['phone_number'];
$message = urldecode($_GET['message']);


if (!empty($phone_number) && !empty($message)) {
        require_once __DIR__ . '/vendor/autoload.php';
        $number = "+".$phone_number;
        
        // Set your Twilio account information
        $accountSid = 'AC47a342d10cb52e2182cedeef8df2b712';
        $authToken = '35d8866ecbc4b1ab529a03e63c90bba1';
        $twilioNumber = '+16592562703';

        // Set the recipient's phone number and the message body
        $recipientNumber = $number;
        

        // Create a new Twilio client
        $client = new Twilio\Rest\Client($accountSid, $authToken);

        // Send the SMS message
        $client->messages->create(
          $recipientNumber,
          array(
            'from' => $twilioNumber,
            'body' => $message
          )
        );
        echo "SMS sent to $phone_number successfully!";
      } else {
          echo "Phone number and message are required!";
      }
        ?>