<?php
session_start();
include("../partials/connect.php");
if(isset($_POST['email'])&&$_POST['password']){
   $first_name=$_POST['first_name'];
   $last_name=$_POST['last_name'];
   $email=$_POST['email'];
   $password=$_POST['password'];
   $hash=password_hash($password,PASSWORD_DEFAULT);
   $confirm_password=$_POST['confirm_password'];
   $phone=$_POST['phone'];
   $sql="SELECT * FROM user where email='$email'";
   $result=mysqli_query($conn,$sql);
   $row=mysqli_fetch_assoc($result);
   if(mysqli_num_rows($result)>0){
   $_SESSION['register_check']="This account already exist!";
   echo "This account already exist!";
   $_SESSION['account_check']=false;
   header('Location: ./sign-up.php');
   }
   else if($password!=$confirm_password){
    $_SESSION['register_check']="Password didn't match!";
    echo "Password didn't match!";
    $_SESSION['account_check']=false;
    header('Location: ./sign-up.php');
   }
   else{
    $sql="INSERT INTO user(first_name, last_name, email,password, phone) VALUES ('$first_name','$last_name','$email','$hash','$phone')";
    if(mysqli_query($conn,$sql)){
    $_SESSION['register_check']="";
    $_SESSION['account_check']=true;
    header('Location: ./sign-in.php');
    }
   }
}
else{

}


?>