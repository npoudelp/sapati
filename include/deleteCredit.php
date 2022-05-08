<?php
if (isset($_REQUEST['q'])) {
    session_start();
    $bid = $_REQUEST['q'];

    include_once("./dbConn.php");

    $sql = "UPDATE balance SET status = 'hide' WHERE bid = {$bid};";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        $details = "balance id $bid deleted";
        $date = date("d-m-Y");
        $time = date("h:i:sa");

        $log = "INSERT INTO logs (details, uid, date, time) VALUES ('{$details}', {$_SESSION['uid']}, '{$date}', '{$time}');";
        $insertLog = mysqli_query($conn, $log);

        header("location: ../pages/profile.php");
    } else {
        echo "Error deleting account";
    }
} else {
    header("location:../pages/profile.php");
}
