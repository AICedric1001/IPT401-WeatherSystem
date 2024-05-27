<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>
    <link rel="icon" href="GINHAWALOGO.png" type="image/x-icon">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
     .nav-link1 {
            position: relative;
            overflow: hidden;
            display: inline-block;
            padding: 8px 20px;
            margin: 10px;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        
        .nav-link1:before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 300%;
            height: 300%;
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            transition: all 0.5s ease;
            z-index: 0;
            transform: translate(-50%, -50%);
        }
        
        .nav-link1:hover:before {
            width: 0;
            height: 0;
        }
        
        .nav-link1:hover {
            color: #007bff;
            background-color: #fff;
            box-shadow: 0 0 20px rgba(0, 123, 255, 0.5);
        }
</style>
<body>

<?php 
include 'navbar.php'; 

// Check if the user is logged in
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: index.php");
    exit();
}
?>

<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="dashboard.php">
                            Weather Analysis
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="reports.php">
                            Reports
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="dsettings.php">
                            Settings
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            Export Data
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link1" href="todo.php">To-Do List</a>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="container mt-5">
            <h1>Settings Page</h1>
            <p>This page allows users to customize their preferences and settings.</p>
            <p>You can update your profile information, change notification settings, and adjust display preferences here.</p>
            
            <!-- Location Settings Form -->
            <div class="card mt-4">
                <div class="card-body">
                    <h5 class="card-title">Location Settings</h5>
                    <form action="update_location.php" method="POST">
                        <div class="form-group">
                            <label for="country">Country</label>
                            <input type="text" class="form-control" id="country" name="country" placeholder="Enter your country" required>
                        </div>
                        <div class="form-group">
                            <label for="city">City</label>
                            <input type="text" class="form-control" id="city" name="city" placeholder="Enter your city" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Location</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
