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
    <div class="main" style="min-height: 100%;">
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
                                    <a href="./profile.php" class="nav-link">Profile</a>
                                </li>
                                <li class="nav-item mx-3">
                                    <a href="./friends.php" class="nav-link">Credits</a>
                                </li>
                                <li class="nav-item mx-3">
                                    <a href="./accounts.php" class=" nav-link active">Add Account</a>
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


        <!-- accounts form starts here -->

        <section class="p-5">
            <div class="container">
                <form method="post" action="../include/addAccount.php">
                    <label for="name" class="sr-only">Name</label>
                    <input type="text" id="name" class="form-control mb-3" name="name" placeholder="Name of account holder" required autofocus><br>
                    <label for="name" class="sr-only">Address</label>
                    <input type="text" id="address" class="form-control mb-3" name="address" placeholder="Address of account holder"><br>
                    <label for="name" class="sr-only">Contact</label>
                    <input type="text" id="contact" class="form-control mb-3" name="contact" placeholder="Contact of account holder"><br>

                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-outline-warning btn-block mb-4" name="submit">Add Account</button>
                    </div>
                </form>

            </div>
        </section>

        <!-- login form starts here -->


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
    </div>
</body>

</html>