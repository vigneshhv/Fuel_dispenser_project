<?php
    include '../dbconnect.php';
    $sql_fuel_p = "Select price from `fuel_price` where fuel ='Petrol'";
    $row_p=mysqli_fetch_assoc(mysqli_query($conn,$sql_fuel_p));
    $petrol_p = $row_p['price'];
    $sql_fuel_d = "Select price from `fuel_price` where fuel ='Diesel'";
    $row_d=mysqli_fetch_assoc(mysqli_query($conn,$sql_fuel_d));
    $desile_p =$row_d['price'];
    // echo($desile_p);
    $value=0;
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $rfid =$_POST["rfid"];
        $sql = "SELECT RFID_no,req_fuel,req_fuel_amnt,account_balance,status,Fuel_used FROM `registration` where RFID_no = '$rfid'";
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)==1){
            $row=mysqli_fetch_assoc($result);
           
           if($row['req_fuel'] != 0 && $row['req_fuel_amnt'] == 0){
            if($row['Fuel_used'] == "Petrol"){
                $value = $petrol_p*$row['req_fuel'];
            }
            else{
                $value = $desile_p*$row['req_fuel'];
            }
            if($value<=$row['account_balance'] && $row['status'] == true){
                echo($row['RFID_no']);
                echo('<br>');
                 echo($row['req_fuel']);
                 echo('<br>');
                 echo($row['Fuel_used']);
                 $sql_insrt = "INSERT INTO `fuel` (`Reg_no`, `Date`, `Time`, `amount`, `RFID_no`, `fuel_used`)  
                 VALUES ((SELECT Reg_no FROM registration WHERE RFID_no='$rfid'), current_timestamp(), current_timestamp(), '$value', '$rfid', '{$row['Fuel_used']}')";
   
                 mysqli_query($conn, $sql_insrt);
            }
            else{
                echo("denied");
            }

           }
           else{
            if($row['Fuel_used'] == "Diesel"){
                $value = $row['req_fuel_amnt']/$desile_p;
            }
            else{
                $value = $row['req_fuel_amnt']/$desile_p;
            }
            if($row['req_fuel_amnt']<$row['account_balance'] && $row['status'] == true){
                echo ($row['RFID_no']);
                echo('<br>');
                echo($value);
                echo('<br>');
                echo($row['Fuel_used']);
                $sql_insrt ="INSERT INTO `fuel` (`Reg_no`, `Date`, `Time`, `amount`, `RFID_no`, `fuel_used`) 
                VALUES ((SELECT Reg_no FROM registration WHERE RFID_no='$rfid'), current_timestamp(), current_timestamp(), '{$row['req_fuel_amnt']}', '$rfid', '{$row['Fuel_used']}')";
                mysqli_query($conn, $sql_insrt);
                $sql_id = "SELECT ID FROM fuel WHERE RFID_no = '$rfid' ORDER BY Time DESC LIMIT 1";
                $result1=  mysqli_query($conn, $sql_id);
                $row1=mysqli_fetch_assoc($result1);

                echo('<br>'.$row1['ID']);
            }
            else{
                echo("denied");
            }
           }
            


        }
        else{
            echo("invail ID");
        }
     
    }
    ?>