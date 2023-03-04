<?php include("../../../book-store-project/admin/partials/header.php") ?>
<?php include("../../../book-store-project/admin/partials/navbar.php") ?>
<?php include("../../../book-store-project/admin/partials/sidebar.php") ?>
<?php 
session_start();

if(isset($_SESSION['isAdmin'])){
    if($_SESSION['isAdmin']===1){
       header('Location: ./index.php');
    }
    }
    else{
       header('Location: ./login.php');
    }
include("../../../book-store-project/partials/connect.php");
// Get Number of order
$order_sql = "SELECT count(*) FROM orders;";
$order_result = mysqli_query($conn, $order_sql);
$order_row = mysqli_fetch_row($order_result);
$number_order=$order_row[0];
// Get Number of product
$product_sql = "SELECT count(*) FROM product;";
$product_result = mysqli_query($conn, $product_sql);
$product_row = mysqli_fetch_row($product_result);
$number_product=$product_row[0];
//Get Number of visitors
$visitor_sql = "SELECT count(*) FROM visitors;";
$visitor_result = mysqli_query($conn, $visitor_sql);
$visitor_row = mysqli_fetch_row($visitor_result);
$number_visitor=$visitor_row[0];


 
?>



<div class="analyze-container">
    <a class="analyze-block">
        <div class="analyze-text">
            <h2>Order Received</h2>
        </div>
        <div class="analyze-number">
        <i style="font-size: 25px;" class="fa-solid fa-cart-plus"></i>  
            <h3>
                <?php echo $number_order ?>
            </h3>
        </div>
    </a>
    <a class="analyze-block">
    <div class="analyze-text">
            <h2>New Order</h2>
        </div>
        <div class="analyze-number">
        <i style="font-size: 25px;" class="fa-solid fa-cart-plus"></i>  
            <h3>
                141
            </h3>
        </div>
    </a>
    <a href="./display.php" class="analyze-block">
    <div class="analyze-text">
            <h2>Books Number</h2>
        </div>
        <div class="analyze-number">
        <i style="font-size: 25px;" class="fa-solid fa-book"></i>
            <h3>
            <?php echo $number_product ?>

            </h3>
        </div>
    </a>
    <a class="analyze-block">
    <div class="analyze-text">
            <h2>Visitors</h2>
        </div>
        <div class="analyze-number">
        <i style="font-size: 25px;" class="fa-solid fa-users"> </i>
            <h3>
            <?php echo $number_visitor ?>
                
            </h3>
        </div>
    </a>
   
</div>