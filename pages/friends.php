<?php
session_start();
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


    <!-- display board starts here -->
    <section class="bg-dark text-light p-lg-3 p-5 text-center">
        <div class="container">
            <div class="d-sm-flex">
                <div class="">
                    <p class="h1"><span class="text-warning">Entry of your friends to create finencial transection is done here.</span>
                    <p class="lead my-4">

                    </p>
                    <br>
                    <a href="./addFriends.php" class="btn btn-lg btn-outline-warning btn-block">Add Friends</a>
                </div>
                <img class="img-fluid w-25 d-none d-sm-block" src="../images/profileShowcase.png" alt="">
            </div>
        </div>
    </section>
    <!-- display board ends here -->


    <!-- friends starts here -->
    <section class="p-3 text-warning text-center">
        <div class="row p-3 text-center">
            <div class="col-sm-8">
            <div class="container">
                <div class="d-md-flex row justify-content-between align-items-center text-center mb-3">
                    <div class="border-right col">
                        <span class="text-dark h2 mb-3 mb-md-0"> Name </span>
                    </div>

                    <div class="col">
                        <span class="text-dark h2 mb-3 mb-md-0">   Contact  </span>
                    </div>

                    <div class="col">
                        <span class="text-dark h2 mb-3 mb-md-0"> Address </span>
                    </div>
                </div>
            </div>
                <?php
                $emailId = $_SESSION['emailId'];
                include_once('../includes/dbConn.php');
                $sql = "SELECT * FROM friends WHERE emailId = '" . $emailId . "';";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo ' <div class="container">
                <div class="d-md-flex row justify-content-between align-items-center text-center border-top p-3 mb-3">
                    <div class="border-right col">
                        <span class="text-dark h4 mb-3 mb-md-0">' . $row["name"] . '</span>
                    </div>

                    <div class="col">
                        <span class="text-dark h4 mb-3 mb-md-0">'.$row["contact"].'</span>
                    </div>

                    <div class="col">
                        <span class="text-dark h4 mb-3 mb-md-0">' . $row["address"] . '</span>
                    </div>
                </div>
            </div>';
                    }
                }
                mysqli_close($conn);
                ?>

            </div>
            <div class="col-sm-4"></div>
        </div>


    </section>
    <!-- friends ends here -->

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