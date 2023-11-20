<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fuel Usage</title>
    <style>table {
    border-collapse: collapse;
    border-spacing: 0;
    width: 100%;
    border: 1px solid #ddd;
    margin-top:20px;
  }
  
  th, td {
    text-align: left;
    padding: 16px;
  }
  tr:nth-child(even) {
    background-color: #f2f2f2;
  }
  </style>
    <?php
    
    session_start();
    
    if(!isset($_SESSION['user'])||$_SESSION['user']!= true ){
       header("location:index.php"); 
       exit();
       
    }
    
    $user= $_SESSION['username1'];
    // echo($user);
    include('db.php');

    $sql = "Select Fuel_used,tank_capacity,name from registration where Reg_no = '$user'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);
    $Fuel_used=$row['Fuel_used'];
    $name = $row['name'];
    $tank = $row['tank_capacity'];

    ?>
             <div class="input-box">
                    <span class="details">Full Name <?php
                    echo ": $name";?></span>
                </div>
                <div class="input-box">
                    <span class="details">Registration Number <?php
                    echo ": $user";?></span>
                </div>
                <div class="input-box">
                    <span class="details"> Fuel type<?php
                    echo ": $Fuel_used";?></span>
                </div>
                <div class="input-box">
                    <span class="details"> Tank_capacity<?php
                    echo ": $tank";?></span>
                </div>

                <table style="width:100%">
                        <tr>
                            <th>SL No.</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Amount</th>
                           
                            
                        </tr>
                </table>
                <?php

                $sql_challan = "SELECT * FROM fuel where Reg_no='$user' and status='1'";
                $result=mysqli_query($conn,$sql_challan);
                $count=1;
                $count1=0;
                if(mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_assoc($result)){
                    
                        echo("
                        <table>
                        <tr>
                        <td>".$count."</td>
                        <td>".$row['Date']."</td>
                        <td>".$row['Time']."</td>
                        <td>".$row['amount']."</td>
                       
                       

                    </tr>   </table>");
                    $count++;
                    
                  }
                }
  ?>
</head>
<body>
    
</body>
</html>