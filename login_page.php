<?php
session_start();
?>

<!--

Name:           Eli Lawrence
ID:             el862
Assignment:     Lab 5
Date:           3/5/2020

-->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Log in to Website</title>

  <style>
    input {
      margin-bottom: 0.5em;
    }
  </style>
</head>

<body>


  <?php


  if($_SESSION["active"] == 1)
  {
    if($_SESSION["type"] == 0)
    {
      header("Location: user_page.php");
    }

    if($_SESSION["type"] == 1)
    {
      header("Location: admin_page.php");
    }

  }

  
  require 'User.php';
  $object = new User();

  if($_SESSION["account"] == 1)
  {
      $activated_account = "Success! You have created your new account.";
      $_SESSION["account"] = 0;
  }
  else{
    $activated_account = "";

  }
  $_SESSION["account"] = 0;


  if(isset($_GET['Submitted']))
  {

    if(isset($_GET['in_username']))
    {

      $in_username = $_GET['in_username'];

    }
    if(isset($_GET['password']))
    {
      $in_password = $_GET['password'];

    }

    $error1 = $object->login($in_username, $in_password);
    //$object->viewTable();
  }






  if(isset($_GET['Create']))
  {

    header("Location: create_account_page.php");

  }


  ?>

  <center><br><br><br><br><br><br><br><br>
  <h1>Welcome to Nemo's Egg</span>!</h1>

  <p style="color: red">
    <?php echo $error2; ?>
    <?php echo $error1; ?>
  </p>

  <p style="color: green">
    <?php echo $activated_account; ?>

  </p>

  <form method="GET" action="login_page.php">
    <label>Username: </label>
    <input type="text" name="in_username" value="<?php echo $in_username; ?>"> <br>
    <label>Password: </label>
    <input type="password" name="password" value="<?php echo $in_password; ?>"> <br>
    <input type="submit" name="Submitted" value="Log in">
  </form>

  <form method="GET" action="login_page.php">
    <input type="submit" name="Create" value="Create New Account">
  </form>


  </center>
</body>

</html>
