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
            </div>
                <?php include("../partials/connect.php");
                 $sql = "SELECT * FROM cart;";
                $result = mysqli_query($conn, $sql); 
                ?>

                <?php if(mysqli_num_rows($result) > 0)  {
               while($row = mysqli_fetch_assoc($result)) {
            ?>
                <div class="cart-table-body">
                <span class="table-value qty-value"><?php echo $row['qty']; ?></span>
                <span class="table-value item-value"><?php echo $row['name']; ?></span>
                <span class="table-value price-value"><?php echo $row['price']; ?></span>
                 </div>
                <?php } }?>
                <!--Total and order button block  -->
                <div class="total-order">
                    <div class="total-block">
                    <span >Total:</span>
                    <span>  $5</span>
                    </div>
                    <div class="order-btn-block">
                        <button>Order</button>
                    </div>
                </div>
                <!--Total and order button block  -->
        </div>
     </div>
</div>
<?php include("../partials/footer.php"); ?>
