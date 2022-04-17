<?php
session_start();
if (isset($_REQUEST['q'])) {
    $balance = $_REQUEST['q'];
    $bid = $_REQUEST['r'];

    include_once("./dbConn.php");

    if($balance == 0){
        $sql1 = "DELETE FROM balance WHERE bid={$bid};";
        $result1 = mysqli_query($conn, $sql1);
        if($result1){
            header("location:../pages/profile.php");
        }
    }

    $sql = "UPDATE balance  SET balance = '{$balance}' WHERE bid={$bid};";
    $result = mysqli_query($conn, $sql);
    if($result){
        header("location:../pages/profile.php");
    }


} else {
    header("location:../pages/profile.php");
}