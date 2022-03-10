<?php

if (isset($_POST['submit'])) {

    $emailId = $_POST['emailId'];
    $password = $_POST['password'];

    include_once('./dbConn.php');
    $sql = "SELECT * FROM loginData WHERE emailId = '" . $emailId . "';";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $hash = $row["password"];
            $passwordH = password_verify($password, $hash);
            if ($row["emailId"] == $emailId && $passwordH == 1) {
                //echo $row["password"]."<br>".$passwordH;
                header('location: ../pages/profile.php');
                session_start();
                $_SESSION["emailId"] = $row["emailId"];
                $_SESSION["userName"] = $row["userName"];
            }
            else{
                header('location: ../pages/login.php?password_not_matched');
            }
        }
    } else {
        header('location: ../pages/login.php?emailx_not_matched');
    }

    mysqli_close($conn);
} else {
    header('location: ../pages/login.php');
}
