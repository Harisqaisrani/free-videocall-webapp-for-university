<?php

include "index.php";
$id = $_SESSION['admin_id'];

$message = '';

if(isset($_POST["update"]))
{
	$username = trim($_POST["username"]);
	$password = trim($_POST["password"]);
	
	$data = array(
		':username'		=>	$username,
		':password'		=>	password_hash($password, PASSWORD_DEFAULT)
	);

	$query = "
		UPDATE admin SET
		username = :username, 
		password = :password
		WHERE `admin`.`id` = $id
	";

	$statement = $connect->prepare($query);

	if($statement->execute($data)) { 
        $message = "<label>Update Completed!</label>"; 
		header('location:index.php'); 
    }
}
?>


<html>  
    <head>  
        <title>Edit Your Profile</title>  
		<link rel="stylesheet" href="../boot/jquery-ui.css">
		<link rel="stylesheet" href="../assets/style.css">
        <link rel="stylesheet" href="../boot/bootstrap.min.css">
		<script src="../boot/jquery-1.12.4.js"></script>
  		<script src="../boot/jquery-ui.js"></script>
    </head>  
    <body>  
        <div class="container">
			<br>
			<br>
			<div class="panel panel-default">
  				<h3 align="center">Edit Profile</h3>
				<div class="panel-body">
					<form method="post">
						<div class="form-group">
							<label>Enter Username</label>
							<input type="text" name="username" class="form-control">
						</div>
						<div class="form-group">
							<label>Enter Password</label>
							<input type="password" name="password" class="form-control">
						</div>
						<div class="form-group">
							<label>Re-enter Password</label>
							<input type="password" name="confirm_password" class="form-control">
						</div>
						<div class="form-group">
							<input type="submit" name="update" class="btn btn-success" value="Update Profile" />
						</div>
						<div align="center">
							<a class="btn btn-info" href="logout.php">Logout</a>
						</div>
					</form>
				</div>
			</div>
		</div>
    </body>  
</html>
