<?php
include "../dbconnect.php";
include './sessionset.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
  $p_amt=$_POST['petrolamt'];
  $d_amt=$_POST['dieselamt'];
  $sql="update fuel_price set price='$p_amt' where ID='1'";
  $result=$conn->query($sql);
  if(!$result){
    echo "Petrol ERROR";
    die("Error: ". $sql. "<br>". $conn->error);
  }
  $sql="update fuel_price set price='$d_amt' where ID='2'";
  $result=$conn->query($sql);
  if(!$result){
    echo "Diesel ERROR";
    die("Error: ". $sql. "<br>". $conn->error);
  }
}



$sql="select * from fuel_price where ID = '1'";
$result=$conn->query($sql);
$row=$result->fetch_assoc();
$old_petrol_amt=$row['price'];
$sql="select * from fuel_price where ID = '2'";
$result=$conn->query($sql);
$row=$result->fetch_assoc();
$old_diesel_amt=$row['price'];

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Panal</title>
    <link rel="icon" type="image/png" href="../assest/images/favicon.ico" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.6.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/adminhome.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
  <nav class="navbar  navbar-expand-lg bg-body-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Admin</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="./adminhome.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Pricing</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./logout.php">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<h1>Fuel Price</h1>
<div class="oldamtbox">
  <h2> Amount</h2>
  <h3>Petrol <i class="ri-money-rupee-circle-fill"></i><span><?php echo $old_petrol_amt; ?></span>/L</h3>
  <h3>Diesel <i class="ri-money-rupee-circle-fill"></i><span><?php echo $old_diesel_amt; ?></span>/L</h3>
</div>
<form action="adminhome.php" method="POST">
<div class="mainbox">
  <div class="petrolbox">
    <div class="fuel_img">
      <img src="https://etimg.etb2bimg.com/photo/104331958.cms" alt="Petrol_image">
    </div>
    <div>
      <label for="petrolamt">Petrol Price <i class="ri-money-rupee-circle-fill"></i></label>
      <br>
      <input type="number" name="petrolamt" id="petrolamt" placeholder="Enter amount Rs/L" required>
    </div>
  </div>
  <div class="dieselbox">
  <div class="fuel_img">
    <img src="https://s3.amazonaws.com/wp-images.bankspower.com/performance-upgrades/wp-content/uploads/2000/12/13_dpf_-_300_-_mg_2.jpg" alt="Diesel_iamge">
  </div>
  <div>
  <label for="dieselamt">Diesel Price <i class="ri-money-rupee-circle-fill"></i></label>
  <br>
  <input type="number" name="dieselamt" id="dieselamt" placeholder="Enter amount Rs/L" required>
  </div>
  </div>
</div>
<div class="submitbox">
  <input type="submit" value="Issue">
</div>
</form>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>