<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous" defer></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    
    <title>PHP CRUD</title>
</head>
<body>
    <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #00ff5573">
        PHP CRUD Application
    </nav>

    <div class="container">
        <?php
        if(isset($_GET['msg'])){
            $msg = $_GET['msg'];
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            '.$msg.'
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
        ?>
        <a href="create.php" class="btn btn-dark mb-3">Add New</a>

            <table class="table table-hover text-center">
                <thead class="table-dark">
                    <tr>
                        <td scope="col">ID</td>
                        <td scope="col">First Name</td>
                        <td scope="col">Last Name</td>
                        <td scope="col">Email</td>
                        <td scope="col">Gender</td>
                        <td scope="col">Action</td>
                    </tr>
                </thead>
                <tbody>
                    
                    <?php
                    include "db_conn.php";
                        $sql = "SELECT * FROM 'crud'";
                        $result = mysqli_query($conn, $sql);
                        while($row = mysqli_fetch_assoc($result)){
                            ?>
                                <tr>
                                    <th> <?php echo $row['id']?></th>
                                    <th> <?php echo $row['first_name']?></th>
                                    <th> <?php echo $row['last_name']?></th>
                                    <th> <?php echo $row['email']?></th>
                                    <th> <?php echo $row['gender']?></th>

                                    <td>
                                        <a href="edit.php?id=<?php echo $row['id'] ?>" class="link-dark"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
                                        <a href="delete.php?id=<?php echo $row['id'] ?>" class="link-dark"><i class="fa-solid fa-trash fs-5"></i></a>
                                    </td>
                                </tr>
                            <?php
                        }
                    ?>
                    
                    
                </tbody>
            </table>
    </div>
    
</body>
</html>