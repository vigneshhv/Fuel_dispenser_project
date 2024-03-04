
    <?php
    include("dbconnect.php");//connection to the database
    //code to get the value of the petrol price
    $sql_fuel_p = "Select price from `fuel_price` where fuel ='Petrol'";
    $row_p=mysqli_fetch_assoc(mysqli_query($conn,$sql_fuel_p));
    $petrol_p = $row_p['price'];
   //code to get the value of the desile price
    $sql_fuel_d = "Select price from `fuel_price` where fuel ='Diesel'";
    $row_d=mysqli_fetch_assoc(mysqli_query($conn,$sql_fuel_d));
    $desile_p =$row_d['price'];
   
    $value=0;
    //checks for the post request from esp 32 which sends the RFID number 
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $rfid =$_POST["UID"];
        //checks for is rfid number in database and also if presentit takes the fuel requested or amount of fuel,status, type of fuel and account balance.
        $sql = "SELECT RFID_no,req_fuel,req_fuel_amnt,account_balance,status,Fuel_used FROM `registration` where RFID_no = '$rfid'";
        $result = mysqli_query($conn,$sql);
        //if the return value is 1 rfid is present in database
        if(mysqli_num_rows($result)==1){
            $row=mysqli_fetch_assoc($result);
           //code check wheter user requested fuel in liters or ammount
           //below code for fuel in liters 
           if($row['req_fuel'] != 0 && $row['req_fuel_amnt'] == 0){
            //checks the type of fuel
            if($row['Fuel_used'] == "Petrol"){
                $value = $petrol_p*$row['req_fuel'];
                //now converts liters into ammount to compare with account balance
            }
            else{
                $value = $desile_p*$row['req_fuel'];
            }
            //here it compares with account balance and also check for the vehicle is blocked or not
            if($value<$row['account_balance'] && $row['status'] == true){
                //if true it insert into the fuel database and generates the orderID for request
                 $sql_insrt = "INSERT INTO `fuel` (`Reg_no`, `Date`, `Time`, `amount`, `RFID_no`, `fuel_used`)  
                 VALUES ((SELECT Reg_no FROM registration WHERE RFID_no='$rfid'), current_timestamp(), current_timestamp(), '$value', '$rfid', '{$row['Fuel_used']}')";
   
                 mysqli_query($conn, $sql_insrt);
                 // now it takes the generated order id from database 
                 $sql_id = "SELECT ID FROM fuel WHERE RFID_no = '$rfid' ORDER BY Time DESC LIMIT 1";
                 $result1=  mysqli_query($conn, $sql_id);
                 $row1=mysqli_fetch_assoc($result1);
 
            
                //parametes are sent back to the ep32 for processing
                 $response = array(
                    "uid" => $row['RFID_no'],
                    "fuelamt" => $row['req_fuel'],
                    "fueltype" => $row['Fuel_used'],
                     "ID" => $row1['ID']
                );
            
            // Convert the array to JSON
            header('Content-Type: application/json');
            echo json_encode($response);
            }
            else{
            // IF THE VEHICLE IS BLOCKED OR ACCOUNT BALANCE IS ZERO
                $response = array(
                    "uid" => NULL,
                    "fuelamt" => NULL,
                    "fueltype" => NULL,
                     "ID" => NULL
                );
            
            // Convert the array to JSON
            header('Content-Type: application/json');
            echo json_encode($response);
            }

           }
           // if user requested data in amount 
           else{
            if($row['Fuel_used'] == "Diesel"){
                $value = $row['req_fuel_amnt']/$desile_p;
            }
            else{
                $value = $row['req_fuel_amnt']/$desile_p;
            }
            if($row['req_fuel_amnt']<$row['account_balance'] && $row['status'] == true){
          
            
                $sql_insrt ="INSERT INTO `fuel` (`Reg_no`, `Date`, `Time`, `amount`, `RFID_no`, `fuel_used`) 
                VALUES ((SELECT Reg_no FROM registration WHERE RFID_no='$rfid'), current_timestamp(), current_timestamp(), '{$row['req_fuel_amnt']}', '$rfid', '{$row['Fuel_used']}')";
                mysqli_query($conn, $sql_insrt);
                $sql_id = "SELECT ID FROM fuel WHERE RFID_no = '$rfid' ORDER BY Time DESC LIMIT 1";
                $result1=  mysqli_query($conn, $sql_id);
                $row1=mysqli_fetch_assoc($result1);

               
                $response = array(
                    "uid" => $row['RFID_no'],
                    "fuelamt" => $row['req_fuel'],
                    "fueltype" => $row['Fuel_used'],
                    "ID"=>$row1['ID']
                );
            
            // Convert the array to JSON
            header('Content-Type: application/json');
            echo json_encode($response);
            }
            else{
                $response = array(
                    "uid" => NULL,
                    "fuelamt" => NULL,
                    "fueltype" => NULL,
                     "ID" => NULL
                );
            
            // Convert the array to JSON
            header('Content-Type: application/json');
            echo json_encode($response);
            }
           }
            


        }
        //IF THE INVALID RFTD CARD IS REQUESTED 
        else{
            $response = array(
                "uid" => FALSE,
                "fuelamt" => FALSE,
                "fueltype" => FALSE,
                 "ID" => FALSE
            );
        
        // Convert the array to JSON
        header('Content-Type: application/json');
        echo json_encode($response);
        }
     
    }
    ?>
