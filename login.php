<?php
session_start();
 
$servername = "localhost";
$username = "root";
$password = "";
$database = "dbcrud";

$connection = new mysqli($servername, $username, $password, $database);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $connection->query($sql);

    if ($result->num_rows == 1) {
        // Valid login
        $_SESSION['username'] = $username;
        header("Location: index.php");
        exit;
    } else {
        // Invalid login
        $errorMessage = "Invalid username or password";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body style="background-image: url('g.jpg'); background-size: cover; width: 100vw; height: 100vh;">
    <div class="container my-5">
        <h2 style="color:pink">Login</h2>

        <?php 
        if (isset($errorMessage)) {
            echo "
            <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                <strong>$errorMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
        }
        ?>

        <form method="post">
            <div class="mb-3">
                <label class="form-label" style="color: white">Username</label>
                <input type="text" class="form-control" name="username" required>
            </div>
            <div class="mb-3">
                <label class="form-label" style="color: white">Password</label>
                <input type="password" class="form-control" name="password" required>
            </div>
            <button type="submit" class="btn btn-success">Login</button>
        </form>
        <p class="mt-3"><a href="signup.php">👉 Click here to create an account</a>.</p>
    </div>
</body>
</html>


 


 
