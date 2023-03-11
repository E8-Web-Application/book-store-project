<?php 
include("../../../book-store-project/partials/connect.php");

if (isset($_FILES['image'])) {
  $file = $_FILES['image'];
  $destination = '../../images/' . $file['name'];
  move_uploaded_file($file['tmp_name'], $destination);

  $book_name = $_POST['name'];
  $book_description = $_POST['description'];
  $book_publisher = $_POST['publisher'];
  $book_author = $_POST['author'];
  $book_first_publish = $_POST['first_publish'];
  $book_language = $_POST['language'];
  $book_page = $_POST['page'];
  $book_price = $_POST['price'];
  $book_category = $_POST['category'];
  $book_cover = $file['name'];

  // Prepare the SQL statement with placeholders
  $stmt = $conn->prepare("INSERT INTO product (name, description, publisher, author, first_publish, language, page, image, price, category_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

  // Bind the variables to the placeholders
  $stmt->bind_param("ssssssisii", $book_name, $book_description, $book_publisher, $book_author, $book_first_publish, $book_language, $book_page, $book_cover, $book_price, $book_category);

  // Execute the statement
  if ($stmt->execute()) {
    echo "Record inserted successfully";
    header('Location: ../../../../../book-store-project/admin/pages/display.php');
  } else {
    echo "Error inserting record: " . $stmt->error;
  }
}



?>