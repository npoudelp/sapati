<?php
session_start();
if (!$_SESSION['uotp'] || !$_SESSION['email']) {
    header('location:./login.php?illegal');
    session_destroy();
}
?>

<html lang="en">

<head>
    <link rel="shortcut icon" href="../images/icon.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="../images/icon.ico" type="image/x-icon" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sApati</title>
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
            <a href="../index.php" class="navbar-brand"><span class="text-warning h1 logo">sApati</span></a>
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


    <div class="container">

        <?php
        if (isset($_REQUEST['success'])) {
            echo '<br><span class="lead text-success">Password changed sucessfully</span>';
        }
        if (isset($_REQUEST['failed_to_update_password'])) {
            echo '<br><span class="lead text-danger">Failed to change password</span>';
        }
        if (isset($_REQUEST['old_passowrd_not_matched'])) {
            echo '<br><span class="lead text-danger">Old passowrd does not match</span>';
        }
        if (isset($_REQUEST['password_not_match'])) {
            echo '<br><span class="lead text-danger">Confirm passowrd does not match</span>';
        }
        if (isset($_REQUEST['success_delete'])) {
            echo '<br><span class="lead text-danger">Client account removed sucessfully</span>';
        }
        if (isset($_REQUEST['failed_delete'])) {
            echo '<br><span class="lead text-danger">Failed to delete client account</span>';
        }
        ?><br>
        <div class="row text-center border-bottom border-dark">
            <div class="container justify-content-center" id="changePassword">
                <form action="../include/forgetPassword_reset.php" method="POST">
                    <div class="form-group">
                        <label for="password">New Password</label>
                        <input type="password" id="password" name="password" class="form-control mb-3" placeholder="New Password" minlength="4" required><br>
                    </div>

                    <div class="form-group">
                        <label for="passwordR">Confirm New Password</label>
                        <input type="password" name="passwordR" id="passwordR" onkeyup="checkPassword(this.value)" class="form-control mb-3" placeholder="Confirm New Password" required><br>
                    </div>
                    <span id="displayP"></span><br>
                    <button type="submit" name="submit" class="btn btn-outline-danger">Submit</button>
                </form>
            </div>
        </div>
    </div>


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
        checkPassword = (passwordR) => {
            let $password = $("#password").val();
            if ($password != passwordR) {
                $("#displayP").css("color", "red");
                $("#displayP").text("Your password does not match");
            } else {
                $("#displayP").text("");
            }

        }
    </script>

</body>

</html>