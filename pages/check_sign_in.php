<?php 
session_start();
// Check if the user has submitted the login form
if (isset($_POST['email']) && isset($_POST['password'])) {
    // Get the user's email and password
    $email = $_POST['email'];
    $password = $_POST['password'];
    echo $email;
    echo $password;
  
    // Check if the user's credentials are valid (you would need to implement this logic yourself)
    if ($email === 'test@example.com' && $password === '123') {
      // Set the user's name in the session
      $_SESSION['user_name'] = 'test';
      $_SESSION['user_id']=1;
      // Redirect the user to the home page
      header('Location: ./account.php');
    } else {
      // The user's credentials are invalid, show an error message
      $error_message = 'Invalid email or password';
    }
  }
else{
    echo "All Wrong";
}

?>