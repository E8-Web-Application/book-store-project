<?php include("../../../book-store-project/admin/partials/header.php") ?>
<?php include("../../../book-store-project/admin/partials/navbar.php") ?>
<?php include("../../../book-store-project/admin/partials/sidebar.php") ?>
 <?php 
 include("../../../book-store-project/partials/connect.php");
 $id=$_GET['id'];
 $sql = "SELECT product.id as id,product.name as name,product.image as image,category.category_name as category_name,product.price as price FROM `product` INNER JOIN `category` ON product.category_id=category.id where product.id=$id";
 $result = mysqli_query($conn, $sql); 
 $row=mysqli_fetch_assoc($result);
 $category_id=$row['id'];
 
 ?>    
    
    <div class="container">
        <form action="" class="form-container" method="post" enctype="multipart/form-data">
              <div class="form-control">
                <label for="name">Book Name</label>
                <input type="text" name="name" id="name" value="<?php echo $row['name']?>">
              </div>
              <div class="form-control">
                <label for="price">Book Price</label>
                <input type="text" name="price" id="price" value="<?php echo $row['price']?>">
              </div>
              <div class="form-control">
                <label for="category">Category</label>
                 <select name="category" id="category">
                    <option  value="1" <?php if ($row['category_name'] == 'popular'){ ?> selected <?php }?>>Popular</option>
                    <option  value="2"  <?php if ($row['category_name'] == 'motivation'){ ?> selected <?php }?>>Motivation</option>
                 </select>
              </div>
              <div class="form-control">
                <label for="name">Image</label>
                <input type="file" name="image" id="image">
              </div>
              <div class="btn-block">
                <a class="btn btn-back" href="#">Back Home</a>
                <button type="submit" class="btn btn-back">Save</button>
              </div>
        </form>
    </div>
</body>
</html>




<?php
include("../../../book-store-project/partials/connect.php");
   if(isset($_POST['name'])){
    $id=$_GET['id'];
  $book_name=$_POST['name'];
  $book_price=$_POST['price'];
  $book_category=$_POST['category'];
  $sql="";
  if (isset($_FILES['image'])&&$_FILES['image']['name']!="") {
    $file = $_FILES['image'];
    $destination = '../../images/' . $file['name'];
    $book_cover=$file['name'];
    move_uploaded_file($file['tmp_name'], $destination);
    global $sql;
    $sql="UPDATE product SET name='$book_name',image='$book_cover',price='$book_price',category_id='$book_category' WHERE id=$id;";
  }
  else{
    global $sql;
    $sql="UPDATE product SET name='$book_name',price='$book_price',category_id='$book_category' WHERE id=$id;";
  }
 
  // execute the insert statement
  if (mysqli_query($conn, $sql)) {
    echo "Record inserted successfully";
    header('Location: ../../../../../book-store-project/admin/pages/display.php');
  } else {
    echo "Error inserting record: " . mysqli_error($conn);
  }
  
   }
?>

