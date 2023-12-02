<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fuel Usage</title>
    <style>


.main-content {
  padding:20px;
    margin-left: 230px;
}

.container {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
}

.input-box {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}

.details {
    font-size: 18px;
    font-weight: bold;
}
   /* Add a box shadow to input boxes */
 .input-box {
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        padding: 6px;
        border-radius: 5px;
    }

table {
    width: 100%;
    margin-top: 20px;
    border-collapse: collapse;
}

table th, table td {
    padding: 15px;
    text-align: left;
    border: 1px solid #ddd;
}



table tbody tr:nth-child(even) {
    background-color: #f9f9f9;
}

table tbody tr:hover {
    background-color: #ecf0f1;
}

/* Add any additional styling as needed */
</style>
</head>
<body>
<?php
    
    session_start();
    
    if(!isset($_SESSION['user'])||$_SESSION['user']!= true ){
       header("location:index.php"); 
       exit();
       
    }
    
    $user= $_SESSION['username1'];
    // echo($user);
    include('db.php');
    include('nav.php');

    $sql = "Select Fuel_used,tank_capacity,name from registration where Reg_no = '$user'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);
    $Fuel_used=$row['Fuel_used'];
    $name = $row['name'];
    $tank = $row['tank_capacity'];

    ?>
    <div class="main-content">
      <h1>Fuel Dashboard</h1>
    <div class = "container">
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

                <table class="table table-primary">
                <thead>
                           
                            <th scope="col">SL No.</th>
                            <th scope="col">Date</th>
                            <th scope="col">Time</th>
                            <th scope="col">Amount</th>
                            
     
                            
                        
                            </tr>
                </thead>
                <tbody>
               
                <?php

                $sql_challan = "SELECT * FROM fuel where Reg_no='$user' and status='1'";
                $result=mysqli_query($conn,$sql_challan);
                $count=1;
                $count1=0;
                if(mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_assoc($result)){
                    
                        echo("
                        <tr>
                        <th scope='row'>".$count."</th>
                        <td>".$row['Date']."</td>
                        <td>".$row['Time']."</td>
                        <td>".$row['amount']."</td>
                  
                    </tr>  
                    ");
                    $count++;
                    
                  }
                }
  ?>
   </tbody>
</table>
   </div>
   </div>
</body>


</html>