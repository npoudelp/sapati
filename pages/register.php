<?php ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sApati</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/main.css">
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
                        <ul class="navbar-nav lead">
                            <li class="nav-item">
                                <a href="../index.php" class="nav-link">Home</a>
                            </li>
                            <li class="nav-item">
                                <a href="./friends.php" class="nav-link disabled">Friends</a>
                            </li>
                            <li class="nav-item">
                                <a href="./accounts.php" class="nav-link disabled">Account</a>
                            </li>
                        </ul>
                    </div>
                    <div class="container">
                        <li class="nav-item">
                            <a href="./login.php" class="btn btn-outline-warning">Sign In</a>
                        </li>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- navbar ends here -->

    <!-- login form starts here -->
    <section class="p-3 text-center">
        <div class="container border border-warning">
            <div class="text-center container p-3 lead">
                <form class="form-signin" method="post" action="../includes/registerCheck.php">
                    <h1 class="border">
                        <span class="h1 text-warning rounded mb-3 fw-bold logo">sApati</span>
                    </h1>
                    <br>
                    <label for="inputEmail" class="sr-only">User Name</label>
                    <input type="text" name="userName" id="inputEmail" class="form-control mb-3" placeholder="user name" required autofocus>
                    <label for="inputEmail" class="sr-only">Email address</label>
                    <input type="email" name="emailId" id="inputEmail" class="form-control mb-3" placeholder="@email address" required>
                    <label for="inputPassword" class="sr-only">Password</label>
                    <input type="password" id="inputPassword" name="password" class="form-control mb-3" placeholder="password" minlength="4" required>
                    <label for="inputEmail" class="sr-only">Confirm Password</label>
                    <input type="password" name="passwordR" id="inputEmail" class="form-control mb-3" placeholder="confirm password" required>
                    <button class="btn btn-lg btn-outline-warning btn-block" name="submit" type="submit">Sign Up</button>

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
                    <i class="bi bi-envelope h1 text-warning">&nbsp;&nbsp;</i><span class="lead">info@sapati.com</span><br>
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
    include_once('../includes/footer.php');
    ?>
</body>

</html>