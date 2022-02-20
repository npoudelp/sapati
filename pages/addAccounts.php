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
                                    <a href="./accounts.php" class="nav-link active">Account</a>
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

        <section class="p-5">
            <div class="container">
                <form method="post" action="../includes/addTransection.php">
                    <div class="input-group mb-3">
                        <select class="form-select mb-4" id="0" name="friend" aria-label="Select Friends">
                            <option selected>Select Friend</option>
                            <?php
                            $emailId = $_SESSION['emailId'];
                            include_once('../includes/dbConn.php');
                            $sql = "SELECT * FROM friends WHERE emailId = '" . $emailId . "';";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '<option>' . $row["name"] . '</option>';
                                }
                            }
                            mysqli_close($conn);
                            ?>
                        </select>
                        <div class="input-group-append">
                            <a href="./addFriends.php" class="btn btn-outline-danger">Add Friends</a>
                        </div>
                    </div>

                    <!-- Amount input -->
                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-outline">
                                <label class="form-label" for="1">Lent</label>
                                <input required type="number" name="toReceive" id="1" placeholder="keep 0 if null" class="form-control" />
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-outline">
                                <label class="form-label" for="2">Borrowed</label>
                                <input required type="number" name="toGive" id="2" placeholder="keep 0 if null" class="form-control" />
                            </div>
                        </div>
                    </div>
                    <!-- Date Input -->
                    <div class="row mb-4">
                        <div class="col">
                            <label class="form-label" for="M">Day</label>
                            <select class="form-select" id="M" name="day" aria-label="Default select example">
                                <?php
                                for ($day = 1; $day <= 32; $day++) {
                                    echo "<option>" . $day . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col">
                            <div class="form-outline">
                                <label class="form-label" for="M">Month</label>
                                <select class="form-select" id="M" name="month" aria-label="Default select example">
                                    <?php
                                    for ($month = 1; $month <= 12; $month++) {
                                        echo "<option>" . $month . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-outline">
                                <label class="form-label" for="M">Year</label>
                                <select class="form-select" id="M" name="year" aria-label="Default select example">
                                    <?php
                                    $year = date("Y");
                                    $till = $year + 10;
                                    for ($date = $year; $date <= $till; $date++) {
                                        echo "<option>" . $date . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Text input -->
                    <div class="input-group mb-3">
                        <input required type="number" step="0.01" class="form-control" placeholder="rate" name="rate" aria-label="Amount (to the nearest dollar)">
                        <div class="input-group-append">
                            <span class="input-group-text">%</span>
                        </div>
                    </div>

                    <!-- Text input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="4">Remarks</label>
                        <input required type="text" id="4" name="comment" placeholder="remarks upto 25 letter" maxlength="25" class="form-control" />
                    </div>
                    <!-- Submit button -->
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-outline-warning btn-block mb-4" name="add">Add Transection</button>
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
        include_once('../includes/footer.php');
        ?>
    </div>
</body>

</html>