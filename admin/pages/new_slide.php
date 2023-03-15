<?php include("../../../book-store-project/admin/partials/header.php") ?>
<?php include("../../../book-store-project/admin/partials/navbar.php") ?>
<?php include("../../../book-store-project/admin/partials/sidebar.php") ?>
<?php include("../../../book-store-project/partials/connect.php"); 
session_start();


if(isset($_SESSION['isAdmin'])){
  if($_SESSION['isAdmin']===1){
     header('Location: ./new_product.php');
  }

  }
  else{
     header('Location: ./login.php');
  }

?>
     
    
    <div class="container">
        <form action="./new_slide_process.php" class="form-container" method="post" enctype="multipart/form-data">
              <div class="form-control">
                <label for="name">Title</label>
                <input type="text" name="title" id="title">
              </div>  
               <div class="form-control">
                <label for="content">Content</label>
                <textarea name="content" id="content" cols="30" rows="5"></textarea>
              </div>
             
              <div class="form-control form-checkbox">
                <label for="showSlide">Show Slide</label>
                <input type="checkbox" name="showSlide" id="showSlide">
              </div>
                <div class="form-control ">
                <label for="name">Image</label>
                <input type="file" name="image" id="image">
              </div>
              <div class="btn-block">
                <a class="btn btn-back" href="../../../book-store-project/pages/index.php">Back Home</a>
                <button type="submit" class="btn btn-back">Save</button>
              </div>
        </form>
    </div>
</body>
</html>