<?php
include './sessionset.php';
include '../dbconnect.php';
include './navbar.php';
if($_SERVER['REQUEST_METHOD']=="POST"){
    $regno=$_POST['regno'];
    $regno=strtoupper($regno);
    $reason=$_POST['reason']; 
    $sql="insert into block(Reg_no,Reason,status) values('$regno','$reason','1')";
    if ($conn->query($sql) === TRUE) {
     $sql2="update registration set status='0' where Reg_no='$regno'";
     $res=$conn->query($sql2);
    } else {
      echo "Error: ". $sql. "<br>". $conn->error;
}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/block.css">
    <title> Police | Block</title>
    <link rel="icon" type="image/png" href="../assest/images/favicon.ico" />
</head>
<body>
    <div  class="box">
    
   <div class="block_form">
   <form method="POST">
        <label for="regno">Register Number</label><br>
        <input type="text" placeholder="Enter Reg.no" name="regno" required />
        <br />
        <label for="reason" required>Reason</label><br>
        <select name="reason">
            <option disabled selected>Select-Type</option>
            <option value="court_order">Court Order</option>
            <option value="traffic">Traffic</option>
            <option value="document">Document</option>
        </select>
        <br /><br/>
        <input type="submit" value="Submit">
    </form>
    <div class="side">
        <p>Block all the vehicle haveing more than 3 challans.</p>
        <button class="btn btn-danger"><a href="./chblock.php">Block</a></button>
    </div>
   </div>
    </div>
   <div class="mainblock">
   <div>
    <br>
    <h1>Blocked Vehicle list</h1>
    <br>
   <table class="table table-danger">
  <thead>
    <tr>
      <th scope="col">Sl.no</th>
      <th scope="col">Register Number</th>
      <th scope="col">Reason</th>
      <th scope="col">Block_date</th>
      <th scope="col">Option</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $sql="select * from block where status=1";
    $result = $conn->query($sql);
    $srl=0;
    if($result){
        while($row=mysqli_fetch_assoc($result)){
            $srl++;
            $regno=$row['Reg_no'];
            $reason=$row['Reason'];
            $block_date=$row['Block_date'];
          echo '<tr>
          <th scope="row">'.$srl.'</th>
          <td>'.$regno.'</td>
          <td>'.$reason.'</td>
          <td>'.$block_date.'</td>
          <td>
          <button class="btn btn-danger"><a class="text-white" 
          href="unblock.php?regno='.$regno.'">Unblock</a></button>
          </td>
        </tr>';
        }
      }
    ?>
  </tbody>
</table>
   </div>
   <br>
   <div>
    <h1> History</h1>
    <table class="table table-success">
  <thead>
    <tr>
      <th scope="col">Sl.no</th>
      <th scope="col">Register Number</th>
      <th scope="col">Reason</th>
      <th scope="col">Block_date</th>
      <th scope="col">Unblocked_Date</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $sql="select * from block where status=0";
    $result = $conn->query($sql);
    $srl=0;
    if($result){
        while($row=mysqli_fetch_assoc($result)){
            $srl++;
            $regno=$row['Reg_no'];
            $reason=$row['Reason'];
            $block_date=$row['Block_date'];
            $unblock_date=$row['Unblock_date'];
          echo '<tr>
          <th scope="row">'.$srl.'</th>
          <td>'.$regno.'</td>
          <td>'.$reason.'</td>
          <td>'.$block_date.'</td>
          <td>'.$unblock_date.'</td>
        </tr>';
        }
      }
    ?>
  </tbody>
</table>
   </div>
    
   </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>