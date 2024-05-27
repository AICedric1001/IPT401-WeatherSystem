<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>
      <link rel="icon" href="images/GINHAWALOGO.png" type="image/x-icon">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
     <?php include 'navbar.php'; ?>
    <div class="container mt-5">
        <h1 class="text-center">Settings</h1>
        
        <!-- Appearance Settings -->
        <div class="card mt-4">
            <div class="card-header">
                Appearance Settings
            </div>
            <div class="card-body">
                <h5 class="card-title">Theme</h5>
                <p class="card-text">Choose your preferred theme:</p>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="theme" id="lightTheme" value="light">
                    <label class="form-check-label" for="lightTheme">
                        Light Theme
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="theme" id="darkTheme" value="dark">
                    <label class="form-check-label" for="darkTheme">
                        Dark Theme
                    </label>
                </div>
            </div>
        </div>
        
        <!-- Notification Preferences -->
        <div class="card mt-4">
            <div class="card-header">
                Notification Preferences
            </div>
            <div class="card-body">
                <h5 class="card-title">Email Notifications</h5>
                <p class="card-text">Configure your email notification preferences:</p>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="emailNotifications">
                    <label class="form-check-label" for="emailNotifications">
                        Enable Email Notifications
                    </label>
                </div>
            </div>
        </div>

        <!-- Language Settings -->
        <div class="card mt-4">
            <div class="card-header">
                Language Settings
            </div>
            <div class="card-body">
                <h5 class="card-title">Language</h5>
                <p class="card-text">Select your preferred language:</p>
                <select class="form-control">
                    <option>English</option>
                    <option>Spanish</option>
                    <option>French</option>
                </select>
            </div>
        </div>

        <!-- Privacy Settings -->
        <div class="card mt-4">
            <div class="card-header">
                Privacy Settings
            </div>
            <div class="card-body">
                <h5 class="card-title">Data Privacy</h5>
                <p class="card-text">Manage your data privacy settings:</p>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="dataPrivacy">
                    <label class="form-check-label" for="dataPrivacy">
                        Allow data collection for analytics
                    </label>
                </div>
            </div>
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
