<?php
// include("../../book-store-project/partials/connect.php");
// if (isset($_GET['name'])) {
//   $name=$_GET['name'];
//   $price=$_GET['price'];
//   $qty=$_GET['qty'];
   
//  $sql="INSERT INTO cart( name, price, qty) VALUES ('$name','$price','$qty');";
  
//  if(mysqli_query($conn,$sql)){
//   header('Location: ../../book-store-project/pages/cart.php');
//  }

// } else {
//   // header('Location: ../../book-store-project/pages/index.php');

// }



?>


<?php 
// Start the session
session_start();
if (isset($_GET['name'])) {
  if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
  }

  // Check if the item is already in the cart
  $id = $_GET['id'];
  foreach ($_SESSION['cart'] as $key => $item) {
    if ($item['product_id'] == $id) {
      // Increase the quantity of the existing item
      $_SESSION['cart'][$key]['qty'] += $_GET['qty'];
      $_SESSION['cart'][$key]['price'] = $_SESSION['cart'][$key]['qty'] * $_SESSION['cart'][$key]['unit_price'];
      header('Location: ../../book-store-project/pages/cart.php');
      exit();
    }
  }

  // Add the new item to the cart
  $name = $_GET['name'];
  $unit_price = $_GET['price'];
  $qty = $_GET['qty'];
  $item = array('product_id' => $id, 'qty' => $qty, 'unit_price' => $unit_price, 'price' => $qty * $unit_price, 'name' => $name);
  array_push($_SESSION['cart'], $item);
  header('Location: ../../book-store-project/pages/cart.php');
}



?>