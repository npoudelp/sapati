<?php
if (isset($_POST['add'])) {
    session_start();
    $emailId = $_SESSION['emailId'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];

    include_once('./dbConn.php');

    $sql = "INSERT INTO friends (emailId, name, address, contact) value ('" . $emailId . "', '" . $name . "', '" . $address . "', '". $contact."');";
    $insert = mysqli_query($conn, $sql);
    if ($insert) {
        header('location: ../pages/addAccounts.php?friend_added_sucessfully');
    }else{
        header('location: ../pages/addFriends.php?error_adding_friend)');
    }



    mysqli_close($conn);
} else {
    header('location: ../pages/addAccounts.php');
}
  