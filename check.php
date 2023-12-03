<?php
// view_file.php

include('dbconnect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the parameters from the AJAX request
    $regNo = $_POST['Reg_no'];
    $fileName = $_POST['file_name'];

    // Fetch the file content from the database based on Reg_no and file_name
    $sql = "SELECT File FROM documents WHERE Reg_no = '$regNo' AND file_name = '$fileName'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $fileContent = $row['File'];

        // Set the appropriate headers for the file type
        header('Content-type: application/pdf'); // Change the content type based on your file type
        header('Content-Disposition: inline; filename="' . $fileName . '"');

        // Output the file content
        echo $fileContent;
        exit;
    } else {
        // Handle errors if needed
        echo "Error fetching file content";
        exit;
    }
} else {
    // Invalid request method
    echo "Invalid request method";
    exit;
}
?>
