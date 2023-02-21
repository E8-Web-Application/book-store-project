 <!-- navbar start -->
 <?php
 session_start();
 $count=0;
 if(isset($_SESSION['cart'])) {
  global $count;
     $count = count($_SESSION['cart']);
 }
else{
 global $count;
 $count=0;
}
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
       <a href="../../book-store-project/pages/category.php?search=popular">Category</a>
     </li>
     <li>
       <a href="../../book-store-project/pages/<?php if(isset($_SESSION['user_id'])){echo 'account.php';} else{echo 'sign-in.php';}  ?>">Account <i class="fa-solid fa-user"></i></a>
     </li>
     <li>
       <a href="../../book-store-project/pages/cart.php">
         <i class="fa-solid fa-cart-shopping"></i>
         <span class="cart">
    <?php echo $count;?>

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

    <?php echo $count; ?>
         </span>
       </a>

     </li>
   </ul>
 </div>
 
 <!-- navbar end -->