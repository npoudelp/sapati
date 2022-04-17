<?php
if (isset($_POST['submit'])) {
    session_start();
    $aid = $_POST['aid'];
    $balance = $_POST['balance'];
    $comments = $_POST['comments'];
    

    include_once('./dbConn.php');

    $sql = "INSERT INTO balance (aid, balance, comments) VALUES ({$aid}, '{$balance}', '{$comments}');";
    $insert = mysqli_query($conn, $sql);
    if ($insert) {
        header('location: ../pages/addCredits.php?account_created_sucessfully');
    } else {
        header('location: ../pages/addCredits.php?error_adding_account)');
        
        mysqli_close($conn);
    }
} else {
    header('location: ../pages/addFriends.php');
}
