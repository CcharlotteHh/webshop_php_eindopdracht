<?php
include 'admin_header.php'
?>


<body>
  <section class="vh-100 bg-image" style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
    <div class="mask d-flex align-items-center h-100 gradient-custom-3">
      <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-12 col-md-9 col-lg-7 col-xl-6">
            <div class="card" style="border-radius: 15px;">
              <div class="card-body p-5">
                <h2 class="text-uppercase text-center mb-5">Create an account</h2>

                <form action="includes/register.inc.php" method="post">

                  <div class="form-outline mb-4">
                    <input type="text" id="form3Example1cg" class="form-control form-control-lg" name="user_name" />
                    <label class="form-label" for="form3Example1cg">Your Name</label>
                  </div>

                  <div class="form-outline mb-4">
                    <input type="email" id="form3Example3cg" class="form-control form-control-lg" name="email" />
                    <label class="form-label" for="form3Example3cg">Your Email</label>
                  </div>

                  <div class="form-outline mb-4">
                    <input type="password" id="form3Example4cg" class="form-control form-control-lg" name="password" />
                    <label class="form-label" for="form3Example4cg">Password</label>
                  </div>

                  <div class="form-outline mb-4">
                    <input type="password" id="form3Example4cdg" class="form-control form-control-lg" name="password2" />
                    <label class="form-label" for="form3Example4cdg">Repeat your password</label>
                  </div>
                  <a href="login.php">Do you have an account already? Click here to log in!</a> 

                  <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body" name="register">Register</button>
                  </div>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php //error handling register page
if (isset($_GET["error"])) {
  if ($_GET['error'] == "emptyinput") {
    echo "<p>Please enter all field</p>";
  } else if ($_GET["error"] == "invaliduid") {
    echo "<p>choose valid username/p>";
  } else if ($_GET["error"] == "invalidemail") {
    echo "<p>choose valid email/p>";
  } else if ($_GET["error"] == "passwordsdontmatch") {
    echo "<p>passwords don't match/p>";
  } else if ($_GET["error"] == "stmtfailed") {
    echo "<p>something went wrong/p>";
  } else if ($_GET["error"] == "usernametaken") {
    echo "<p>username is already taken/p>";
  } else if ($_GET["error"] == "none") {
    echo "<p>You have signed up/p>";
  }
}
?>
  </section>
</body>
