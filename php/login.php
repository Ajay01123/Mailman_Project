<?php
include_once 'database.php';
if (isset($_POST['submit'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];
  $row = $obj->login($email, $password);
}