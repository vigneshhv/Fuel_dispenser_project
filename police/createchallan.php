<?php
include '../dbconnect.php';
include 'sessionset.php';
include './navbar.php';
if($_SERVER["REQUEST_METHOD"]=="POST"){
$regno=$_POST['regno'];
$regno=strtoupper($regno);
$fineamt=$_POST['fineamt'];
$reason=$_POST['reason']; 
$challantype=$_POST['challantype'];
$sql="insert into challan(Reg_no,Ammount,Reason,Challan_type) values('$regno','$fineamt','$reason','$challantype')";
if ($conn->query($sql) === TRUE) { 
 echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
 <strong>success</strong> Added Challan to database
 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}else { 
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Faild</strong> Something went wrong
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
 </div>';
 } 
} 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./css/createchallan.css" />
    <title>Police | Create Challan</title>
    <link rel="icon" type="image/png" href="../assest/images/favicon.ico" />
  </head>
  <body>
    <div class="challan_form">
      <form method="POST">
        <label for="regno">Register number</label> <br />
        <input type="text" placeholder="Enter Reg.no" name="regno" required />
        <br />
        <label for="fineamt">Fine Amount</label>
        <br />
        <input
          type="number"
          required
          placeholder=" Enter Fine Amount"
          name="fineamt"
        />
        <br />
        <label for="reason">Reason</label><br />
        <textarea name="reason" required cols="30" rows="2"></textarea><br />
        <label for="challantype">Type</label><br />
        <select required name="challantype">
          <option disabled selected>Select-Type</option>
          <option value="traffic">Traffic</option>
          <option value="document">Document</option>
          <option value="others">others</option>
        </select>
        <br />
        <br />
        <input type="submit" value="Submit" />
      </form>
    </div>
  </body>
</html>
