<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <title>employee</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
     
</head>
<body>
    <div class="container ,my-5">
        <h2>Manage Employees</h2>
        <a class="btn btn-primary" href="/crud/create.php" role="button">Add New Employee</a>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Action</th>
               </tr>
           </thead>
           <tbody>
            <?php
                $servername="localhost";
                $username="root";
                $password= "";
                $database="dbcrud";
                
                $connection = new mysqli($servername, $username, $password, $database);

                if($connection->connect_error){
                    die("Connection failed:" . $connection->connect_error);
                }
                $sql="SELECT* FROM clients";
                $result=$connection->query($sql);
                if(!$result){
                    die("Invalid Query:".$connection->error);
                }
                while($row = $result->fetch_assoc()){
                    echo"
                 <tr>
                    <td>$row[id]</td>
                    <td>$row[name]</td>
                    <td>$row[email]</td>
                    <td>$row[phone]</td>
                    <td>$row[address]</td>
                    <td>
                     <a class='btn btn-primary' href='/crud/edit.php?id=$row[id]'>Edit</a>
                     <a class='btn btn-danger btn-sm' href='/crud/delete.php?id=$row[id]'>Delete</a>
                   </td>
               </tr>
                ";
                }
            ?>

              
</tbody>
      </table>
  </div>
</body>
</html>






