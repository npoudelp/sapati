<?php
session_start();
if ($_SESSION['logged'] != 'true') {
    header('location:../pages/login.php');
}
if (isset($_POST['submit'])) {
    $aid = $_POST['aid'];


    include_once("./dbConn.php");

    $sql = "DELETE FROM balance WHERE balance.aid={$aid};";
    $sql1 = "DELETE FROM accounts WHERE accounts.aid={$aid};";

    $result = mysqli_query($conn, $sql);
    $result1 = mysqli_query($conn, $sql1);
    if ($result && $result1) {
        $details = "account id $aid deleted";
        $date = date("d-m-Y");
        $time = date("h:i:sa");

        $log = "INSERT INTO logs (details, uid, date, time) VALUES ('{$details}', {$_SESSION['uid']}, '{$date}', '{$time}');";
        $insertLog = mysqli_query($conn, $log);

        header("location: ../pages/myAccount.php?success_delete");
    } else {
        header("location: ../pages/myAccount.php?failed_delete");
    }
    mysqli_close($conn);
} else {
    header("location:../pages/myAccount.php?illigal");
}
