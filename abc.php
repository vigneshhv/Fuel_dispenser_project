<?php
echo "Request Method: " . $_SERVER["REQUEST_METHOD"];

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Retrieve data from the query string
    $receivedData = isset($_GET["data"]) ? $_GET["data"] : "No data received";

    // Process the received data as needed
    echo "Data received in abc.php: " . $receivedData;
} else {
    echo "Invalid request method. Expected GET.";
}
?>
