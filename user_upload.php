<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fuel Usage</title>
    <h1>Document upload</h1>
 
    <?php
    
    session_start();
    
    if(!isset($_SESSION['user'])||$_SESSION['user']!= true ){
       header("location:index.php"); 
       exit();
       
    }
    
    $user= $_SESSION['username1'];
    // echo($user);
    include('db.php');

    $sql = "Select  File_type,Submitted_date,verified_date,File_status from documents where Reg_no = '$user' and File_type= 'pollution_certifcate' ORDER BY verified_date  DESC";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);
    $sql1 = "Select File_type,Submitted_date,verified_date,File_status from documents where Reg_no = '$user' and File_type= 'insurance' ORDER BY verified_date  DESC";
    $result = mysqli_query($conn,$sql);
    $result1 = mysqli_query($conn,$sql1);
    $row1 = mysqli_fetch_array($result1);
   $pollution_submit_date= $row['Submitted_date'];
    $pollution_verified_date=$row['verified_date'];
   $poll_status=$row['File_status'];
    $insurance_submit_date= $row1['Submitted_date'];
    $insurance_verified_date=$row1['verified_date'];
    $insurance_status=$row1['File_status'];

    ?>
             <!-- <div class="input-box">
                    <span class="details">Full Name <?php
                    // echo ": $name";?></span>
                </div> -->
                <div class="input-box">
                    <span class="details">Registration Number <?php
                    echo ": $user";?></span>
                </div>
                <div class="input-box">
                    <span class="details"> Pollution Certificate Status<?php
                    echo ": $poll_status";?></span>
                </div>
                <div class="input-box">
                    <span class="details"> Pollution Certificate Submitted Date<?php
                    echo ": $pollution_submit_date";?></span>
                </div>
                <div class="input-box">
                    <span class="details"> Pollution Certificate verified Date<?php
                    echo ": $pollution_verified_date";?></span>
                </div>
                <div class="input-box">
                    <span class="details"> Insurance Certificate Status<?php
                    echo ": $insurance_status";?></span>
                </div>
                <div class="input-box">
                    <span class="details"> Insurance Certificate Submitted Date<?php
                    echo ": $insurance_submit_date";?></span>
                </div>
                <div class="input-box">
                    <span class="details"> Insurance Certificate verified Date<?php
                    echo ": $insurance_verified_date";?></span>
                </div>
        
                <form action="user_upload.php" method="post" enctype="multipart/form-data">
    
        <div class="input-box">
             <span class="details">Select Document</span>
              <select id="doc" name="doc" placeholder="select">
                <option value="none" selected disabled hidden>Select an Option</option>
                <option value="pollution_certifcate">Pollution_certifcate</option>
                <option value="insurance">Insurance_Certificate</option>
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
    // $user = $_POST['reg'];
  
    $type= $_POST['doc'];

    // echo($type);
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

    $sql = "Insert into documents (Reg_no,File_type,File_name,File,Submitted_date,File_status ) values ('$user','$type','$fileName','$pdfContent',current_timestamp(),'Under Verification')";

    if ($conn->query($sql) === TRUE) {
        echo "File uploaded successfully.";
        header("Refresh:5, url = user_upload.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
       
    }
} else {
    echo "Error uploading file.";
}
}

// Close the database connection

?>
               
</head>
<body>
    
</body>
</html>