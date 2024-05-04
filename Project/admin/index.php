<?php 

include "../access.php";

session_start();

if(!isset($_SESSION['admin_id']))
{
	header("location:login.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link href="../boot/bootstrap2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<style>

.sidebar {
  color: white;
  margin: 0;
  padding: 0;
  width: 150px;
  background-color: #4285f4;
  position: fixed;
  height: 100%;
  overflow: auto;
}

.sidebar a {
  display: block;
  color: white;
  padding: 16px;
  text-decoration: none;
}
 
.sidebar a.active {
  background-color: #0d47a1;
  color: white;
}

.sidebar a:hover:not(.active) {
  background-color: #555;
  color: white;
}

div.content {
  margin-left: 200px;
  padding: 1px 16px;
  height: 1000px;
}

@media screen and (max-width: 1380px) {
  .sidebar {
    width: 100%;
    height: auto;
    position: relative;
  }
  .sidebar a {float: left;}
  div.content {margin-left: 0;}
}

@media screen and (max-width: 400px) {
  .sidebar a {
    text-align: center;
    float: none;
  }
}

</style>
<body>
  <div class="sidebar">
    <br>
    <a><h5>Admin</h5></a>
  <a  href="index.php">Home</a>
  <a  href="posts.php">Manage Posts</a>
  <a href="manageuser.php">Manage Users</a>
  <a href="edit.php">Manage Profile</a>
</div>
<div class="container">
<br><br>
<h3 align="center"> Free Video Call System </h3>
<h4 align="center"> Admin Panel </h4>
<br><br>