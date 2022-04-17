<?php
if (isset($_POST['submit'])) {
    session_start();
    $aid = $_POST['aid'];
    $balance = $_POST['balance'];
    $comments = $_POST['comments'];
    $date = $_POST['date'];
    

    include_once('./dbConn.php');
    // $checkQuery = "SELECT B.aid from users AS U, accounts AS A, balance AS B WHERE U.uid=A.uid AND A.aid=B.aid AND B.aid = {$aid};";
    // $check = mysqli_query($conn, $checkQuery);
    // if(mysqli_num_rows($check) )
    




    $sql = "INSERT INTO balance (aid, balance, comments, bDate) VALUES ({$aid}, '{$balance}', '{$comments}', '{$date}');";
    $insert = mysqli_query($conn, $sql);
    if ($insert) {
        header('location: ../pages/addCredits.php?credit_created_sucessfully');
    } else {
        header('location: ../pages/addCredits.php?error_adding_credit');
        
        mysqli_close($conn);
    }
} else {
    header('location: ../pages/addFriends.php');
}
