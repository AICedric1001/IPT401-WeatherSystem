<?php
include 'config.php';

// Handle Create and Update
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['add'])) {
        $item = $_POST['item'];
        $sql = "INSERT INTO todo_list (item) VALUES ('$item')";
        $conn->query($sql);
    } elseif (isset($_POST['update'])) {
        $id = $_POST['id'];
        $item = $_POST['item'];
        $status = $_POST['status'];
        $sql = "UPDATE todo_list SET item='$item', status='$status' WHERE id=$id";
        $conn->query($sql);
    }
}

// Handle Delete
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM todo_list WHERE id=$id";
    $conn->query($sql);
    
    // Reset auto-increment value
    $sql = "ALTER TABLE todo_list AUTO_INCREMENT = 1";
    $conn->query($sql);
    
    // Reorder IDs
    $sql = "SET @count = 0";
    $conn->query($sql);
    $sql = "UPDATE todo_list SET id = @count:= @count + 1";
    $conn->query($sql);
}

// Fetch all to-do items
$sql = "SELECT * FROM todo_list";
$result = $conn->query($sql);

$conn->close();
?>
