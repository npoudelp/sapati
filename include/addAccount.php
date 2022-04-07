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
        header('location: ../pages/addAccounts.php?account_created_sucessfully');
    } else {
        header('location: ../pages/addAccounts.php?error_adding_account)');
        
        mysqli_close($conn);
    }
} else {
    header('location: ../pages/addFriends.php');
}
