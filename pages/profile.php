<?php
session_start();
if ($_SESSION['logged'] != 'true') {
    header('location:../pages/login.php');
}
?>
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
                            <li class="nav-item mx-3">
                                <a href="./profile.php" class="nav-link active">Profile</a>
                            </li>
                            <li class="nav-item mx-3">
                                <a href="./friends.php" class="nav-link">Credits</a>
                            </li>
                            <li class="nav-item mx-3">
                                <a href="./addAccounts.php" class="nav-link">Add Account</a>
                            </li>
                            <li class="nav-item mx-3 ">
                                <a href="../include/logOut.php?q=logOut" class="btn btn-outline-warning">Log Out</a>
                            </li>
                            <li class="nav-item mx-3 text-danger">

                                <?php
                                echo $_SESSION["emailId"];
                                ?>

                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- navbar ends here -->


    <!-- display board starts here -->
    <section class="bg-dark text-light p-lg-3 p-5 text-center">
        <div class="container">
            <p class="h1"><span class="text-warning">Welcome </span> <span class="text-danger"><?php
                                                                                                echo $_SESSION["userName"];
                                                                                                ?></span></p><br>
        </div>
    </section>
    <!-- display board ends here -->


    <!-- List credits -->

    <section id="packages">
        <div class="album py-3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="card mb-4 shadow rounded">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <h5 class="card-title">Title</h5>
                                    </div>
                                    <div class="col-6 d-flex">
                                        <i onclick="" class="bi bi-check2 btn mx-3 btn-outline-dark"></i>
                                        <i onclick="" class="bi mx-3 bi-x-lg btn btn-outline-danger"></i>
                                    </div>
                                </div>
                                <h6 class="card-subtitle mb-2 text-muted border-bottom">Phone Number</h6>
                                <p class="card-text">Text</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="#" onclick="" class="btn btn btn-outline-danger">Add</a>
                                        <a href="#" onclick="" class="btn btn btn-outline-warning">Pay</a>
                                    </div>
                                    <small class="text-muted">Mute</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--  -->


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
</body>

</html>