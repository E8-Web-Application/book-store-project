<?php

session_start();
if(isset($_SESSION['isAdmin'])){
    if($_SESSION['isAdmin']===1){
       header('Location: ./new_product.php');
    }
  
    }
    else{
       header('Location: ./login.php');
    }


 include("../../../book-store-project/partials/connect.php");
 
$id=$_GET['id'];
$sql="DELETE FROM cart WHERE product_id=$id";
if(mysqli_query($conn,$sql)){
    global $sql;
    $sql="DELETE FROM product WHERE id = $id";
    if(mysqli_query($conn,$sql)){
        header('Location: ../../../../../book-store-project/admin/pages/display.php');
        echo("Nice");
    }
    else{
        header('Location: ../../../../../book-store-project/admin/pages/display.php');

    }
}
?>