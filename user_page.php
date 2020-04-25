
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
  <title>User Page</title>
  <style>
    td, th, tr {
      border: 1px solid;
      text-align: center;
      padding: 0.5em;
      width: 100px;
      }
    </style>
</head>

<body>
  <h1>User Page</h1>

  <!-- build information for the user page -->
  <?php
  //var_dump($_SESSION);

  if(isset($_GET['Logged']))
  {
    $_SESSION["active"] = 0;
    header("Location: logout_page.php");

  }

  if (($_SESSION != NULL) && ($_SESSION["type"] == 0))
  {

    $username = $_SESSION["un"];
    echo"Welcome back, $username";
    echo"<br>";

    require 'login.php';

    echo"<table>

    <tr>
      <th> Order ID </th>
      <th> Order Total </th>
      <th> Order Quantity </th>
      <th> Shipping Method </th>
    </tr>


    </table>";


    $conn = new mysqli($hn, $un, $pw, $db);

    if ($conn->connect_error)
      die($conn->connect_error);

    $query = "SELECT * FROM orders WHERE username = '$username'";

    $result = $conn->query($query);

    if(!$result)
      die($conn->error);

    while($row = $result->fetch_assoc())
    {

      $orderID = $row["orderID"];
      $orderTotal = $row["orderTotal"];
      $quantity = $row["quantity"];
      $shipping = $row["shipping"];

      echo "

      <table>
      <tr>
      <td> $orderID </td>
      <td> $orderTotal </td>
      <td> $quantity </td>
      <td> $shipping </td>

      </tr>
      </table>


      ";

    }



    $conn->close();

  }
  else{

    echo"You must be logged in as a user to view this page. Press log out below to go to the log in page.";
  }

  ?>



  <form method="GET" action="user_page.php">
    <input type="submit" name="Logged" value="Log Out">
  </form>

</body>

</html>
