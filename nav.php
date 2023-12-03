<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Your Company</title>
</head>
<body>
<?php
// session_start();

?>
    <!-- Top Navigation Bar -->
    <div class="topnav">
        <div class="company-details">
            <img src="asset/logo.jpg" alt="Company Logo" class="logo">
            <div class="company-info">
                <h1 style="color: #ffcc00;">Smart Fuel </h1>
                <p style="color: #fff;"> The Next Gen Fuel Experience !!!</p>
            </div>
        </div>
        <div class="user-info">
            <p style="color: #fff;">Welcome, <span id="user123"></span></p>
            <button onclick="redirect()" style="background-color: #ffcc00; color: #333;">Home</button>
            <button onclick="logout()" style="background-color: #ffcc00; color: #333;">Logout</button>
            <div id="clock" style="color: #fff;"></div>
        </div>
    </div>

    <!-- Menu icon -->
    <div class="menu-icon" onclick="toggleNav()">&#9776;</div>

    <!-- Side Navigation Bar -->
    <div class="sidenav">
        <a href="user_profile.php">Profile</a>
        <a href="fuel_request.php">Request Fuel</a>
        <a href="user_upload.php">Upload Documents</a>
        <a href="user_fuel_dashboard.php">Fuel Dashboard</a> 
        <a href="user_challan.php">Pay Challans</a>
        <a href="user_transactions.php">Transactions</a>
        <a href="user_settings.php">Settings</a>
    </div>

    <script>
        function toggleNav() {
            var sidenav = document.querySelector('.sidenav');
            sidenav.classList.toggle('open');
        }
        function redirect(){
            setTimeout(function() {
                window.location.href = 'user_vehicle_register.php';
            }, 100);
        }
        function logout(){
            window.location.href = 'user_logout.php'; 
        }
    </script>

    <!-- Main Content -->
    <div class="content">
        <!-- Your page content goes here -->
        <!-- <h2>Welcome to Our Website</h2>
        <p>This is the main content area.</p> -->
    </div>

</body>
<style>
    /* Reset some default styles */
    body, h1, h2, p, a {
        margin: 0;
        padding: 0;
    }

    body {
        font-family: 'Arial', sans-serif;
    }

    /* Top Navigation Bar styles */
    .topnav {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        background-color: #333;
        color: #fff;
        padding: 10px;
        text-align: center;
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: 100%;
        z-index: 1000;
    }

    .company-details {
        display: flex;
        align-items: center;
    }

    .logo {
        max-width: 50px;
        margin-right: 10px;
        margin-left: 40px;
    }

    .company-info {
        text-align: left;
    }

    .user-info {
        text-align: right;
        margin-right: 30px;
    }

    .user-info p {
        margin-bottom: 5px;
        margin-right: 30px;
    }

    /* Button styles */
    button {
        padding: 8px 12px;
        font-size: 14px;
        border: none;
        cursor: pointer;
        margin-right: 30px;
    }

    /* Responsive styles */
    @media screen and (max-width: 768px) {
        .topnav {
            flex-direction: column;
            align-items: flex-start;
        }

        .company-details {
            margin-bottom: 10px;
        }

        .user-info {
            text-align: left;
            width: 100%;
        }

        button {
            margin-top: 10px;
        }

        /* Adjustments for the side navigation */
        .sidenav {
            width: 100%;
            padding-top: 60px;
            height: auto;
            margin-top: 0;
            display: none;
        }

        .sidenav a {
            padding: 8px;
            font-size: 16px;
            display: block;
            text-align: left;
        }

        .sidenav.open {
            display: block;
        }
    }

    /* Menu icon styles */
.menu-icon {
    display: block;
    cursor: pointer;
    position: fixed;
    top: 20px;
    left: 20px;
    z-index: 999;
    font-size: 24px;
    color: #fff;
}

/* Responsive styles */
@media screen and (min-width: 769px) {
    .menu-icon {
        display: none; /* Hide the menu icon on larger screens */
    }
}
    /* Side Navigation Bar styles */
    .sidenav {
        height: 90vh;
        width: 225px;
        position: fixed;
        top: 0;
        left: 0;
        background-color: #333;
        padding-top: 20px;
        transition: 0.5s;
        margin-top: 76px;
    }

    .sidenav a {
        padding: 15px;
        text-decoration: none;
        font-size: 18px;
        color: #f0eaea;
        display: block;
        transition: 0.3s;
    }

    .sidenav a:hover {
        color: #ffcc00;
    }

    /* Menu icon styles */
    .menu-icon {
        display: none;
        cursor: pointer;
        position: fixed;
        top: 20px;
        left: 20px;
        z-index: 999;
        font-size: 24px;
        color: #fff;
    }

    /* Responsive styles */
    @media screen and (max-width: 768px) {
        .sidenav {
            width: 0;
            padding-top: 60px;
        }

        .sidenav a {
            display: none;
        }

        .menu-icon {
            display: block;
        }

        .sidenav.open {
            width: 100%;
            display: block;
        }

        .sidenav.open a {
            display: block;
            text-align: center;
        }
    }

    /* Main Content styles */
    .content {
        margin-top: 60px;
        padding: 20px;
    }
</style>
</html>
