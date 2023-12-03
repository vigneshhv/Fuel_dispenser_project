<?php
// verify_otp.php
include 'dbconnect.php';
// Start the session
session_start();

// Initialize a variable to store the verification result
$verificationResult = '10';

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if OTP session variables exist
    if (isset($_SESSION['otp']) && isset($_SESSION['otp_time'])) {
        $enteredOtp = $_POST['otp'];
        $storedOtp = $_SESSION['otp'];
        $otpTime = $_SESSION['otp_time'];
        echo($enteredOtp.$storedOtp.$otpTime.time());

        // Check if OTP is correct and within the 2-minute timeframe
        if ($enteredOtp == $storedOtp && (time() - $otpTime) <= 120) 
            {
            // OTP is valid, set the verification result
            $verificationResult = 1;
          
        
        
        } else {
            // Invalid OTP, set the verification result
            $verificationResult = 3;
            echo "Invalid OTP";
        }

        // Unset the OTP session variables to prevent reuse
        unset($_SESSION['otp']);
        unset($_SESSION['otp_time']);
    } else {
        // OTP session variables not set, handle error
        $verificationResult = 2;
    }

    // Store the verification result in a session variable
    $_SESSION['verification_result'] = $verificationResult;

    // Redirect to user_landing.php
   header('Location:user_vehicle_register.php');
    // exit();
}
?>
