<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>User Page</title>
  <style>
  body {

  background-color: linen;
  p.solid {border-style: solid;}
    }

    h1
    {
      color: maroon;
      text-align: center;

      }
    td, th {
    width: 100px;
    border: 1px solid;
    text-align: center;
    padding: 0.5em;
    }
    </style>


</head>

<body>
<?php
if(isset($_POST['Submitted']))
  {
    $_SESSION["active"] = 0;
    header("Location: login_page.php");
  }

if(isset($_POST['inventory']))
{
  header("Location: view_inventory.php");
}
if(isset($_POST['Cart']))
{
  header("Location: view_cart.php");
}
if(isset($_POST['order']))
{
  header("Location: past_order.php");
}
  if (($_SESSION["active"] == 1) && ($_SESSION["type"] == "user"))
   {
     $username = $_SESSION["currentUser"];

     echo "  <h1>Nemo's Eggs Dashboard</h1><h2> Welcome back, $username</h1>";
     echo "<h2>Here at the dashboard you can navigate to any of our pages</h2>";

   }
  ?>



  <!-- build information for the user page -->

  <form method="post" action="Dashboard.php">
    <br>
    <br>
    <h2> Inventory Page</h2>
    <p>Please head over to our inventory page to look at our inventory and add items to your cart!</p>
    <input  type= "submit" name= "inventory" value= "Inventory Page">
    <br>
    <h2> View Your Cart</h2>
    <p>Head over to your cart page to view the items in your cart!</p>
    <input type="submit" name = "Cart" value="View Cart">
    <br>
    <h2> Past Orders</h2>
    <p>Head over to here to see your past orders!</p>
    <input type="submit" name = "order" value="Past orders">
    <br>
    <br>
    <br>

    <input type="submit" name = "Submitted" value="Log Out">
  </form>
</body>

</html>
