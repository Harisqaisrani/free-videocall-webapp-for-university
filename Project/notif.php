<?php
session_start();
if(!isset($_SESSION['user_id']))
{
	header("location:login.php");
}
include "access.php";

	$q = intval($_GET['q']);
	$name = $_SESSION['username'];
    $sql="SELECT * FROM calls WHERE call_to = $q ORDER BY id DESC LIMIT 1";
    $statement = $connect->prepare($sql);
	$statement->execute();
	$result = $statement->fetchAll();
      foreach($result as $row)
        echo "
        <br><br>
        <div class='alert alert-info alert-dismissible fade show' style='width:50%' role='alert'>
        <strong>".$row['call_from']."</strong> invited you to join video call at <a class='link' href='$domain?room=".$row['room']."&&username=$name'>Join Call</a> 
        <a href='dnotif.php?dlt=".$row['id']."' class='btn-close' aria-label='Close'></a>
        </div>
      ";
	$connect = null;
?>