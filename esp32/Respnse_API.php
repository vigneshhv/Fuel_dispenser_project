
    <?php
    include ("dbconnect.php");
  //checks for the reponse of order status which is sent by esp32

    if($_SERVER ["REQUEST_METHOD"]=="POST"){
        $rfid_r = $_POST["UID"];
        $id=$_POST['ID'];
        $status = $_POST["status_flag"];
        //validates the order ID sent by the esp32 present in database or not
        $sql = "select ID from fuel where ID= '$id';";

        if(mysqli_num_rows(mysqli_query($conn,$sql))==1){
            // if the order ID is present in database
            //then checks the status flag sent by esp32 is true or not
        if($status == TRUE){
            //it updates the status in fuel database
        $sql_id = "UPDATE `fuel` SET `status` = '$status' WHERE `ID` = '$id' "; 
        mysqli_query($conn,$sql_id);
        // then it update the account balance in registration tabel
        $sql_update = "UPDATE registration AS r
        SET account_balance = (
            (SELECT account_balance FROM registration WHERE RFID_no = '$rfid_r') -
            (SELECT amount FROM fuel WHERE ID = '$id')
        )
        WHERE r.RFID_no = '$rfid_r' 
        ";
        mysqli_query($conn,$sql_update);
        // also make the rquest_fuel and ammount feild to 0 for next request to happen
        $sql_reset ="UPDATE `registration` SET `req_fuel` = 0,req_fuel_amnt=0  WHERE `registration`.`RFID_no` = '$rfid_r'";
        mysqli_query($conn,$sql_reset);
       
        }
        else{
            //if status_flag is false  
            $sql_id = "UPDATE `fuel` SET `status` = '$status' WHERE `ID` = '$id' "; 
            mysqli_query($conn,$sql_id); 
        }
    }

    }

    ?>
