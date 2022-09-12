<?php
$connect =  new mysqli("localhost",  "tes", "0wi&lbRuPuv", "Ajay");
$id = $_POST["id"];
$query = "SELECT * FROM Send_Msg where Id = '" . $id . "' ";
$result = mysqli_query($connect, $query);
$total = mysqli_fetch_assoc($result);

echo json_encode(array('data' => $total, 'image' => unserialize($total['Multiple'])));