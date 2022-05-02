<?php
session_start();
if (isset($_REQUEST['q'])) {
    $email = $_REQUEST['q'];
    include_once('./dbConn.php');
    $sql = "SELECT email FROM users WHERE email='{$email}';";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $_SESSION['email'] = $email;
        $otp = rand(100000, 999999);
        $_SESSION['otp'] = $otp;
        $message = "This OTP will be valid for single session only. Your OTP : " . $otp;
        $header = "From: sapati.help@gmail.com" . "\r\n"; 
        mail($email, "OTP for password reset", $message, $header);
        echo '0';
    } else {
        echo "1";
    }
} else if (isset($_REQUEST['o'])) {
    $otp1 = $_REQUEST['o'];
    if ($otp1 != $_SESSION['otp']) {
        echo '0';
    } else {
        $_SESSION['uotp'] = $otp1;
        echo '1';
    }
} else {
    header('location:../pages/login.php?illegal');
}
