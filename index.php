<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Crud Application</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.19.0/font/bootstrap-icons.css">
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
                        <button class="btn btn-success">
                            <a href="add.php" class="text-light">
                                <i class="bi bi-plus"></i> Add New
                            </a>
                        </button>
                        <br />
                        <br />
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $connection = mysqli_connect("localhost", "root", "");
                                $db = mysqli_select_db($connection, "dbcrud");

                                $sql = "SELECT * FROM employee";
                                $run = mysqli_query($connection, $sql);

                                // Manually incrementing ID
                                $manualId = 1;

                                while ($row = mysqli_fetch_array($run)) {
                                    $Id = $row['Id'];
                                    $Name = $row['Name'];
                                    $Email = $row['Email'];
                                    $Address = $row['Address'];
                                    $Phone = $row['Phone'];
                                ?>
                                    <tr>
                                        <td><?php echo $manualId; ?></td>
                                        <td><?php echo $Name ?></td>
                                        <td><?php echo $Email ?></td>
                                        <td><?php echo $Address ?></td>
                                        <td><?php echo $Phone ?></td>
                                        <td>
                                            <button class="btn btn-primary">
                                                <a href='edit.php?edit=<?php echo $Id ?>' class="text-light">
                                                    <i class="bi bi-pencil"></i> Edit
                                                </a>
                                            </button>
                                            &nbsp;
                                            <button class="btn btn-danger">
                                                <a href='delete.php?delete=<?php echo $Id ?>' class="text-light">
                                                    <i class="bi bi-trash"></i> Delete
                                                </a>
                                            </button>
                                        </td>
                                    </tr>
                                <?php
                                    $manualId++;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
