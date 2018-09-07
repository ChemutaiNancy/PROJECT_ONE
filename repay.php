
<?php
require "protect.php";
require "db.php";

$names = "";
$message = "";

if (isset($_GET["names"]))
{
    extract($_GET);
}

if (isset($_POST["amount"]))
{

    extract($_POST);

    $amount = mysqli_real_escape_string($conn,$amount);
    $customer_id = mysqli_real_escape_string($conn, $customer_id);
    $loan_id = mysqli_real_escape_string($conn, $loan_id);
    $date_repaid = date("Y-m-d");

    $sql = "update loans set total_repayment = total_repayment - $amount where loan_id = $loan_id";

    $sql2 = "INSERT INTO `repayments`(`repayment_id`, `customer_id`, `repayment_amount`, `date_repaid`, `loan_id`) 
              VALUES (null,$customer_id,$amount,'$date_repaid',$loan_id)";

    mysqli_query($conn, $sql);

    mysqli_query($conn, $sql2);// or die(mysqli_error($conn));

//    echo $sql;
//
//    echo "<br>";
//
//    echo $sql2;
//
//    die();

    header("location:outstanding.php");
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Repay a loan</title>
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
    <div class="row justify-content-center">
        <div class="col-sm-4">
            <h2 class="text-center">Customer name is <?=$names?></h2>
            <p>Loan borrowed is <?=$amount?></p>
            <p>Outstanding balance is <?=$outstanding?></p>
            <form action="repay.php" method="post">

                <input type="hidden" name="customer_id" value="<?=$customer_id?>">
                <input type="hidden" name="loan_id" value="<?=$loan_id?>">

                <div class="form-group">
                    <input type="number" class="form-control" placeholder="Amount" name="amount">
                </div>

                <button type="submit" class="btn btn-info btn-sm">Repay</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>