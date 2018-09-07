<?php

    require "protect.php";
    require "db.php";

    $message = "";

  if (isset($_POST["names"])){
      extract($_POST);

      //clean form inputs-encodes special characters such as semi-colon

      $customer_name = mysqli_real_escape_string($conn, $names);
      $id_no = mysqli_real_escape_string($conn, $id_no);
      $phone_no = mysqli_real_escape_string($conn, $phone_no);

      $sql = "insert into customers values (null, '$names', '$id_no', '$phone_no')";

      /*echo $sql;

      die();*/

      $result = mysqli_query($conn, $sql);// or die(mysqli_error($conn));//checks if the record exists

      if (!$result){
          $message = "The customer already exists";//not true
      } else{
          $message = "Customer registered";
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
    <title>Customer Details</title>
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
        <h2 class="text-center">Customer Details</h2>
        <div class="row justify-content-center">
            <div class="col-sm-6">
                <form action="customer.php" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Customer Name" name="names">
                    </div>

                    <div class="form-group">
                        <input type="number" class="form-control" placeholder="ID Number" name="id_no">
                    </div>

                    <div class="form-group">
                        <input type="phone" class="form-control" placeholder="Phone Number" name="phone_no">
                    </div>

                        <button type="submit" class="btn btn-success btn-sm">Submit</button>

                        <p> <?=$message?></p>
                </form>
            </div>
        </div>
    </div>

</body>
</html>