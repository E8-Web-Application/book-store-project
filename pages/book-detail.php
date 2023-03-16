<?php include("../partials/header.php"); ?>
<?php include("../partials/navbar.php") ?>
<?php include("../partials/connect.php")?>
<?php 
session_start();
$id=$_GET['id'];
$sql="SELECT * FROM product WHERE id=$id";

$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
?>

<div class="book-detail-container">
    <div class="book-detail-card">
         <div class="book-detail-image">
            <img width="200" height="300" style="object-fit: cover;" src="../images/<?php echo $row['image'] ?>" alt="">
         </div>
         <div class="book-detail-description">
             <h1><?php echo $row['name'] ?></h1>
             <p><?php echo $row['description'] ?></p>
             <div class="book-detail-publisher">
                <p>Publisher</p>
                <p><?php echo $row['publisher'] ?></p>
             </div>
             <div class="book-detail-publisher">
                <p>Author</p>
                <p><?php echo $row['author'] ?></p>
             </div>
             <div class="book-detail-publisher">
                <p>First Publish</p>
                <p><?php echo $row['first_publish'] ?></p>
             </div>
             <div class="book-detail-publisher">
                <p>Language</p>
                <p><?php echo $row['language'] ?></p>
             </div>
             <div class="book-detail-publisher">
                <p>Pages</p>
                <p><?php echo $row['page'] ?>P</p>
             </div>
             <div class="book-detail-publisher">
                <p>Price</p>
                <p>$<?php echo $row['price']; ?></p>
             </div>
             <div class="book-detail-publisher">
                <div class="book-add-cart">
                <a href="../../book-store-project/pages/insert.php?value=1&&name=<?php echo $row['name'] ?>&&price=<?php echo $row['price'] ?>&&qty=1&&id=<?php echo $row['id']; ?>">Add To Cart</a>
                </div>
             </div>
         </div>
    </div>
    <div class="comment-container">
      <div class="comment-field">
         <form method="post" action="./<?php if(!isset($_SESSION['user_id'])){echo "sign-in.php";}else{ echo "comment_process.php";} ?>">
         <div class="form-control">
                <label for="description">Leave comments</label>
                <textarea placeholder="Leave your comment right here!" name="comment_text" id="description" cols="30" rows="5"></textarea>
              </div>
              <input type="hidden" name="product_id" value="<?php echo $id; ?>">
              <div class="btn-block">
                <button type="submit" class="btn btn-back">Comment</button>
              </div>
         </form>
      </div>
   
<!-- Comment Block Start -->
<?php 
 $sql="SELECT * FROM `product_comments` as pc INNER JOIN user as u on u.id=pc.user_id WHERE product_id='$id';";
 $result=mysqli_query($conn,$sql);
 

?>

      <div class="comment-list">
          <?php
          if(mysqli_num_rows($result) <=0){       
          ?>
           <div class="no-comment">
             <p>No comments have been posted here yet.</p>
           </div>
          <?php }?>
         <?php while($row=mysqli_fetch_assoc($result)){ ?> 
         <div class="comment-block">
            <div class="user-comment">
               <div class="comment-block-top">
                  <div class="user-profile">
                  <div class="cover">
                  <?php if($row['image']!="") {?>
                    <img src="../..//book-store-project/images/<?=$row['image']?>" alt="">
                  <?php } else { ?>
                     <i class="fa-solid fa-user"></i>
                     <?php }?>
                  </div>
                  <p class="user-name"><b><?php echo $row['first_name'] ?></b></p>
                  </div>
                  <p style="font-size: 15px;" class="comment-time"><?php echo $row['created_date'] ?></p>
               </div>
               <p><?php echo $row['comment_text'] ?></p>
              
            </div>
         </div>
          
         <?php }?>
      </div>

      <!-- Comment Block End -->
    </div>
</div>

<?php include("../partials/footer.php"); ?>