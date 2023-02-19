<?php session_start(); ?>

<?php include("../partials/header.php"); ?>
<?php include("../partials/navbar.php") ?>
<div class="account-container">
  <h1 style="text-align: center;">Welcome! <?php echo $_SESSION['user_name'] ?></h1>
  <div style="text-align: center;">
    <a href="./logout.php">Logout</a>
  </div>
</div>


<?php include("../partials/footer.php"); ?>