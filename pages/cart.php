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
                ?>
      
                <div class="cart-table-body">
                <span class="table-value qty-value"><?php echo $item['qty']; ?></span>
                <span class="table-value item-value"><?php echo $item['name']; ?></span>
                <span class="table-value price-value">$<?php echo $item['price']; ?></span>
                <a href="./delete_item.php?id=<?php echo $item['product_id']; ?>">Delete</a>
                 </div>
                 
                <?php } ?>
                <!--Total and order button block  -->
                <div class="total-order">
                    <div class="total-block">
                    <span >Total:</span>
                    <span> $<?php echo $total; ?></span>
                    </div>
                    <div class="order-btn-block">
                        <a href="./check_order.php">Order</a>
                    </div>
                </div>
                <!--Total and order button block  -->
        </div>
     </div>
</div>
<?php include("../partials/footer.php"); ?>
