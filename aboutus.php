<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
      <link rel="icon" href="images/GINHAWALOGO.png" type="image/x-icon">
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
        <img src="images/GINAHWALogo.png" width="500" height="500" class="fade-in">
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
</body>
</html>
