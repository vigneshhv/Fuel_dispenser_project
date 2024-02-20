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
    <!-- <h1> Request for Fuel </h1> -->
    <?php
    
    session_start();
    
    if(!isset($_SESSION['user'])||$_SESSION['user']!= true ){
       header("location:user_login.php"); 
       exit();
       
    }
    
    $user= $_SESSION['username1'];
    // echo($user);
    include "dbconnect.php";
    include('nav.php');
    $sql = "Select account_balance,name,Phone from registration where Reg_no = '$user'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);
    $account_balance=$row['account_balance'];
    $name = $row['name'];
    $number = $row['Phone'];
    ?>
     
      <div class="form-container">
        <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
          <h2 class="request-fuel-heading">Request Fuel</h2>
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
                    <div class="input-box">
                        <label for="value">Select the Quantity</label>
                      <select name="value" id="value">
                      <option >  </option>
                        <option value="amount">Amount</option>
                        <option value="liters">Liters</option>
                        </select>
                  </div>
                <div class="input-box">
                 
          <label for="amount">Enter the Quantity:</label>
        <input type="text" name="amount" id="amount"><br>
                </div>
                
      
          <!-- Amount input -->
         

        <!-- Submit button -->
        <input type="submit" value="Submit">
    </form>
    <?php
        $amount = null;
        $fuel = null;
        
        // Check if the form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Check if amount is entered
            
            if (($_POST["value"])=='amount') {
                $amount = $_POST["amount"];
                $fuel = NULL;
                $sql_amnt ="UPDATE `registration` SET `req_fuel` = '$fuel',req_fuel_amnt='$amount' WHERE `registration`.`Reg_no` = '$user'";
                mysqli_query($conn,$sql_amnt);
                echo ("You have requested a fuel of $amount.Rs");
$phone_number =  $number; // Example phone number
              $message = "You have requested a fuel of $amount.Rs" ; // Example message
              
              require_once __DIR__ . '/vendor/autoload.php';
              $number = "+".$phone_number;
              
              // Set your Twilio account information
              $accountSid = 'AC47a342d10cb52e2182cedeef8df2b712';
              $authToken = '35d8866ecbc4b1ab529a03e63c90bba1';
              $twilioNumber = '+16592562703';
      
              // Set the recipient's phone number and the message body
              $recipientNumber = $number;
              
      
              // Create a new Twilio client
              $client = new Twilio\Rest\Client($accountSid, $authToken);
      
              // Send the SMS message
              $client->messages->create(
                $recipientNumber,
                array(
                  'from' => $twilioNumber,
                  'body' => $message
                )
              );
            } 
            elseif (($_POST["value"])=='liters') { // Check if fuel is entered
                $fuel = $_POST["amount"];
                $amount = Null;
                $sql_fuel ="UPDATE `registration` SET `req_fuel` = '$fuel',req_fuel_amnt='$amount' WHERE `registration`.`Reg_no` = '$user'";
                mysqli_query($conn,$sql_fuel);
                echo ("You have requested a fuel of $fuel.liters");
 $phone_number =  $number; // Example phone number
                $message = "You have requested a fuel of $fuel.liters" ; // Example message
                
                require_once __DIR__ . '/vendor/autoload.php';
                $number = "+".$phone_number;
                
                // Set your Twilio account information
                $accountSid = 'AC47a342d10cb52e2182cedeef8df2b712';
                $authToken = '35d8866ecbc4b1ab529a03e63c90bba1';
                $twilioNumber = '+16592562703';
        
                // Set the recipient's phone number and the message body
                $recipientNumber = $number;
                
        
                // Create a new Twilio client
                $client = new Twilio\Rest\Client($accountSid, $authToken);
        
                // Send the SMS message
                $client->messages->create(
                  $recipientNumber,
                  array(
                    'from' => $twilioNumber,
                    'body' => $message
                  )
                );
            }
        }
        // echo "<button onclick = abcd('$user')>Add Money</button>";
        ?>
   
    </div>
    <div class="add-money-section">
        <h2 class="request-fuel-heading">Add Money</h2>
        <div class="money-cards">
            <div class="money-card" onclick="setMoney(500)">500</div>
            <div class="money-card" onclick="setMoney(1000)">1000</div>
            <div class="money-card" onclick="setMoney(5000)">5000</div>
            <div class="money-card" onclick="setMoney(10000)">10000</div>
        </div>
        <input type="text" name="money" id="money" class="money-input" placeholder="Enter amount">
        <!-- Embed $user in the onclick attribute -->
        <input type="button" onclick="abcd('<?php echo $user; ?>')" value="Add Money">
</div>

<script>
    function setMoney(amount) {
        document.getElementById('money').value = amount;
    }
</script>
   
   
   <script>
    
 
function abcd(uname){
    let amt = document.getElementById("money").value;

// Do something with the input value (example: alert it)
alert("Adding money: " + amt);
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

<style>
      
         .form-container,
        .add-money-section {
            width: 100%;
            max-width: 900px;
         margin-left: 260px;
         margin-top:0px;
            padding: 10px;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }

        .input-box {
            margin-bottom: 15px;
        }

        .details {
            display: block;
            margin-bottom: 5px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            box-sizing: border-box;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="button"] {
            background-color: #4caf50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .add-money-section {
            margin-top: 30px;
        }

        .money-input {
            width: 60%;
            padding: 10px;
            margin-bottom: 10px;
            box-sizing: border-box;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .money-cards {
    display: flex;
    justify-content: space-between;
    margin-bottom: 10px;
}

.money-card {
    flex-basis: 23%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.money-card:hover {
    background-color: #3498db; /* Blue color on hover */
    color: white; /* Text color on hover */
}

/* Add some space between the money cards */
.money-card + .money-card {
    margin-left: 10px;
}
        
        .request-fuel-heading {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }
    </style>
</body>
</html>