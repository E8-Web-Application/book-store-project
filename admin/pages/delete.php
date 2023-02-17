<?php 
 include("../../../book-store-project/partials/connect.php");
$id=$_GET['id'];
$sql="DELETE FROM `product` WHERE id=$id";
if(mysqli_query($conn,$sql)){
    // header('Location: ../../../../../book-store-project/admin/pages/display.php');
    echo("Nice");
}
else{

}
?>