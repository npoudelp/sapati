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
                                <a href="./addCredits.php" class="nav-link active">Add Credits</a>
                            </li>
                            <li class="nav-item mx-3">
                                <a href="./addAccounts.php" class="nav-link">Add Account</a>
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


    <!-- friends starts here -->
    <section class="p-5">
        <div class="container">
            <form method="post" action="../include/addCredits.php">
                <?php
                if (isset($_REQUEST['credit_created_sucessfully'])) {
                    echo '<span class="lead text-success">Credit added</span>';
                }
                if (isset($_REQUEST['error_adding_credit'])) {
                    echo '<span class="lead text-danger">Failed to add credit</span>';
                }
                if (isset($_REQUEST['empty_options'])) {
                    echo '<span class="lead text-danger">Please fill the form properly</span>';
                }

                ?><br>
                <div class="row">
                    <div class="col-md-6">
                        <label for="name" class="sr-only">Name</label>
                        <select name="aid" class="form-control mb-3" id="name">
                            <option value="0" selected>--Select Account--</option>
                            <?php
                            session_start();
                            $data = '1';
                            include_once('../include/dbConn.php');
                            $sql = "SELECT accounts.name, accounts.aid, accounts.address FROM accounts, users WHERE users.uid=accounts.uid AND users.uid = '{$_SESSION['uid']}'";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                $data = '0';
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "
                        <option value='" . $row['aid'] . "'>{$row['name']}, {$row['address']}</options>
                        ";
                                }
                            }

                            ?>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="balance" class="sr-only">Transaction Type</label>
                        <select name="type" class="form-control mb-3" id="type">
                            <option value="0" selected>--Select Type Of Transaction--</option>
                            <option value="credit">To Receive</option>
                            <option value="debit">To Give</option>
                        </select>
                    </div>
                </div>
                <?php
                if ($data == '1') {
                    echo '<label for="balance" class="text-danger sr-only">No user account created : <a href="./addAccounts.php" class="text-decoration-none">Add Account</a></label><br>';
                }
                ?>
                <br>
                <label for="balance" class="sr-only">Amount</label>
                <input type="number" id="balance" class="form-control mb-3" required name="balance" placeholder="Amount credited"><br>
                <label for="date" class="sr-only">Date</label>
                <input type="date" id="date" class="form-control mb-3" name="date" required placeholder="Date"><br>
                <label for="comments" class="sr-only">Comments</label>
                <textarea type="text" id="comments" class="form-control mb-3" name="comments" placeholder="Description"></textarea><br>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-outline-warning btn-block mb-4" name="submit">Add Credits</button>
                </div>
            </form>

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
    include_once('../include/footer.php');
    ?>
</body>

</html>