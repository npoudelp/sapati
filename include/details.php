<?php
session_start();
if (isset($_REQUEST['q'])) {
    $aid = $_REQUEST['q'];
    $bid = $_REQUEST['r'];
    $type = $_REQUEST['s'];
    $total = 0;

    include_once("./dbConn.php");

    $sql = "SELECT sum(balance) AS sum, A.name FROM accounts AS A, balance AS B WHERE A.aid=B.aid AND B.aid={$aid} AND B.type='{$type}' AND B.status = 'show';";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $total = $row['sum'];

    // $sql1 = "SELECT comments FROM balance WHERE bid={$bid};";
    // $result1 = mysqli_query($conn, $sql1);
    // $row1 = mysqli_fetch_assoc($result1);
    // $comments = $row1['comments'];

    echo 'Total for '. $row['name'] .': ' . $total;
} else {
    header("location:../pages/profile.php");
}