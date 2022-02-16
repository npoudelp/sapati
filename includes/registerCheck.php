<?php
if (isset($_POST['submit'])) {
    $userName = $_POST['userName'];
    $emailId = $_POST['emailId'];
    $password = $_POST['password'];
    $passwordR = $_POST['passwordR'];

    include_once('./function.php');

    if (matchPassword($password, $passwordR) !== false) {
        include_once('./dbConn.php');

        $sql = "INSERT INTO loginData value ('" . $userName . "', '" . $emailId . "', '" . $password . "');";
        $sqlCheck = "SELECT emailId FROM loginData WHERE emailId = '" . $emailId . "';";
        $chaeckEmail = mysqli_query($conn, $sqlCheck);
        if ($chaeckEmail) {
            header('location: ../pages/register.php?email_already_exists');
        }
        $insert = mysqli_query($conn, $sql);
        if ($insert) {
            header('location: ../pages/login.php?user_created_:)');
        }

        mysqli_close($conn);
    } else {
        header('location: ../pages/register.php?error_message=password_not_matched');
        exit();
    }
} else {
    header('location: ../pages/register.php');
}
