<?php
include '../dbconnect.php';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $status=$_POST['status'];
    $Reg_no=$_POST['Reg_no'];
    $file_name=$_POST['file_name'];
    
    $sql= "update documents set File_status='$status',verified_date= current_timestamp() where file_name='$file_name'and Reg_no='$Reg_no' ";
    $result=mysqli_query($conn,$sql);
    echo("Success");
    header("Location:documents_verification.php");
    
}
?>