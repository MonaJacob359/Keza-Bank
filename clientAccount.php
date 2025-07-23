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
    <style>
        body { font-family: Arial; padding: 20px; background-color: #f0f0f0; }
        .container { background: white; padding: 20px; border-radius: 8px; max-width: 600px; margin: auto; }
        h2 { text-align: center; color: green; }
        .details p { margin: 10px 0; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Welcome, <?php echo htmlspecialchars($client['name']); ?></h2>
        <div class="details">
            <p><strong>Email:</strong> <?php echo htmlspecialchars($client['email']); ?></p>
            <p><strong>Account Number:</strong> <?php echo htmlspecialchars($account['accNum']); ?></p>
            <p><strong>Account Type:</strong> <?php echo htmlspecialchars($account['accType']); ?></p>
            <p><strong>Category:</strong> <?php echo htmlspecialchars($account['accCate']); ?></p>
            <p><strong>Currency Type:</strong> <?php echo htmlspecialchars($account['currType']); ?></p>
        </div>
    </div>
</body>
</html>
