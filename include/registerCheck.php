<?php
if (isset($_POST['submit'])) {
    $userName = $_POST['userName'];
    $emailId = $_POST['emailId'];
    $password = $_POST['password'];
    $passwordR = $_POST['passwordR'];
    $passwordH = password_hash($password, PASSWORD_DEFAULT);
    $type = 'users';

    include_once('./function.php');

    if (matchPassword($password, $passwordR) !== false) {
        include_once('./dbConn.php');

        $sql = "INSERT INTO users (name, email, password, type) values ('{$userName}', '{$emailId}', '{$passwordH}', '{$type}');";
        $sqlCheck = "SELECT email FROM users, type WHERE email = '{$emailId}';";
        $chaeckEmail = mysqli_query($conn, $sqlCheck);
        if (mysqli_num_rows($chaeckEmail) > 0) {
            header('location: ../pages/register.php?email_already_exists');
        } else {
            $insert = mysqli_query($conn, $sql);
            if ($insert) {
                header('location: ../pages/register.php?user_created');
            } else {
                echo 'Error creating user';
            }
        }

        mysqli_close($conn);
    } else {
        header('location: ../pages/register.php?password_not_matched');
        exit();
    }
} else if (isset($_POST['submitAdmin'])) {
    $userName = $_POST['userName'];
    $emailId = $_POST['emailId'];
    $password = $_POST['password'];
    $passwordR = $_POST['passwordR'];
    $passwordH = password_hash($password, PASSWORD_DEFAULT);
    $type = 'admin';

    include_once('./function.php');

    if (matchPassword($password, $passwordR) !== false) {
        include_once('./dbConn.php');

        $sql = "INSERT INTO users (name, email, password, type) values ('{$userName}', '{$emailId}', '{$passwordH}', '{$type}');";
        $sqlCheck = "SELECT email, type FROM users WHERE email = '{$emailId}';";
        $chaeckEmail = mysqli_query($conn, $sqlCheck);
        if (mysqli_num_rows($chaeckEmail) > 0) {
            header('location: ../pages/admin.php?email_already_exists');
        } else {
            $insert = mysqli_query($conn, $sql);
            if ($insert) {
                header('location: ../pages/admin.php?user_created');
            } else {
                echo 'Error creating user';
            }
        }

        mysqli_close($conn);
    } else {
        header('location: ../pages/admin.php?password_not_matched');
        exit();
    }
} else {
    header('location: ../pages/register.php');
}
