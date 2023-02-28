<?php include("../partials/header.php"); ?>
<?php include("../partials/navbar.php"); ?>
<?php include("../partials/connect.php"); ?>
<div class="category-container">

  <!-- Category Navigation Start Block -->
  <div class="category-navigation">
    <?php
    $c_name = $_GET['search'];
    $color='gray';
    
    $sql = "SELECT * FROM category";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        if($c_name==$row['category_name']){
          global $color;
          $color="#ed5724";
        }
        else{
          global $color;
          $color="gray";
        }
        
    ?>
        <a class="category-nav-name" style="color: <?php echo $color;  ?>" href="./category.php?search=<?php echo $row['category_name']; ?>"><?php echo $row['category_name']; ?></a>
    <?php
      }
    }
    ?>
  </div>
  <!-- Category Navigation End Block -->

  <!-- Category's Name Start Block -->
  <div class="book-block-header">
    <h3><?php echo  $c_name; ?></h3>
    <div class="line"></div>
  </div>
  <!-- Category's Name Start Block -->


  <div class="book-block-card">
    <!-- Query By Category Name Start Block -->
    <?php
    include("../partials/connect.php");
    $results_per_page = 10;
    $sql = "SELECT count(*) FROM product INNER JOIN category ON product.category_id=category.id WHERE category.category_name='$c_name'";
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

    $sql = "SELECT p.id as id,p.name as name,p.image as image,p.price as price ,p.category_id as category_id,c.category_name as category_name FROM `product` as p INNER JOIN category as c on c.id=p.category_id where category_name='$c_name' LIMIT $start_limit,$results_per_page";
    $result = mysqli_query($conn, $sql);
    ?>
    <!-- Query By Category Name End Block -->


    <!-- card start -->
    <?php if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
    ?>
        <div class="book-card">
          <div class="book-cover">
           <a href="./book-detail.php?id=<?php echo $row['id']; ?>">
           <img src="http://localhost/book-store-project/images/<?php echo $row['image'] ?>" alt="<?php echo $row['image'] ?>">
           </a>
          </div>
          <div class="book-name">
            <h4><?php echo $row['name'] ?></h4>
          </div>
          <div class="book-price">
            <p>$<?php echo $row['price'] ?></p>
          </div>
          <div class="book-add-cart">
            <a href="../../book-store-project/pages/insert.php?value=1&&name=<?php echo $row['name'] ?>&&price=<?php echo $row['price'] ?>&&qty=1&&id=<?php echo $row['id']; ?>">Add To Cart</a>
          </div>
        </div>
    <?php }
    } ?>
    <!-- card end -->


  </div>
  <div class="category-pagination">
    <?php

    if ($total_pages > 1) {
      for ($i = 1; $i <= $total_pages; $i++) {
        echo "<a href='./category.php?search=$c_name&&page=$i'>$i</a> ";
      }
    }
    ?>
  </div>
</div>

<?php include("../partials/footer.php"); ?>