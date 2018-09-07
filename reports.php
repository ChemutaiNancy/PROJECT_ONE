<?php
require "protect.php";
require "db.php";

//counting users
$users_sql = "select count(names) as users from users";
$result_users = mysqli_query($conn, $users_sql);
$row_users = mysqli_fetch_assoc($result_users);
extract($row_users);

//counting customers
$customers_sql = "select count(names) as customers from customers";
$result_customers = mysqli_query($conn, $customers_sql);
$row_customers = mysqli_fetch_assoc($result_customers);
extract($row_customers);

//amount of outstanding loans
$outstanding_sql = "select sum(total_repayment) as outstanding from loans";
$result_outstanding = mysqli_query($conn, $outstanding_sql);
$row_outstanding = mysqli_fetch_assoc($result_outstanding);
extract($row_outstanding);

//bad loans
$bad_loan_sql = "select sum(total_repayment) as bad_loans from loans where status = 'bad'";
$result_bad_loan = mysqli_query($conn, $bad_loan_sql);
$row_bad_loan = mysqli_fetch_assoc($result_bad_loan);
extract($row_bad_loan);

//total repayments
$total_repayments_sql = "select sum(repayment_amount) as total_repayments from repayments";
$result_total_repayments = mysqli_query($conn, $total_repayments_sql);
$row_total_repayments = mysqli_fetch_assoc($result_total_repayments);
extract($row_total_repayments);

//total issued loans
$total_issued_loans_sql = "select sum(amount) as total_issued_loans from loans";
$result_total_issued_loans = mysqli_query($conn, $total_issued_loans_sql);
$row_total_issued_loans = mysqli_fetch_assoc($result_total_issued_loans);
extract($row_total_issued_loans);

?>



<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reports</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">



</head>
<body>

<?php
include "nav.php";
?>

<div class="container">
    <h2 class="text-center">Reports</h2>
    <div class="row">
        <div class="col-sm-4">
            <div class="card bg-secondary">
                <div class="card-header">
                    <h2 class="text-center">Users</h2>
                </div>

                <div class="card-body">
                    <h1 class="text-center counter"><?=$users?></h1>
                </div>

                <div class="card-footer">
                    <p class="text-center">Number of users in the system</p>
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="card bg-primary">
                <div class="card-header">
                    <h2 class="text-center">Customers</h2>
                </div>

                <div class="card-body">
                    <h1 class="text-center counter"><?=$customers?></h1>
                </div>

                <div class="card-footer">
                    <p class="text-center">Number of customers in the system</p>
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="card bg-success">
                <div class="card-header">
                    <h2 class="text-center">outstanding Loans</h2>
                </div>

                <div class="card-body">
                    <h1 class="text-center counter"><?=$outstanding?></h1>
                </div>

                <div class="card-footer">
                    <p class="text-center">Amount of outstanding loans in the system</p>
                </div>
            </div>
        </div>
    </div>

    <br>

        <div class="row">
            <div class="col-sm-4">
                <div class="card bg-info">
                    <div class="card-header">
                        <h2 class="text-center">Bad Loans</h2>
                    </div>

                    <div class="card-body">
                        <h1 class="text-center counter"><?=$bad_loans?></h1>
                    </div>

                    <div class="card-footer">
                        <p class="text-center">Amount of bad loans in the system</p>
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="card bg-danger">
                    <div class="card-header">
                        <h2 class="text-center">Total Repayments</h2>
                    </div>

                    <div class="card-body">
                        <h1 class="text-center counter"><?=$total_repayments?></h1>
                    </div>

                    <div class="card-footer">
                        <p class="text-center">Amount of total repayments in the system</p>
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="card bg-warning">
                    <div class="card-header">
                        <h2 class="text-center">Total Issued Loans</h2>
                    </div>

                    <div class="card-body">
                        <h1 class="text-center counter"><?=$total_issued_loans?></h1>
                    </div>

                    <div class="card-footer">
                        <p class="text-center">Amount of total issued loans in the system</p>
                    </div>
                </div>
            </div>
        </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
<script src="js/jquery.counterup.min.js"></script>

<script>
    jQuery(document).ready(function($) {
        $('.counter').counterUp({
            delay: 10,
            time: 1000
        });
    });
</script>
</body>
</html>
