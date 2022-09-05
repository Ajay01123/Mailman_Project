<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$connect = new mysqli("localhost", "tse", "0wi&lbRuPuv", "Ajay");
if (isset($_POST["result"])) {
    $username = mysqli_real_escape_string($connect, $_POST["result"]);
    $query = "SELECT * FROM Register_tb where username='" . $username . "' ";
    $result = mysqli_query($connect, $query);
    echo mysqli_num_rows($result);
}