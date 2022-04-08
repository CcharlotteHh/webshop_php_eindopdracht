<?php
 include 'admin_header.php';
  echo "Logout Successfully ";
  session_destroy();   // function that Destroys Session after that the user gets sent back to the login page
  header("Location: Login.php");
?>