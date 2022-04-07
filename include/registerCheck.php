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
        $sqlCheck = "SELECT email FROM users WHERE email = '{$emailId}';";
        $chaeckEmail = mysqli_query($conn, $sqlCheck);
        if (mysqli_num_rows($chaeckEmail) > 0) {
            header('location: ../pages/register.php?email_already_exists');
        } else {
            $insert = mysqli_query($conn, $sql);
            if ($insert) {
                header('location: ../pages/login.php?user_created_:)');
            }else{
                echo 'Error creating user';
            }
        }   

        mysqli_close($conn);
    } else {
        header('location: ../pages/register.php?error_message=password_not_matched');
        exit();
    }
} else {
    header('location: ../pages/register.php');
}
