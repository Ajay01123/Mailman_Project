<?php
if (!isset($_SESSION)) {
    session_start();
}
include '../php/username.php';
if (isset($_POST['update'])) {
    foreach ($_POST['delete_data'] as $dataId) {
        $sql = "UPDATE Send_Msg SET Inbox_detete  = 1 ,Cc_delete = 1,Bcc_delete = 1, Send_delete =1,Trash_delete =0 where Id = '$dataId'   ";

        $total = mysqli_query($connect, $sql);
    }
    if ($total) {
        $_SESSION['name'] = "Message Restore Successfully";
        header('location:../mailman/trash.php');
    } else {
        echo 'error';
    }
}

if (isset($_POST['delete'])) {
    foreach ($_POST['delete_data'] as $dataId) {
        $sql = "DELETE  FROM Send_Msg where Id= '$dataId'";

        $result = mysqli_query($connect, $sql);
    }
    if ($result) {
        $_SESSION['user'] = "Message Deleted Successfully";
        header('location:../mailman/trash.php');
    } else {
        echo 'error';
    }
}