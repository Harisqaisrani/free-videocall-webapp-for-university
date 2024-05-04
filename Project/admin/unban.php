<?php
include "../access.php";
session_start();
$userid = $_GET['id'];
$query = "UPDATE login SET	status = 0 WHERE user_id = $userid";
$connect->query($query);
header('location:manageuser.php');
?>