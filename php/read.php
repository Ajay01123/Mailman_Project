<?php
if (!isset($_SESSION)) {
    session_start();
}
include '../php/username.php';

foreach ($_POST['Read'] as $dataId) {
    $sql = "SELECT * FROM Send_Msg Where `Read`=1 AND Id=$dataId";
    $result = mysqli_query($connect, $sql);
    echo mysqli_num_rows($result);
}
// if ($result) {
//     $_SESSION['user'] = "Message Deleted Successfully";
//     header('location:../mailman/dashboard.php');
// } else {
//     echo 'error';
// }