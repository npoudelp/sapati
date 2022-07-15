<?php
session_start();
if (isset($_REQUEST['q'])) {
    $balance = $_REQUEST['q'];
    $bid = $_REQUEST['r'];
    $amount = $_REQUEST['s'];

    include_once("./dbConn.php");

    if ($balance == 0) {
        $sql1 = "UPDATE balance SET status = 'hide' WHERE bid = {$bid};";

        $result1 = mysqli_query($conn, $sql1);
        if ($result1) {
            $details = "balance no $bid cleared to 0";
            $date = date("d-m-Y");
            $time = date("h:i:sa");

            $log = "INSERT INTO logs (details, uid, date, time) VALUES ('{$details}', {$_SESSION['uid']}, '{$date}', '{$time}');";
            $insertLog = mysqli_query($conn, $log);

            header("location:../pages/profile.php");
        }
    } else {
        $sql = "UPDATE balance  SET balance = '{$balance}' WHERE bid={$bid};";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $details = "balance no: $bid paid $amount, remain $balance";
            $date = date("d-m-Y");
            $time = date("h:i:sa");

            $log = "INSERT INTO logs (details, uid, date, time) VALUES ('{$details}', {$_SESSION['uid']}, '{$date}', '{$time}');";
            $insertLog = mysqli_query($conn, $log);

            header("location:../pages/profile.php");
        }
    }
} else {
    header("location:../pages/profile.php");
}
