<?php 
session_start();
if(isset($_SESSION['user_id'])){
    header('Location: ./checkout.php');
}
else{
header('Location: ../../book-store-project/pages/sign-in.php');
}
?>