<?php session_start(); ?>

<?php include("../partials/connect.php"); ?>
<?php include("../partials/header.php"); ?>
<?php include("../partials/navbar.php") ?>

<?php 
 $user_id=$_SESSION['user_id'];
$sql ="SELECT image from user where id='$user_id';";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
?>
<div class="account-container">
     <div class="account-profile">
       <div class="cover-image">
        <img src="../../book-store-project/images/<?=$row['image']?>" alt="">
       </div>
       <div class="profile-menu">
         <button class="btn btn-edit-profile">Edit Profile</button>
        <a href="./logout.php" class="btn account-logout">Logout</a>
       </div>
     </div>
</div>


<div class="edit-profile-alert">
  <button class="btn account-logout btn-close">X</button>
<form action="" method="post" enctype="multipart/form-data">
    <label for="image">Select image to upload:</label>
    <input class="btn account-logout" type="file" name="image" id="image">
    <input class="btn" type="submit" value="Upload Image" name="submit">
</form>

</div>

<div class="dark-screen"></div>

<?php 

if (isset($_FILES['image'])) {
  $file = $_FILES['image'];
  $destination = '../images/' . $file['name'];
  move_uploaded_file($file['tmp_name'], $destination);
  $cover_image = $file['name'];  
  $user_id=$_SESSION['user_id'];
  $sql="UPDATE `user` SET `image`='$cover_image' WHERE id='$user_id';";
  if(mysqli_query($conn,$sql)){
    header('Location: ./account.php');
  }
  else{
    echo mysqli_error($conn);
  }
}

?>

<script>
  const btnClose=document.querySelector(".btn-close");
  const alertForm=document.querySelector(".edit-profile-alert");
  const darkScreen=document.querySelector(".dark-screen");
  const btnEditProfile=document.querySelector(".btn-edit-profile");
  btnEditProfile.addEventListener("click",()=>{
   alertForm.classList.add("edit-form-fade");
   darkScreen.classList.add("dark-screen-fade");
  })

  btnClose.addEventListener("click",()=>{
   alertForm.classList.remove("edit-form-fade");
   darkScreen.classList.remove("dark-screen-fade");
  })

</script>


<?php include("../partials/footer.php"); ?>
