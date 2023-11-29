<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #2c3e50;
            color: #ecf0f1;
        }

        header {
            background-color: #3498db;
            color: #fff;
            text-align: center;
            padding: 1em;
        }

        main {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #ecf0f1;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        section {
            margin-bottom: 20px;
        }

        h2 {
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #bdc3c7;
            color:black;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 8px;
            color: #333;
        }

        input {
            padding: 8px;
            margin-bottom: 12px;
            border: 1px solid #bdc3c7;
            border-radius: 4px;
        }

        button {
            background-color: #2ecc71;
            color: #fff;
            padding: 8px;
            cursor: pointer;
            border: none;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #27ae60;
        }
    </style>
    <title>Vehicle Registration</title>
</head>
<body>

    <header>
        <h1>Welcome</h1>
    </header>

    <main>
    <section>
            <h2>Registered Vehicles List</h2>
            <table>
                <thead>
                    <tr>
                        <th>SL.no</th>
                        <th>Vehicle ID</th>
                        <th>Owner Name</th>
                        <th>Rfid Number</th>
                        <th>veiw</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                include("db.php");
                session_start();
                $user= $_SESSION['username'];
            $sql_regiter = "SELECT * FROM  registration where user_name = '$user'";
                $result_reg=mysqli_query($conn,$sql_regiter);
                $count=1;
               
                if(mysqli_num_rows($result_reg)>0){
                while($row=mysqli_fetch_assoc($result_reg)){
                    
                        echo("
                        <table>
                        <tr>
                        <td>".$count."</td>
                        <td>".$row['Reg_no']."</td>
                        <td>".$row['Name']."</td>
                        <td>".$row['RFID_no']."</td>
                        <td><button type ='submit'  onclick=\"updateStatus('".$row['Reg_no']."')\">Login</button>
                        </td>
                         
                       
                       

                    </tr>   </table>");
                    $count++;
                    
                  }
                }
                else{
                    echo "no vehicles are listed";
                }?>
                    <!-- Display registered vehicles' IDs here -->
                </tbody>
            </table>
        </section>
            
          

        <section>
            <h2>Register New Vehicle</h2>
            <form id="vehicleForm" method = "post" action ="#">
                <label for="vehicleID">Register Number:</label>
                <input type="text" id="vehicleID" name="vehicleID" required>

                <button type="submit">Register Vehicle</button>
            </form>

        </section>
    </main>
<?php
$Reg_no=Null;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $Reg_no =$_POST["vehicleID"];
    $sql = "SELECT phone FROM registration where Reg_no ='$Reg_no' ";
    $result= mysqli_query($conn,$sql);
  
    if(mysqli_num_rows($result)==0){
        echo"Invalid Vehicle Number";
    }
    else{
        $row = mysqli_fetch_assoc($result);
        $number = $row['phone'];
        $maskedNumber = str_repeat('*', 6) . substr($number, -4);
        echo "otp has been sent to ". $maskedNumber;
        
        // Generate and send OTP (in a real-world scenario, you would use a service to send the OTP)
        $otp = mt_rand(1000, 9999); // Generate a random 4-digit OTP
        // In a real-world scenario, you would send the OTP to the user's phone number using a messaging service.
        echo '<br>'.$otp;

        // Set the OTP and current time in session for verification
        
        $_SESSION['otp'] = $otp;
        $_SESSION['otp_time'] = time();
        $_SESSION['Reg_no']=$Reg_no;
      
        // Display the OTP entry form
  
        echo '<div id="popup" class="popup">
        <form method="post" action="verify_otp.php">
            <label for="otp">Enter OTP:</label>
            <input type="text" id="otp" name="otp" required>
            <button type="submit">Verify OTP</button>
        </form>
        <div id="timer">2:00</div>
      </div>';

echo '<script>
        var timer = 120;
        var timerDisplay = document.getElementById("timer");
        var popup = document.getElementById("popup");

        function updateTimer() {
            var minutes = Math.floor(timer / 60);
            var seconds = timer % 60;
            timerDisplay.textContent = minutes + ":" + (seconds < 10 ? "0" : "") + seconds;

            if (timer <= 0) {
                clearInterval(interval);
                // Handle timeout if needed
                popup.style.display = "none"; // Hide the popup on timeout
            }

            timer--;
        }

        var interval = setInterval(updateTimer, 1000);

        // Show the popup
        popup.style.display = "block";
      </script>';
    }
 
    }
    $Reg_no =Null;
if (isset($_SESSION['verification_result'])==1){
    echo"OTP  Verified  Successfully";
   $Reg_no =  $_SESSION['Reg_no'];
//    echo $user;
//    echo $reg_no;
    $sql_user = "update registration set user_name = '$user' where Reg_no= '$Reg_no' "; 
    $result_user = mysqli_query($conn,$sql_user);
    unset($_SESSION['verification_result']);
    echo "<script>
    setTimeout(function() {
        window.location.href = 'user_landing.php';
    }, 1000);
  </script>";
  
}
else if (isset($_SESSION['verification_result'])== 3){
    echo ("Invalid OTP ");
    unset($_SESSION['verification_result']);
   
}
?>
<style>
    .popup {
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: #fff;
        padding: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        border-radius: 8px;
        z-index: 999;
    }

    .popup form {
        margin-bottom: 10px;
    }

    #timer {
        text-align: center;
        font-size: 18px;
        color: #333;
    }
</style>

    <script>
    function updateStatus(Reg_no){
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "user_session.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    // Define the data to be sent
    var data = "Reg_no=" + Reg_no ;
    var strparams = data.toString();

    console.log(data);
    xhr.send(strparams);
    setTimeout(function() {
     window.location.href = 'user_profile.php';
 }, 100);
    }
        // You can add JavaScript code here for handling form submission and updating the list of registered vehicles.
    </script>

</body>
</html>
