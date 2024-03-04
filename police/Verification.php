<?php
include './sessionset.php';
include '../dbconnect.php';
include './navbar.php';
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/verify.css">
    <title>Fuel Usage</title>
    <link rel="icon" type="image/png" href="../assest/images/favicon.ico" />
</head>
<body>
<h1>User Documnets Verification</h1>
<table class="table table-primary">
  <thead>
    <tr>
      <th scope="col">SL No.</th>
      <th scope="col">Register Number</th>
      <th scope="col">Documnet Type</th>
      <th scope="col">Submitted Date</th>
      <th scope="col">File</th>
      <th scope="col">verification</th>
      <th scope="col">Accept</th>
      <th scope="col">Reject</th>
    </tr>
  </thead>
  <tbody>
  <?php
$sql_doc = "SELECT * FROM documents where File_status='Under Verification'";
$result=mysqli_query($conn,$sql_doc);
$count=1;

if(mysqli_num_rows($result)>0){
while($row=mysqli_fetch_assoc($result)){
    echo "<tr>
    <th scope='row'>".$count."</th>
    <td>".$row['Reg_no']."</td>
    <td>".$row['File_type']."</td>
    <td>".$row['Submitted_date']."</td>
    <td>".$row['file_name']."</td>
    <td><button type='button' class='btn btn-primary' onclick=\"viewFile( '".$row['Reg_no']."','".$row['file_name']."')\">View</button></td>
    <td>
    <button type='button' class='btn btn-success' onclick=\"checkFile( 'Verifed','".$row['Reg_no']."','".$row['file_name']."')\">Accept</button>
    </td>
    <td>
    <button type='button' class='btn btn-danger' onclick=\"checkFile( 'Rejected','".$row['Reg_no']."','".$row['file_name']."')\">Reject</button>
    </td>
  </tr>";
  $count++;
  }
}
?>
  </tbody>
</table>
<script>
    function viewFile(Reg_no, file_name) {
        // Fetch the file content using the Fetch API
        fetch('check.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: 'Reg_no=' + Reg_no + '&file_name=' + file_name,
        })
        .then(response => response.blob())
        .then(blob => {
            // Create a blob URL and open it in a new tab
            const blobUrl = URL.createObjectURL(blob);
            window.open(blobUrl, '_blank');
        })
        .catch(error => {
            console.error('Error fetching file:', error);
        });
    }
    function checkFile(status,Reg_no, file_name){
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "update_status.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    // Define the data to be sent
    var data = "status=" + status +"&Reg_no=" + Reg_no +"&file_name="+file_name;
    var strparams = data.toString();

    console.log(data);
    xhr.send(strparams);

    }
</script>
</body>
</html>