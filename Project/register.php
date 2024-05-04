<!--
//register.php
!-->

<?php

include('access.php');
session_start();
$message = '';
if(isset($_SESSION['user_id']))
{
	header('location:index.php');
}
if(isset($_POST["register"]))
{
	$username = trim($_POST["username"]);
	$password = trim($_POST["password"]);
	$email = trim($_POST["email"]);
	$contact = trim($_POST["contact"]);
	$address = trim($_POST["address"]);
	$cnic = trim($_POST["cnic"]);
	$department = trim($_POST["dept"]);
	$check_query = "
	SELECT * FROM login 
	WHERE username = :username
	";
	$statement = $connect->prepare($check_query);
	$check_data = array(
		':username'		=>	$username
	);
	if($statement->execute($check_data))	
	{
		if($statement->rowCount() > 0)
		{
			$message .= '<p><label>Username already taken</label></p>';
		}
		else
		{
			if(empty($username))
			{
				$message .= '<p><label>Username is required</label></p>';
			}
			if(empty($password))
			{
				$message .= '<p><label>Password is required</label></p>';
			}
			else
			{
				if($password != $_POST['confirm_password'])
				{
					$message .= '<p><label>Password not match</label></p>';
				}
			}
			if($message == '')
			{
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
				INSERT INTO login 
				(username, password) 
				VALUES (:username, :password)
				";

				$query2 = "
				INSERT INTO users 
				(email, contact, address, cnic, department, username) 
				VALUES (:email, :contact, :address, :cnic, :dept, :username) 
				";

				$statement = $connect->prepare($query);
				$statement2 = $connect->prepare($query2);

				if($statement->execute($data)) { 
					if($statement2->execute($data2))
						$message = "<label>Registration Completed!</label>";
				}
			}
		}
	}
}

?>

<html>  
    <head>  
        <title>University Based Free Video Call System</title>  
		<link rel="stylesheet" href="boot/jquery-ui.css">
		<link rel="stylesheet" href="assets/style.css">
        <link rel="stylesheet" href="boot/bootstrap.min.css">
		<script src="boot/jquery-1.12.4.js"></script>
  		<script src="boot/jquery-ui.js"></script>
    </head>  
    <body>  
        <div class="container">
			<br />
			
			<h3 align="center">University Based Free Video Call</a></h3><br />
			<br />
			<div class="panel panel-default">
  				<h3 align="center">Register</h3>
				<div class="panel-body">
					<form method="post">
						<span class="text-danger"><?php echo $message; ?></span>
						<div class="form-group">
							<label>Enter Username</label>
							<input type="text" name="username" class="form-control" />
						</div>
						<div class="form-group">
							<label>Enter Password</label>
							<input type="password" name="password" class="form-control" />
						</div>
						<div class="form-group">
							<label>Re-enter Password</label>
							<input type="password" name="confirm_password" class="form-control" />
						</div>
						<div class="form-group">
							<label>Enter Your Email</label>
							<input type="email" name="email" class="form-control" />
						</div>
						<div class="form-group">
							<label>Enter Your Contact</label>
							<input type="text" name="contact" class="form-control" required/>
						</div>
						<div class="form-group">
							<label>Enter Your Adress</label>
							<input type="text" name="address" class="form-control" required/>
						</div>
						<div class="form-group">
							<label>Enter Your CNIC(National ID)</label>
							<input type="text" name="cnic" class="form-control" required/>
						</div>
						<div class="form-group">
							<label>Enter Your Department</label>
							<input type="text" name="dept" class="form-control" required/>
						</div>
						<div class="form-group">
							<input type="submit" name="register" class="btn btn-success" value="Register" />
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
