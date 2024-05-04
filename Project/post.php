<?php
include('header.php');
if(isset($_POST["post"]))
{
	$title = $_POST["title"];
	$sub = $_POST["subtitle"];
	$desc = $_POST["description"];
	$code = $_POST["room"];
	$query = "
	INSERT INTO post (title, subtitle, description, link, user_id) VALUES ('$title', '$sub', '$desc', '$code', '$id')
	";
	$statement = $connect->prepare($query);
	$statement->execute();
  	$connect->exec($query);
	echo "<script> alert('Post Added Successfully!'); </script>";
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
  				<h3 align="center">Add Community Post</h3>
				<div class="panel-body">
					<form method="post">
						<div class="form-group">
							<label>Enter Title</label>
							<input type="text" name="title" class="form-control" required/>
						</div>
						<div class="form-group">
							<label>Enter Sub-Title</label>
							<input type="text" name="subtitle" class="form-control" required/>
						</div>
						<div class="form-group">
							<label>Enter Description</label>
							<input type="text" name="description" class="form-control" required/>
						</div>
						<div class="form-group">
							<label>Enter Your Room code:</label>
							<input type="text" name="room" class="form-control" required/>
						</div>
						<div class="form-group">
							<input type="submit" name="post" class="btn btn-success" value="Publish" />
						</div>
					</form>
				</div>
			</div>
		</div>
    </body>  
</html>
