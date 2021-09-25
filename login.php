<?php
session_start();

if (isset($_SESSION['user_id'])) {
    header('Location:index.php');
    exit;
}

require_once('includes/connection.php');

if (isset($_POST['login'])) {
    $email_or_name   =  $_POST['email_or_name'];
    $password        = $_POST['password'];

    if (empty($email_or_name)) {
        $nameError = 'Please Enter your email or name';
    }

    if (empty($password)) {
        $passwordError = 'Please Enter your password';
    }


    //check if empty
    if(!empty($email_or_name) && (!empty($password))) {
        //select records from db

        $query  = "SELECT * FROM users WHERE email='$email_or_name' AND password='$password' OR username ='$email_or_name' AND password='$password' ";

        $result = mysqli_query($conn, $query);

        $row = mysqli_fetch_assoc($result);
        //check if user already exists in db

        if (mysqli_num_rows($result) > 0) {
            $_SESSION['user_id'] = $row['id'];
            header("Location:index.php");

        }else{
            $email_or_nameError = "Invalid credentials";
        }
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
    <title>Login Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<div class="container my-5">
    <div class="card">

        <div class="card-header">
            <h1>Login</h1>
        </div>

        <div class="card-body">
            <div class="error text-danger text-right">
                <?php if (isset($email_or_nameError)) echo $email_or_nameError ?>
            </div>

            <form action="<?php echo htmlspecialchars(($_SERVER["PHP_SELF"]));?>" method="POST" id="login_form">
                <div class="form-group row">
                    <label class="col-lg-5 col-md-5 col-sm-12 label-control" for="email_or_name">Email/Username</label>
                    <div class="col-lg-7 col-md-7 col-sm-12 col-12">
                        <input type="text" class="form-control" name="email_or_name" placeholder="email or name" value="<?php if (isset($email_or_name)) echo $email_or_name ?>">
                        <span class="error text-danger"><?php if (isset($nameError)) echo $nameError ?></span><br>
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
                    <label class="col-md-3 label-control" for="register">Dont have an account ?
                        <a class="" href="register.php">
                            Register
                        </a>
                    </label>
                </div>

                <button class="btn btn-outline-primary" type="submit" name="login">Login</button>
            </form>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>

