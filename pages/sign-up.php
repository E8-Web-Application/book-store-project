<?php include("../partials/header.php"); ?>
<?php include("../partials/navbar.php"); ?>
<?php 
session_start();
?>
<div class="sign-in-container">
      <form class="sign-in-block" method="post" action="./check_sign_up.php">
          <h2>Register Account</h1>
       
        <div class="firstname-block form-control">
            <label for="">FirstName</label>
            <input type="text" class="firstname-field" placeholder="FirstName" name="first_name" pattern="^[a-zA-Z' -]+$" required>
        </div>
        <div class="lastname-block form-control">
            <label for="">LastName</label>
            <input type="text" class="lastname-field" placeholder="LastName" name="last_name" pattern="^[a-zA-Z' -]+$" required>
        </div>
        <div class="email-block form-control">
            <label for="">Email</label>
            <input type="email" class="email-field" placeholder="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
        </div>
        <div class="phone-block form-control">
            <label for="">Phone</label>
            <input type="text" class="phone-field" placeholder="Phone Number" name="phone" pattern="^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\./0-9]*$" required>
        </div>
        <div class="password-block form-control">
            <label for="">Password</label>
            <input type="password" class="password-field" placeholder="Create Password" name="password" pattern="[a-zA-Z0-9]+" required>
        </div>
        <div class="password-block form-control">
            <label for="">Password</label>
            <input type="password" class="password-field" placeholder="Confirm Password" name="confirm_password" pattern="[a-zA-Z0-9]+" required>
        </div>
         <?php if($_SESSION['account_check']!=true){ ?>
            
             <div class="form-control">
                <p style="color: red;"><?php echo $_SESSION['register_check']; ?></p>
             </div>
            <?php }?>
        <div class="link-control">
            <a href="../../book-store-project/pages/sign-in.php">Sign In Account?</a>
            <a href="">Forget Password?</a>
        </div>
        <div class="btn-control">
            <button class="btn btn-login" type="submit">Sign Up</button>
        </div>
</form>
  </div>

<script>
    
</script>

<?php include("../partials/footer.php"); ?>
