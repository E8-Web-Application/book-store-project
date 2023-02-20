<?php include("../partials/header.php"); ?>
<?php include("../partials/navbar.php"); ?>

<div class="sign-in-container">
      <form class="sign-in-block">
          <h2>Register Account</h1>
        <div class="email-block form-control">
            <label for="">Email</label>
            <input type="text" class="email-field" placeholder="email">
        </div>
        <div class="firstname-block form-control">
            <label for="">FirstName</label>
            <input type="text" class="firstname-field" placeholder="FirstName">
        </div>
        <div class="lastname-block form-control">
            <label for="">LastName</label>
            <input type="text" class="lastname-field" placeholder="LastName">
        </div>
        <div class="phone-block form-control">
            <label for="">Phone</label>
            <input type="text" class="phone-field" placeholder="Phone Number">
        </div>
        <div class="password-block form-control">
            <label for="">Password</label>
            <input type="password" class="password-field" placeholder="New Password">
        </div>
        <div class="password-block form-control">
            <label for="">Password</label>
            <input type="password" class="password-field" placeholder="Confirm Password">
        </div>
        <div class="link-control">
            <a href="../../book-store-project/pages/sign-in.php">Sign In Account?</a>
            <a href="">Forget Password?</a>
        </div>
        <div class="btn-control">
            <button class="btn btn-login" type="submit">Sign Up</button>
        </div>
</form>
  </div>

<?php include("../partials/footer.php"); ?>
