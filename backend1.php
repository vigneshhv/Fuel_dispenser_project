<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
 <label for="rfid">Enter Rfid</label>       
<input type="text" name="rfid" id='rfid' placeholder = "rfid_no">
        <br>
        <label for="rfid">Enter id</label>  
        <input type="text" name="id" id = 'id'>
        <br>
        <label for="rfid">Enter Status</label>  
        <input type="text" name="status" id = 'status'>
        <br>
        <input type="submit" value="insert">
    </form>
    <?php
    include ("db.php");
  

    if($_SERVER ["REQUEST_METHOD"]=="POST"){
        $rfid_r = $_POST["rfid"];
        $id=$_POST['id'];
        $status = $_POST["status"];
        $sql = "select ID from fuel where ID= '$id';";
        if(mysqli_num_rows(mysqli_query($conn,$sql))==1){
        if($status == TRUE){
        $sql_id = "UPDATE `fuel` SET `status` = '$status' WHERE `ID` = '$id' "; 
        mysqli_query($conn,$sql_id);
        $sql_update = "UPDATE registration AS r
        SET account_balance = (
            (SELECT account_balance FROM registration WHERE RFID_no = '$rfid_r') -
            (SELECT amount FROM fuel WHERE ID = '$id')
        )
        WHERE r.RFID_no = '$rfid_r' 
        ";
        mysqli_query($conn,$sql_update);
        $sql_reset ="UPDATE `registration` SET `req_fuel` = 0,req_fuel_amnt=0  WHERE `registration`.`RFID_no` = '$rfid_r'";
        mysqli_query($conn,$sql_reset);
       
        }
        else{
            $sql_id = "UPDATE `fuel` SET `status` = '$status' WHERE `ID` = '$id' "; 
            mysqli_query($conn,$sql_id); 
        }
    }

    }

    ?>
</body>
</html>