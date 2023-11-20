<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="abc.php" method="post" enctype="multipart/form-data">
        <label for="reg">Enter reg</label>
        <input type="text"name = "reg" id = "reg">
        <div class="input-box">
             <span class="details">Select Document</span>
              <select id="doc" name="doc" placeholder="select">
                <option value="none" selected disabled hidden>Select an Option</option>
                <option value="pollution_certifcate">Pollution_certifcate</option>
                <option value="insurance_certificate">Insurance_Certificate</option>
              </select>
            </div>
            <input type="file" name="pdfFile" accept=".pdf" ></span>

            <br>
        <input type="submit" value="Upload">
    </form>
    <?php
// MySQL Database Configuration
include("db.php");
// Check connection

// Check if a file was submitted
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $user = $_POST['reg'];
    $type= $_POST['doc'];
    echo($type);
if ($_FILES['pdfFile']['error'] == UPLOAD_ERR_OK) {
    // Validate file type
    $allowedTypes = array('application/pdf');
    $fileType = mime_content_type($_FILES['pdfFile']['tmp_name']);

    if (!in_array($fileType, $allowedTypes)) {
        die('Invalid file type. Only PDF files are allowed.');
    }

    // Validate file size (5MB limit)
    if ($_FILES['pdfFile']['size'] > 5 * 1024 * 1024) {
        die('File size exceeds the 5MB limit.');
    }

    // Read the file content
    $pdfContent = file_get_contents($_FILES['pdfFile']['tmp_name']);

    // Escape special characters to prevent SQL injection
    $pdfContent = $conn->real_escape_string($pdfContent);

    // Insert the file content into the database
    $sql = "update registration  set $type = '$pdfContent' where Reg_no ='$user'";

    if ($conn->query($sql) === TRUE) {
        echo "File uploaded successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Error uploading file.";
}
}

// Close the database connection

?>

</body>
</html>
<?php
// MySQL Database Configuration
$host = "your_mysql_host";
$user = "your_mysql_user";
$password = "your_mysql_password";
$database = "your_mysql_database";

// Connect to MySQL
$conn = new mysqli($host, $user, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if a file was submitted
if ($_FILES['pdfFile']['error'] == UPLOAD_ERR_OK) {
    // Validate file type
    $allowedTypes = array('application/pdf');
    $fileType = mime_content_type($_FILES['pdfFile']['tmp_name']);

    if (!in_array($fileType, $allowedTypes)) {
        die('Invalid file type. Only PDF files are allowed.');
    }

    // Validate file size (5MB limit)
    if ($_FILES['pdfFile']['size'] > 5 * 1024 * 1024) {
        die('File size exceeds the 5MB limit.');
    }

    // Read the file content
    $pdfContent = file_get_contents($_FILES['pdfFile']['tmp_name']);

    // Escape special characters to prevent SQL injection
    $pdfContent = $conn->real_escape_string($pdfContent);

    // Get the file name
    $fileName = $conn->real_escape_string($_FILES['pdfFile']['name']);

    // Insert the file content and name into the database
    $sql = "INSERT INTO pdf_files (file_name, file_content) VALUES ('$fileName', '$pdfContent')";

    if ($conn->query($sql) === TRUE) {
        echo "File uploaded successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Error uploading file.";
}

// Close the database connection
$conn->close();
?>
