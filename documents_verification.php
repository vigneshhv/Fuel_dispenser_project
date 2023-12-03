<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fuel Usage</title>
    <h1>User Documnets Verification</h1>
    <style>
    table {
    border-collapse: collapse;
    border-spacing: 0;
    width: 100%;
    border: 1px solid #ddd;
    margin-top:20px;
  }
  
  th, td {
    text-align: left;
    padding: 16px;
  }
  tr:nth-child(even) {
    background-color: #f2f2f2;
  }
  </style>
    <?php
    
 
    
    // $user= $_SESSION['username1'];
    // echo($user);
    include('dbconnect.php');



    ?>
           
                <table style="width:100%">
                        <tr>
                            <th>SL No.</th>
                            <th>Register Number</th>
                            <th>Documnet Type</th>
                            <th>Submitted Date</th>
                            <th>File</th>
                            <th>verification</th>
                            
                           
                            
                        </tr>
                </table>
                <?php

                $sql_doc = "SELECT * FROM documents where File_status='Under Verification'";
                $result=mysqli_query($conn,$sql_doc);
                $count=1;
               
                if(mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_assoc($result)){
                    
                        echo("
                        <table>
                        <tr>
                        <td>".$count."</td>
                        <td>".$row['Reg_no']."</td>
                        <td>".$row['File_type']."</td>
                        <td>".$row['Submitted_date']."</td>
                        <td>".$row['file_name']."</td>
                        <td><button onclick=\"viewFile( '".$row['Reg_no']."','".$row['file_name']."')\">Veiw</button></td>
                        <td><button onclick=\"checkFile( 'Verifed','".$row['Reg_no']."','".$row['file_name']."')\">Accept</button>  <button onclick=\"checkFile( 'Rejected','".$row['Reg_no']."','".$row['file_name']."')\">Reject</button></td>
                       

                    </tr>   </table>");
                    $count++;
                    
                  }
                }
  ?>
</head>
<body>


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
