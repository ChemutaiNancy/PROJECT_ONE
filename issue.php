
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Issue Loan</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <h2 class="text-center">Issuance of Loan</h2>
        <div class="row">
            <div class="col-sm-12">
                <table class="table table-primary">
                    <thead>
                        <tr>
                            <th>National ID</th>
                            <th>Names</th>
                            <th>Phone No</th>
                            <th>Issue</th>
                            <th>Payment History</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                            require "db.php";

                            $sql = "select * from customers";

                            $result = mysqli_query($conn, $sql);

                            while ($row=mysqli_fetch_assoc($result))
                            {
                                extract($row);
                                echo "<tr>
                                        <td>$id_no</td>
                                        <td>$names</td>
                                        <td>$phone_no</td>
                                        <td><a href='process.php?customer_id=$customer_id&names=$names' class='btn btn-dark btn-sm'>Issue Loan</a></td>
                                        <td><a href='history.php?customer_id=$customer_id&names=$names' class='btn btn-success btn-sm'>Payment History</a></td>
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
