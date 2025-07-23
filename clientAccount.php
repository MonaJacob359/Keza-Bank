<?php
session_start();

if (!isset($_SESSION['client']) || !isset($_SESSION['account'])) {
    header("Location: logIn.html");
    exit();
}

$client = $_SESSION['client'];
$account = $_SESSION['account'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Account Details</title>
    <link rel="stylesheet" href="index.css">
    <style>
        body{
            overflow: hidden;
        }
        main{
         background-color: rgb(7, 7, 58);
        width: 100%;
        height: 85vh;
        }
        .container { 
            background: white; 
            padding: 20px;
            border-radius: 8px;
            width: 500px; 
            height:250px;
            margin: auto; 
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            }
        h2 {
             text-align: center;
             color: green;
             color:rgba(0, 0, 88, 1);
             }
        .details p { 
            margin: 20px 0;
            font-size: 20px;
         } 
    </style>
</head>
<body>
     <header>
        <nav>
            <div class="logo">
                <img src="public/logo.png" alt="Logo">
            </div>
            <div class="navList">
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="SignUp.html" target="_blank">Sign Up</a></li>
                    <li><a href="logIn.html" target="_blank">Log In</a></li>
                    <li><a href="AboutUs.htm" target="_blank">About Us</a></li>

                </ul>
            </div>
        </nav>
    </header>
    <main>
         <div class="container">
        <h2>Welcome, <?php echo htmlspecialchars($client['fullName']); ?></h2>
        <div class="details">
            <p><strong>Account Number:</strong> <?php echo htmlspecialchars($account['accNum']); ?></p>
            <p><strong>Account Type:</strong> <?php echo htmlspecialchars($account['accType']); ?></p>
            <p><strong>Category:</strong> <?php echo htmlspecialchars($account['accCate']); ?></p>
            <p><strong>Currency Type:</strong> <?php echo htmlspecialchars($account['currType']); ?></p>
        </div>
    </div>
    </main>
   
</body>
</html>
