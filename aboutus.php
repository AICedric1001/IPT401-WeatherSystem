<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
      <link rel="icon" href="GINHAWALOGO.png" type="image/x-icon">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            color: #343a40;
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 40px 20px;
        }
        h1 {
            text-align: center;
            margin-bottom: 30px;
        }
        p {
            font-size: 18px;
            line-height: 1.6;
        }
        .jumbotron {
            background-color: #BCD1FF;
            color: #101C35;
            padding: 100px 20px;
            text-align: center;
            margin-bottom: 1px;
            border-radius: 10px;
        }
        .btn-primary {
            background-color: #343a40;
            border-color: #343a40;
        }
        .btn-primary:hover {
            background-color: #212529;
            border-color: #212529;
        }
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
        .fade-in {
            animation: fadeIn 1.5s ease-in-out;
        }
    </style>
</head>
<body>
    <?php include 'navbar.php'; ?>
    <div class="jumbotron">
        <img src="GINAHWALogo.png" width="500" height="500" class="fade-in">
    </div>

    <div class="container">
        <h2>Our Mission</h2>
        <p align="justify">Our mission is to revolutionize daily life by seamlessly integrating weather data into personalized scheduling and task management systems, empowering individuals to make informed decisions and optimize their activities based on current and forecasted weather conditions. Leveraging cutting-edge meteorological data collection methods and advanced forecasting models, our platform will offer tailored suggestions for planning outdoor events, scheduling travel arrangements, and managing outdoor work tasks, enhancing productivity, safety, and enjoyment. Additionally, through collaboration with local authorities and organizations, we'll develop targeted programs and services to address weather-related challenges and enhance community resilience, fostering a safer, more resilient, and more enjoyable future for all.</p>
        <p>P.S. Kuya Kaem "Ang buhay ay weather-weather lang"</p>

        <h2>Our Team</h2>
        <p align="justify"> Our team is composed of two dedicated groups: the Development Team, which focuses on creating and maintaining our cutting-edge weather analysis tools, and the Research Team, which continuously gathers and interprets meteorological data to ensure our forecasts are accurate and reliable. Together, these teams collaborate to provide comprehensive weather information and solutions, ensuring we deliver the highest quality service to our users.</p>

        <br>
        <br>

        <h1> GINHAWA Stands for:</h1>
        <h2>G - General</h2>
        <h2>I - Information</h2>
        <h2>N - Navigation</h2>
        <h2>H - Heat</h2>
        <h2>A - And</h2>
        <h2>W - Weather</h2>
        <h2>A - Analysis</h2>
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
                    <div class="form-group">
                        <label for="registerCountry">Country</label>
                        <input type="text" class="form-control" id="registerCountry" name="country" placeholder="Enter country" required>
                    </div>
                    <div class="form-group">
                        <label for="registerCity">City</label>
                        <input type="text" class="form-control" id="registerCity" name="city" placeholder="Enter city" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Sign Up</button>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>
