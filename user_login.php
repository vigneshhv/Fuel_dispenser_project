<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            background: url('asset/image.jpeg') center/cover no-repeat; /* Replace 'your-image-url.jpg' with your image URL */
            position: relative;
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
    </style>
    <title>Login Page</title>
</head>
<body>

<div class="left-side"></div>
    <div class="right-side">
        <div class="login-form">
            
  
            <h1 class="name">Welcome!</h1>
            <h3>Please login to your account.</h3>
            <form method ="POST" action ="user_login.php">
                <span>Username</span>
                <input type="text" name = "username" id = "username" placeholder="" required>
                <span>Password</span>
                <input type="password" name = "password" id = "password" c:\xampp\htdocs\front end designs\image.jpegplaceholder="" required>
                
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



<!DOCTYPE html>
<html lang="en">

<body>
 
</body>
</html>
