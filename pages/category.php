<?php include("../partials/header.php"); ?>
<?php include("../partials/navbar.php"); ?>
<?php include ("../partials/connect.php"); ?>
<div class="category-container">
  <div class="category-navigation">
    <?php
       $c_name = $_GET['search'];
    $sql = "SELECT * FROM category";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
    ?>
      <a href="./category.php?search=<?php echo $row['category_name']; ?>"><?php echo $row['category_name']; ?></a>
    <?php
      }
    }
    ?>
  </div>
  <div class="book-block-header">
    <h3><?php echo  $c_name; ?></h3>
    <div class="line"></div>
  </div>
  <div class="book-block-card">
    <?php
 
    include("../partials/connect.php");
    $sql = "SELECT p.id as id,p.name as name,p.image as image,p.price as price ,p.category_id as category_id,c.category_name as category_name FROM `product` as p INNER JOIN category as c on c.id=p.category_id where category_name='$c_name'";
    $result = mysqli_query($conn, $sql);
    ?>
    <!-- card start -->
    <?php if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
    ?>
        <div class="book-card">
          <div class="book-cover">
            <img src="http://localhost/book-store-project/images/<?php echo $row['image'] ?>" alt="<?php echo $row['image'] ?>">
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
</div>

<?php include("../partials/footer.php"); ?>