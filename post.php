<?php
// Replace these values with your database credentials
// $servername = "your_server_name";
// $username = "your_username";
// $password = "your_password";
// $dbname = "your_database_name";

// // Create connection
// $conn = new mysqli($servername, $username, $password, $dbname);

// // Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }

// Check if the POST request contains data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Extract data from the POST request
    $param1 = $_POST['param1'];
    $param2 = $_POST['param2'];

    // Perform any necessary validation on the received data
echo($param1);
    // Insert data into the database
//     $sql = "INSERT INTO your_table_name (column1, column2) VALUES ('$param1', '$param2')";

//     if ($conn->query($sql) === TRUE) {
//         $response = array('status' => 'success', 'message' => 'Data inserted successfully');
//     } else {
//         $response = array('status' => 'error', 'message' => 'Error inserting data: ' . $conn->error);
//     }

//     // Return the JSON response
//     header('Content-Type: application/json');
//     echo json_encode($response);
// } else {
    // Return an error response if the request method is not POST
    header('Content-Type: application/json');
    echo json_encode(array('status' => 'error', 'message' => 'Invalid request method'));
}

// Close the database connection
// $conn->close();
?>
