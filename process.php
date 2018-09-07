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

        $sql = "select * from loans where customer_id = $customer_id and total_repayment > 0";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0)//counts number of rows
        {
            $message = "Has outstanding loan";
        } else {

            //clean amount
            $amount = mysqli_real_escape_string($conn,$amount);
            $date_issued=date('Y-m-d');
            $d=strtotime("+3 months");
            $due_date=date('Y-m-d',$d);
            $total_repayment= $amount * 1.1;

            $sql="INSERT INTO `loans`(`customer_id`, `amount`, `date_issued`, `due_date`, `total_repayment`) 
                            VALUES ($customer_id, $amount,'$date_issued','$due_date','$total_repayment')";

            mysqli_query($conn, $sql);// or die(mysqli_error($conn));

            header("location:issue.php");

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
    <title>Process loan</title>
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
                <p class="text-center">Issue loan to <?=$names?></p>
                <form action="process.php" method="post">

                    <input type="hidden" name="customer_id" value="<?=$customer_id?>">

                    <div class="form-group">
                        <input type="number" class="form-control" placeholder="Amount" name="amount">
                    </div>

                    <button type="submit" class="btn btn-info btn-sm">Process</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>