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
if (isset($_POST['category_name'])) {
    $category_name=$_POST['category_name'];
     $sql="INSERT INTO `category`( `category_name`) VALUES ('$category_name');";
// Execute the statement
if (mysqli_query($conn,$sql)) {
    echo "Record inserted successfully";
    header('Location: ../../../../../book-store-project/admin/pages/category.php');
  } else {
    echo "Error inserting record: " .mysqli_error($conn);
  }
 
}  
?>