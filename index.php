<?php
include './dbconnect.php';
Session_start();
session_unset();
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/png" href="./asset/images/favicon.ico" />
    <link rel="stylesheet" href="home.css" />
    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css"
      rel="stylesheet"
    />
    <title>Automatic Fuel Dispenser System</title>
  </head>
  <body>
    <!-- header section starts here -->
    <header>
      <nav>
        <div class="navleft">
          <img src="./asset/images/logo.png" alt="Logo Image" />
          <h1 style="font-family: Lato">Automatic Fuel Dispenser System</h1>
        </div>
        <div class="navright">
          <a href="#home_section">Home</a>
          <a href="#reg_section">Register</a>
          <a href="user_login.php" id="signin">Sign-In</a>
        </div>
      </nav>
    </header>
    <!-- hedaer ends here -->
    <!-- home-section starts here -->
    <section id="home_section">
      <div class="homeleft">
        <h1>
          An ultimate mobile wallet solution for
          <span id="tag">fuel Station</span>
        </h1>
        <button><a href="#reg_section">Register</a></button>
      </div>
      <div class="homeright">
        <img src="./asset/images/hero_image.webp" alt="Hero Image" />
      </div>
    </section>
    <!-- home-section ends here -->

    <!-- How it work section starts here -->
    <section id="howitwork">
      <div>
        <div class="howleft">
          <iframe
            id="ytvdo"
            src="asset\images\prjct_vedio.mp4"
            frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
            width="250" height="200"
          ></iframe>
        </div>
        <div class="howright">
          <h1>How a fuel retail solution works <span id="tag">?</span></h1>
          <p>
            Automatic Fuel Dispenser Systems(AFDS) typically integrates hardware 
            with software for payment processing, inventory management, and 
            operational control. When a customer selects fuel type and amount, 
            the AFD's payment processing securely authorizes the transaction via 
            pre-paid card. Simultaneously, the fuel management system tracks inventory 
            levels, forecasts demand, and generates orders to replenish stock as needed.
          </p>
        </div>
      </div>
    </section>
    <!-- How it work section Ends here -->

    <!-- problem statment section starts here -->
    <section id="problemsection">
      <div>
        <div class="prblmleft">
          <h1>
            <span id="tag"> Challenges</span> faced by users <br />
            at fuel stations
          </h1>
          <p>
            Users have to go through a cluster of challenges while fuelling
            their vehicles at the fuel stations. Some of these challenges are
            mentioned to the right.
          </p>
        </div>
        <div class="prblmright">
          <!-- card start-->
          <div class="prblmcard">
            <div class="cardicon">
              <div class="circle">
                <i class="ri-hourglass-line"></i>
              </div>
            </div>
            <div class="cardinfo">
              <h3>To Create a User-Friendly Website</h3>
              <p>
                Develop an intuitive and user-friendly website
                that simplifies the fueling process for customers.
              </p>
            </div>
          </div>
          <!-- card end -->
          <!-- card start-->
          <div class="prblmcard">
            <div class="cardicon">
              <div class="circle">
                <i class="ri-hourglass-line"></i>
              </div>
            </div>
            <div class="cardinfo">
              <h3>To Implement RFID Document Verification</h3>
              <p>
                Enhance security and accuracy by
                integrating RFID technology into the fuel authorization process.
              </p>
            </div>
          </div>
          <!-- card end -->
          <!-- card start-->
          <div class="prblmcard">
            <div class="cardicon">
              <div class="circle">
                <i class="ri-wallet-3-fill"></i>
              </div>
            </div>
            <div class="cardinfo">
              <h3>To Ensure Secure User Authentication</h3>
              <p>
                Implement a stringent user authentication
                process that prioritizes security.
              </p>
            </div>
          </div>
          <!-- card end -->
          <!-- card start-->
          <div class="prblmcard">
            <div class="cardicon">
              <div class="circle">
                <i class="ri-hourglass-line"></i>
              </div>
            </div>
            <div class="cardinfo">
              <h3>To Integrate a Secure Payment Gateway</h3>
              <p>
                Prioritize the safety and convenience of
                customers by seamlessly incorporating a robust and 
                secure online payment gateway.
              </p>
            </div>
          </div>
          <!-- card end -->
          <!-- card start-->
          <div class="prblmcard">
            <div class="cardicon">
              <div class="circle">
                <i class="ri-hourglass-line"></i>
              </div>
            </div>
            <div class="cardinfo">
              <h3>To Establish Real-Time Data Handling</h3>
              <p>
                Develop a system that excels in real-time
                communication with RFID tags and vehicle documents.
              </p>
            </div>
          </div>
          <!-- card end -->
          <!-- card start-->
          <div class="prblmcard">
            <div class="cardicon">
              <div class="circle">
                <i class="ri-hourglass-line"></i>
              </div>
            </div>
            <div class="cardinfo">
              <h3>To Control Fuel Dispensing</h3>
              <p>
                Seamlessly integrate the system with fuel dispensing
                equipment to implement a foolproof process.
              </p>
            </div>
          </div>
          <!-- card end -->
        </div>
      </div>
    </section>
    <!-- problem statment section Ends here -->

    <!-- Register section start here -->
    <section id="reg_section">
      <div>
        <div class="regleft">
          <h1>
            Get Your <span id="tag">tag</span> Now...! <br />Register here
            <div id="rightanimation">
              <i class="ri-arrow-right-double-fill"></i>
            </div>
          </h1>
          <p>
            Fill all your details in the form, <br />
            and you will be redirected to our user page
          </p>
        </div>
        <div class="regright">
          <div id="regfrom">
            <form action="./signup.php" method="POST">
              <input
                type="text"
                name="username"
                id="Fname"
                placeholder="Enter Your Name*"
                required
              />
              <br />
              <input
                type="number"
                id="user_mobile"
                placeholder="Mobile number*"
                name="phone"
                required
              />
              <input type="email" id="user_mail" placeholder="Email Id" name="email" />
              <br />
              <input
                type="password"
                id="password"
                placeholder="password*"
                name="password"
                required
              />
              <input
                type="password"
                id="confirmpassword"
                placeholder="Re-enter password"
                name="confirm-password"
                required
              />
              <br />
              <input
                type="submit"
                value="Submit"
                id="submitbtn"
              />
              <p>* Required feilds</p>
              <p>Already Have Account then <span><a style="color:#fe8901; text-decoration:none" href="./users/user_login.php">Sign_in</a></span></p>
            </form>
        </div>
      </div>
    </section>
    <!-- Register section ends here -->

    <!-- Footer starts here -->
    <footer>
      <div>
        <div class="one">
          <h1>Automatic Fuel Dispenser System</h1>
          <p>
            By leveraging RFID technology and automated processes, 
            AFDS not only enhances operational efficiency for petrol 
            stations but also improves customer convenience and satisfaction, 
            paving the way for a modernized and streamlined fuel dispensing experience.
          </p>
        </div>
        <div class="two">
          <ul>
            <li><a href="#home_section">Home</a></li>
            <li><a href="#">About Us</a></li>
            <li><a href="user_login.php">Sign In</a></li>
            <li><a href="./police/policelogin.php">Police Login</a></li>
            <li><a href="./RTO/rtopage.php">RTO Login</a></li>
            <li><a href="./admin/adminlogin.php">Admin Login</a></li>
          </ul>
        </div>
      </div>
      <div class="lowerfooter">
        <p>&copy; 2024 All Rights Reserved</p>
      </div>
    </footer>
    <!-- Footer ends here -->
  </body>
</html>
