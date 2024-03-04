<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/rtologin.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="icon" type="image/png" href="../assest/images/favicon.ico" />
  <title>Police Login</title>
</head>
<body>
<div class="login-container">
<form  method="post">
<h1> Police Login</h1>
<label for="userid">User Name</label>
<input type="text" placeholder="Enter username" name="userid" /><br />
<label for="userid">Password</label>
<input type="password" placeholder="Enter password" name="password" />
<br />
<input type="submit" value="Sign-In" />
<p>Go back to <span><a href="../index.php">main page</a></span></p>
</form>
<div>
  <?php
  include '../dbconnect.php';

  if(isset($_POST['userid'])){
    $thisuserid=$_POST['userid'];
    $thispassword=$_POST['password'];
    $sql = "SELECT * FROM rtologin where userid='$thisuserid'";
    $result = $conn->query($sql);
    $row=$result->fetch_assoc();
    if($thispassword==$row['password']) {
      session_start();
      $_SESSION['userid']=$row['userid'];
      echo '<div class="alert alert-sucess alert-dismissible fade show" role="alert">
      <strong>Sucessfull</strong> You are loged in successfully
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    sleep(2);
      header("location:home.php");
     }
     else{
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong> Invalid !!</strong> username and  Wrong password
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
     }
  }
  
  session_start();
  if(isset($_SESSION['userid'])){
    header("location:./home.php");
  }
  
  ?>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>

