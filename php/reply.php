<?php
session_start();
include '../php/dashboard_code.php';

$to = $_POST['to'];
$msg =  $_POST['msg'];
$subject = $_POST['sub'];
$CC = $_POST['CC'];
$Bcc = $_POST['Bcc'];
$date = date('Y-m-d H:i:s');
$Inbox_detete  = 1;
$Send_delete = 1;
$read = 1;
$Cc_delete = 1;
$Bcc_delete = 1;
$from = $_SESSION['email'];

$db->reply($to, $msg, $from, $Inbox_detete, $date, $subject, $CC, $Bcc, $Cc_delete, $Bcc_delete, $Send_delete);