<?php

$connect = new mysqli("localhost",  "tse", "0wi&lbRuPuv", "Ajay");
if (isset($_POST["email_id"])) {
    $email = mysqli_real_escape_string($connect, $_POST["email_id"]);
    $query = "SELECT * FROM Register_tb where email = '" . $email . "' ";

    $result = mysqli_query($connect, $query);
    echo mysqli_num_rows($result);
}