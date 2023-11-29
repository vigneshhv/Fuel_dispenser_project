<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .login-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .message {
            margin-top: 16px;
            color: #e74c3c;
        }
    </style>
</head>
<body>

    <div class="login-container">
        <h2>User Login</h2>

        <form action="#" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <input type="submit" value="Login">
            <p>Not Registered yet? <a href="user_home.php"> Click Here</a></p>
        </form>

        <div class="message">
            <!-- You can use this div to display error messages if needed -->
        </div>
    </div>

</body>
<?php
$login =false;
$error=false;
$num1=Null;
$num=Null;

include("db.php");
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $username = $_POST["username"];
    $password = $_POST["password"];
    // echo($username."\t" .$password);
  
    $sql1= "SELECT * FROM `login` WHERE user_name='$username' AND user_type='user'";
    $result1=mysqli_query($conn,$sql1);
    $num1 = mysqli_num_rows($result1);
    if($num1==0){
        echo "Username  not found Kindly Register by  <a href='user_home.php'> Clicking Here</a>";
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
  <?php
                if($error && $num1!=0){
                echo '<div class="alert">
                    <span class="clsbtn">&times;</span>
                    <strong>Invaild Credentials  </strong>Check and try again.
                </div>';
               
                
                }
                if($login)
                {
                    echo ' <div class="alert success">
                    <span class="clsbtn">&times;</span>
                    <strong>You are logged in</strong>
                    </div>';
                   
                    echo "<script>
                    setTimeout(function() {
                        window.location.href = 'user_landing.php';
                    }, 2000);
                  </script>";
                }
                   
                ?>
</html>
