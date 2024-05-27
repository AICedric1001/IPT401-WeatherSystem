<?php
include_once("config/config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = md5($_POST['password']); // Using MD5 for simplicity; use stronger hashing (e.g., bcrypt) in production.
    $country = $_POST['country'];
    $city = $_POST['city'];

    // Check if username already exists
    $sql = "SELECT * FROM user WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<script>alert('Username already exists');</script>";
    } else {
        // Retrieve location_id based on country and city
        $location_sql = "SELECT location_id FROM location WHERE country = '$country' AND city = '$city'";
        $location_result = $conn->query($location_sql);

        if ($location_result->num_rows > 0) {
            $row = $location_result->fetch_assoc();
            $location_id = $row['location_id'];

            // Insert user data into the user table
            $sql = "INSERT INTO user (username, password, country, city, location_id) VALUES ('$username', '$password', '$country', '$city', '$location_id')";

            if ($conn->query($sql) === TRUE) {
                echo "<script>alert('Registration successful');</script>";
                header("Location: index.php"); // Redirect to homepage or login page
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "<script>alert('Invalid country or city');</script>";
        }
    }
}

$conn->close();
?>
