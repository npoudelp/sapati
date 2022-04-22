<?php
session_start();
if ($_SESSION['logged'] != 'true') {
    header('location:../pages/login.php');
}
if (isset($_POST['submit'])) {
    $password = $_POST['password'];
    $passwordO = $_POST['passwordO'];
    $email = $_SESSION['emailId'];

    include_once("./dbConn.php");

    $check = "SELECT password AS P FROM users WHERE email='{$email}';";
    $result = mysqli_query($conn, $check);
    $row = mysqli_fetch_assoc($result);
    $hash = $row["P"];
    $passwordH = password_verify($passwordO, $hash);
    if($passwordH == 1){
        $passwordSet = password_hash($password, PASSWORD_DEFAULT);
        $sql = "UPDATE users SET password = '{$passwordSet}' WHERE email='{$email}';";
        $set = mysqli_query($conn, $sql);
        if($set){
            header("location:../pages/myAccount.php?success");
        }else{
            header("location:../pages/myAccount.php?failed_to_update_password");
        }        
    }else{
        header("location:../pages/myAccount.php?old_passowrd_not_matched");
    }

    mysqli_close($conn);
} else {
    header("location:../pages/myAccount.php?illigal");
}
