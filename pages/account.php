<?php session_start(); ?>
<?php include("../partials/header.php"); ?>
<?php include("../partials/navbar.php") ?>
<?php include("../../../book-store-project/partials/connect.php");?>
<?php 
$user_id=$_SESSION['user_id'];
$sql ="SELECT * from user where id='1';";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
echo $row['image'];
?>
<?php include("../partials/footer.php"); ?>
