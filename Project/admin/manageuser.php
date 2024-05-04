<?php

include "index.php";

if(!isset($_SESSION['admin_id']))
{
	header("location:login.php");
}


?>

		<link rel="stylesheet" href="../boot/jquery-ui.css">
        <link rel="stylesheet" href="../boot/bootstrap.min.css">
        <link rel="stylesheet" href="../boot/emojionearea.min.css">
		<script src="../boot/jquery-1.12.4.js"></script>
  		<script src="../boot/1.12.1/jquery-ui.js"></script>
  		<script src="../boot/emojionearea.min.js"></script>
  		<script src="../boot/jquery.form.js"></script>

        <div class="container">
			<br />
			
			<h3 align="center">Users Online</h3><br />
			<br />
			<div class="row">
				<div class="col-md-8 col-sm-6">
					<h4>Online User</h4>
				</div>
				<div class="col-md-2 col-sm-3">
					<p align="right">Name: <?php echo $_SESSION['username']; ?></p>
				</div>
			</div>
			<div class="table-responsive">
				
            <?php 

//fetch_user.php

$query = "
SELECT * FROM login
";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

$output = '
<table class="table table-bordered table-striped">
	<tr>
		<th width="2%">Username</td>
		<th width="2%">Status</td>
		<th width="2%">Edit</td>
		<th width="2%">Delete</td>
		<th width="5%">Ban</td>
	</tr>
';

foreach($result as $row)
{
	$status = '';
	$current_timestamp = strtotime(date("Y-m-d H:i:s") . '- 10 second');
	$current_timestamp = date('Y-m-d H:i:s', $current_timestamp);
	$user_last_activity = fetch_user_last_activity($row['user_id'], $connect);
	if($user_last_activity > $current_timestamp)
	{
		$status = '<span style="color:green" class="label label-success">Online</span>';
	}
	else
	{
		$status = '<span style="color:red" class="label label-danger">Offline</span>';
	}
	$output .= '
	<tr>
		<td>'.$row['username'].' '.count_unseen_message($row['user_id'], $_SESSION['admin_id'], $connect).' </td>
		<td>'.$status.'</td>
		<td><a class="btn btn-primary" href="edituser.php?id='.$row['user_id'].'&name='.$row['username'].'">Edit User</a></td>
		<td><a class="btn btn-danger" href="deleteuser.php?id='.$row['user_id'].'&name='.$row['username'].'">Delete User</a></td>
        <td><a class="btn btn-warning" href="ban.php?id='.$row['user_id'].'">Ban User</a> &nbsp <a class="btn btn-secondary" href="unban.php?id='.$row['user_id'].'">unban</a></td>
	</tr>
	';
}

$output .= '</table>';

echo $output;

?>


			</div>
			<br />
			<br />
			
		</div>


<script>  
$(document).ready(function(){
	fetch_user();
	setInterval(function(){
		update_last_activity();
		fetch_user();
		update_chat_history_data();
		fetch_group_chat_history();
	}, 5000);

	function fetch_user()
	{
		$.ajax({
			url:"online.php",
			method:"POST",
			success:function(data){
				$('#user_details').html(data);
			}
		})
	}
});  
</script>

<?php include "footer.php" ?>