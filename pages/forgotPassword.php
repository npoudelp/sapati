<?php

?>

<html lang="en">

<head>
    <link rel="shortcut icon" href="../images/icon.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="../images/icon.ico" type="image/x-icon" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>udharo</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/main.css">
    <script src="../js/jQuery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</head>

<body>
    <!-- navbar starts here -->
    <div class="nav navbar navbar-expand-lg bg-dark navbar-dark py-3">
        <div class="container">
            <a href="../index.php" class="navbar-brand"><img src="../images/logo.png" width="100%" height="100%" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navlink">
                <i class="bi bi-grid-3x3-gap"></i>
            </button>
            <div class="container collapse navbar-collapse justify-content-center" id="navlink">
                <div class="d-lg-flex">
                    <div class="container">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- navbar ends here -->

    <!-- reset form starts here -->
    <section class="p-5 text-center">
        <div class="container shadow-lg">
            <div class="text-center container p-3 lead">
                <div class="row" id="resetPannel">
                    <span class="small" id="display1"> </span><br>
                    <span class="lead" id="emailPlace">Your Email:
                        <input type="email" class="form-control-sm" id="email">
                        <span></span>
                        <button class="btn btn-outline-warning" onclick="emailCheck()">Send</button>
                    </span><br>
                    <span class="lead" id="otpPlace">OTP :
                        <input type="text" class="form-control-sm" id="otp">
                        <button class="btn btn-outline-warning" onclick="otpCheck()">Check</button>
                    </span>
                </div>
                <div class="row">

                </div>
            </div>
        </div>
    </section>

    <!-- reset form ends here -->




    <!-- misc section -->
    <section class="p-1 bg-warning">
        <div class="container text-dark text-center">
            <span class="h1 lead fw-bold text-dark">
                <?php $year = date("F");
                $month = date("jS");
                $day = date("Y");
                echo $year . " " . $month . " " . $day;
                ?>
                <?php $year = date("l");
                echo $year;
                ?>
        </div>
    </section>
    <!-- misc ends -->

    <!-- footer starts here -->
    <?php
    include_once('../include/footer.php');
    ?>

    <script>
        $("#otpPlace").prop('disabled', true);
        emailCheck = () => {
            let email = $("#email").val();
            $.ajax({
                url: '../include/forgetPasswd.php?q=' + email,
                type: 'get',
                success: (respond) => {
                    if (respond == 0) {
                        $("#display1").css("color", "green");
                        $("#display1").text("Enter the reset code sent in your email, you may also check your spam and junk folder");


                    } else {
                        $("#display1").css("color", "red");
                        $("#display1").text("Your account does not exists...");
                    }
                }
            });
        }

        otpCheck = () => {
            let otp = $("#otp").val();
            $.ajax({
                url: '../include/forgetPasswd.php?o=' + otp,
                type: 'get',
                success: (respond) => {
                    if (respond == '1') {
                        $("#display1").css("color", "green");
                        $("#display1").text("OTP matched, wait...");
                        setTimeout(()=>{
                            window.location.href = "./resetPasswd.php";
                        }, 2000);

                    }
                    if (respond == '0') {
                        $("#display1").css("color", "red");
                        $("#display1").text("OTP does not match");
                    }
                }
            });
        }
    </script>

</body>

</html>