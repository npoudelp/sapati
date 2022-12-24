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

    <!-- user activity logs -->
    <section class="bg-light py-5 lead text-center">
        <div class="container">
            <div class="row text-center border-bottom border-dark d-print-table">
                <span class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#userLogs">
                    <span class="lead">Users Activity Logs</span> <i class="bi bi-chevron-double-down"></i> <br>
                </span> <br>
                <div class="container collapse navbar-collapse  justify-content-center" id="userLogs">
                    <table class="table" class="print-container" width='100%'>
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">SN</th>
                                <th scope="col">Date</th>
                                <th scope="col">Time</th>
                                <th scope="col">Details</th>
                                <th scope="col">Address</th>
                            </tr>
                        </thead>
                        <?php
                        $sn = 1;
                        $sql = "SELECT * FROM logs;";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo ' 
                                <tr>
                                <td scope="row">' . $sn . '</td>
                                <td scope="row">' . $row['date'] . '</td>
                                <td scope="row">' . $row['time'] . '</td>
                                <td scope="row">' . $row['details'] . '</td>
                                <td scope="row">' . $row['address'] . '</td>
                                </tr>';
                                if ($sn >= 50) {
                                    break;
                                }
                                $sn++;
                            }
                        } else {
                            echo "<span class='text-danger'>No user activity logs availale</span>";
                        }
                        ?>

                    </table>
                </div>
            </div>
        </div>
    </section>

    <!-- personal data of users -->
    <section class="bg-light py-5 lead text-center">
        <div class="container">
            <div class="row text-center border-bottom border-dark d-print-table">
                <span class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#userInfo">
                    <span class="lead">Users Information</span> <i class="bi bi-chevron-double-down"></i> <br>
                </span> <br>
                <div class="container collapse navbar-collapse  justify-content-center" id="userInfo">
                    <table class="table" class="print-container" width='100%'>
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">SN</th>
                                <th scope="col">UserId</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Type</th>
                            </tr>
                        </thead>
                        <?php
                        $sn = 1;
                        $sql1 = "SELECT * FROM users;";
                        $result1 = mysqli_query($conn, $sql1);
                        if (mysqli_num_rows($result1) > 0) {
                            while ($row1 = mysqli_fetch_assoc($result1)) {
                                echo ' 
                                <tr>
                                <td scope="row">' . $sn . '</td>
                                <td scope="row">' . $row1['uid'] . '</td>
                                <td scope="row">' . $row1['name'] . '</td>
                                <td scope="row">' . $row1['email'] . '</td>
                                <td scope="row">' . $row1['type'] . '</td>
                                <td scope="row"> <a href="./userDetails.php?q=' . $row1['uid'] .'" class="btn btn-danger"">Details</span></td>
                                </tr>';
                                if ($sn >= 50) {
                                    break;
                                }
                                $sn++;
                            }
                        } else {
                            echo "<span class='text-danger'>No user activity logs availale</span>";
                        }
                        ?>

                    </table>
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
    include_once('../../include/footer.php');
    ?>


    <script>

    </script>

</body>

</html>