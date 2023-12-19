<?php
    $connection = mysqli_connect("localhost", "root", "");
    $db = mysqli_select_db($connection, "dbcrud");
    $edit = $_GET['edit'];

    $sql = "SELECT * FROM employee WHERE Id = '$edit'";

    $run = mysqli_query($connection, $sql);

    if (mysqli_num_rows($run) > 0) {
        while ($row = mysqli_fetch_array($run)) {
            $Id = $row['Id'];
            $Name = $row['Name'];
            $Email = $row['Email'];
            $Address = $row['Address'];
            $Phone = $row['Phone'];
        }
    } else {
        echo "Record not found.";
        exit();
    }

    if(isset($_POST['submit'])){
        $edit = $_GET['edit'];
        $Name = $_POST['Name'];
        $Email = $_POST['Email'];
        $Address = $_POST['Address'];
        $Phone = $_POST['Phone'];

        $sql = "UPDATE employee SET Name='$Name', Email='$Email', Address='$Address', Phone='$Phone' WHERE Id='$edit'";

        if(mysqli_query($connection, $sql)){
            echo '<script>location.replace("index.php")</script>';
        } else {
            echo "Something went wrong: " . $connection->error;
        }
    }
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
                        <form action="edit.php?edit=<?php echo $edit; ?>" method="post">
                            <input type="hidden" name="Id" value="<?php echo $Id; ?>">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="Name" class="form-control" placeholder="Enter Name" value="<?php echo $Name; ?>">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="Email" class="form-control" placeholder="Enter Email" value="<?php echo $Email; ?>">
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" name="Address" class="form-control" placeholder="Enter Address" value="<?php echo $Address; ?>">
                            </div>
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="text" name="Phone" class="form-control" placeholder="Enter Phone" value="<?php echo $Phone; ?>">
                            </div>
                            <br>
                            <input type="submit" class="btn btn-primary" name="submit" value="Update">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
