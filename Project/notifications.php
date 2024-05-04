<?php
include "header.php";
if(!isset($_SESSION['user_id']))
{
	header("location:login.php");
}
$id = $_SESSION['user_id'];
$sql = "SELECT * FROM calls WHERE call_to = $id LIMIT 10";
$statement = $connect->prepare($sql);
$statement->execute();
$result = $statement->fetchAll();
if(isset($_POST['clearall'])) {
    $sql2 = "DELETE FROM calls WHERE call_to = $id";
	$connect->exec($sql2);
}
?>
    <!--main-->
    <div class="main container">
    <center>
        <br>
        <h1>Notifications</h1>
        <br><br>
            <div class="row">
                <div class="col-md">
            <?php
            foreach($result as $row) {
            echo "<table class='table'>
            <thead>
              <tr>
                <th scope='col'> Recent Noticications </th>    
              </tr>
            </thead>
            <tbody>
            <tr>
              <th scope='row'>1</th>
              <td>".$row["call_from"]."</td>
              <td>called you at Room:</td>
              <td>".$row["room"]."</td>
              <td><a class='link' href='$domain?room=".$row["room"]."&username=".$_SESSION['username']."'>Join Call</a></td>
            </tr>
            </tbody>
            </table>"; }
        
        $connect = null;
        ?>
        </div>
        <div class="col-md">
            <form method="post">
                <input type="submit" class="btn btn-danger" name="clearall" value="Clear All">
            </form>
        </div>
        </div>
    </center>
    </div>
<style>
.tbl {
  border: solid black 1px;
  padding: 5px;
  border-collapse: collapse;
}
th, td {
  background-color: #96D4D4;
}
</style>
<?php include "footer.php" ?>