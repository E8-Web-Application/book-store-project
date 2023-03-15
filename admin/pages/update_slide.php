<?php include("../../../book-store-project/admin/partials/header.php") ?>
<?php include("../../../book-store-project/admin/partials/navbar.php") ?>
<?php include("../../../book-store-project/admin/partials/sidebar.php") ?>
 <?php 
session_start();


if(isset($_SESSION['isAdmin'])){
    if($_SESSION['isAdmin']===1){
       header('Location: ./new_product.php');
    }
  
    }
    else{
       header('Location: ./login.php');
    }

 include("../../../book-store-project/partials/connect.php");
 $id=$_GET['id'];
 $sql = "SELECT * FROM slides where slide_number=$id;";
 $result = mysqli_query($conn, $sql); 
 $row=mysqli_fetch_assoc($result);
 ?>    
    
    <div class="container">
        <form action="" class="form-container" method="post" enctype="multipart/form-data">
        <div class="form-control">
                <label for="name">Title</label>
                <input type="text" value="<?=$row['title']?>" name="title" id="title">
              </div>  
               <div class="form-control">
                <label for="content">Content</label>
                <textarea name="content" id="content" cols="30" rows="5"><?=$row['content']?></textarea>
              </div>
             
              <div class="form-control form-checkbox">
                <label for="showSlide">Show Slide</label>
                <input type="checkbox" name="showSlide" id="showSlide"  <?php if($row['showSlide']==1){echo "checked";} ?>>
              </div>
                <div class="form-control ">
                <label for="name">Image</label>
                <input type="file" name="image" id="image">
              </div>
              <div class="btn-block">
                <a class="btn btn-back" href="../../../book-store-project/pages/index.php">Back Home</a>
                <button type="submit" class="btn btn-back">Save</button>
              </div> </form>
    </div>





<?php
include("../../../book-store-project/partials/connect.php");
   if(isset($_POST['title'])){
    $title=mysqli_real_escape_string($conn,$_POST['title']);
    $content=mysqli_real_escape_string($conn,$_POST['content']);
    $showSlide = isset($_POST['showSlide']) ? 1 : 0;

  $sql="";
  if (isset($_FILES['image'])&&$_FILES['image']['name']!="") {
    $file = $_FILES['image'];
    $destination = '../../images/' . $file['name'];
    $image=mysqli_real_escape_string($conn,$file['name']);
    move_uploaded_file($file['tmp_name'], $destination);
    global $sql;
    $sql="UPDATE slides SET title='$title',content='$content',image='$image',showSlide='$showSlide' where slide_number='$id'";
  }
  else{
    global $sql;
    $sql="UPDATE slides SET title='$title',content='$content',showSlide='$showSlide' where slide_number='$id'";
  }
 
  // execute the insert statement
  if (mysqli_query($conn, $sql)) {
    echo "Record inserted successfully";
    header('Location: ../../../../../book-store-project/admin/pages/slider.php');
  } else {
    echo "Error inserting record: " . mysqli_error($conn);
  }
  
   }
?>
