 <!-- navbar start -->
 <?php
   include("../partials/connect.php");
// Execute the query to get the total number of rows in the table
$sql= "SELECT COUNT(*) as total_rows FROM cart";
$result = mysqli_query($conn,$sql);

// Fetch the result and get the total number of rows
$row = mysqli_fetch_assoc($result);
$total_rows = $row['total_rows'];

 

 
 ?>
 <nav class="navbar">
   <a href="../../book-store-project/pages/index.php" class="nisset-logo">
     <h1>Nisset <span class="sr">S.R.S</span></h1>
   </a>
   <ul class="navbar-link-block">
     <li>
     <a href="../../book-store-project/pages/index.php">Home</a>
     </li>
     <li>
       <a href="../../book-store-project/pages/category.php">Category</a>
     </li>
     <li>
       <a href="../../book-store-project/pages/sign-in.php">Account <i class="fa-solid fa-user"></i></a>
     </li>
     <li>
       <a href="../../book-store-project/pages/cart.php">
         <i class="fa-solid fa-cart-shopping"></i>
         <span class="cart">
    <?php echo $total_rows ?>

         </span>
       </a>

     </li>
   </ul>
   <div class="menu">
     <div class="line line1"></div>
     <div class="line line2"></div>
     <div class="line line3"></div>
   </div>

 </nav>
 <div class="navbar-mobile">
   <ul class="navbar-block-link-block">
     <li>
       <a href="../../book-store-project/pages/index.php">Home</a>
     </li>
     <li>
       <a href="../../book-store-project/pages/category.php">Category</a>
     </li>
     <li>
       <a href="../../book-store-project/pages/sign-in.php">Account <i class="fa-solid fa-user"></i></a>
     </li>
     <li>
       <a href="../../book-store-project/pages/cart.php">Cart
         <i class="fa-solid fa-cart-shopping"></i>
         <span class="cart"> 

    <?php echo $total_rows ?>
         </span>
       </a>

     </li>
   </ul>
 </div>
 
 <!-- navbar end -->