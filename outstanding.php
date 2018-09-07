<?php
require "protect.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Outstanding Loan</title>
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
    <h2 class="text-center">Outstanding Loans</h2>
    <div class="row">
        <div class="col-sm-12">
            <table class="table table-primary">
                <thead>
                <tr>
                    <th>Names</th>
                    <th>National ID</th>
                    <th>Amount</th>
                    <th>Outstanding amount</th>
                    <th>Due Date</th>
                    <th>Repay</th>
                    <th>Payment History</th>
                </tr>
                </thead>

                <tbody>
                <?php
                require "db.php";

                $sql = "SELECT customers.customer_id, customers.names, customers.id_no, loans.amount, loans.total_repayment, loans.loan_id, loans.due_date 
                          FROM customers INNER JOIN loans ON customers.customer_id = loans.customer_id where loans.total_repayment > 0 and status = 'good'";

                $result = mysqli_query($conn, $sql);

                while ($row=mysqli_fetch_assoc($result))
                {
                    extract($row);
                    echo "<tr>
                                        <td>$names</td>
                                        <td>$id_no</td>
                                        <td>$amount</td>
                                        <td>$total_repayment</td>
                                        <td>$due_date</td>
                                        <td><a href='repay.php?customer_id=$customer_id&names=$names&amount=$amount&outstanding=$total_repayment&loan_id=$loan_id' class='btn btn-info btn-sm'>Repay loan</a></td>
                                        <td><a href='history.php?customer_id=$customer_id&names=$names&amount=$amount&outstanding=$total_repayment&loan_id=$loan_id' class='btn btn-success btn-sm'>Payment History</a></td>
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
