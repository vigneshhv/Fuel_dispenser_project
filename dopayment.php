<?php
include('dbconnect.php');
if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $name=$_POST['username'];
  $amt=$_POST['amount'];
  $tx_id=$_POST['payment_id'];
  $amt=$amt/100;
  $sql = "INSERT INTO `transactions` (`slno`, `refence_id`, `Transaction_Id`, `ammount`, `time`) VALUES (NULL, '$name', '$tx_id', '$amt', current_timestamp())";
  mysqli_query($conn,$sql);
  $sql_reg ="SELECT * FROM `registration` where `Reg_no` ='$name'";
  $result= mysqli_query($conn,$sql_reg);
  $row = mysqli_fetch_array($result);
  $number =$row['Phone'];
  $balance =$row['account_balance'];
  $balance = $balance+$amt;
  if(mysqli_num_rows($result)==1){
    $sql_update = "update  registration set account_balance= (SELECT account_balance FROM `registration` WHERE `Reg_no` ='$name')+'$amt' where `Reg_no` ='$name'";
    mysqli_query($conn,$sql_update);
    
    $phone_number =  $number; // Example phone number
    $message = "you have credited the amount of $amt RS. Current Account Balance is : $balance Rs ,Thank You" ; // Example message
    
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
      
      header("Location:user_profile.php");
      
    }
  $sql_challan ="SELECT * FROM `challan` where `Challan_Id` ='$name'";
  $result1= mysqli_query($conn,$sql_challan);
  if(mysqli_num_rows($result1)==1){
    $sql_update1 = "update  challan set Status= '1',amount_date = current_timestamp()	 where `Challan_Id` ='$name'";
    mysqli_query($conn,$sql_update1);
    header("Location:user_challan.php");
  }
}
?>