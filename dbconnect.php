<?php

$host = 'localhost';
$dbname = 'testpay';
$username = 'root';
$password = '';

// Create a mysqli connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

else{
    echo "Connected successfully";
}

