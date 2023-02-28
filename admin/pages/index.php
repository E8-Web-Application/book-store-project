<?php include("../../../book-store-project/admin/partials/header.php") ?>
<?php include("../../../book-store-project/admin/partials/navbar.php") ?>
<?php include("../../../book-store-project/admin/partials/sidebar.php") ?>
<?php include("../../../book-store-project/partials/connect.php") ?>
     
    
    <div class="container">
        <form action="./insert.php" class="form-container" method="post" enctype="multipart/form-data">
              <div class="form-control">
                <label for="name">Book Name</label>
                <input type="text" name="name" id="name">
              </div>
              <div class="form-control">
                <label for="publisher">Publisher</label>
                <input type="text" name="publisher" id="publisher">
              </div>
              <div class="form-control">
                <label for="author">Author</label>
                <input type="text" name="author" id="author">
              </div>
              <div class="form-control">
                <label for="first_publish">First Publish</label>
                <input type="date" name="first_publish" id="first_publish">
              </div>
              <div class="form-control">
                <label for="language">Language</label>
                <input type="text" name="language" id="language">
              </div>
              <div class="form-control">
                <label for="page">Page</label>
                <input type="number" name="page" id="page">
              </div>
              <div class="form-control">
                <label for="price">Price</label>
                <input type="text" name="price" id="price">
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
                <textarea name="description" id="description" cols="30" rows="10"></textarea>
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