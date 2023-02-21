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
                <label for="price">Book Price</label>
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