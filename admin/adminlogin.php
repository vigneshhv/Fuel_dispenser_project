<?php
include '../dbconnect.php';

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/adminlogin.css" />
    <title>Admin | Login</title>
    <link rel="icon" type="image/png" href="../assest/images/favicon.ico" />
  </head>
  <body>
    <div class="mainbox">
      <div class="leftbox">
        <img
          src="https://www.indiafilings.com/learn/wp-content/uploads/2016/03/petrol-pump-business.jpg"
          alt="Admin_login_img"
        />
      </div>
      <div class="rightbox">
        <div class="login-container">
          <h2>Admin Login</h2>
          <form action="adminlogin.php" method="post">
            <div class="form-group">
              <label for="adminId">Admin ID:</label>
              <input type="text" id="adminId" name="adminId" required  placeholder="Enter Admin ID"/>
            </div>

            <div class="form-group">
              <label for="adminpassword">Password:</label>
              <input type="password" id="adminpassword" name="adminpassword" required placeholder="Enter Password"/>
            </div>

            <div class="form-group">
              <button type="submit">Login</button>
            </div>
          </form>
          <div>
            <p>
              Go back to <span><a href="../index.php">main page</a></span>
            </p>
          </div>
          <div>
            <?php
            if(isset($_POST['adminId']) && isset($_POST['adminpassword'])){
              $thisadminId=$_POST['adminId'];
              $thisadminpassword=$_POST['adminpassword'];
              $sql = "SELECT * FROM admin where adminid='$thisadminId'";
              $result = $conn->query($sql);
              $row=$result->fetch_assoc();
              if($thisadminpassword==$row['password']) {
                session_start();
                $_SESSION['adminid']=$row['adminid'];
                echo '<div class="alert alert-sucess alert-dismissible fade show" role="alert">
                <strong>Sucessfull</strong> You are loged in successfully
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
                sleep(1);
                header("location:adminhome.php");
              }else{
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Wrong !!</strong> Admin ID and Password Wrong
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';

              }
            }
            
            ?>
          </div>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
  </body>
</html>
