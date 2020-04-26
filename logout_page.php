
<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Logged Out</title>
</head>

<body>
  <!-- php to handle logging out -->
  <?php

  ?>

  <h1>Logged Out</h1>

  <p>
    You are now logged out of the website.
  </p>
  <?php session_unset();
  session_destroy(); ?>
  <p>
    <a href="login_page.php">Log in</a> again.
  </p>
</body>

</html>

