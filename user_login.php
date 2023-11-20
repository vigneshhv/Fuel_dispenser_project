<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profile</title>
</head>
<body>
<?php
$login =false;
$error=false;

include("db.php");
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $username = $_POST["username"];
    $password = $_POST["password"];
    // echo($username."\t" .$password);
  
    $sql= "SELECT * FROM `login` WHERE Reg_no='$username' AND password='$password' AND user_type='user'";
    $result=mysqli_query($conn,$sql);
    $num= mysqli_num_rows($result);
    
    if($num==1){
        $login=true;
        session_start();
        $_SESSION['user']=true;
        $_SESSION['username1']="$username";
        header("Location:user_profile.php");
    }
    
        $error=true;
    
}


?>
  <?php
                if($error){
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
                    // header("Location:welcome1.php");
                }
                   
                ?>
                <div>
        <form  method ="post" action = "user_login.php">
                 <div class="form">
                 <h2>  User Login </h2>
                 <input type="text" name="username" placeholder="Register Number">
                 <input type="password" name="password" placeholder="Password">
                 <button class ="btn1">login</button>
                 <p class="link">Don't have an account?<br>
                    <a href="signup.php">SignUp </a> here</a></p>
                 </div>
                 
                 </form>
</body>
</html>
