<?php

require "db.php";
require "protect.php";
require "admin_protector.php";

$message = "";

if (isset($_POST["names"])){
    extract($_POST);

    //clean form inputs-encodes special characters such as semi-colon

    $names = mysqli_real_escape_string($conn, $names);
    $email = mysqli_real_escape_string($conn, $email);
    $password = mysqli_real_escape_string($conn, $password);

    $hashed = password_hash($password, PASSWORD_BCRYPT);

    $sql = "insert into users values (null, '$names', '$email', '$hashed', 1)";

    /*echo $sql;

    die();*/

    $result = mysqli_query($conn, $sql);// or die(mysqli_error($conn));//checks if the record exists

    if (!$result){
        $message = "The user already exists";//not true
    } else{
        $message = "User registered";
    }
}

//header("location:login.php");
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body>


<?php
include "nav.php";
?>

<div class="container">
    <h2 class="text-center">New User Registration</h2>
    <div class="row justify-content-center">
        <div class="col-sm-6">
            <form action="register.php" method="post">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Customer Name" name="names">
                </div>

                <div class="form-group">
                    <input type="email" class="form-control" placeholder="Email" name="email">
                </div>

                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password" name="password">
                </div>

                <button type="submit" class="btn btn-success btn-sm">Register</button>

                <p> <?=$message?></p>
            </form>
        </div>
    </div>
</div>

</body>
</html>