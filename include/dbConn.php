<?php

$dbUrl = "127.0.0.1";
$dbUser = "root";
$dbPassword = "root";
$dbName = "udharo";

$conn = mysqli_connect($dbUrl, $dbUser, $dbPassword, $dbName);
if (!$conn) {
    die("Unable to connect to database " . mysqli_connect_error());
    header('location: ../index.php?error_on_connecting_to_database');
}
