<?php
include_once("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = md5($_POST['password']); // Using MD5 for simplicity; use stronger hashing (e.g., bcrypt) in production.

    $sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['username'] = $username;
        header("Location: dashboard.php"); // Redirect to dashboard
    } else {
        header("Location: index.php?error=invalid_credentials");
    }
}

$conn->close();
?>