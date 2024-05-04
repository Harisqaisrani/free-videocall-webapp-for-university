<?php
include('access.php');
session_start();
if(!isset($_SESSION['user_id']))
{
	header("location:login.php");
}
$query = "
UPDATE login_details 
SET last_activity = now() 
WHERE login_details_id = '".$_SESSION["login_details_id"]."'
";
$statement = $connect->prepare($query);
$statement->execute();
header('location:index.php');
?>

