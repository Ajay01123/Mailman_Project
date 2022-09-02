<?php
include '../php/username.php';
if (!isset($_SESSION)) {
    session_start();
}
foreach ($_POST['delete_data'] as $dataId) {
    $sql = "UPDATE Send_Msg SET Send_delete= 0,Trash_delete=1 where Id = '$dataId'   ";
    $result = mysqli_query($connect, $sql);
}
if ($result) {
    $_SESSION['user'] = "Message Deleted Successfully";
    header('location:../mailman/sent.php');
} else {
    echo 'error';
}
