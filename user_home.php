<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <!-- <h1>Welcome to user registrarion</h1> -->

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

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
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
    </style>
    <?php
     if (isset($password_msg)) { echo "<p style='color: green;'>$password_msg</p>"; } 
      if (isset($password_error)) { echo "<p style='color: red;'>$password_error</p>"; } ?>
</head>
<body>
    

<form action="user_home.php" method="post">
        <h2>User Registration</h2>
        
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="phone">Phone Number:</label>
        <input type="tel" id="phone" name="phone" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
       


        
        <label for="confirm-password">Confirm Password:</label>
        <input type="password" id="confirm-password" name="confirm-password" required>
        
        <input type="submit" value="Register">
        <p>Already Registered? Click here to <a href="user_login.php">Login</a></p>

    </form>

  
    <?php
    include("db.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = test_input($_POST["username"]);
    $email = test_input($_POST["email"]);
    $phone = test_input($_POST["phone"]);
    $password = test_input($_POST["password"]);
    // echo $password;
    echo '<br>';
    $confirm_password = test_input($_POST["confirm-password"]);
    // echo $confirm_password;

    // Validate password strength
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number    = preg_match('@[0-9]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);
    // echo $uppercase . $lowercase . $number . $specialChars;
    // echo "Password strength";
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
                                            window.location.href = 'user_login.php';
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
</body>
</html>
