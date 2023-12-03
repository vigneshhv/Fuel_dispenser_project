<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ajax-unobtrusive/3.2.6/jquery.unobtrusive-ajax.min.js"></script>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <!-- <script src="paytry.js"></script> -->
    <title>challan</title>
    <!-- <h1>Challans</h1> -->
</head>
<body>
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

.h1{
  padding: 10px;
}

table tbody tr:nth-child(even) {
    background-color: #f9f9f9;
}

table tbody tr:hover {
    background-color: #ecf0f1;
}
.blue-button {
            background-color:orange ;
            color: white; /* Text color */
            padding: 10px 20px; /* Adjust padding as needed */
            border: none; /* Remove border */
            border-radius: 5px; /* Optional: Add rounded corners */
            cursor: pointer; /* Change cursor on hover */
        }

</style>
    
<?php
    
    session_start();
    
    if(!isset($_SESSION['user'])||$_SESSION['user']!= true ){
       header("location:user_login.php"); 
       exit();
       
    }
    
    $user= $_SESSION['username1'];
    // echo($user);
    include('dbconnect.php');
    include('nav.php');
    $sql = "Select account_balance,name from registration where Reg_no = '$user'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);
    $account_balance=$row['account_balance'];
    $name = $row['name'];

    ?>
    <div class ="main-content">
    <div class = "container">
   
                <h1> Pay Challan</h1>
               
                <table class="table table-primary">
                <thead>
                           
                            <th scope="col">SL No.</th>
                            <th scope="col">Challan</th>
                            <th scope="col">Issue Date</th>
                            <th scope ="col">Challan Type</th>
                            <th scope ="col">Challan Reason</th>
                            <th scope ="col">Payable Amount</th>
                               <th scope ="col">Payment</th>
                            
     
                            
                        
                            </tr>
                </thead>
                <tbody>
                <?php

                $sql_challan = "SELECT * FROM challan where Reg_no='$user'";
                $result=mysqli_query($conn,$sql_challan);
                $count=1;
                $count1=0;
                if(mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_assoc($result)){
                    if($row['Status']==0){
                        echo("
                        <tr>
                        
                        <td>".$count."</td>
                        <td>".$row['Challan_Id']."</td>
                        <td>".$row['challan_ date']."</td>
                        <td>".$row['Challan_type']."</td>
                        <td>".$row['Reason']."</td>
                        <td>".$row['Ammount']."</td>
                       
                        <td><button type ='submit' class='blue-button'  onclick=\"updateStatus('".$row['Ammount']."', '".$row['Challan_Id']."')\">Pay</button></td>
                    </tr>   ");
                    $count++;
                    }
                  }
                }
  ?>
    </tbody>
</table>
  <h1 style=" padding:20px">Payed challans</h1>
  <table class="table table-primary">
                <thead>
                            <th scope = "col">SL No.</th>
                            <th scope = "col">Challan Id</th>
                            <th scope = "col">Issue Date</th>
                            <th scope = "col">Challan Type</th>
                            <th scope = "col">Challan Reason</th>
                            <th scope = "col"> Amount payed</th>
                            <th scope = "col">Payment Date</th>
                            
                            </tr>
                </thead>
                <tbody>

<?php
  $count=1;
  $Sql_status = "SELECT * FROM challan where Reg_no='$user' and status= '1'";
  $result1=mysqli_query($conn,$Sql_status);
   
   while( $row1 =mysqli_fetch_assoc($result1)){
    echo("
    <tr>
 
    <td>".$count."</td>
    <td>".$row1['Challan_Id']."</td>
    <td>".$row1['challan_ date']."</td>
    <td>".$row1['Challan_type']."</td>
    <td>".$row1['Reason']."</td>
    <td>".$row1['Ammount']."</td>
    <td>".$row1['amount_date']."</td>
    
</tr>   ");

$count++;
   }?>
     </tbody>
</table>
</div>
</div>
<script>
  function updateStatus(amt , uname) {
// console.log(amount,challan_id);
amt = amt*100;
var options = {
    key: "rzp_test_ed8WeGcGzOe4x5",
    amount: amt,
    currency: "INR",
    name: "Smart Fuel Station",
    description: "Test Transaction",
    image:
      "https://www.google.com/url?sa=i&url=https%3A%2F%2Fm.facebook.com%2Flogomakershop%2F&psig=AOvVaw2QJFrSvLM8Z9GN0bFHtsEq&ust=1699880732308000&source=images&cd=vfe&opi=89978449&ved=0CBIQjRxqFwoTCKi_-qvDvoIDFQAAAAAdAAAAABAE",
    handler: function (response) {
      console.log(response.razorpay_payment_id);
      var xhr = new XMLHttpRequest();
      var url = "dopayment.php";
      var params =
        "payment_id=" +
        response.razorpay_payment_id +
        "&amount=" +
        amt +
        "&username=" +
        uname;
      var strparams = params.toString();
      xhr.open("POST", url, true);
      // Set the appropriate headers if needed
      xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
          // Handle the response
          console.log(xhr.responseText);
        
            window.location.href = "./sucess.php";
        
        }
      };
      console.log(strparams);
      // Send the request
      xhr.send(strparams);
    },
  };
  var rzp1 = new Razorpay(options);
  rzp1.open();
  
}

</script>
</body>
</html>