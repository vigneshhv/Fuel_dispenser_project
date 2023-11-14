<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }
   

    nav {
      background-color: #333;
      overflow: hidden;
      border-radius: 20px; /* Curved borders */
      padding: 10px; /* External padding */
      margin-top:20px;
      margin-left:80px;
      margin-right:80px;
      position:static;
    }

    .topnav a {
      float: right;
      display: block;
      color: white;
      text-align: left;
      padding: 14px 26px;
      text-decoration: none;
      margin-left:5px;
    }

    .topnav img {
      display: block;
      float: left;
      margin-right: 140px; /* Adjust margin as needed */
      margin-left:20px;
      position: center;
      padding-top:14px;
    }

    .topnav a:hover {
      background-color: #ddd;
      color: black;
    }
    .topnav .icon{
        display:none;
    }

    @media screen and (max-width: 600px) {
  .topnav a:not(:first-child) {display: none;}
  .topnav a.icon {
    float: right;
    display: block;
  }
  
}
    @media screen and (max-width: 600px) {
 
  .topnav.responsive .icon {
     
    overflow: hidden;
    float: right;
    display: block;
    margin: 0 auto 10px auto; /* Center the logo */
    
    
  }
  .topnav.responsive a {
    float: left;
    display: block;
    width: 100%;
    text-align: left;
  }
  .topnav.responsie img{
    float: left;
    display: block;
    margin: 0 auto 10px auto; /* Center the logo */
  }
}
  </style>
</head>
<body>

<div class="topnav" id="myTopnav">
  <nav>

    <img src="your-logo.png" alt="Logo" width="50" height="50"> <!-- Replace "your-logo.png" with the path to your logo -->
    
    <a href="#home">Home</a>
    <a href="#about">About</a>
    <a href="#services">Services</a>
    <a href="#contact">Contact</a>
    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
  </nav>
</div>
<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>
</body>
</html>