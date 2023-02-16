<?php

include "db_conn.php";

$id = $_GET['id'];

if (isset($_POST['submit'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];

    $sql = "UPDATE `crud` SET `first_name`='$first_name',`last_name`='$last_name',`email`='$email', `gender`='$gender' WHERE id=$id";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: index.php?msg=Data updated successfully");
        exit;
    } else {
        echo "Failed: " . mysqli_error($conn);
    }
}

$sql = "SELECT * FROM `crud` WHERE id = $id LIMIT 1";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>PHP CRUD</title>
</head>
<body>
    <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #00ff5573">
        PHP CRUD Application
    </nav>

    <div class="container">
        <div class="text-center mb-4">
            <h3>Edit User Information</h3>
            <p class="text-muted">Click update button after changing any information</p>
        </div>

        <div class="container d-flex justify-content-center">
            <form action="" method="POST" style="width:50vw; min-width:300px;">
                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">First Name: </label>
                        <input type="text" class="form-control" name="first_name" value="<?= $row['first_name'] ?>" >
                    </div>
                    <div class="col">
                        <label class="form-label">Last Name: </label>
                        <input type="text" class="form-control" name="last_name" value="<?= $row['last_name'] ?>">
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Email: </label>
                    <input type="email" class="form-control" name="email" value="<?= $row['email'] ?>">
                </div>
                <div class="form-group mb-3">
                    <label>Gender: </label> &nbsp;
                    <input type="radio" class="form-check-input" name="gender" id="male" value="male" <?= ($row['gender'] == 'male') ? "checked" : "" ?>>
                    <label for="male" class="form-input-label">Male</label>
                    &nbsp;
                    <input type="radio" class="form-check-input" name="gender" id="female" value="female" <?= ($row['gender'] == 'female') ? "checked" : ""; ?>>
                    <label for="female" class="form-input-label">Female</label>
                </div>

                <div>
                    <button type="submit" class="btn btn-success" name="submit">Update</button>
                    <a href="index.php" class="btn btn-danger">Cancel</a>
                </div>

            </form>
        </div>
    </div>
    
</body>
</html>