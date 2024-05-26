<?php
include_once("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $location = $_POST['location'];
    $locationParts = explode(',', $location);

    if (count($locationParts) == 2) {
        $city = trim($locationParts[0]);
        $country = trim($locationParts[1]);

        $sql = "SELECT temperature 
                FROM public_weather 
                JOIN location ON public_weather.location_id = location.location_id 
                WHERE city = ? AND country = ? 
                ORDER BY dateTime DESC LIMIT 1";
        
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $city, $country);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $weatherData = $result->fetch_assoc();
            // Populate temperature data for the chart
            $temperatureData[] = $weatherData['temperature'];
        } else {
            $weatherData = null;
        }
        $stmt->close();
    } else {
        $weatherData = null;
    }
}
$conn->close();
?>

  <?php include 'navbar.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather Result</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .weather-card {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }
        .weather-card:hover {
            transform: translateY(-10px);
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Weather Result</h1>
        <div class="weather-card bg-light">
            <?php if ($weatherData): ?>
                <h2 class="text-center">Weather for <?php echo htmlspecialchars($city . ', ' . $country); ?></h2>
                <h3 class="text-center">Temperature: <?php echo htmlspecialchars($weatherData['temperature']); ?>°C</h3>
                <!-- Removed weatherCondition as it was causing an undefined index error -->
                <canvas id="weatherChart" width="400" height="200"></canvas>
                <p class="text-center">Sign in to get more details about the weather.</p>
               
            <?php else: ?>
                <p class="text-center">No weather data found for the specified location.</p>
            <?php endif; ?>
        </div>
    </div>


 <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Login Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Login</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="login.php" method="POST">
                        <div class="form-group">
                            <label for="loginUsername">Username</label>
                            <input type="text" class="form-control" id="loginUsername" name="username" placeholder="Enter username" required>
                        </div>
                        <div class="form-group">
                            <label for="loginPassword">Password</label>
                            <input type="password" class="form-control" id="loginPassword" name="password" placeholder="Enter password" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Register Modal -->
    <div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="registerModalLabel">Sign Up</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="register.php" method="POST">
                        <div class="form-group">
                            <label for="registerUsername">Username</label>
                            <input type="text" class="form-control" id="registerUsername" name="username" placeholder="Enter username" required>
                        </div>
                        <div class="form-group">
                            <label for="registerPassword">Password</label>
                            <input type="password" class="form-control" id="registerPassword" name="password" placeholder="Enter password" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Sign Up</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>


    <script>
        //canvas
        const ctx = document.getElementById('weatherChart').getContext('2d');

        // Create the chart (for demonstration purposes, with dummy data)
        const weatherChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Temperature'],
                datasets: [{
                    label: 'Temperature (°C)',
                    data: [<?php echo isset($weatherData['temperature']) ? $weatherData['temperature'] : '0'; ?>],
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>


</body>
</html>
