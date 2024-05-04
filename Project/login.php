<!--
//login.php
!-->

<?php

include('access.php');

session_start();

$message = '';

if(isset($_SESSION['user_id']))
{
	header('location:index.php');
}

if(isset($_POST['login']))
{
	$query = "
		SELECT * FROM login 
  		WHERE username = :username
	";
	$statement = $connect->prepare($query);
	$statement->execute(
		array(
			':username' => $_POST["username"]
		)
	);	
	$count = $statement->rowCount();
	if($count > 0)
	{
		$result = $statement->fetchAll();
		foreach($result as $row)
		{
			if(password_verify($_POST["password"], $row["password"]))
			{
				if($row["status"] != NULL) {
					echo "<script> alert('Account Restricted!'); </script>";
				} else {
				$_SESSION['user_id'] = $row['user_id'];
				$_SESSION['username'] = $row['username'];
				$sub_query = "
				INSERT INTO login_details 
	     		(user_id) 
	     		VALUES ('".$row['user_id']."')
				";
				$statement = $connect->prepare($sub_query);
				$statement->execute();
				$_SESSION['login_details_id'] = $connect->lastInsertId();
				header('location:update_last_activity.php');
				}
			}
			else
			{
				$message = '<label>Wrong Password</label>';
			}
		}
	}
	else
	{
		$message = '<label>Wrong Username</labe>';
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
    <body class="banner">  
        <div class="container">
		<br>
		<br>
		<h3 align="center">Free Video Call System</h3><br/>
		<br><br><br><br><br><br><br>
		<div class="panel panel-default">
  			<h4 align="center">Application Login</h4>
				<div class="panel-body">
					<p class="text-danger"><?php echo $message; ?></p>
					<form method="post">
						<div class="form-group">
							<label>Enter Username</label>
							<input type="text" name="username" class="form-control" required />
						</div>
						<div class="form-group">
							<label>Enter Password</label>
							<input type="password" name="password" class="form-control" required />
						</div>
						<div class="form-group">
							<input type="submit" name="login" class="btn btn-primary" value="Login" />
						</div>
						<div align="center">
							<a class="btn btn-success" href="register.php">Register</a>
						</div>
					</form>
				<br>
			</div>
		</div>
		</div>
		<style>
            h3 {
                color: white;
            }
        </style>
    </body>  
</html>