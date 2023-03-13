
<?php include("../partials/connect.php")?>
<?php 
session_start();
$product_id=mysqli_real_escape_string($conn,$_POST['product_id']);
$comment_text=mysqli_real_escape_string($conn,$_POST['comment_text']);
$user_id=mysqli_real_escape_string($conn,$_SESSION['user_id']);
$date = date('Y-m-d H:i:s');
$sql="INSERT INTO `product_comments`( `product_id`, `user_id`, `comment_text`,`created_date`) VALUES ('$product_id','$user_id','$comment_text','$date')";

if(mysqli_query($conn,$sql)){
    header('Location: ./book-detail.php?id='.$product_id);
}
else{
    echo mysqli_error($conn);
}
?>