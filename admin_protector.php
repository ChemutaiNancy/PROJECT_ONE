

<?php
//protect other files from unauthorized access

if($_SESSION["type"]!=2)
{
    header("location:customer.php");
}