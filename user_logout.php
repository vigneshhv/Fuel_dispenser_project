
<?php
session_start();
if(!isset($_SESSION['loggedin'])||$_SESSION['loggedin']!= true ){
    header("location:user_login.php"); 
    exit();
    }

else{
    session_unset();
    session_destroy();
    header("location:user_login.php");
    exit();
}

?>