<?php
include 'sessionset.php';
include '../dbconnect.php';
$sql="select * from  registration WHERE status=1";
//this gets all reg no having challan status as 1
$result = $conn->query($sql);
while($row=mysqli_fetch_assoc($result)){
    $regno=$row['Reg_no'];
    $challan_count=0;
    $sql1="SELECT * FROM challan
    WHERE Reg_no='$regno' AND Status = 1";
    $result1 = $conn->query($sql1);
    while($row1=mysqli_fetch_assoc($result1)){
            $challan_count++;
   }
   echo $regno,$challan_count;
   send_to_block($regno,$challan_count); 
}


header("Location:./block.php");


function send_to_block($rgno,$count){
    include '../dbconnect.php';
    if($count>3){
    $add="insert into block(Reg_no,Reason,status) values('$rgno','challan','1')"; 
        $res=$conn->query($add);
        if($res){
            $fsql="update registration set status='0' where Reg_no='$rgno'";
            $fres=$conn->query($fsql);
            if($fres){
                return;
            }
            else{
                echo "Error: ". $fsql. "<br>". $conn->error;
            }
        }else{
            echo "Error: ". $add. "<br>". $conn->error;
        }
     }
     $conn->close();
    }
    
?>