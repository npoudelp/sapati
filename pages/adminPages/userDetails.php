<?php
session_start();
if ($_SESSION['logged'] != 'true' || $_SESSION['type'] != 'admin') {
    session_destroy();
    header('location:../../login.php');
}


include_once("../../include/dbConn.php");
$uid = $_REQUEST['q'];
// $aid;
// $bid;
// $lid;

// $sql = "SELECT a.aid, b.bid, l.lid FROM balance AS b, accounts AS a, logs AS l, users AS u WHERE b.aid=a.aid AND a.uid=u.uid AND u.uid=l.uid AND u.uid=$uid;";
// $result = mysqli_query($conn, $sql);
$sql = "SELECT * FROM users WHERE uid=$uid;";
$result = mysqli_query($conn, $sql);
$userData = mysqli_fetch_assoc($result);
$name = $userData["name"];
$uid = $userData["uid"];
$email = $userData["email"];

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


    <!-- user logs -->
    <section class="p-3">
        <div class="container">
            <p class="text-center lead"> This page shows the details of the user name <?php echo $name; ?> having uid <?php echo $uid; ?> and email <?php echo $email; ?></p>

            <br>
            <div class="row text-center border-bottom border-dark d-print-table">
                <span class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#userLogs">
                    <span class="lead">Activity Logs of <?php echo $name ?></span> <i class="bi bi-chevron-double-down"></i> <br>
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
                        $sql1 = "SELECT * FROM logs, users WHERE logs.uid=users.uid AND users.uid=$uid;";
                        $result = mysqli_query($conn, $sql1);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row1 = mysqli_fetch_assoc($result)) {
                                echo ' 
                                <tr>
                                <td scope="row">' . $sn . '</td>
                                <td scope="row">' . $row1['date'] . '</td>
                                <td scope="row">' . $row1['time'] . '</td>
                                <td scope="row">' . $row1['details'] . '</td>
                                <td scope="row">' . $row1['address'] . '</td>
                                </tr>';
                                if ($sn >= 50) {
                                    break;
                                }
                                $sn++;
                            }
                        } else {
                            echo "<span class='text-danger'>No Data Found</span>";
                        }
                        ?>

                    </table>
                </div>
            </div>
        </div>
    </section>

    <!-- account details -->
    <section class="p-3">
        <div class="container">
            <br>
            <div class="row text-center border-bottom border-dark d-print-table">
                <span class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#account">
                    <span class="lead">Clients of <?php echo $name ?></span> <i class="bi bi-chevron-double-down"></i> <br>
                </span> <br>
                <div class="container collapse navbar-collapse  justify-content-center" id="account">
                    <table class="table" class="print-container" width='100%'>
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">SN</th>
                                <th scope="col">Client Name</th>
                                <th scope="col">Address</th>
                                <th scope="col">Contact</th>
                                <th scope="col">aid</th>
                            </tr>
                        </thead>
                        <?php
                        $sn = 1;
                        $sql2 = "SELECT accounts.name, accounts.address, accounts.contact, aid FROM accounts, users WHERE accounts.uid=users.uid AND users.uid=$uid;";
                        $result2 = mysqli_query($conn, $sql2);
                        if (mysqli_num_rows($result2) > 0) {
                            while ($row2 = mysqli_fetch_assoc($result2)) {
                                echo ' 
                                <tr>
                                <td scope="row">' . $sn . '</td>
                                <td scope="row">' . $row2['name'] . '</td>
                                <td scope="row">' . $row2['address'] . '</td>
                                <td scope="row">' . $row2['contact'] . '</td>
                                <td scope="row">' . $row2['aid'] . '</td>
                                </tr>';
                                if ($sn >= 50) {
                                    break;
                                }
                                $sn++;
                            }
                        } else {
                            echo "<span class='text-danger'>No Data Found</span>";
                        }
                        ?>

                    </table>
                </div>
            </div>
        </div>
    </section>


    <!-- balance of users -->
    <section class="p-3">
        <div class="container">
            <br>
            <div class="row text-center border-bottom border-dark d-print-table">
                <span class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#balance">
                    <span class="lead">Balance of <?php echo $name ?></span> <i class="bi bi-chevron-double-down"></i> <br>
                </span> <br>
                <div class="container collapse navbar-collapse  justify-content-center" id="balance">
                    <table class="table" class="print-container" width='100%'>
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">SN</th>
                                <th scope="col">Balance</th>
                                <th scope="col">Date</th>
                                <th scope="col">Type</th>
                                <th scope="col">Status</th>
                                <th scope="col">BID</th>
                                <th scope="col">AID</th>
                            </tr>
                        </thead>
                        <?php
                        $sn = 1;
                        $sql3 = "SELECT * FROM accounts, users, balance WHERE balance.aid=accounts.aid AND accounts.uid=users.uid AND users.uid=$uid;";
                        $result3 = mysqli_query($conn, $sql3);
                        if (mysqli_num_rows($result3) > 0) {
                            while ($row3 = mysqli_fetch_assoc($result3)) {
                                echo ' 
                                <tr>
                                <td scope="row">' . $sn . '</td>
                                <td scope="row">' . $row3['balance'] . '</td>
                                <td scope="row">' . $row3['bDate'] . '</td>
                                <td scope="row">' . $row3['type'] . '</td>
                                <td scope="row">' . $row3['status'] . '</td>
                                <td scope="row">' . $row3['bid'] . '</td>
                                <td scope="row">' . $row3['aid'] . '</td>
                                </tr>';
                                if ($sn >= 50) {
                                    break;
                                }
                                $sn++;
                            }
                        } else {
                            echo "<span class='text-danger'>No Data Found</span>";
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