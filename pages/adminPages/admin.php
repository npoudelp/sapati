<?php
session_start();
if ($_SESSION['logged'] != 'true' || $_SESSION['type'] != 'admin') {
    session_destroy();
    header('location:../../login.php');
}


include_once("../../include/dbConn.php");




?>
<html lang="en">

<head>
    <link rel="shortcut icon" href="../images/icon.ico" type="image/x-icon" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>udharo</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/main.css">
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/jQuery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>



</head>

<body>
    <!-- navbar starts here -->
    <div class="nav navbar navbar-expand-lg bg-dark navbar-dark py-3 justify-content-between">
        <div class="container">
            <a href="./admin.php" class="navbar-brand"><img src="../images/logo.png" width="100%" height="100%" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navlink">
                <i class="bi bi-grid-3x3-gap"></i>
            </button>
            <div class="container collapse navbar-collapse justify-content-center" id="navlink">
                <div class="d-lg-flex">
                    <div class="container">
                        <ul class="navbar-nav lead">
                            <li class="nav-item mx-3">
                                <a href="./admin.php" class="nav-link active">Profile</a>
                            </li>
                            <ul class="navbar-nav" style="flex-direction: row;">
                                <li class="nav-item mx-3 ">
                                    <a href="../../include/logOut.php?q=logOut" class="btn btn-outline-warning">Log Out</a>
                                </li>
                                <li class="nav-item mx-3 text-danger">

                                    <a href="./account.php" class="text-light text-decoration-none">
                                        <i class="bi bi-person-circle h3" onMouseOver="this.style.color='#0d6efd'" onMouseOut="this.style.color='#FFF'"></i>
                                    </a>
                                </li>
                            </ul>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- navbar ends here -->


    <section class="bg-light py-5 text-danger lead text-center">
        <div class="container">
            <span>Admin has no power. Features for admin will be added as required.</span>
        </div>
    </section>

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
    include_once('../../include/footer.php');
    ?>


    <script>

    </script>

</body>

</html>