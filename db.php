<?php
$host = "localhost";       // Usually localhost
$user = "root";            // Default XAMPP username
$password = "";            // Default XAMPP password is empty
$database = "kb-bank";    // Your database name

// Create connection
$conn = new mysqli($host, $user, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
