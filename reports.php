<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reports</title>
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
        </style>


<body>
    <?php include 'navbar.php'; ?>

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
        <h1>Reports Page</h1>
        <p>This page displays various reports based on weather data analysis.</p>
        <p>For example, you can have reports on temperature trends, humidity levels, wind speeds, etc.</p>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
