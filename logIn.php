<?php
session_start();
include 'db.php'; // This file should have your DB connection code

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if email exists in `client` table
    $stmt = $conn->prepare("SELECT * FROM client WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $clientResult = $stmt->get_result();

    if ($clientResult->num_rows === 1) {
        $client = $clientResult->fetch_assoc();

        // Verify password
        if (password_verify($password, $client['password'])) {
            // Password is correct, get account info
            $client_id = $client['id'];
            $stmt2 = $conn->prepare("SELECT * FROM accountinfo WHERE clientid = ?");
            $stmt2->bind_param("i", $client_id);
            $stmt2->execute();
            $accountResult = $stmt2->get_result();

            if ($accountResult->num_rows === 1) {
                $account = $accountResult->fetch_assoc();

                // Store both client and account info in session
                $_SESSION['client'] = $client;
                $_SESSION['account'] = $account;

                header("Location: clientAccount.php");
                exit();
            } else {
                echo "No account information found.";
            }
        } else {
            echo "Incorrect password.";
        }
    } else {
        echo "Email not found.";
    }
}
?>
