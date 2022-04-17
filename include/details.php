<?php
session_start();
if (isset($_REQUEST['q'])) {
    $aid = $_REQUEST['q'];
    $bid = $_REQUEST['r'];
    $total = 0;

    include_once("./dbConn.php");

    $sql = "SELECT sum(balance) AS sum FROM accounts AS A, balance AS B WHERE A.aid=B.aid AND B.aid={$aid};";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $total = $row['sum'];

    // $sql1 = "SELECT comments FROM balance WHERE bid={$bid};";
    // $result1 = mysqli_query($conn, $sql1);
    // $row1 = mysqli_fetch_assoc($result1);
    // $comments = $row1['comments'];

    echo 'Total: ' . $total;
} else {
    header("location:../pages/profile.php");
}