<?php 
session_start();
?>

<nav class="admin-navbar">
      <h1>Dashboard</h1>
       <div class="admin-account">
       <i class="fa-solid fa-user"></i>
       <?php if(!isset($_SESSION['isAdmin'])){?>
            <a href="../pages/login.php">login</a>
      <?php }?>
        <?php if($_SESSION['isAdmin']==1){?>
        <a href="../pages/logout.php">logout</a>
        <?php }?>
       
       </div>
</nav>