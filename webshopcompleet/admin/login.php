<?php //functions for the login form
include 'db.php';
include 'functions.php';
include 'admin_header.php'



?>


<body>

  <div class="container">
    <form action="includes/login.inc.php" method="post">
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Username/Email</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="user_name">
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" name="password">
      </div>
      <button type="submit" class="btn btn-primary" name="login">Submit</button>
      <a href="register.php">Don't have an account already? Click here to register</a> 
      <?php //error handling login page
      if (isset($_GET["error"])) {
        if ($_GET['error'] == "emptyinput") {
          echo "<p>Please enter all field</p>";
        } else if ($_GET["error"] == "wronglogin") {
          echo "<p>incorrect login information</p>";
        }
      }
      ?>
    </form>

  </div>
</body>