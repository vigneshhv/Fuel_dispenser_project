<?php
include 'sessionset.php';
include '../dbconnect.php';

if($_GET['regno']){
    $regno=$_GET['regno'];
    $sql="update block set 	Unblock_date=NOW(), status='0' 
    where Reg_no='$regno' ";
    $result = $conn->query($sql);
    if($result){
        $fsql="update registration set status='1' where Reg_no='$regno'";
            $fres=$conn->query($fsql);
        header('location:block.php');

    }else{
        die(mysqli_error($con));
    }
}
?>
