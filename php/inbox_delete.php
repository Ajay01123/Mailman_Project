<?php
if (!isset($_SESSION)) {
    session_start();
}
include '../php/username.php';

foreach ($_POST['delete_data'] as $dataId) {
    $sql = "UPDATE Send_Msg SET Inbox_detete  = 0,Trash_delete =1 where Id = '$dataId'   ";
    $result = mysqli_query($connect, $sql);
}
if ($result) {
    $_SESSION['user'] = "Message Deleted Successfully";
    header('location:../mailman/dashboard.php');
} else {
    echo 'error';
}