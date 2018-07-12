<?php
require_once './db_connection.php';
$deleteAccount = $pdo->prepare("DELETE FROM users WHERE username = :username");
$deleteAccount->execute(array(':username'=>$_SESSION['PHP_AUTH_USER']));
$deleteOrder = $pdo->prepare("DELETE FROM reservations WHERE username = :username");
$deleteOrder->execute(array(':username'=>$_SESSION['PHP_AUTH_USER']));
header("Location: logout.inc.php");
?>