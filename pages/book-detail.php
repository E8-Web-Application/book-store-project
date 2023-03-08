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
             <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos praesentium aut blanditiis sit sed perspiciatis asperiores suscipit placeat? Odio explicabo quia voluptatem animi nostrum adipisci. Odit reiciendis totam ipsum repellendus.</p>
             <div class="book-detail-publisher">
                <p>Publisher</p>
                <p>No Name</p>
             </div>
             <div class="book-detail-publisher">
                <p>First Publish</p>
                <p>12/02/2005</p>
             </div>
             <div class="book-detail-publisher">
                <p>Language</p>
                <p>English</p>
             </div>
             <div class="book-detail-publisher">
                <p>Pages</p>
                <p>240p</p>
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