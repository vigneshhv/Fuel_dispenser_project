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
    <link rel="icon" type="image/png" href="/assest/images/favicon.ico" />
    <link rel="stylesheet" href="home.css" />
    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css"
      rel="stylesheet"
    />
    <title>Smart Fuel Station</title>
  </head>
  <body>
    <!-- header section starts here -->
    <header>
      <nav>
        <div class="navleft">
          <img src="./assest/images/logo.png" alt="Logo Image" />
          <h1 style="font-family: Lato">Smart Fuel Station</h1>
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
        <img src="./assest/images/hero_image.webp" alt="Hero Image" />
      </div>
    </section>
    <!-- home-section ends here -->

    <!-- How it work section starts here -->
    <section id="howitwork">
      <div>
        <div class="howleft">
          <iframe
            id="ytvdo"
            src="https://www.youtube.com/embed/Wr6R3nQfPts"
            frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
          ></iframe>
        </div>
        <div class="howright">
          <h1>How a fuel retail solution works <span id="tag">?</span></h1>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab
            repellat fugiat explicabo nostrum beatae, ullam modi, neque veniam
            rem dignissimos cum corrupti quas doloribus, veritatis autem ipsum
            ducimus sit fuga. Lorem ipsum, dolor sit amet consectetur
            adipisicing elit. Rem aut tempora suscipit? Maxime numquam incidunt,
            quae illo odit labore quo!
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
              <h3>Prolonged waiting times</h3>
              <p>
                One of the major problems that customers face is that they have
                to wait in long queues which eats up a lot of their time and
                makes them frustrated and annoyed.
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
              <h3>Lack of customer retention strategy</h3>
              <p>
                Customer retention is at a major risk as many customers would
                avoid coming to fuel stations with long queues. Instead, they
                would prefer a station with little or no queue.
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
              <h3>Prolonged waiting times</h3>
              <p>
                One of the major problems that customers face is that they have
                to wait in long queues which eats up a lot of their time and
                makes them frustrated and annoyed.
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
              <h3>Prolonged waiting times</h3>
              <p>
                One of the major problems that customers face is that they have
                to wait in long queues which eats up a lot of their time and
                makes them frustrated and annoyed.
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
              <h3>Prolonged waiting times</h3>
              <p>
                One of the major problems that customers face is that they have
                to wait in long queues which eats up a lot of their time and
                makes them frustrated and annoyed.
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
              <h3>Prolonged waiting times</h3>
              <p>
                One of the major problems that customers face is that they have
                to wait in long queues which eats up a lot of their time and
                makes them frustrated and annoyed.
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
          <h1>Smart Fuel</h1>
          <p>
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Tempora
            aperiam harum obcaecati porro mollitia molestiae, quis saepe enim
            illum praesentium rerum illo delectus voluptates perferendis.
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
        <p>&copy; 2023 Smart Fuel Station</p>
      </div>
    </footer>
    <!-- Footer ends here -->
  </body>
</html>
