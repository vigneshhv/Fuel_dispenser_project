<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ajax-unobtrusive/3.2.6/jquery.unobtrusive-ajax.min.js"></script>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <title>fuel_request</title>
</head>
<body>
    <h1> Request for Fuel </h1>
    <?php
    
    session_start();
    
    if(!isset($_SESSION['user'])||$_SESSION['user']!= true ){
       header("location:index.php"); 
       exit();
       
    }
    
    $user= $_SESSION['username1'];
    echo($user);
    include('db.php');

    $sql = "Select account_balance,name from registration where Reg_no = '$user'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);
    $account_balance=$row['account_balance'];
    $name = $row['name'];

    ?>
      
        <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                <div class="input-box">
                    <span class="details">Full Name <?php
                    echo ": $name";?></span>
                </div>
                <div class="input-box">
                    <span class="details">Registration Number <?php
                    echo ": $user";?></span>
                </div>
                <div class="input-box">
                    <span class="details"> Account Balance<?php
                    echo ": $account_balance";?></span>
                </div>

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
        $amount = null;
        $fuel = null;
        
        // Check if the form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Check if amount is entered
            
            if (!empty($_POST["amount"])) {
                $amount = $_POST["amount"];
                $fuel = NULL;
                $sql_amnt ="UPDATE `registration` SET `req_fuel` = '$fuel',req_fuel_amnt='$amount' WHERE `registration`.`Reg_no` = '$user'";
                mysqli_query($conn,$sql_amnt);
                echo ("You have requested a fuel of ".$amount."Rs");
            } 
            elseif (!empty($_POST["fuel"])) { // Check if fuel is entered
                $fuel = $_POST["fuel"];
                $amount = Null;
                $sql_fuel ="UPDATE `registration` SET `req_fuel` = '$fuel',req_fuel_amnt='$amount' WHERE `registration`.`Reg_no` = '$user'";
                mysqli_query($conn,$sql_fuel);
                echo ("You have requested a fuel of ".$fuel."liters" );
            }
        }
        echo "<button onclick = abcd('$user')>Add Money</button>";
        ?>
   
   <script>
    function abcd(uname){
    let amt = prompt("Please enter the ammount you wish to add" );
    // console.log(value,user);
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
        
            window.location.href = "./fuel_request.php";
        
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