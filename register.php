<?php
session_start();

require_once('includes/connection.php');

if (isset($_SESSION['user_id'])) {
    header('Location:index.php');
    exit;
}

if (isset($_POST['register'])) {
    $username   =  $_POST['username'];
    $email      = $_POST['email'];
    $password   = $_POST['password'];

    if (empty($username)) {
        $nameError = 'Name should be filled';
    }
    if (empty($email)) {
        $emailError = 'Email should be filled';
    }
    if (empty($password)) {
        $passwordError = 'Password should be filled';
    }else {
        if (strlen($password) < 8) {
            $passwordError = 'Password must be at least 8 characters';
        }if (!preg_match('/^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{7,15}$/', $password)){
            $passwordError = 'Password must contain letters, numbers ';
        }
    }

    //check if empty
    if(!empty($email) && (!empty($password)) && (!empty($username))) {
        //insert records into db

        $sql = "INSERT INTO `users`(`username`,`email`,`password`,`created_at`,`updated_at`) VALUES ('$username','$email','$password',now(),now())";

        mysqli_query($conn, $sql);
        $_SESSION['user_id'] = $conn->insert_id;
        header("Location:index.php");
    }
}
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<div class="container my-5">
    <div class="container my-5">
        <div class="card">

            <div class="card-header">
                <h1>Register</h1>
            </div>

            <div class="card-body">
                <form action="<?php echo htmlspecialchars(($_SERVER["PHP_SELF"]));?>" method="POST" id="register_form">
                    <div class="form-group row">
                        <label class="col-lg-5 col-md-5 col-sm-12 label-control" for="username">user name:</label>
                        <div class="col-lg-7 col-md-7 col-sm-12 col-12">
                            <input type="text" class="form-control" name="username" placeholder="user name" value="<?php if (isset($username)) echo $username ?>">
                            <span class="error text-danger"><?php if (isset($nameError)) echo $nameError ?></span><br>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-5 col-md-5 col-sm-12 label-control" for="email">Email:</label>
                        <div class="col-lg-7 col-md-7 col-sm-12 col-12">
                            <input type="email" class="form-control" name="email" placeholder="Email" value="<?php if (isset($email)) echo $email ?>">
                            <span class="error text-danger"><?php if (isset($emailError)) echo $emailError ?></span><br>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-5 col-md-5 col-sm-12 label-control" for="password">Password:</label>
                        <div class="col-lg-7 col-md-7 col-sm-12 col-12">
                            <input type="password" class="form-control" name="password" placeholder="Password" value="<?php if (isset($password)) echo $password ?>">
                            <span class="error text-danger"><?php if (isset($passwordError)) echo $passwordError ?></span><br>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 label-control" for="login">Already have an account ?
                            <a class="" href="login.php">
                                Log In
                            </a>
                        </label>
                    </div>

                    <button class="btn btn-outline-primary" type="submit" name="register">Create an account</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>

