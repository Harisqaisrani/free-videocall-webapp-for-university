<?php
include "header.php";
if(!isset($_SESSION['user_id']))
{
	header("location:login.php");
}
?>

		<link rel="stylesheet" href="boot/jquery-ui.css">
        <link rel="stylesheet" href="boot/bootstrap.min.css">
        <link rel="stylesheet" href="boot/emojionearea.min.css">
		<script src="boot/jquery-1.12.4.js"></script>
  		<script src="boot/1.12.1/jquery-ui.js"></script>
  		<script src="boot/emojionearea.min.js"></script>
  		<script src="boot/jquery.form.js"></script>

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
WHERE user_id != '".$_SESSION['user_id']."' 
";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$output = '
<table class="table table-bordered table-striped">
	<tr>
		<th width="70%">Username</td>
		<th width="20%">Status</td>
		<th width="10%">Action</td>
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
		<td>'.$row['username'].' '.count_unseen_message($row['user_id'], $_SESSION['user_id'], $connect).' </td>
		<td>'.$status.'</td>
		<td><a class="btn btn-primary" href="call.php?to='.$row['user_id'].'&&from='.$_SESSION['username'].'">Call User</a></td>
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
<style>
.chat_message_area
{
	position: relative;
	width: 100%;
	height: auto;
	background-color: #FFF;
    border: 1px solid #CCC;
    border-radius: 3px;
}
#group_chat_message
{
	width: 100%;
	height: auto;
	min-height: 80px;
	overflow: auto;
	padding:6px 24px 6px 12px;
}
</style>
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