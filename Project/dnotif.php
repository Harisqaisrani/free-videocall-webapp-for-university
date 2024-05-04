<?php
$con=mysqli_connect("localhost","root","","videocall");
    if (mysqli_connect_errno()) {
     echo "Failed to connect to MySQL: " . mysqli_connect_error();
     exit();
    }
    $sql="DELETE FROM calls WHERE id = ".$_GET['dlt']."";
    mysqli_query($con,$sql);
    header('location:index.php');
?>