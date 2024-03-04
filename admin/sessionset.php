<?php
Session_start();
if(!isset($_SESSION['adminid'])){
  header("location:./adminlogin.php");
}
?>