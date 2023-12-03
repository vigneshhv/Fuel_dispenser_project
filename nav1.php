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

<script>
    function logout(){
        window.location.href = 'user_logout.php'; 
    }
</script>

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


</style>
</html>
