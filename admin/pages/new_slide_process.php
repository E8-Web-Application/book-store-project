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
if (isset($_FILES['image'])) {
    $file = $_FILES['image'];
    $destination = '../../images/' . $file['name'];
    move_uploaded_file($file['tmp_name'], $destination);
    $slide_image = $file['name'];  
    $title=$_POST['title'];
    $content=$_POST['content'];
    $showSlide = isset($_POST['showSlide']) ? 1 : 0;
     $sql="INSERT INTO `slides`( `title`, `content`, `image`, `showSlide`) VALUES ('$title','$content','$slide_image','$showSlide');";
// Execute the statement
if (mysqli_query($conn,$sql)) {
    echo "Record inserted successfully";
    header('Location: ../../../../../book-store-project/admin/pages/slider.php');
  } else {
    echo "Error inserting record: " .mysqli_error($conn);
  }
 
}  
?>