<?php
include "../access.php";
session_start();
$room = $_GET['room'];
$query = "
DELETE FROM `post` WHERE `post`.`id` = $room
";
$connect->query($query);
header('location:posts.php');
?>