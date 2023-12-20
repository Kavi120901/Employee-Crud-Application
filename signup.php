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

    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
    $result = $connection->query($sql);

    if ($result) {
        $_SESSION['username'] = $username;
        header("Location: index.php");
        exit;
    } else {
        $errorMessage = "Failed to create an account";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body style="background-image: url('p.jpg'); background-size: cover; width: 100vw; height: 100vh;">
    <div class="container my-5">
        <h2 style="color: pink">Sign Up</h2>

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
            <button type="submit" class="btn btn-secondary">Sign Up</button>
        </form>
        <p class="mt-3" style="color: white">Already have an account? <a href="login.php">Log in here</a>.</p>
    </div>
</body>
</html>

