<?php

include_once './loginCheck.php';
$userName = $_GET["userName"];
$userPassword = $_GET["userPassword"];

$sql = "SELECT * FROM loginData WHERE userName=".$userName.";";
$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);
if ($resultCheck > 0) {
    echo $result . "<br>";
}
echo $userName . "<br>";
echo $userPassword . "<hr>";

?>