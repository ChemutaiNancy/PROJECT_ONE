<?php
require '../db.php';//.. means getting out of the folder

//json format

header("Content-type:application/json");

$sql = "SELECT customers.customer_id, customers.names, customers.id_no, loans.amount, loans.total_repayment, loans.loan_id, loans.due_date 
                          FROM customers INNER JOIN loans ON customers.customer_id = loans.customer_id where loans.total_repayment > 0 and status = 'good'";

$result = mysqli_query($conn, $sql);

$data=[];

while ($row=mysqli_fetch_assoc($result))
{
   $data[]=$row;
}

echo json_encode($data);

//get request-getting data
//post request
//delete request
//put request(update)

//node.js
//asp
//python
//java

//api framework for php -slim api, laravel