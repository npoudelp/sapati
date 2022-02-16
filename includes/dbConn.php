<?php

$dbUrl = "localhost";
$dbUser = "root";
$dbPassword = "root";
$dbName = "sapati";

$conn = mysqli_connect($dbUrl, $dbUser, $dbPassword, $dbName);
if (!$conn) {
    die("Unable to connect to database " . mysqli_connect_error());
    header('location: ../index.php?error_on_creating_user');
}
