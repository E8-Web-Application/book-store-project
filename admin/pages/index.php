<?php include("../../../book-store-project/admin/partials/header.php") ?>
<?php include("../../../book-store-project/admin/partials/navbar.php") ?>
<?php include("../../../book-store-project/admin/partials/sidebar.php") ?>
     
    
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
                    <option value="1">Popular</option>
                    <option value="2">Motivation</option>
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