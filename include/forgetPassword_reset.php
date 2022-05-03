<?php
session_start();
if ($_SESSION['uotp'] && $_SESSION['email']) {
    if (isset($_POST['submit'])) {
        $passwordR = $_POST['passwordR'];
        $password = $_POST['password'];
        $email = $_SESSION['emailId'];

        if ($password != $passwordR) {
            header("location:../pages/myAccount.php?password_not_match");
        } else {
            include_once("./dbConn.php");
            $passwordSet = password_hash($password, PASSWORD_DEFAULT);
            $sql = "UPDATE users SET password = '{$passwordSet}' WHERE email='{$email}';";
            $set = mysqli_query($conn, $sql);
            if ($set) {
                header("location:../pages/login.php?reset_ok");
                session_destroy();
            } else {
                header("location:../pages/login.php?failed_to_update_password");
                session_destroy();
            }
            mysqli_close($conn);
        }
    }
} else {
    header("location:../pages/login.php?illegal");
}
