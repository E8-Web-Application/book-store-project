<?php 
session_start();
include("../partials/connect.php");
// Check if the user has submitted the login form
if (isset($_POST['email']) && isset($_POST['password'])) {
  echo "Hello WOrld";
    // Get the user's email and password
    $email = $_POST['email'];
    $password = $_POST['password'];
    // $hash=password_hash($password,PASSWORD_DEFAULT);
    // echo $hash;
    // Check if the user's credentials are valid (you would need to implement this logic yourself)
    $sql="SELECT * FROM user where email='$email'";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
    if ($email === $row['email']&& password_verify($password,$row['password'])) {
      // Set the user's name in the session
      $_SESSION['user_name'] = $row['last_name'];
      $_SESSION['user_id']=$row['id'];
      $_SESSION['account_check']=true;
      // Redirect the user to the home page
      header('Location: ./account.php');
    } else {
      // The user's credentials are invalid, show an error message
      $_SESSION['account_check']=false;
      // header('Location: ./sign-in.php');
      echo "Failed";
    }
  }
else{
    echo "All Wrong";
}

?>