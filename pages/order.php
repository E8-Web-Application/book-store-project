<?php session_start(); ?>
<?php include("../partials/header.php"); ?>
<?php include("../partials/navbar.php"); ?>
<?php include("../partials/connect.php"); ?>
<div class="order-container">

<div class="order-message">
    <h2>Thank You For Your Order!</h2>
</div>
<div class="order-success-pay">
    <img src="../images/success_pay.gif" width="150" height="150" style="object-fit: contain;" alt="">
</div>
<div class="order-product">
    <h3>Here's your order product.</h3>
</div>
<div class="order-header">
<?php $sql= "SELECT * FROM orders order by id desc;";
      $result=mysqli_query($conn,$sql);
      $row=mysqli_fetch_assoc($result);
      $order_id=$row['id'];
    ?>
        <p class="order-header-title">Order Id: <?php echo $row['id']; ?></p>
        <p class="order-header-title">Date : <?php echo $row['created_at']; ?></p>
    </div>
    <!-- <div class="order-item">
        <p>Items</p>
    </div> -->

     <div class="order-form-header">
        <p>Product_name</p>
        <p>Image</p>
        <p>Qty</p>
        <p>Price</p>
        <p>Unit_Price</p>
     </div>
    <div class="order-form">
    <?php
     $user_id=$_SESSION['user_id'];
     $sql="SELECT cart.qty as qty, cart.price as price, cart.unit_price as unit_price,name,image FROM cart INNER JOIN product ON product.id=cart.product_id where order_id=$order_id";
     $result = mysqli_query($conn, $sql); 
     if(mysqli_num_rows($result) > 0)  {
        while($row = mysqli_fetch_assoc($result)) {
    ?>
    <div class="order-body">
        <p><?php echo $row['name'] ?></p>
        <div>
            <img style="width:50px; height:80px; object-fit: cover;" src="../images/<?php echo $row['image'] ?>" alt="">
        </div>
        <p><?php echo $row['qty'] ?></p>
        <p>$<?php echo $row['price'] ?></p>
        <p>$<?php echo $row['unit_price'] ?></p>
    </div>

    <?php }}?>
    
    </div>
    <div class="order-total">
    <a href="./index.php">Back Home</a>
    <p>Total : $<?php echo $_SESSION['total'];?></p>
    </div>

</div>


<?php 

unset($_SESSION['cart']);
?>

<?php include("../partials/footer.php"); ?>