

<?php
//protect other files from unauthorized access

session_start();

if (!isset($_SESSION["names"]))
{
  header("location:login.php");
}