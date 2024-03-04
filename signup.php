<head>
<?php
     if (isset($password_msg)){ echo "<p style='color: green;'>$password_msg</p>"; }
      if (isset($password_error)) { echo "<p style='color: red;'>$password_error</p>"; } ?>
</head>
<body>
    <?php
    include './dbconnect.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = test_input($_POST["username"]);
    $email = test_input($_POST["email"]);
    $phone = test_input($_POST["phone"]);
    $password = test_input($_POST["password"]);
    echo '<br>';
    $confirm_password = test_input($_POST["confirm-password"]);

    // Validate password strength
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number    = preg_match('@[0-9]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);
    
    // 
    // 
    if ($password === $confirm_password) {
       
        if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
                $password_error = "Password should be at least 8 characters long and include at least one uppercase letter, one lowercase letter, one number, and one special character.";
                // echo $password_error;
                  if (isset($password_error)) { echo "<p style='color: red;'>$password_error</p>"; }
        }
        else{

                    $password_msg="Registration sucessfull, Redirecting to login page";
                    if (isset($password_msg)) {
                            $sql = "INSERT INTO `login` (`Sl_no`, `password`, `user_type`,  `Phone`, `user_name`, `email`) VALUES (NULL, '$password', 'user',  '$phone', '$username', '$email')";
                            // $result = mysqli_query($conn,$sql);
                                try {
                                     if(mysqli_query($conn, $sql)) {
                                        echo "<p style='color: green;'>$password_msg</p>"; 
                                        echo "<script>
                                        setTimeout(function() {
                                            window.location.href = './user/user_login.php';
                                        }, 2000);
                                      </script>";
                                     }
                                    else 
                                    {
                                    $errorCode = mysqli_errno($conn);
                            
                                    // Check if the error is due to a duplicate entry (username already exists)
                                    if ($errorCode == 1062)
                                     {
                                        throw new Exception("<p style='color: red;'>Error: Username already exists.</p>");
                                    }
                         echo "<p style='color: green;'>$password_msg</p>"; 
                                }
                                    } 
                                    catch (Exception $e){
                                        echo "We regret to infrom you ,This username is already exsits  please try different username ";
                                    }
      
        
    } 
}
    }
    else {
    
        $password_error = "Passwords do not match.";
        if (isset($password_error)) { echo "<p style='color: red;'>$password_error</p>"; }
      
    }

}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>

