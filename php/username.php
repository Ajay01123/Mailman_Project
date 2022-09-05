<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$obj->username($username);
if (isset($_POST["result"])) {
    $username = mysqli_real_escape_string($this->conn, $_POST["result"]);
}