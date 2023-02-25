<?php include("../partials/header.php"); ?>
<?php include("../partials/navbar.php") ?>
<?php include("../partials/banner.php") ?>
<!-- Quote Block Start -->

<div class="quote-block">
  <div class="quote-image">
    <i style="font-size: 100px; color:#ed5724" class="fa-solid fa-leaf"></i>
  </div>
  <div class="quote-text">
    <h3>
      “Every day is a journey and the journey itself is home”
    </h3>
  </div>
</div>
<!-- Quote Block End -->
<!-- Book Container Blook Start -->
<div class="book-block">
  <!-- Query to retrive each category from category table Start Tag-->
  <?php
  include("../partials/connect.php");
  $sql = "SELECT * FROM category";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      $c_name = $row['category_name'];
  ?>
      <!--Query to retrive each category from category table End Tag -->




      <!-- Category Header Start Tag -->
      <div class="book-block-header">
         <div class="book-block-header-category-name">
         <h3><?php echo $row['category_name'] ?></h3>
         <a href="./category.php?search=<?php echo $c_name ?>">See More</a>
  
         </div>
         <div class="line"></div>
      </div>
      <!-- Category Header End Tag -->


      <!-- Book Cart Start Tag-->
      <div class="book-block-card">

        <!-- Query To Retrive product (book) from product table start tag -->
        <?php
        include("../partials/connect.php");
        $sql = "SELECT * FROM product WHERE category_id in(SELECT id from category WHERE category_name='$c_name') LIMIT 0,8 ;";
        $product_result = mysqli_query($conn, $sql);
        ?>
        <!-- Query To Retrive product (book) from product table End tag -->

        <?php if (mysqli_num_rows($product_result) > 0) {
          while ($product_row = mysqli_fetch_assoc($product_result)) {
        ?>

            <!-- A book Cart Start Tag -->
            <div class="book-card">
              <div class="book-cover">
                <img src="http://localhost/book-store-project/images/<?php echo $product_row['image'] ?>" alt="<?php echo $product_row['image'] ?>">
              </div>
              <div class="book-name">
                <h4><?php echo $product_row['name'] ?></h4>
              </div>
              <div class="book-price">
                <p>$<?php echo $product_row['price'] ?></p>
              </div>
              <div class="book-add-cart">
                <a href="../../book-store-project/pages/insert.php?value=1&&name=<?php echo $product_row['name'] ?>&&price=<?php echo $product_row['price'] ?>&&qty=1&&id=<?php echo $product_row['id']; ?>">Add To Cart</a>
              </div>
            </div>

            <!-- A book Cart End Tag -->
        <?php }
        } ?>
      </div>

      <!-- Book Cart End Tag-->
  <?php
    }
  }
  ?>
</div>
<!-- Book Container Blook Start -->
<?php include("../partials/footer.php"); ?>