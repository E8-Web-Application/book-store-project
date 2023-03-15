
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
// Check if the user has submitted the login form
if (isset($_POST['email']) && isset($_POST['password'])) {
    // Get the user's email and password
    $username = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];
    // Check if the user's credentials are valid (you would need to implement this logic yourself)
    $sql = "SELECT * FROM admin where username='$username'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    echo $username;
    if ($username === $row['username'] && $password === $row['password']) {
        $_SESSION['isAdmin'] = true;
        header('Location: ./index.php');
    } else {
        $_SESSION['isAdmin'] = false;
        header('Location: ./login.php');
    }
} else {
}

?>