<?php include "header.php";
if(isset($_POST['join'])) {
    header("location:$domain?room=".$_POST['code']."&username=".$_SESSION['username']."");
}
?>  
        <div class="container">
			<br>
			<br>
			<h3 align="center">Video Call Panel</h3><br/>
			<br><br><br><br><br><br><br>
			<div class="panel panel-default">
  				<h4 align="center">Free Video Call</h4>
				<div class="panel-body">
					<form method="post">
						<div class="form-group">
							<label>Enter Room Code:</label>
							<input type="text" name="code" class="form-control" required />
						</div>
                        <br>
						<div class="form-group">
							<input type="submit" name="join" class="btn btn-primary" value="Join / Create" />
						</div>
					</form>
					<br>
				</div>
			</div>
		</div>
<?php include "footer.php"; ?>  