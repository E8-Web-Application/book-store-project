<?php include("../../../book-store-project/admin/partials/header.php") ?>
<?php include("../../../book-store-project/admin/partials/navbar.php") ?>
<?php include("../../../book-store-project/admin/partials/sidebar.php") ?>
<?php include("../../../book-store-project/partials/connect.php");
session_start();


if (isset($_SESSION['isAdmin'])) {
   if ($_SESSION['isAdmin'] === 1) {
      header('Location: ./display.php');
   }
} else {
   header('Location: ./login.php');
}
?>

<div class="table-container">
   <form action="./order_list.php" method="get">
      <input type="number" placeholder="order number" name="search" min="1">
      <button>Search</button>
   </form>
   <div class="table">
      <div class="table-header order-list-header">
         <span>Cus_ID</span>
         <span>Product</span>
         <span>Qty</span>
         <span>Price</span>
         <span>Image</span>
         <span>Order_ID</span>
      </div>
      <?php include("../../../book-store-project/partials/connect.php");
      $results_per_page = 5;
      $sql = "SELECT count(*) FROM cart;";
      $order_id =mysqli_real_escape_string($conn,$_GET['search']);
      if ($_GET['search'] != '') {
         global $sql;
         $sql = "SELECT count(*) FROM cart where order_id='$order_id';";
       }
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_row($result);
      $total_results = $row[0];
      $total_pages = ceil($total_results / $results_per_page);
      if (!isset($_GET['page'])) {
         $page = 1;
      } else {
         $page = $_GET['page'];
      }
      $start_limit = ($page - 1) * $results_per_page;
      $sql = "SELECT * FROM `cart` INNER JOIN `product` ON cart.product_id=product.id LIMIT $start_limit,$results_per_page";

      if ($_GET['search'] != '') {
          global $sql;
          $sql = "SELECT * FROM `cart` INNER JOIN `product` ON cart.product_id=product.id WHERE order_id='$order_id' LIMIT $start_limit,$results_per_page";

      }

      $result = mysqli_query($conn, $sql);

      ?>
      <?php if (mysqli_num_rows($result) > 0) {

         while ($row = mysqli_fetch_assoc($result)) {
      ?>
            <div class="table-body table-list-body">
               <p class="t-body-name"><?php echo $row['user_id'] ?></p>
               <p class="t-body-product"><?php echo $row['name'] ?></p>
               <p class="t-body-category"><?php echo $row['qty'] ?></p>
               <p class="t-body-price">$<?php echo $row['price']*$row['qty'] ?></p>
               <div class="t-body-image">
                  <img width="50" height="80" style="object-fit: cover;" src="../../../book-store-project/images/<?php echo $row['image'] ?>" alt="<?php echo $row['image'] ?>">
               </div>
               <p class="t-body-price"><?php echo $row['order_id'] ?></p>
            </div>
      <?php }
      } ?>
   </div>



   <!-- Mobile Responsive for display table-->
   <?php
   $result2 = mysqli_query($conn, $sql);
   if (mysqli_num_rows($result2) > 0) {
      while ($row = mysqli_fetch_assoc($result2)) {
   ?>

         <div class="mobile-table-container">
            <div class="mobile-table-body">
               <p><b>Cus_ID</b></p>
               <p><?php echo $row['user_id'] ?></p>
            </div>
            <div class="mobile-table-body">
               <p><b>Name</b></p>
               <p><?php echo $row['name'] ?></p>
            </div>
            <div class="mobile-table-body">
               <p><b>Qty</b></p>
               <p><?php echo $row['qty'] ?></p>
            </div>
            <div class="mobile-table-body">
               <p><b>Price</b></p>
               <p>$<?php echo $row['price']*$row['qty'] ?></p>
            </div>
            <div class="mobile-table-body">
               <p><b>Image</b></p>
               <img alt="" width="50" height="80" style="object-fit: cover;" src="../../../book-store-project/images/<?php echo $row['image'] ?>" alt="<?php echo $row['image'] ?>">
            </div>
            <div class="mobile-table-body">
               <p><b>Order_ID</b></p>
               <p><?php echo $row['order_id'] ?></p>
            </div>
         </div>
   <?php }
   } ?>
   <!-- Mobile Responsive for display table-->


   <div class="display-pagination">
      <?php


      for ($i = 1; $i <= $total_pages; $i++) {
         echo "<a href='./order_list.php?page=$i&&search=$search_name'>$i</a> ";
      }
      ?>
   </div>

</div>