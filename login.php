<?php
require "db.php";

if (isset($_POST["email"]))
{

    extract($_POST);

$email = mysqli_real_escape_string($conn, $email);
$form_password = mysqli_real_escape_string($conn, $upassword);

    $sql = "select * from users where email = '$email'";

    $result = mysqli_query($conn, $sql);// or die(mysqli_error($conn));

  //echo mysqli_num_rows($result);

    if (mysqli_num_rows($result) == 1)//counts number of rows
    {

        $row = mysqli_fetch_assoc($result);


        extract($row);

    /*    var_dump(password_verify($form_password, $password));
        die();*/

        if (password_verify($form_password, $password))
        {
            //session

            session_start();
            $_SESSION["names"] = $names;
            $_SESSION["user_id"] = $user_id;

            header("location:customer.php");
        }
        else
        {
            $message = "Wrong username or Passord";
//            echo "password mismatch";
        }

    } else {

       $message = "Wrong username or password";

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
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

    <style>
        body{
            background-color: aquamarine;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-4">
            <h2 class="text-center">Sign In</h2>
            <form action="login.php" method="post">

                <div class="form-group">
                    <input type="email" class="form-control" placeholder="Email" name="email">
                </div>

                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password" name="upassword">
                </div>

                <button type="submit" class="btn btn-primary btn-sm">Sign Up</button>

                <a href="register.php" type="submit" class="btn btn-primary btn-sm">Register</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>