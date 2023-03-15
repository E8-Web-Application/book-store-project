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
 $sql = "SELECT product.id as id,product.name as name,description,publisher,author,first_publish,language,product.image as image,category.category_name as category_name,product.price as price,page FROM `product` INNER JOIN `category` ON product.category_id=category.id where product.id=$id";
 $result = mysqli_query($conn, $sql); 
 $row=mysqli_fetch_assoc($result);
 $category_id=$row['id'];
 $description=$row['description'];
 ?>    
    
    <div class="container">
        <form action="" class="form-container" method="post" enctype="multipart/form-data">
        <div class="form-control">
                <label for="name">Book Name</label>
                <input type="text" name="name" id="name" value="<?php echo $row['name'] ?>">
              </div>
              <div class="form-control">
                <label for="publisher">Publisher</label>
                <input type="text" name="publisher" id="publisher" value="<?php echo $row['publisher'] ?>">
              </div>
              <div class="form-control">
                <label for="author">Author</label>
                <input type="text" name="author" id="author" value="<?php echo $row['author'] ?>">
              </div>
              <div class="form-control">
                <label for="first_publish">First Publish</label>
                <input type="date" name="first_publish" id="first_publish" value="<?php echo $row['first_publish'] ?>">
              </div>
              <div class="form-control">
                <label for="language">Language</label>
                <input type="text" name="language" id="language" value="<?php echo $row['language'] ?>">
              </div>
              <div class="form-control">
                <label for="page">Page</label>
                <input type="number" name="page" id="page" value="<?php echo $row['page'] ?>">
              </div>
              <div class="form-control">
                <label for="price">Price</label>
                <input type="text" name="price" id="price" value="<?php echo $row['price'] ?>">
              </div>
              <div class="form-control">
                <label for="category">Category</label>
                 <select name="category" id="category">
                    <?php
                    $sql="SELECT * FROM category"; 
                       $result=mysqli_query($conn,$sql);
                       if(mysqli_num_rows($result)>0){
                        while($row=mysqli_fetch_assoc($result)){
                       
                      ?>
                    <option value="<?php echo $row['id'] ?>"><?php echo $row['category_name']; ?></option>
                    <?php 
                    }}
                    ?>
                 </select>
              </div>
              <div class="form-control">
                <label for="description">Description</label>
                <textarea name="description" id="description" cols="30" rows="10" ><?php echo $description;?></textarea>
              </div>
             
              <div class="form-control">
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




<?php
include("../../../book-store-project/partials/connect.php");
   if(isset($_POST['name'])){
    $id=$_GET['id'];
    $book_name=mysqli_real_escape_string($conn,$_POST['name']);
    $book_description=mysqli_real_escape_string($conn,$_POST['description']);
    $book_publisher=mysqli_real_escape_string($conn,$_POST['publisher']);
    $book_author=mysqli_real_escape_string($conn,$_POST['author']);
    $book_first_publish=mysqli_real_escape_string($conn,$_POST['first_publish']);
    $book_language=mysqli_real_escape_string($conn,$_POST['language']);
    $book_page=mysqli_real_escape_string($conn,$_POST['page']);
    $book_price=mysqli_real_escape_string($conn,$_POST['price']);
    $book_category=mysqli_real_escape_string($conn,$_POST['category']);
    $book_cover=mysqli_real_escape_string($conn,$file['name']);
  $book_category=$_POST['category'];
  $sql="";
  if (isset($_FILES['image'])&&$_FILES['image']['name']!="") {
    $file = $_FILES['image'];
    $destination = '../../images/' . $file['name'];
    $book_cover=mysqli_real_escape_string($conn,$file['name']);
    move_uploaded_file($file['tmp_name'], $destination);
    global $sql;
    $sql="UPDATE product SET name='$book_name',description='$book_description',publisher='$book_publisher',author='$book_author',first_publish='$book_first_publish',language='$book_language',page='$book_page',image='$book_cover',price='$book_price',category_id='$book_category' WHERE id=$id;";
  }
  else{
    global $sql;
    $sql="UPDATE product SET name='$book_name',description='$book_description',publisher='$book_publisher',author='$book_author',first_publish='$book_first_publish',language='$book_language',page='$book_page',price='$book_price',category_id='$book_category' WHERE id=$id;";
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

