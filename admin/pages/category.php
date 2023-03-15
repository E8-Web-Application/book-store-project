<?php include("../../../book-store-project/admin/partials/header.php") ?>
<?php include("../../../book-store-project/admin/partials/navbar.php") ?>
<?php include("../../../book-store-project/admin/partials/sidebar.php") ?>
<?php include("../../../book-store-project/partials/connect.php");
session_start();


if (isset($_SESSION['isAdmin'])) {
   if ($_SESSION['isAdmin'] === 1) {
      header('Location: ./slider.php');
   }
} else {
   header('Location: ./login.php');
}
?>

<div class="table-container">
   <!-- <form action="./display.php" method="get">
      <input type="text" placeholder="search" name="search">
      <button>Search</button>
   </form> -->
   <div class="table">
      <div class="table-category-header">
         <span>ID</span>
         <span>Category_Name</span>
         <!-- <span>Action</span> -->
      </div>
      <?php include("../../../book-store-project/partials/connect.php");
      $results_per_page = 5;
      $sql = "SELECT count(*) FROM category;";
      $search_name =mysqli_real_escape_string($conn,$_GET['search']);
      if ($_GET['search'] != '') {
         global $sql;
         $sql = "SELECT count(*) FROM category WHERE category_name LIKE '%$search_name%';";

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
      $sql = "SELECT * from category LIMIT $start_limit,$results_per_page";

      if ($_GET['search'] != '') {
        global $sql;
        $sql = "SELECT * FROM category where category_name LIKE '%$search_name%' LIMIT  $start_limit,$results_per_page;";
     }

      $result = mysqli_query($conn, $sql);

      ?>
      <?php if (mysqli_num_rows($result) > 0) {

         while ($row = mysqli_fetch_assoc($result)) {
      ?>
            <div class="table-category-body">
               <p class="t-body-id"><?php echo $row['id'] ?></p>
               <p class="t-body-category"><?php echo $row['category_name'] ?></p>
              
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
               <p><b>ID</b></p>
               <p><?php echo $row['id'] ?></p>
            </div>
            <div class="mobile-table-body">
               <p><b>Category</b></p>
               <p><?php echo $row['category_name'] ?></p>
            </div>
         </div>
   <?php }
   } ?>
   <!-- Mobile Responsive for display table-->


   <div class="display-pagination">
      <?php


      for ($i = 1; $i <= $total_pages; $i++) {
         echo "<a href='./slider.php?page=$i&&search=$search_name'>$i</a> ";
      }
      ?>
   </div>

</div>