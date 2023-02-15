<?php include("../partials/header.php"); ?>
<?php include("../partials/navbar.php"); ?>
  <div class="sign-in-container">
      <form class="sign-in-block">
          <h1>Login Account</h1>
        <div class="username-block form-control">
            <label for="">Email</label>
            <input type="text" class="email-field" placeholder="email">
        </div>
        
        <div class="username-block form-control">
            <label for="">Password</label>
            <input type="password" class="password-field" placeholder="password">
        </div>
        <div class="link-control">
            <a href="../../book-store-project/pages/sign-up.php">Register Account?</a>
            <a href="">Forget Password?</a>
        </div>
        <div class="btn-control">
            <button class="btn btn-login" type="submit">Login</button>
        </div>
</form>
  </div>
<?php include("../partials/footer.php"); ?>
