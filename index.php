<?php include("./partials/header.php"); ?>
<?php include("./partials/navbar.php") ?>
<?php include("./partials/banner.php") ?>
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
    <!-- card start -->
    <?php for ($i = 0; $i < 10; $i++) {  ?>
      <div class="book-card">
        <div class="book-cover">
          <img src="./images/the-hobbit.jfif" alt="">
        </div>
        <div class="book-name">
          <h4>The Hobbit</h4>
        </div>
        <div class="book-price">
          <p>$10.99</p>
        </div>
        <div class="book-add-cart">
          <a href="./pages/set_session.php?value=200">Add To Cart</a>
        </div>
      </div>

    <?php } ?>

    <!-- card end -->
  </div>
  <!-- popular book block end -->

  <!-- movtivation book block start -->
  <div class="book-block-header">
    <h3>Popular</h3>
    <div class="line"></div>
  </div>
  <div class="book-block-card">
    <!-- card start -->
    <?php for ($i = 0; $i < 6; $i++) {  ?>
      <div class="book-card">
        <div class="book-cover">
          <img src="./images/the-hobbit.jfif" alt="">
        </div>
        <div class="book-name">
          <h4>The Hobbit</h4>
        </div>
        <div class="book-price">
          <p>$10.99</p>
        </div>
        <div class="book-add-cart">
          <a href="./pages/set_session.php?value=200">Add To Cart</a>
        </div>
      </div>
    <?php } ?>
    <!-- card end -->
    <!-- movtivation book block end -->
  </div>

  <!-- Book Block End -->

  <?php include("./partials/footer.php"); ?>