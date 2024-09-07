<?php
// Include the database connection file
require 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $accept_policy = isset($_POST['accept_policy']) ? 1 : 0; // Use 1 for accepted, 0 for not accepted

    // Input validation
    if (empty($fullname) || empty($email) || empty($password) || empty($confirm_password)) {
        echo "All fields are required.";
        exit;
    }

    if ($password !== $confirm_password) {
        echo "Password and confirmation password do not match.";
        exit;
    }

    if (!$accept_policy) {
        echo "You must agree to the policy before registering.";
        exit;
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // SQL to insert a new user into the database
    $sql = $conn->prepare("INSERT INTO users (fullname, email, password) VALUES (?, ?, ?)");
    $sql->bind_param("sss", $fullname, $email, $hashed_password);

    if ($sql->execute()) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $sql->error;
    }

    $sql->close();
    $conn->close();
}
?>
