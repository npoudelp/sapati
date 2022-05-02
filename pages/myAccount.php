<?php
session_start();
if ($_SESSION['logged'] != 'true') {
    header('location:../pages/login.php');
}


include_once("../include/dbConn.php");




?>
<html lang="en">

<head>
    <link rel="shortcut icon" href="../images/icon.ico" type="image/x-icon" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sApati</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/main.css">
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jQuery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>



</head>

<body>
    <!-- navbar starts here -->
    <div class="nav navbar navbar-expand-lg bg-dark navbar-dark py-3 justify-content-between">
        <div class="container">
            <a href="./profile.php" class="navbar-brand"><span class="text-warning h1 logo">sApati</span></a>
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
                                <a href="./addCredits.php" class="nav-link">Add Credits</a>
                            </li>
                            <li class="nav-item mx-3">
                                <a href="./addAccounts.php" class="nav-link">Add Account</a>
                            </li>
                            <li class="nav-item mx-3 ">
                                <a href="../include/logOut.php?q=logOut" class="btn btn-outline-warning">Log Out</a>
                            </li>
                            <li class="nav-item mx-3">
                                <a href="./myAccount.php" class="text-primary text-decoration-none">
                                    <i class="bi bi-person-circle h3" onMouseOver="this.style.color='#FFF'" onMouseOut="this.style.color='#0d6efd'"></i>
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- navbar ends here -->


    <!-- User details chart -->
    <section class="bg-light">
        <div class="container-flex mx-3">
            <div class="row">
                <?php
                if ($_SESSION['type'] != "admin") {
                    echo '<div class="col-md-6">
                    <canvas id="myChart" style="width:100%;"></canvas>
                    </div>';
                } else {
                    echo '<div class="col-md-6">
                    
                    </div>';
                }
                ?>
                <!-- password reset -->
                <div class="col-md-6 text-center">
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
                    ?>
                    <div class="row text-center border-bottom border-dark">
                        <span class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#changePassword">
                            <br>
                            <span class="lead">Change Password</span> <i class="bi bi-chevron-double-down"></i> <br>
                        </span><br>
                        <div class="container collapse navbar-collapse justify-content-center" id="changePassword">
                            <form action="../include/resetPasswd.php" method="POST">
                                <div class="form-group">
                                    <label for="passwordO">Old Password</label>
                                    <input type="password" id="passwordO" name="passwordO" class="form-control mb-3" placeholder="Old Password" minlength="4" required><br>
                                </div>

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
                    <br>
                    <!-- delete accounts -->
                    <div class="row text-center border-bottom border-dark">
                        <span class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#closeAccount">
                            <span class="lead">Delete Client Account</span> <i class="bi bi-chevron-double-down"></i> <br>
                        </span><br>
                        <div class="container collapse navbar-collapse justify-content-center" id="closeAccount">
                            <form action="../include/deleteClientAccount.php" method="POST">
                                <select name="aid" class="form-control mb-3" id="aid">
                                    <?php
                                    session_start();
                                    $data = '1';
                                    include_once('../include/dbConn.php');
                                    $sql = "SELECT accounts.name, accounts.aid, accounts.address, accounts.contact FROM accounts, users WHERE users.uid=accounts.uid AND users.uid = '{$_SESSION['uid']}'";
                                    $result = mysqli_query($conn, $sql);
                                    if (mysqli_num_rows($result) > 0) {
                                        $data = '0';
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo "
                                            <option value='" . $row['aid'] . "'>{$row['name']}, {$row['address']}, {$row['contact']}</options>
                                            ";
                                        }
                                    }

                                    ?>
                                </select>
                                <?php
                                if ($data == '1') {
                                    echo '<label for="balance" class="text-danger sr-only">No user account created : <a href="./addAccounts.php" class="text-decoration-none">Add Account</a></label><br>';
                                }
                                mysqli_close($conn);
                                ?>

                                <button type="submit" name="submit" class="btn btn-outline-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
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
    include_once('../include/footer.php');
    ?>


    <script>
        var xValues = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'July', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'];
        var yValues = [1200, 1289, 100, 90, 400, 1000, 1300, 15, 25, 6000, 20, 1500, 1200, 1200];

        new Chart("myChart", {
            type: "line",
            data: {
                labels: xValues,
                datasets: [{
                    fill: false,
                    lineTension: 0,
                    backgroundColor: "#000fff",
                    borderColor: "#0d6efd",
                    data: yValues
                }]
            },
            options: {
                legend: {
                    display: false
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            min: 0,
                            max: 12
                        }
                    }],
                }
            }
        });


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