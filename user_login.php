<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
  
</head>
<body>
<?php
$login =false;
$error=false;
$num1=Null;
$num=Null;

include("dbconnect.php");
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $username = $_POST["username"];
    $password = $_POST["password"];
    // echo($username."\t" .$password);
  
    $sql1= "SELECT * FROM `login` WHERE user_name='$username' AND user_type='user'";
    $result1=mysqli_query($conn,$sql1);
    $num1 = mysqli_num_rows($result1);
    if($num1==0){
        $showPopup = true; // Replace this condition with your own logic

        if ($showPopup) {
            // echo '<div id="popup" style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: #f0f0f0; padding: 20px; border: 1px solid #ccc; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); z-index: 9999;">
            //         <p>Username  not found Kindly Register by  <a href="user_home.php"> Clicking Here</a></p>
            //       </div>';
        
            // // Trigger the JavaScript function to show the popup
            // echo '<script>showPopup();</script>';
        }
        
    }
    else{
    $sql= "SELECT * FROM `login` WHERE user_name='$username' AND password='$password'";
    $result=mysqli_query($conn,$sql);
    $num= mysqli_num_rows($result);
    }
  
    if($num==1){
        $login=true;
        session_start();
        $_SESSION['user']=true;
        $_SESSION['username']="$username";
       
     
    }else{ $error=true;}
    
       
    
}


?>



<div class="left-side"></div>
    <div class="right-side">
        <div class="login-form">
        <?php
if ($error && $num == 0) {
    ' <div class="alert success">
    <span class="clsbtn">&times;</span>
    <strong>Student Registerd Sucessfully</strong>
    </div>';
}

if ($login) {
    ' <div class="alert success">
        <span class="clsbtn">&times;</span>
        <strong>Student Registerd Sucessfully</strong>
        </div>';

    echo "<script>
            setTimeout(function() {
                window.location.href = 'user_vehicle_register.php';
            }, 2000);
          </script>";
}
?>
  
            <h1 class="name">Welcome!</h1>
            <h3>Please login to your account.</h3>
            <form method ="POST" action ="#">
                <span>Username</span>
                <input type="text" name = "username" id = "username" required>
                <span>Password</span>
                <input type="password" name = "password" id = "password" required>
                
                <button type="submit">Login</button>
            </form>

            <div class="links">
                <a href="#">Forgot Password?</a>
                
            </div>

       

            <div class="links">
                <p>Don't have an account? <a href="user_register.php">Sign up</a></p>
            </div>
        </div>
    </div>

</body>

 

<style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            display: flex;
            height: 100vh;
        }

        .left-side {
            flex: 0 0 60%;
            background: url('asset/image.jpeg') center/cover no-repeat;             position: relative;
        }

        .right-side {
            flex: 0 0 40%;
            padding: 2px;
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background: #f4f4f4; /* or any other background color you prefer */
        }

        .login-form {
            max-width: 400px;
            width: 100%;
            background: #fff; 
            border-radius: 8px;
            padding: 20px;
            flex: 0 0 40%;
            padding: 5px;
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
            justify-content: center;
            background: #f4f4f4; /* or any other background color you prefer */
        }

        .login-form h1.name {
            text-align: left;
        }

        .login-form h3 {
            text-align: left;
            margin-bottom: 20px;
        }

        .login-form span {
            text-align: left;
            margin-bottom: 5px;
        }

        .login-form input {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            margin-top:10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .login-form button {
            width: 30%;
            margin-top:10px;
            padding: 10px;
            background: #36e685; /* or any other button color you prefer */
            color: #fff;
            border: none;
            border-radius: 20px;
            cursor: pointer;
        }

        .login-form .links {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
        }

        .login-form .links a {
            text-decoration: none;
            color: #c1184ae6;
        }

        .login-form input[type="checkbox"] {
            margin-right: 8px; /* Adjust spacing as needed */
        }

        .social-buttons {
            margin-top: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .social-buttons button {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            background: #4285f4; /* Google blue color */
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        #popup {
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: #f0f0f0;
        padding: 20px;
        border: 1px solid #ccc;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        z-index: 9999;
    }

    .alert {
        display: none;
        position: fixed;
        top: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 100%;
        padding: 15px;
        background-color: #4CAF50;
        color: white;
        text-align: center;
        z-index: 9999;
    }

    .alert.success {
        background-color: #4CAF50;
    }

    .clsbtn {
        color: white;
        float: right;
        font-size: 20px;
        font-weight: bold;
        cursor: pointer;
    }
    </style>
      <script>
        // Function to display the popup message and hide it after 10 seconds
        function showPopup() {
            var popup = document.getElementById('popup');
            popup.style.display = 'block';
            setTimeout(function () {
                popup.style.display = 'none';
            }, 10000); // 10000 milliseconds = 10 seconds
        }
    </script>
</html>
