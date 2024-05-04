<?php
include "../access.php";
session_start();
$userid = $_GET['id'];
$name = $_GET['name'];

$query = "DELETE FROM login WHERE user_id = $userid";
$sql = "DELETE FROM users WHERE `users`.`username` = $name";

$connect->query($sql);
$connect->query($query);

header('location:manageuser.php');
?>
