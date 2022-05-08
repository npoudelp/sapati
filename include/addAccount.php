<?php
if (isset($_POST['submit'])) {
    session_start();
    $uid = $_SESSION["uid"];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];

    include_once('./dbConn.php');

    $sql = "INSERT INTO accounts (uid, name, address, contact) VALUES ({$uid}, '{$name}', '{$address}', '{$contact}');";
    $insert = mysqli_query($conn, $sql);
    if ($insert) {
        $details = "client account for $name place $address added";
        $date = date("d-m-Y");
        $time = date("h:i:sa");

        $log = "INSERT INTO logs (details, uid, date, time) VALUES ('{$details}', {$_SESSION['uid']}, '{$date}', '{$time}');";
        $insertLog = mysqli_query($conn, $log);

        header('location: ../pages/addAccounts.php?account_created_sucessfully');
    } else {
        header('location: ../pages/addAccounts.php?error_adding_account)');

        mysqli_close($conn);
    }
} else {
    header('location: ../pages/addFriends.php');
}
