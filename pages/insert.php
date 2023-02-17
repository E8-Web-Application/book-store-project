<?php
include("../../book-store-project/partials/connect.php");
if (isset($_GET['name'])) {
  $name=$_GET['name'];
  $price=$_GET['price'];
  $qty=$_GET['qty'];
   
 $sql="INSERT INTO cart( name, price, qty) VALUES ('$name','$price','$qty');";
  
 if(mysqli_query($conn,$sql)){
  header('Location: ../../book-store-project/pages/cart.php');
 }

} else {
  // header('Location: ../../book-store-project/pages/index.php');

}
