<?php
include_once("config/config.php");

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve user's new location data from the form
    $country = $_POST['country'];
    $city = $_POST['city'];
    $latitude = $_POST['latitude']; // Assuming latitude is submitted via the form
    $longitude = $_POST['longitude']; // Assuming longitude is submitted via the form

    // Retrieve user ID from session (assuming it's stored there)
    session_start();
    $user_id = $_SESSION['user_id']; // Change this to match the session variable where you store the user ID

    // Check if the location already exists in the location table
    $sql_check_location = "SELECT location_id FROM location WHERE country = '$country' AND city = '$city'";
    $result_check_location = $conn->query($sql_check_location);

    if ($result_check_location->num_rows > 0) {
        // Location already exists, retrieve the location ID
        $row = $result_check_location->fetch_assoc();
        $location_id = $row['location_id'];
    } else {
        // Location doesn't exist, insert it into the location table and retrieve the new location ID
        $sql_insert_location = "INSERT INTO location (country, city, latitude, longitude) VALUES ('$country', '$city', '$latitude', '$longitude')";
        if ($conn->query($sql_insert_location) === TRUE) {
            $location_id = $conn->insert_id;
        } else {
            // Error inserting location
            echo "Error: " . $sql_insert_location . "<br>" . $conn->error;
            exit(); // Stop script execution if there's an error
        }
    }

    // Update user's location in the user table
    $sql_update_user = "UPDATE user SET location_id = '$location_id' WHERE user_id = '$user_id'";
    if ($conn->query($sql_update_user) === TRUE) {
        // Location updated successfully
        echo "<script>alert('Location updated successfully');</script>";
        header("Location: dashboard/dsettings.php"); // Redirect back to the settings page
        exit();
    } else {
        // Error updating location
        echo "Error: " . $sql_update_user . "<br>" . $conn->error;
    }
}

$conn->close();
?>
