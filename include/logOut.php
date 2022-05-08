<?php
if (isset($_REQUEST['q'])) {
    session_start();
    include_once('./dbConn.php');
    $details = "logged out by user no " . $_SESSION['uid'];
    $date = date("d-m-Y");
    $time = date("h:i:sa");

    $log = "INSERT INTO logs (details, uid, date, time) VALUES ('{$details}', {$_SESSION['uid']}, '{$date}', '{$time}');";
    $insertLog = mysqli_query($conn, $log);

    session_destroy();
    header("location:../index.php");
} else {
    header("location:../pages/login.php");
}
