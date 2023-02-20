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

<!-- Book Block Start -->
<div class="book-block">
  <!-- popular book block start -->
  <div class="book-block-header">
    <h3>Popular</h3>
    <div class="line"></div>
  </div>
  <div class="book-block-card">
    <?php 
    include ("../partials/connect.php");
    $sql = "SELECT * FROM product WHERE category_id=1 ;";
    $result = mysqli_query($conn, $sql); 
  
  
?>
    <!-- card start -->
    <?php if(mysqli_num_rows($result) > 0)  {
        while($row = mysqli_fetch_assoc($result)) {
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

    <?php } }?>

    <!-- card end -->
  </div>
  <!-- popular book block end -->




   <!-- popular book block start -->
   <div class="book-block-header">
    <h3>Motivation</h3>
    <div class="line"></div>
  </div>
  <div class="book-block-card">
    <?php 
    include ("../partials/connect.php");
    $sql = "SELECT * FROM product WHERE category_id=2 ;";
    $result = mysqli_query($conn, $sql); 
  
?>
    <!-- card start -->
    <?php if(mysqli_num_rows($result) > 0)  {
        while($row = mysqli_fetch_assoc($result)) {
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
        <a href="../../book-store-project/pages/insert.php?value=1&&name=<?php echo $row['name'] ?>&&price=<?php echo $row['price'] ?>&&qty=1&&id=<?php echo $row['id']; ?>">Add To Cart</a>      </div>
      </div>

    <?php } }?>

    <!-- card end -->
  </div>
  <!-- popular book block end -->


  <!-- Book Block End -->

  <?php include("../partials/footer.php"); ?>