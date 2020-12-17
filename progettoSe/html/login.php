<?php
  $title = "Login";
  require("partials/head.php");
 ?>

  <body>
    <div>
      <div class="container text-center login-box">
	  
        <form action="../php/authentication.php" method="post">
          <h2>CompanyX</h2>
          <img class="mb-4 photo_logo" src="../src/images/logo.png" alt="" width="100" height="100" >
          <h1 class="h3 mb-3 font-weight-normal">Sign in</h1>
          <div class="form-group">
            <label for="inputUser" class="sr-only">Username</label>
            <input type="text" name="username" class="form-control" placeholder="Username" id="username" required autofocus>
          </div>
          <div class="form-group mb-2">
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
          </div>
          <button class="btn btn-block btn-blue mt-2" type="submit" name="button">Log In</button>
        </form>
		
      </div>
    </div>
  </body>

  <?php require("partials/footer.php");?>

</html>
