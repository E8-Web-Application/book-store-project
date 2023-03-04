<?php include("../../../book-store-project/admin/partials/header.php") ?>
<?php include("../../../book-store-project/admin/partials/navbar.php") ?>
<?php include("../../../book-store-project/admin/partials/sidebar.php") ?>
<?php include("../../../book-store-project/partials/connect.php") ;
session_start();


if(isset($_SESSION['isAdmin'])){
if($_SESSION['isAdmin']===1){
   header('Location: ./display.php');
}

}
else{
   header('Location: ./login.php');
}
?>

<div class="table-container">
    <div class="table">
      <div class="table-header">
         <span>name</span>
         <span>Price</span>
         <span>Category</span>
         <span>Image</span>
         <span>Action</span>
      </div>
      <?php include("../../../book-store-project/partials/connect.php");
           $results_per_page = 5;
           $sql = "SELECT count(*) FROM product;";
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
      $sql = "SELECT product.id as id,product.name as name,product.image as image,category.category_name as category_name,product.price as price FROM `product` INNER JOIN `category` ON product.category_id=category.id LIMIT $start_limit,$results_per_page";
      $result = mysqli_query($conn, $sql);

      ?>
      <?php if (mysqli_num_rows($result) > 0) {

         while ($row = mysqli_fetch_assoc($result)) {
      ?>
            <div class="table-body">
               <p class="t-body-name"><?php echo $row['name'] ?></p>
               <p class="t-body-price">$<?php echo $row['price'] ?></p>
               <p class="t-body-category"><?php echo $row['category_name'] ?></p>
               <div class="t-body-image">
                  <img width="50" height="80" style="object-fit: cover;" src="../../../book-store-project/images/<?php echo $row['image'] ?>" alt="<?php echo $row['image'] ?>" >
               </div>
               <div class="action">
                  <a href="./delete.php?id=<?php echo $row['id']; ?>">
                     <i class="fa-solid fa-trash"></i>
                  </a>
                  <a href="./update.php?id=<?php echo $row['id']; ?>">
                     <i class="fa-solid fa-pen-to-square"></i>
                  </a>
               </div>
            </div>
      <?php }
      } ?>
   </div> 
   


   <!-- Mobile Responsive for display table-->
    <?php 
      $result2 = mysqli_query($conn, $sql);
     if(mysqli_num_rows($result2)>0){
       while($row=mysqli_fetch_assoc($result2)){
    ?>   

     <div class="mobile-table-container">
         <div class="mobile-table-body">
            <p><b>Name</b></p>
            <p><?php echo $row['name'] ?></p>
         </div>
         <div class="mobile-table-body">
            <p><b>Price</b></p>
            <p>$<?php echo $row['price'] ?></p>
         </div>
         <div class="mobile-table-body">
            <p><b>Category</b></p>
            <p><?php echo $row['category_name'] ?></p>
         </div>
         <div class="mobile-table-body">
            <p><b>Image</b></p>
             <img  alt="" width="50" height="80" style="object-fit: cover;" src="../../../book-store-project/images/<?php echo $row['image'] ?>" alt="<?php echo $row['image'] ?>" > 
         </div>
         <div class="mobile-table-body">
            <p><b>Action</b></p>
           <div style="display: flex; gap:10px;">
           <a href="./delete.php?id=<?php echo $row['id']; ?>"> 
           <i class="fa-solid fa-trash"></i></a>
           <a href="./update.php?id=<?php echo $row['id']; ?>"> 
           <i class="fa-solid fa-pen-to-square"></i></a>
           </div>
         </div>
     </div>
     <?php }} ?>
   <!-- Mobile Responsive for display table-->


   <div class="display-pagination">
      <?php
 
 
      for ($i = 1; $i <= $total_pages; $i++) {
         echo "<a href='./display.php?page=$i'>$i</a> ";
     }
      ?>
   </div>

</div>