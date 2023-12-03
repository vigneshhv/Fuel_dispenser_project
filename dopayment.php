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
  if(mysqli_num_rows($result)==1){
    $sql_update = "update  registration set account_balance= (SELECT account_balance FROM `registration` WHERE `Reg_no` ='$name')+'$amt' where `Reg_no` ='$name'";
    mysqli_query($conn,$sql_update);
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