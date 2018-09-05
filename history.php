<?php
require "db.php";

$names = "";
$amount = "";
$repayment_amount = "";
$customer_id = "";

if (isset($_GET["names"]))
{
    extract($_GET);

    $names = mysqli_real_escape_string($conn,$names);
    $amount = mysqli_real_escape_string($conn, $amount);
    $repayment_amount = mysqli_real_escape_string($conn, $repayment_amount);
    $date_repaid = date("Y-m-d");
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Loan History</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <h2 class="text-center">Loan history of <?=$names?></h2>
    <div class="row justify-content-center">
        <div class="col-sm-8">
            <table class="table table-primary">
                <thead>
                <tr>
                    <th>Names</th>
                    <th>Loan</th>
                    <th>Amount</th>
                    <th>Date Repaid</th>
                </tr>
                </thead>

                <tbody>
                <?php
                require "db.php";

                $sql = "SELECT customers.customer_id, customers.names, loans.amount, repayments.repayment_amount, repayments.date_repaid
                FROM customers INNER JOIN loans INNER JOIN repayments ON customers.customer_id = loans.customer_id = repayments.customer_id 
                where customers.customer_id = $customer_id";

                $result = mysqli_query($conn, $sql);

                while ($row=mysqli_fetch_assoc($result))
                {
                    extract($row);
                    echo "<tr>
                                        <td>$names</td>
                                        <td>$amount</td>
                                        <td>$repayment_amount</td>
                                        <td>$date_repaid</td>
                                    </tr>";
                }
                ?>
                </tbody>
            </table>

        </div>
    </div>
</div>
</body>
</html>
