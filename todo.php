<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
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
    <?php include 'todo_crud.php'; ?>

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
                            <a class="nav-link" href="dsettings.php">Settings</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Export Data</a>
                        </li>
                    
                    </ul>
                </div>
            </nav>

            <!-- Main Content -->
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <h1 class="mt-5">To-Do List</h1>
                <!-- Add Item Form -->
                <form method="POST" action="todo.php">
                    <input type="text" name="item" placeholder="New to-do item" required class="form-control mb-2">
                    <button type="submit" name="add" class="btn btn-primary">Add</button>
                </form>

                <!-- Display To-Do List -->
                <ul class="list-group mt-3">
                    <?php while ($row = $result->fetch_assoc()) { ?>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <form method="POST" action="todo.php" class="form-inline">
                                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                <input type="text" name="item" class="form-control mr-2" value="<?= $row['item'] ?>">
                                <select name="status" class="form-control mr-2">
                                    <option value="pending" <?= $row['status'] == 'pending' ? 'selected' : '' ?>>Pending</option>
                                    <option value="completed" <?= $row['status'] == 'completed' ? 'selected' : '' ?>>Completed</option>
                                </select>
                                <button type="submit" name="update" class="btn btn-success">Update</button>
                            </form>
                            <a href="todo.php?delete=<?= $row['id'] ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
                        </li>
                    <?php } ?>
                </ul>
            </main>
        </div>
    </div>
</body>
</html>
