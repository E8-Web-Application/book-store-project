<?php include("../partials/header.php"); ?>
<?php include("../partials/navbar.php"); ?>
<?php 
?>
  <div class="sign-in-container">
      <form class="sign-in-block" method="post" action="./login_check.php">
          <h1>Login Account</h1>
        <div class="username-block form-control">
            <label for="email">Username</label>
            <input type="text" id="email" name="email" class="email-field" placeholder="email">
        </div>
        
        <div class="username-block form-control">
            <label for="password">Username</label>
            <input type="password" id="password" name="password" class="password-field" placeholder="password">
        </div>
   
        
        <div class="btn-control">
            <button class="btn btn-login" type="submit">Login</button>
        </div>
</form>
  </div>
<?php include("../partials/footer.php"); ?>



