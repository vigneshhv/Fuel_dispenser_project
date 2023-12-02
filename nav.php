<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Your Company</title>
</head>
<body>

    <!-- Top Navigation Bar -->
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
        <p style="color: #fff;">Welcome, <span id="user123">Coustmer</span></p>
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
/* Top Navigation Bar styles */
.topnav {
    background-color: #333;
    color: #fff;
    padding: 10px;
    text-align: center;
    display: flex;
    justify-content: space-between;
    align-items: center;
    width: 100%; /* Set width to 100% */
    
}

.company-details {
    display: flex;
    align-items: center;
}

.logo {
    max-width: 50px; /* Adjust the max width of the logo */
    margin-right: 10px;
    margin-left:40px;
}

.company-info {
    text-align: left;
}

.user-info {
    text-align: right;
    margin-right:30px
}

.user-info p {
    margin-bottom: 5px;
    margin-right:30px
}

/* Button styles */
button {
    padding: 8px 12px;
    font-size: 14px;
    border: none;
    cursor: pointer;
    margin-right:30px
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
}

/* Side Navigation Bar styles */
/* Add these styles to your existing styles.css file */

/* Side Navigation Bar styles */
.sidenav {
    height: 85vh;
    width: 225px; /* Default width for larger screens */
    position: fixed;
    top: 0;
    left: 0;
    background-color: #333; /* Dark background color */
    padding-top: 20px;
    transition: 0.5s;
    margin-top: 65px;
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
    color: #ffcc00; /* Change to a different color on hover */
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
        width: 0; /* Hide the side navigation by default */
        padding-top: 60px; /* Adjust padding for smaller screens */
    }

    .sidenav a {
        padding: 8px;
        font-size: 16px;
        display: none;
    }

    .menu-icon {
        display: block; /* Show the menu icon */
    }

    .sidenav.open {
        width: 100%; /* Display the side navigation when open */
    }

    .sidenav.open a {
        display: block; /* Display links when the side navigation is open */
            padding: 15px;
        text-decoration: none;
        font-size: 18px;
        color: #f0eaea;
        display: block;
        transition: 0.3s;
        text-align: center;
    }
}

/* Main Content styles */
.content {
    margin-left: 220px;
    padding: 20px;
}


</style>
</html>
