<?php
include("../../../book-store-project/partials/connect.php");
if (isset($_FILES['image'])) {
  $file = $_FILES['image'];
  $destination = '../../images/' . $file['name'];
  move_uploaded_file($file['tmp_name'], $destination);
  $book_name=$_POST['name'];
  $book_price=$_POST['price'];
  $book_category=$_POST['category'];
  $book_cover=$file['name'];
  $sql="INSERT INTO product( name, image, price, category_id) VALUES('$book_name','$book_cover','$book_price','$book_category');";
  // execute the insert statement
  if (mysqli_query($conn, $sql)) {
    echo "Record inserted successfully";
    header('Location: ../../../../../book-store-project/admin/pages/display.php');
  } else {
    echo "Error inserting record: " . mysqli_error($conn);
  }
}
?>