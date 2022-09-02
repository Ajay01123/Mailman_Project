<?php

include_once 'database.php';
if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $row = $obj->login($username, $email, $password);
}
