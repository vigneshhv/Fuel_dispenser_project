<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profile</title>
    <h1> Profoile Section</h1>
</head>
<body>
    <?php
    
    session_start();
    
    if(!isset($_SESSION['user'])||$_SESSION['user']!= true ){
       header("location:index.php"); 
       exit();
       
    }
    include("db.php");
    $user= $_SESSION['username1'];
    $sql = "Select * from `registration` where Reg_no = '$user'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    $name = $row['Name'];
    $phone=$row['Phone'];
    $Email = $row['Email'];
    $RFID_no = $row['RFID_no'];
    $Vehicle_type=$row['Vehicle_type'];
    $model=$row['Model'];
    $address=$row['Address'];
    $Tank_capacity=$row['Tank_capacity'];
    $Fuel_used=$row['Fuel_used'];
    $account_balance=$row['account_balance'];
    $status=$row['status'];
    $Reward=$row['Reward'];
    ?>
         <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
          <div class="user-details">
        

                    <div class="input-box">
                    <span class="details">Full Name <?php
                    echo ": $name";?></span>
                    </div>

                    <div class="input-box">
                    <span class="details">Registration Number <?php
                    echo ": $user";?></span>
                    </div>

                    <div class="input-box">
                    <span class="details">RFID Number <?php
                    echo ": $RFID_no";?></span>
                    </div>

                    <div class="input-box">
                    <span class="details">Phone Number <?php
                    echo ": $phone";?></span>
                    </div>

                    <div class="input-box">
                    <span class="details">Email ID <?php
                    echo ": $Email";?></span>
                    </div>

                    <div class="input-box">
                    <span class="details">Address <?php
                    echo ": $address";?></span>
                    </div>

                    <div class="input-box">
                    <span class="details">Vehicel Type <?php
                    echo ": $Vehicle_type";?></span>
                    </div>

                    
                    <div class="input-box">
                    <span class="details">Model <?php
                    echo ": $model";?></span>
                    </div>

                    <div class="input-box">
                    <span class="details">Tank_capacity <?php
                    echo ": $Tank_capacity";?></span>
                    </div>

                    <div class="input-box">
                    <span class="details">Fuel used <?php
                    echo ": $Fuel_used";?></span>
                    </div>

                    <div class="input-box">
                    <span class="details">Status <?php
                    echo ": $status";?></span>
                    </div>

                    <div class="input-box">
                    <span class="details"> Reward<?php
                    echo ": $Reward";?></span>
                    </div>

                    <div class="input-box">
                    <span class="details"> Account Balance<?php
                    echo ": $account_balance";?></span>
                    </div>

                  
            
          </div>


         
        </form>
</body>
</html>