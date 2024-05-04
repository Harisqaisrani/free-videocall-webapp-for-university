<?php
include "index.php";
$sql = "SELECT * FROM post";
$statement = $connect->prepare($sql);
$statement->execute();
$result = $statement->fetchAll();
?>
<!-- main -->
    <div class="main container">
    <center>
        <br>
        <h1>Community Posts</h1>
        <br><br>
            <div class="row">
            <?php
foreach($result as $row)
printf ("<div class='col-md'>
            <div class='card' style='width: 18rem;margin-top:15px;'>
                <div class='card-body'>
                    <h5 class='card-title'> %s </h5>
                    <h6 class='card-subtitle mb-2 text-muted'> %s </h6>
                    <p class='card-text'> %s </p>
                    <a href='$domain?room=%s&username=%s' class='link card-link'>Join Room</a>
                    <a href='deletepost.php?room=%s' class='btn btn-danger card-link'>Delete Post</a>
                </div>
            </div>
        </div>", 
$row["title"], $row["subtitle"], $row["description"], $row["link"], $_SESSION['username'],$row["id"]);
?>
</div>
</center>
</div>
<style>
    .card {
        margin: 10px 0px 10px 0px;
    }
</style>
<?php include "footer.php"; ?>