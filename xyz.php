<?php
// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get raw POST data
    $postData = json_decode(file_get_contents('php://input'), true);

    // Assuming 'param1' and 'param2' are the expected parameters
    if (isset($postData['param1']) && isset($postData['param2'])) {
        // Retrieve the values
        $param1 = $postData['param1'];
        $param2 = $postData['param2'];

        // Process the data as needed
        // For example, you can echo the values or perform some database operations
        echo "Received POST request with param1: $param1, param2: $param2";

        // You can also store the data in a database or perform other actions here
    } else {
        // Handle missing parameters
        header('HTTP/1.1 400 Bad Request');
        echo 'Error: Missing parameters in the POST request.';
    }
} else {
    // Handle non-POST requests
    header('HTTP/1.1 405 Method Not Allowed');
    echo 'Error: Only POST requests are allowed for this endpoint.';
}
?>
