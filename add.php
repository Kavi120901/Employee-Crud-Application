<?php
    $connection = mysqli_connect("localhost", "root", "", "dbcrud");

    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if(isset($_POST['submit'])){
        $Name = $_POST['Name'];
        $Email = $_POST['Email'];
        $Address = $_POST['Address'];
        $Phone = $_POST['Phone'];

        $sql = "INSERT INTO Employee (Name, Email, Address, Phone) VALUES ('$Name', '$Email', '$Address', '$Phone')";

        if(mysqli_query($connection, $sql)){
            echo '<script>location.replace("index.php")</script>';
        } else {
            echo "Something went wrong: " . mysqli_error($connection);
        }
    }

    mysqli_close($connection);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Crud Application</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <h1>Employee Crud Application</h1>
                </div>
                <div class="card-body">
                    <form action="add.php" method="post">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="Name" class="form-control" placeholder="Enter Name">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="Email" class="form-control" placeholder="Enter Email">
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" name="Address" class="form-control" placeholder="Enter Address">
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" name="Phone" class="form-control" placeholder="Enter Phone">
                        </div>
                        <br>
                        <input type="submit" class="btn btn-primary" name="submit" value="Register">
                    </form>                        
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
