<?php
include "header.php";
if(!isset($_SESSION['user_id']))
{
	header("location:login.php");
}
$to = $_GET['to'];
$from = $_GET['from'];
$link = rand(11,999);
$sql = "INSERT INTO calls (call_to, call_from, room)
VALUES ('$to', '$from', '$link')";
$statement = $connect->prepare($sql);
$statement->execute();
header("location:$domain?room=$link&&username=$from");
$connect = null;
?>