

<?php
// DB connection
$conn = new mysqli("localhost", "root", "", "kezabank");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Sanitize and collect form data
$fullName = $_POST['fullName'];
$email = $_POST['email'];
$phoneNum = $_POST['phoneNum'];
$passport = $_POST['passport'];
$address = $_POST['address'];
$dob = $_POST['dob'];
$gender = $_POST['gender'];
$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // hashed password

// Account info
$accType = $_POST['accType'];
$accCategory = $_POST['accCategory'];
$typeCurr = $_POST['typeCurr'];

// Step 1: Insert into client table
$clientStmt = $conn->prepare("INSERT INTO cleint (fullName, email, phoneNum, passport, address, dob, gender, username, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
$clientStmt->bind_param("sssssssss", $fullName, $email, $phoneNum, $passport, $address, $dob, $gender, $username, $password);
$clientStmt->execute();

// Get the newly created client_id
$client_id = $clientStmt->insert_id;

// Step 2: Generate unique account number
$accountNum = "KZB" . rand(100000000, 999999999);

// Step 3: Insert into accountInfo table
$accStmt = $conn->prepare("INSERT INTO accountinfo (clientid, accType, accCategory, typeCurr, accoutNum) VALUES (?, ?, ?, ?, ?)");
$accStmt->bind_param("issss", $client_id, $accType, $accCategory, $typeCurr, $accountNum);
$accStmt->execute();

// Close connections
$accStmt->close();
$clientStmt->close();
$conn->close();

// Redirect or success message
echo "Account registered successfully. Your Account Number is: " . $accountNum;
?>
