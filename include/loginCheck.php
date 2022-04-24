<?php

if (isset($_POST['submit'])) {

    $emailId = $_POST['emailId'];
    $password = $_POST['password'];

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
                if ($checkbox == 'set') {
                    
                    $ciphering = "AES-128-CTR";

                    $iv_length = openssl_cipher_iv_length($ciphering);
                    $options = 0;

                    $encryption_iv = '1234567891011121';

                    $encryption_key = "w3@r3ALLN3p@l1@nd5@patIII###!!123##l!!!@l";

                    // Use openssl_encrypt() function to encrypt the data
                    $encEmail = openssl_encrypt(
                        $row["email"],
                        $ciphering,
                        $encryption_key,
                        $options,
                        $encryption_iv
                    );
                    $encPasswd = openssl_encrypt(
                        $password,
                        $ciphering,
                        $encryption_key,
                        $options,
                        $encryption_iv
                    );






                    setcookie("email", $encEmail, time() + (86400 * 30), "/");
                    setcookie("password", $encPasswd, time() + (86400 * 30), "/");
                }
                if ($row['type'] == 'admin') {
                    header('location: ../pages/admin.php');
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
