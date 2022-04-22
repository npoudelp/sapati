<?php
if(isset($_REQUEST['q'])){
    $email = $_REQUEST['q'];

    include_once('./dbConn.php');
    $sqlCheck = "SELECT email FROM connectedEmails WHERE email = '{$email}';";
    $check = mysqli_query($conn, $sqlCheck);

    if(mysqli_num_rows($check) > 0){
        echo "You have already connected with us. Thank You";
    }else{
        $sql = "INSERT INTO connectedEmails (email) VALUES ('{$email}');";
        $result = mysqli_query($conn, $sql);
        if($result){
            echo "Thank you for supporting us";
        }else{
            echo "Failed to subscribe.";
        }
    }
}