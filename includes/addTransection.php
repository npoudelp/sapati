<?php
if (isset($_POST['add'])) {
    session_start();
    $emailId = $_SESSION['emailId'];
    $toGive = $_POST['toGive'];
    $toReceive = $_POST['toReceive'];
    $transectionDate = date("Y") . "-" . date("m") . "-" . date("d");
    $day = $_POST['day'];
    $month = $_POST['month'];
    $year = $_POST['year'];
    $dueDate = $year . "-" . $month . "-" . $day;
    $comment = $_POST['comment'];
    $rate = $_POST['rate'];
    $friend = $_POST['friend'];
    $expired = 0;
    //echo $friend." ".$emailId." ".$toReceive." ".$toGive." ".$transectionDate." ".$dueDate." ".$comment." ".$rate;
    include_once('./dbConn.php');
    $sql = "INSERT INTO account (emailId, toGive, toReceive, transectionDate, dueDate, comment, rate, friend, expired) value ('" . $emailId . "', " . $toGive . ", " . $toReceive . ", '" . $transectionDate . "', '" . $dueDate . "', '" . $comment . "', " . $rate . ", '" . $friend . "', " . $expired . ");";
    $insert = mysqli_query($conn, $sql);
    if ($insert) {
        header('location: ../pages/accounts.php?friend_added_sucessfully');
    }
    if (!$insert) {
        header('location: ../pages/addAccounts.php?error_adding_friend)');
    }



    mysqli_close($conn);
} else {
    header('location: ../pages/addFriends.php');
}
