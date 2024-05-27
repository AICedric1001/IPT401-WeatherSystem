<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather Analysis Dashboard</title>
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
                            <a class="nav-link" href="#">Settings</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Export Data</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="todo.php">To-Do List</a>
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
                <!-- Add more chart containers here -->
            </main>
        </div>
    </div>

    <script>
        // Temperature Chart
        const temperatureData = {
            labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'],
            datasets: [{
                label: 'Temperature (°C)',
                data: [22, 23, 25, 24, 26],
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
        const humidityData = [60, 65, 70, 72, 68];
        const humidityCtx = document.getElementById('humidityChart').getContext('2d');
        const humidityChart = new Chart(humidityCtx, {
            type: 'bar',
            data: {
                labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'],
                datasets: [{
                    label: 'Humidity (%)',
                    data: humidityData,
                    backgroundColor: 'rgba(255, 159, 64, 0.2)',
                    borderColor: 'rgba(255, 159, 64, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Windspeed Chart
        const windspeedData = [10, 12, 15, 14, 13];
        const windspeedCtx = document.getElementById('windspeedChart').getContext('2d');
        const windspeedChart = new Chart(windspeedCtx, {
            type: 'bar',
            data: {
                labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'],
                datasets: [{
                    label: 'Windspeed (km/h)',
                    data: windspeedData,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>
