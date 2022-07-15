<?php
if (isset($_POST['submit'])) {
    session_start();
    $aid = $_POST['aid'];
    $balance = $_POST['balance'];
    $comments = $_POST['comments'];
    $date = $_POST['date'];
    $type = $_POST['type'];
    $status = "show";

    if ($type == '0' || $aid == '0') {
        header('location: ../pages/addCredits.php?empty_options');
    } else {
        
        include_once('./dbConn.php');
        $sql = "INSERT INTO balance (aid, balance, comments, bDate, type, status) VALUES ({$aid}, '{$balance}', '{$comments}', '{$date}', '{$type}', '{$status}');";
        $insert = mysqli_query($conn, $sql);
        
        if ($insert) {
            $details = "Transaction type $type for account no $aid amount $balance added";
            $date = date("d-m-Y");
            $time = date("h:i:sa");

            $log = "INSERT INTO logs (details, uid, date, time) VALUES ('{$details}', {$_SESSION['uid']}, '{$date}', '{$time}');";
            $insertLog = mysqli_query($conn, $log);

            header('location: ../pages/addCredits.php?credit_created_sucessfully');
        } else {
            header('location: ../pages/addCredits.php?error_adding_credit');
        }
        mysqli_close($conn);
    }
} else {
    header('location: ../pages/addCredits.php');
}
