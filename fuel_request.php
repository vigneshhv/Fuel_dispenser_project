<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>fuel_request</title>
</head>
<body>
    <h1> Request for Fuel </h1>
   
      
        <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="Reg">Registration Number:</label>
        <input type="text" name = 'Reg' id = 'Reg'><br>

        <!-- Amount input -->
        <label for="amount">Amount:</label>
        <input type="text" name="amount" id="amount"><br>

        <!-- Fuel input -->
        <label for="fuel">Fuel:</label>
        <input type="text" name="fuel" id="fuel"><br>

        <!-- Submit button -->
        <input type="submit" value="Submit">
    </form>
    <?php
        include('db.php');
        $amount = null;
        $fuel = null;
        
        // Check if the form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Check if amount is entered
            $reg = $_POST["Reg"];
            if (!empty($_POST["amount"])) {
                $amount = $_POST["amount"];
                $fuel = NULL;
                $sql_amnt ="UPDATE `registration` SET `req_fuel` = '$fuel',req_fuel_amnt='$amount' WHERE `registration`.`Reg_no` = '$reg'";
                mysqli_query($conn,$sql_amnt);
                echo ("You have requested a fuel of ".$amount."Rs");
            } 
            elseif (!empty($_POST["fuel"])) { // Check if fuel is entered
                $fuel = $_POST["fuel"];
                $amount = Null;
                $sql_fuel ="UPDATE `registration` SET `req_fuel` = '$fuel',req_fuel_amnt='$amount' WHERE `registration`.`Reg_no` = '$reg'";
                mysqli_query($conn,$sql_fuel);
                echo ("You have requested a fuel of ".$fuel."liters" );
            }
        }
        
     
        ?>

</body>
</html>