<?php
include_once 'dashboard_code.php';
if (!isset($_SESSION)) {
  session_start();
}

$flag = 1;

if (isset($_POST['submit'])) {

  $to = $_POST['to'];
  $cc = $_POST['cc'];
  $bcc = $_POST['bcc'];
  $sub = $_POST['sub'];
  $msg =  $_POST['msg'];
  $msg = addslashes($msg);
  $draft = $_POST['draft'];
  $date = date('Y-m-d H:i:s');
  $from = $_SESSION['email'];
  $draft = 1;
  $draft_delete = 1;
  $send_delete = 1;
  $inbox_delete = 1;
  $read = 1;
  $Cc_delete = 1;
  $Bcc_delete = 1;
  $image_name = count($_FILES['Image']);

  $imgval = [];
  for ($i = 0; $i < $image_name; $i++) {

    $file = $_FILES['Image']['name'][$i];

    $tempname = $_FILES['Image']['tmp_name'][$i];
    $folder = "../Upload1/" . $file;
    $imgval[] = $file;
    header("Content-Disposition: attachment; filename='" .  $file_name . "'");
    header("Content-length: $size");
    header("Content-type: $type");
    $file_name = move_uploaded_file($tempname, $folder);
  }


  $fun1 = $db->insertRecord($to, $cc, $bcc, $sub, $msg, $from, $draft, $imgval, $draft_delete, $send_delete, $inbox_delete, $read, $Bcc_delete, $Cc_delete, $date);
}
if (isset($_POST['close'])) {
  $to = $_POST['to'];
  $cc = $_POST['cc'];
  $bcc = $_POST['bcc'];
  $sub = $_POST['sub'];
  $msg =  nl2br($_POST['msg']);
  $from = $_SESSION['email'];
  $date = date('Y-m-d H:i:s');
  $draft = 2;
  $draft_delete = 2;
  $send_delete = 2;
  $inbox_delete = 2;
  $image_name = count($_FILES['Image']);

  $imgval = [];
  for ($i = 0; $i < $image_name; $i++) {

    $file = $_FILES['Image']['name'][$i];

    $tempname = $_FILES['Image']['tmp_name'][$i];
    $folder = "../Upload1/" . $file;
    $imgval[] = $file;

    move_uploaded_file($tempname, $folder);
  }

  $fun = $db->closeRecord($to, $cc, $bcc, $sub, $msg, $from, $draft, $imgval, $draft_delete, $send_delete, $inbox_delete, $date);
  if ($fun) {
    $_SESSION['status'] = "Message Failed";
  }
}