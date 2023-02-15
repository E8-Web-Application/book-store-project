<?php
include("../../book-store-project/partials/connect.php");
session_start();
if (isset($_GET['name'])) {
   
 $sql="INSERT INTO cart( name, price, qty) VALUES ('Cool',10.10,2);";
  
 if(mysqli_query($conn,$sql)){
  header('Location: ../../book-store-project/pages/cart.php');
 }

} else {
  // header('Location: ../../book-store-project/pages/index.php');

}
