<?php 
session_start();
include("../partials/connect.php");
$order_id=0;
if($_SESSION['total']!=0){
    $user_id=$_SESSION['user_id'];
    $total=$_SESSION['total'];
    $sql="INSERT INTO orders(user_id,total_price) VALUES('$user_id','$total');";
    if(mysqli_query($conn,$sql)){
        // echo "Success";
    }
    else{
        // echo "Failed";
    }
    global $order_id;
    $order_id=mysqli_insert_id($conn);
}

if(isset($_SESSION['cart'])){
    global $order_id;
    foreach ($_SESSION['cart'] as $item) {
        $product_id = $item['product_id'];
        $name = $item['name'];
        $qty = $item['qty'];
        $unit_price=$item['unit_price'];
        $user_id=$_SESSION['user_id'];
        $total_price=$qty*$unit_price;
        // Insert the item into the cart_items table
        $sql = "INSERT INTO cart (user_id,product_id,qty,price,order_id,unit_price)
                VALUES ($user_id,'$product_id','$qty','$total_price','$order_id','$unit_price');";
        // Execute the query using your preferred database librar

        if(mysqli_query($conn,$sql)){
            echo "Work";
        }
        else{
        }
      }
      header('Location: ../../book-store-project/pages/order.php');
}



?>