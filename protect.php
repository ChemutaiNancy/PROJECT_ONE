

<?php
//protect other files from unauthorized access

SESSION_start();

if (!isset($_SESSION["names"]))
{
  header("location:login.php");
}