<?php

include('../access.php');

session_start();

if(isset($_SESSION['admin_id']))
{
	header('location:index.php');
}

if(isset($_POST['login']))
{
	$query = "
		SELECT * FROM admin 
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
				$_SESSION['admin_id'] = $row['id'];
				$_SESSION['username'] = $row['username'];
				header('location:index.php');
			}
		}
	}
}

?>

<html>  
    <head>  
        <title>University Based Free Video Call System</title>  
		<link rel="stylesheet" href="../boot/jquery-ui.css">
		<link rel="stylesheet" href="../assets/style.css">
        <link rel="stylesheet" href="../boot/bootstrap.min.css">
		<script src="../boot/jquery-1.12.4.js"></script>
  		<script src="../boot/jquery-ui.js"></script>
    </head>  
    <body class="banner">  
        <div class="container">
		<br>
		<br>
		<h3 align="center">Free Video Call System</h3><br/>
		<br><br><br><br><br><br><br>
		<div class="panel panel-default">
  			<h4 align="center">Admin Login</h4>
				<div class="panel-body">
					<p class="text-danger"></p>
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