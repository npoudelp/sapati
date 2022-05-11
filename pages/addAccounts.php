<?php
session_start();
if ($_SESSION['logged'] != 'true') {
    header('location:../pages/login.php');
}
?>
<html lang="en">

<head>
    <link rel="shortcut icon" href="../images/icon.ico" type="image/x-icon" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>udharo</title>
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
                <a href="./profile.php" class="navbar-brand"><img src="../images/logo.png" width="100%" height="100%" alt=""></a>
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
                                    <a href="./addCredits.php" class="nav-link">Add Credits</a>
                                </li>
                                <li class="nav-item mx-3">
                                    <a href="./addAccounts.php" class=" nav-link active">Add Account</a>
                                </li>
                                <ul class="navbar-nav" style="flex-direction: row;">
                                    <li class="nav-item mx-3 ">
                                        <a href="../include/logOut.php?q=logOut" class="btn btn-outline-warning">Log Out</a>
                                    </li>
                                    <li class="nav-item mx-3 text-danger">

                                        <a href="./myAccount.php" class="text-light text-decoration-none">
                                            <i class="bi bi-person-circle h3" onMouseOver="this.style.color='#0d6efd'" onMouseOut="this.style.color='#FFF'"></i>
                                        </a>
                                    </li>
                                </ul>
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
                    <?php
                    if (isset($_REQUEST['account_created_sucessfully'])) {
                        echo '<span class="lead text-success">Account created sucessfully</span>';
                    }
                    if (isset($_REQUEST['error_adding_account'])) {
                        echo '<span class="lead text-danger">Failed to create account</span>';
                    }
                    ?><br>
                    <label for="name" class="sr-only">Name</label>
                    <input required type="text" id="name" class="form-control mb-3" name="name" placeholder="Name of account holder" required autofocus><br>
                    <label for="name" class="sr-only">Address</label>
                    <input required type="text" id="address" class="form-control mb-3" name="address" placeholder="Address of account holder"><br>
                    <label for="name" class="sr-only">Contact</label>
                    <input required type="text" id="contact" class="form-control mb-3" name="contact" placeholder="Contact of account holder"><br>

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