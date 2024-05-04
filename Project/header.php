<?php  

include('access.php');

session_start();

if(!isset($_SESSION['user_id']))
{
	header("location:login.php");
}

$id = $_SESSION['user_id'];
$name = $_SESSION['username'];

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Free Video Call System</title>
    <link href="boot/bootstrap2.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/style.css">
    <script>
    
  setInterval(function(){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("txtHint").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET","notif.php?q="+<?php echo $id; ?>,true);
    xmlhttp.send();
  },1000);

</script>
</head>
  <body>
    <nav class="navbar nav-tabs navbar-dark bg-primary navbar-expand-lg">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Free Video Call</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <?php echo "<a class='nav-link' href='vc.php'>Video Call</a>"; ?>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="chat.php">Chats</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="online.php">Online Users</a>
              </li>
              <li class="nav-item">
               <?php echo "<a class='nav-link' href='notifications.php'>Notifications</a>" ?>
              </li>
              &nbsp; &nbsp; &nbsp;
              <li class="nav-item">
                <a class="nav-link" href="post.php">Add Post</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="edit.php">Edit Profile</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="logout.php">Logout</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
	  <style>
	  .nav-link {
		  color: white;
	  }
	  </style>
      <center><div id="txtHint"></div></center>
