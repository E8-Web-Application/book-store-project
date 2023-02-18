<?php include("../../../book-store-project/admin/partials/header.php") ?>
<?php include("../../../book-store-project/admin/partials/navbar.php") ?>
<?php include("../../../book-store-project/admin/partials/sidebar.php") ?>
     
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
     $sql = "SELECT product.id as id,product.name as name,product.image as image,category.category_name as category_name,product.price as price FROM `product` INNER JOIN `category` ON product.category_id=category.id";
     $result = mysqli_query($conn, $sql); 
     
    ?>
  <?php if(mysqli_num_rows($result) > 0)  {

        while($row = mysqli_fetch_assoc($result)) {
      ?>
         <div class="table-body">
            <p class="t-body-name"><?php echo $row['name'] ?></p>
            <p class="t-body-price">$<?php echo $row['price']?></p>
            <p class="t-body-category"><?php echo $row['category_name']?></p>
            <div class="t-body-image">
                <img width="50" height="80" style="object-fit: cover;" src="http://localhost/book-store-project/images/<?php echo $row['image'] ?>" alt="<?php echo $row['image'] ?>" alt="">
            </div>
            <div class="action">
                <a href="./delete.php?id=<?php echo $row['id'];?>">
                <i class="fa-solid fa-trash"></i>
                </a>
                <a href="./update.php?id=<?php echo $row['id']; ?>">
                <i class="fa-solid fa-pen-to-square"></i>
                </a>
            </div>
         </div>
 <?php }} ?>
      </div>
</div>

