<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fuel Usage</title>
    
 
            
</head>
<body>
<?php
    
    session_start();
    
    if(!isset($_SESSION['user'])||$_SESSION['user']!= true ){
       header("location:index.php"); 
       exit();
       
    }
    
    $user= $_SESSION['username1'];
    // echo($user);
    include('db.php');
    include('nav.php');

    $sql = "Select  File_type,Submitted_date,verified_date,File_status from documents where Reg_no = '$user' and File_type= 'pollution_certifcate' ORDER BY verified_date  DESC";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);
    $sql1 = "Select File_type,Submitted_date,verified_date,File_status from documents where Reg_no = '$user' and File_type= 'insurance' ORDER BY verified_date  DESC";
    $result = mysqli_query($conn,$sql);
    $result1 = mysqli_query($conn,$sql1);
    $row1 = mysqli_fetch_array($result1);
    if(mysqli_num_rows($result)==1){
   $pollution_submit_date= $row['Submitted_date'];
    $pollution_verified_date=$row['verified_date'];
   $poll_status=$row['File_status'];
    }
    else{
        $pollution_submit_date= "Not Submitted" ;
        $pollution_verified_date="Not Applicable";
        $poll_status="Not applicable";
    }
    if(mysqli_num_rows($result1)==1){
    $insurance_submit_date= $row1['Submitted_date'];
    $insurance_verified_date=$row1['verified_date'];
    $insurance_status=$row1['File_status'];
    }
    else{
        $insurance_submit_date=  "Not Submitted";
        $insurance_verified_date='Not Applicable';
        $insurance_status='Not Applicable';
    }

    ?>
             <!-- <div class="input-box">
                    <span class="details">Full Name <?php
                    // echo ": $name";?></span>
                </div> -->
                <div class="form-container">
                <h1>Document upload</h1>
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
                <div class="popup-container" id="successPopup">
                <div class="popup">
                    <span class="close" onclick="closePopup('successPopup')">&times;</span>
                    <p>File uploaded successfully!</p>
                </div>
                </div>

    <div class="popup-container" id="errorPopup">
        <div class="popup">
            <span class="close" onclick="closePopup('errorPopup')">&times;</span>
            <p id="errorMessage">Error uploading file.</p>
        </div>
    </div>
                <form action="user_upload.php" method="post" enctype="multipart/form-data">
    
        <div class="input-box">
             <span class="details">Select Document</span>
              <select required id="doc"  name="doc" placeholder="select" >
                <option value="none" selected disabled hidden>Select an Option</option>
                <option value="pollution_certifcate">Pollution_certifcate</option>
                <option value="insurance">Insurance_Certificate</option>
              </select>
            </div>
            <input type="file" name="pdfFile" accept=".pdf" required ></span>

            <br>
            <input type="submit" value="Upload">
    </form>
</div>
    <?php
// MySQL Database Configuration
include("db.php");
// Check connection
$type=Null;
// Check if a file was submitted
if($_SERVER['REQUEST_METHOD'] == 'POST'){
   
  
    $type= $_POST['doc'];

  
    try {
        if ($_FILES['pdfFile']['error'] == UPLOAD_ERR_OK) {
            // Validate file type
            $allowedTypes = array('application/pdf');
            $fileType = mime_content_type($_FILES['pdfFile']['tmp_name']);
    
            if (!in_array($fileType, $allowedTypes)) {
                throw new Exception('Invalid file type. Only PDF files are allowed.');
            }
    
            // Validate file size (3MB limit)
            $maxFileSize = 3 * 1024 * 1024;
            if ($_FILES['pdfFile']['size'] > $maxFileSize) {
                throw new Exception('File size exceeds the 3MB limit.');
            }
    
            // Read the file content
            $pdfContent = file_get_contents($_FILES['pdfFile']['tmp_name']);
    
            // Escape special characters to prevent SQL injection
            $pdfContent = $conn->real_escape_string($pdfContent);
    
            // Get the file name
            $fileName = $conn->real_escape_string($_FILES['pdfFile']['name']);
    
            if (mysqli_num_rows($result) == 0 || mysqli_num_rows($result1) == 0) {
                $sql = "INSERT INTO documents (Reg_no, File_type, File_name, File, Submitted_date, File_status) 
                        VALUES ('$user', '$type', '$fileName', '$pdfContent', current_timestamp(), 'Under Verification')";
            } else {
                $sql = "UPDATE documents 
                        SET File = '$pdfContent', Submitted_date = current_timestamp(), 
                            File_status = 'Under Verification', File_name = '$fileName'  
                        WHERE Reg_no = '$user' AND File_type = '$type'";
            }
    
            if ($conn->query($sql) === TRUE) {
                echo "<script>
                    openPopup('successPopup');
                    setTimeout(function() {
                        closePopup('successPopup');
                        window.location.href = 'user_upload.php';
                    }, 3000);
                  </script>";
            } else {
                throw new Exception("Error: " . $sql . "<br>" . $conn->error);
            }
        } else {
            throw new Exception("Error uploading file.");
        }
    } catch (Exception $e) {
        echo "<script>
            document.getElementById('errorMessage').innerText = 'Error: " . $e->getMessage() . "';
            openPopup('errorPopup');
          </script>";
    } 
    
}

// Close the database connection

?>
    
</body>
<style>
    /* body {
        font-family: 'Arial', sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    } */

    /* Add styling to the form container */
    .form-container {
        margin-left: 240px; /* Adjust as needed */
        padding: 20px;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        margin-top: 0px;
    }

    /* Style for input boxes */
    .input-box {
        margin-bottom: 15px;
    }

    /* Style for the document selection */
    #doc {
        width: 100%;
        padding: 10px;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    /* Style for the file input */
    input[type="file"] {
        margin-top: 10px;
    }

    /* Style for the submit button */
    input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        margin-top:4px;
    }

    /* Style for details span */
    .details {
        font-weight: bold;
    }

    /* Add some padding to the body */
  

    /* Add a box shadow to input boxes */
    .input-box {
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        padding: 10px;
        border-radius: 5px;
    }

    /* Style for the header */
    header {
        background-color: #333;
        color: white;
        padding: 15px;
        text-align: center;
    }

    /* Add some spacing around the form */
    /* form {
        margin-top: 20px;
    } */
    .heading {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .popup-container {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    justify-content: center;
    align-items: center;
}

.popup {
    background: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    text-align: center;
}

.popup p {
    margin: 0;
    font-size: 16px;
}

.popup span.close {
    position: absolute;
    top: 10px;
    right: 10px;
    font-size: 20px;
    cursor: pointer;
}
</style>
<script>
    function openPopup(popupId) {
    document.getElementById(popupId).style.display = 'flex';
}

function closePopup(popupId) {
    document.getElementById(popupId).style.display = 'none';
}
</script>
</html>