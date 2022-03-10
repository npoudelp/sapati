<?php session_start() ?>
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
                                <a href="./profile.php" class="nav-link">Profile</a>
                            </li>
                            <li class="nav-item mx-3">
                                <a href="./friends.php" class="nav-link active">Friends</a>
                            </li>
                            <li class="nav-item mx-3">
                                <a href="./accounts.php" class="nav-link">Account</a>
                            </li>
                            <li class="nav-item mx-3 ">
                                <a href="../index.php" class="btn btn-outline-warning">Log Out</a>
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

    <!-- login form starts here -->
    <section class="p-3 text-center">
        <div class="container border border-warning">
            <div class="text-center container p-3 lead">
                <form class="form-signin" method="post" action="../include/createFriend.php">
                    <h1 class="border">
                        <span class="h1 text-warning rounded mb-3 fw-bold logo">sApati</span>
                    </h1>
                    <br>
                    <label for="inputName" class="sr-only">Friends Name</label>
                    <input type="text" name="name" id="inputName" class="form-control mb-3" placeholder="friends name" required autofocus>
                    <label for="inputAddress" class="sr-only">Address</label>
                    <input type="text" id="inputAddress" name="address" class="form-control mb-3" placeholder="address" required>
                    <label for="inputAddress" class="sr-only">Phone</label>
                    <input type="text" id="inputAddress" name="contact" class="form-control mb-3" placeholder="phone" required>
                    <button class="btn btn-lg btn-outline-warning btn-block" name="add" type="submit">Add</button>

                </form>
            </div>
        </div>
    </section>
    <!-- login form ends here -->



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