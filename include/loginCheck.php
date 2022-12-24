<?php

if (isset($_POST['submit'])) {

    $details;

    $ipaddress = $_POST['ip'];

    $emailId = $_POST['emailId'];
    $address = $_POST['address'];
    $password = $_POST['password'];
    $checkbox = "";
    $checkbox = $_POST['checkbox'];

    include_once('./dbConn.php');
    $sql = "SELECT * FROM users WHERE email = '{$emailId}';";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $hash = $row["password"];
            $passwordH = password_verify($password, $hash);
            if ($row["email"] == $emailId && $passwordH == 1) {
                session_start();
                $_SESSION['logged'] = 'true';
                $_SESSION['uid'] = $row["uid"];
                $_SESSION["emailId"] = $row["email"];
                $_SESSION["userName"] = $row["name"];
                $_SESSION["type"] = $row["type"];
                
                $details = "Logged in with ip : " . $ipaddress;
                $date = date("d-m-Y");
                $time = date("h:i:sa");
                
                $log = "INSERT INTO logs (details, uid, date, time, address) VALUES ('{$details}', {$_SESSION['uid']}, '{$date}', '{$time}', '{$address}');";
                $insertLog = mysqli_query($conn, $log);
                
                if ($checkbox == 'set') {

                    setcookie("email", $row["email"], time() + (86400 * 30), "/");
                    setcookie("password", $password, time() + (86400 * 30), "/");
                }
                if ($row['type'] == 'admin') {
                    header('location: ../pages/adminPages/admin.php');
                } else {
                    header('location: ../pages/profile.php');
                }
            } else {
                header('location: ../pages/login.php?password_not_matched');
            }
        }
    } else {
        header('location: ../pages/login.php?email_not_matched');
    }

    mysqli_close($conn);
} else {
    header('location: ../pages/login.php');
}
