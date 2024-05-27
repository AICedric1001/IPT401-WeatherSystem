<?php
include_once("config.php");

// Check if the user is logged in
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: index.php");
    exit();
}

// Check if the connection is established
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize arrays to store data for each day of the week
$daysOfWeek = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
$temperatureData = array_fill_keys($daysOfWeek, null);
$humidityData = array_fill_keys($daysOfWeek, null);
$windspeedData = array_fill_keys($daysOfWeek, null);

// Fetch weather data from the database
$sql = "SELECT DAYOFWEEK(dateTime) AS dayOfWeek, AVG(temperature) AS avgTemperature, AVG(humidity) AS avgHumidity, AVG(windspeed) AS avgWindspeed 
        FROM weather 
        GROUP BY DAYOFWEEK(dateTime)";
$result = $conn->query($sql);

if ($result) {
    if ($result->num_rows > 0) {
        // Loop through each row of the result set
        while ($row = $result->fetch_assoc()) {
            // Extract data from the row
            $dayOfWeek = $row['dayOfWeek'];
            $temperature = $row['avgTemperature'];
            $humidity = $row['avgHumidity'];
            $windspeed = $row['avgWindspeed'];

            // Validate the day of the week value
            if ($dayOfWeek >= 1 && $dayOfWeek <= 7) {
                // Store data in respective arrays
                $temperatureData[$daysOfWeek[$dayOfWeek - 1]] = $temperature;
                $humidityData[$daysOfWeek[$dayOfWeek - 1]] = $humidity;
                $windspeedData[$daysOfWeek[$dayOfWeek - 1]] = $windspeed;
            } else {
                // Handle out-of-range day of the week
                echo "Warning: Day of the week out of range: $dayOfWeek<br>";
                // Optionally, you can set default values or handle the error in another way
            }
        }
    } else {
        // Handle no data retrieved from the database
        echo "No data available";
    }
} else {
    // Handle SQL query error
    echo "Error: " . $conn->error;
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather Analysis Dashboard</title>
    <link rel="icon" href="GINHAWALOGO.png" type="image/x-icon">
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Chart.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        /* Add your custom styles here */
        canvas {
            width: 800px;
            height: 400px;
            margin: 0 auto;
            display: block;
        }

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
</head>
<body>
<?php include 'navbar.php'; ?>

<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="dashboard.php">Weather Analysis</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="reports.php">Reports</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="settings.php">Settings</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Export Data</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link1" href="todo.php">To-Do List</a>
                    </li>
                    <!-- Subscription Button -->
            <li class="nav-link1">
                <button id="subscribeButton" class="btn btn-primary" data-toggle="modal" data-target="#subscribeModal">Subscribe</button>
            </li>
                </ul>
            </div>
        </nav>

        <!-- Main Content -->
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <h1 class="mt-5">Welcome to the Weather Analysis Dashboard</h1>
            <div class="chart-container mt-4">
                <canvas id="temperatureChart"></canvas>
            </div>
            <div class="chart-container mt-4">
                <canvas id="humidityChart"></canvas>
            </div>
            <div class="chart-container mt-4">
                <canvas id="windspeedChart"></canvas>
            </div>
        </main>
    </div>
</div>

<!-- Subscription Modal -->
<div class="modal fade" id="subscribeModal" tabindex="-1" role="dialog" aria-labelledby="subscribeModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="subscribeModalLabel">Subscribe</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Subscribe to our premium plan to access more features!</p>
                <form action="dashboard.php" method="POST">
                    <div class="form-group">
                        <label for="subscriptionEmail">Email address</label>
                        <input type="email" class="form-control" id="subscriptionEmail" name="email" placeholder="Enter your email" required>
                    </div>
                    <div class="form-group">
                        <label for="subscriptionPlan">Choose Plan</label>
                        <select class="form-control" id="subscriptionPlan" name="plan">
                            <option value="monthly">Monthly - $9.99</option>
                            <option value="yearly">Yearly - $99.99</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Subscribe</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // Temperature Chart
    const temperatureData = {
        labels: <?php echo json_encode(array_keys($temperatureData)); ?>,
        datasets: [{
            label: 'Temperature (°C)',
            data: <?php echo json_encode(array_values($temperatureData)); ?>,
            backgroundColor: 'rgba(54, 162, 235, 0.2)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1
        }]
    };
    const temperatureCtx = document.getElementById('temperatureChart').getContext('2d');
    const temperatureChart = new Chart(temperatureCtx, {
        type: 'line',
        data: temperatureData,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // Humidity Chart
    const humidityData = {
        labels: <?php echo json_encode(array_keys($humidityData)); ?>,
        datasets: [{
            label: 'Humidity (%)',
            data: <?php echo json_encode(array_values($humidityData)); ?>,
            backgroundColor: 'rgba(255, 159, 64, 0.2)',
            borderColor: 'rgba(255, 159, 64, 1)',
            borderWidth: 1
        }]
    };
    const humidityCtx = document.getElementById('humidityChart').getContext('2d');
    const humidityChart = new Chart(humidityCtx, {
        type: 'line',
        data: humidityData,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // Windspeed Chart
    const windspeedData = {
        labels: <?php echo json_encode(array_keys($windspeedData)); ?>,
        datasets: [{
            label: 'Windspeed (km/h)',
            data: <?php echo json_encode(array_values($windspeedData)); ?>,
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1
        }]
    };
    const windspeedCtx = document.getElementById('windspeedChart').getContext('2d');
    const windspeedChart = new Chart(windspeedCtx, {
        type: 'line',
        data: windspeedData,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // Event listener for subscription button
    document.getElementById('subscribeButton').addEventListener('click', function() {
        $('#subscribeModal').modal('show');
    });
</script>

<!-- jQuery, Popper.js, and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
