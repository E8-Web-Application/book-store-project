<?php include("../partials/header.php"); ?>
<?php include("../partials/navbar.php") ?>
<?php include("../partials/connect.php")?>
<?php 
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
</div>

<?php include("../partials/footer.php"); ?>