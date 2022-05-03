<?php
session_start();
if (isset($_REQUEST['q'])) {
    $aid = $_REQUEST['q'];
    $bid = $_REQUEST['r'];
    $type = $_REQUEST['s'];
    $total = 0;

    include_once("./dbConn.php");

    $sql = "SELECT sum(balance) AS sum, A.name, B.type FROM accounts AS A, balance AS B WHERE A.aid=B.aid AND B.aid={$aid} AND B.type='{$type}' AND B.status='show';";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $total = $row['sum'];

    // $sql1 = "SELECT comments FROM balance WHERE bid={$bid};";
    // $result1 = mysqli_query($conn, $sql1);
    // $row1 = mysqli_fetch_assoc($result1);
    // $comments = $row1['comments'];

    if ($row['type'] == 'credit') {
        echo $total . ' to receive from ' . $row['name'] ;
    }
    if ($row['type'] == 'debit') {
        echo $total . ' to pay to ' . $row['name'] ;
    }
} else {
    header("location:../pages/profile.php");
}
