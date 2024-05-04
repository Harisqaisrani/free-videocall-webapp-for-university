<?php

include('header.php');

$message = '';

if(isset($_POST["update"]))
{
	$username = trim($_POST["username"]);
	$password = trim($_POST["password"]);
	$email = trim($_POST["email"]);
	$contact = trim($_POST["contact"]);
	$address = trim($_POST["address"]);
	$cnic = trim($_POST["cnic"]);
	$department = trim($_POST["dept"]);
	
				$data = array(
					':username'		=>	$username,
					':password'		=>	password_hash($password, PASSWORD_DEFAULT)
				);

				$data2 = array(
					':email'		=>	$email,
					':contact'		=>	$contact,
					':address'		=>	$address,
					':cnic'			=>	$cnic,
					':dept'			=>	$department,
					':username'		=>	$username
				);

				$query = "
				UPDATE  login SET
				username = :username, 
				password = :password
				WHERE user_id = $id
				";

				$query2 = "
				UPDATE users SET
					email = :email, 
					contact = :contact, 
					address = :address, 
					cnic = :cnic, 
					department = :dept, 
					username = :username
					WHERE username = '$name'
				";

				$statement = $connect->prepare($query);
				$statement2 = $connect->prepare($query2);

				if($statement->execute($data)) { 
					if($statement2->execute($data2))
						$message = "<label>Update Completed!</label>";
				}
			}

?>


<html>  
    <head>  
        <title>Edit User Profile</title>  
		<link rel="stylesheet" href="boot/jquery-ui.css">
		<link rel="stylesheet" href="assets/style.css">
        <link rel="stylesheet" href="boot/bootstrap.min.css">
		<script src="boot/jquery-1.12.4.js"></script>
  		<script src="boot/jquery-ui.js"></script>
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
							<label>Enter Your Email</label>
							<input type="edit" name="email" class="form-control">
						</div>
						<div class="form-group">
							<label>Enter Your Contact</label>
							<input type="text" name="contact" class="form-control">
						</div>
						<div class="form-group">
							<label>Enter Your Adress</label>
							<input type="text" name="address" class="form-control">
						</div>
						<div class="form-group">
							<label>Enter Your CNIC(National ID)</label>
							<input type="text" name="cnic" class="form-control">
						</div>
						<div class="form-group">
							<label>Enter Your Department</label>
							<input type="text" name="dept" class="form-control">
						</div>
						<div class="form-group">
							<input type="submit" name="update" class="btn btn-success" value="Update Profile" />
						</div>
						<div align="center">
							<a class="btn btn-info" href="login.php">Login</a>
						</div>
					</form>
				</div>
			</div>
		</div>
    </body>  
</html>
