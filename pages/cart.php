<?php session_start(); ?>
<?php include("../partials/header.php"); ?>
<?php include("../partials/navbar.php"); ?>
<div class="cart-container">
<h1>Your Shopping Cart</h1>
     <div class="cart-order-block">
        <div class="cart-image">
        <i class="fa-solid fa-cart-shopping" style="font-size:200px; color:#ed5724;"></i>
        </div>
        <div class="cart-order">
            <div class="cart-table-header">
                <span class="qty table-title">Qty</span>
                <span class="item table-title">Item</span>
                <span class="price table-title">Price</span>
                <span class="action table-title">Action</span>
            </div>
                
                <?php
                $total=0;
                foreach ($_SESSION['cart'] as $item){
                    global $total;
                    $total+=$item['price'];
                    $_SESSION['total']=$total;
                ?>
      
                <div class="cart-table-body">
                <span class="table-value qty-value"><?php echo $item['qty']; ?></span>
                <span class="table-value item-value"><?php echo $item['name']; ?></span>
                <span class="table-value price-value">$<?php echo $item['price']; ?></span>
                <a style="color:#ed5724;" href="./delete_item.php?id=<?php echo $item['product_id']; ?>">
                <i class="fa-solid fa-trash"></i>
            </a>
                 </div>
                 
                <?php } ?>
                <?php if($total==0){?>
                    <div class="cart-message">
                    <p>Please add items to shopping cart!</p>
                </div>
                <?php }?>    
                <!--Total and order button block  -->
                <div class="total-order">
                    <div class="total-block">
                    <span >Total:</span>
                    <span> $<?php echo $total; ?></span>
                    </div>
                    <div class="order-btn-block">
                        <a href="./<?php if($total==0){echo "index.php";} else{ if(!isset($_SESSION['user_id'])){echo "sign-in.php";} else{echo "checkout.php";} } ?>">Order</a>
                    </div>
                </div>
                <!--Total and order button block  -->
        </div>
     </div>
</div>
<?php include("../partials/footer.php"); ?>
