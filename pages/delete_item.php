<?php 
// include("../../book-store-project/partials/connect.php");
// if(isset($_GET['id'])&&$_GET['id']!=""){
//     $id=$_GET['id'];
//   $sql="DELETE FROM cart WHERE cart_id=$id";
//   if(mysqli_query($conn,$sql)){
//     header('Location: ../../book-store-project/pages/cart.php');
//   }
//   else{
//     echo mysqli_errno($conn);
//   }
// }

?>

<?php 
session_start();
if(isset($_GET['id'])&&$_GET['id']!=""){
  foreach ($_SESSION['cart'] as $key => $item) {
    if ($item['product_id'] == $_GET['id']) {
      unset($_SESSION['cart'][$key]);
      break;
    }
  }
  header('Location: ../../book-store-project/pages/cart.php');
}


?>