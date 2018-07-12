<?php
require_once './db_connection.php';
$id =  $_POST['id'];
$deleteOrder = $pdo->prepare("DELETE FROM reservations WHERE id = :id");
$deleteOrder->execute(array(':id'=>$id));
header("Location: ../../order.php");
?>