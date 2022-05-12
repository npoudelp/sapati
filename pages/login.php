<?php
$email;
$passwd;

if (isset($_COOKIE['email']) && isset($_COOKIE['password'])) {
    $email = $_COOKIE["email"];
    $passwd = $_COOKIE["password"];
}

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
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jQuery.js"></script>

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
                        <ul class="navbar-nav lead">
                            <li class="nav-item">
                                <a href="../index.php" class="nav-link">Home</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link disabled"></a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link disabled"></a>
                            </li>
                        </ul>
                    </div>
                    <div class="container">
                        <li class="nav-item">
                            <a href="./register.php" class="btn btn-outline-warning">Sign Up</a>
                        </li>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- navbar ends here -->

    <!-- login form starts here -->
    <section class="p-5 text-center">
        <div class="container shadow-lg">
            <div class="text-center container p-3 lead">
                <form class="form-signin" method="post" action="../include/loginCheck.php" onsubmit="return validateForm()">
                    <?php
                    if (isset($_REQUEST['password_not_matched'])) {
                        echo '<span class="lead text-danger">Password not matched</span>';
                        $count++;
                    }
                    if (isset($_REQUEST['reset_ok'])) {
                        echo '<span class="lead text-success">Password change sucessful</span>';
                        $count++;
                    }
                    if (isset($_REQUEST['email_not_matched'])) {
                        echo '<span class="lead text-danger">Email not matched</span>';
                        $count++;
                    }
                    if (isset($_REQUEST['illegal'])) {
                        echo '<span class="lead text-danger">Invalid move</span>';
                        $count++;
                    }
                    ?>
                    <br>
                    <input type="hidden" name="ip" class="form-control mb-3" id="ip"></input>
                    <label for="inputEmail" class="sr-only">Email address</label>
                    <input type="email" id="inputEmail" class="form-control mb-3" <?php echo "value='" . $email . "' "; ?> name="emailId" placeholder="@email address" required autofocus><br>
                    <label for="inputPassword" class="sr-only">Password</label>
                    <input type="password" id="inputPassword" class="form-control mb-3" <?php echo "value='" . $passwd . "' "; ?> name="password" placeholder="Password" minlength="4" required>
                    <?php
                    if ($count != 0) {
                        echo '<a href="./forgotPassword.php" class="nav-link">
                                <small class="text-primary">Forgot password?</small>
                            </a>';
                    }
                    ?>
                    <div class="checkbox mb-3">
                        <label>
                            <input type="checkbox" name="checkbox" value="set"> <small class="text-muted">Keep logged in for 30 days</small>
                        </label>
                    </div>
                    <button class="btn btn-lg btn-outline-warning btn-block" type="submit" name="submit">Sign in</button><br>
                    <a href="./register.php" class="nav-link">
                        <sapn class="small text-primary">Dont have an account?</sapn>
                    </a>
                </form>
            </div>
        </div>
    </section>

    <!-- login form ends here -->


    <!-- mapping starts here -->
    <section class="bg-dark p-3">
        <div class="container">
            <div class="row g-4">
                <div class="col-md text-light">
                    <h2 class="mb-4">
                        Contact Info
                    </h2>
                    <i class="bi bi-geo-alt h1 text-warning">&nbsp;&nbsp;</i><span class="lead">Biratnagar, Province 1, Nepal</span><br>
                    <i class="bi bi-envelope h1 text-warning">&nbsp;&nbsp;</i><span class="lead">info@udharo.com</span><br>
                    <i class="bi bi-telephone h1 text-warning">&nbsp;&nbsp;</i><span class="lead">+977-9800110011</span>
                </div>
                <div class="col-md text-light ">
                    <iframe class="h-100 w-100 my-0 mx-0" src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d3572.3040646729582!2d87.2755849!3d26.445926!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2snp!4v1643798027732!5m2!1sen!2snp" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>
    </section>
    <!-- mapping ends here -->

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
        $.get("https://ipinfo.io", function(response) {
            $("#ip").val(response.ip);
        }, "json");
    </script>

</body>

</html>