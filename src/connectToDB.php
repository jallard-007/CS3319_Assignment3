<!-- Programmer Code: 41 -->

<?php
$DBHost = "localhost";
$DBUser = "root";
$DBPass = "cs3319";
$DBname = "assign2db";
$connection = mysqli_connect($DBHost, $DBUser, $DBPass, $DBname);
if (mysqli_connect_errno()) {
  die("Database connection failed:" . mysqli_connect_error() . "(" .
    mysqli_connect_errno());
}
?>