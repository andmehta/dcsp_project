<!DOCTYPE html>
<?php
session_start();
?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Inventory</title>
  <style>
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
  if (($_SESSION["active"] == 1) && ($_SESSION["type"] == "user"))
     {
       $username = $_SESSION["currentUser"];

       echo "<h2> Hi, $username</h1>";
       echo "<h2>Welcome to our inventory page. Here you can add items to your cart</h2>";

     }
     if(isset($_POST['viewCart']))
     {
       header("Location: viewCart.php");
     }
     if(isset($_POST['logout']))
     {
       header("Location: login_page.php");
     }


     ?>
<?php
echo "
<table>
    <tr>
  <th colspan=\"5\">FISH INVENTORY</th>
  </tr>
    <tr>
      <th>Add to Cart</th>
      <th>ID</th>
      <th>Species</th>
      <th>Price</th>
      <th>Color</th>
      <th>Quantity</th>
    </tr>

</table>";
require_once "login.php";

$conn = new mysqli($hn, $un, $pw, $db);

if ($conn->connect_error)
    die($conn->connect_error);
//echo "restaurant";

//$query = "SELECT * FROM fish_inventory ";
//$query = "SELECT * FROM lab5_users ";
$query = "SELECT * FROM FishInventory ";

$result = $conn->query($query);
if (!$result)
    die($conn->error);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
      $id = $row["itemID"];//$row["id"];
      $species = $row["fishSpecies"];

      $price = $row["itemPrice"];// $row["species"];
      $color = $row["fishColor"];//$row["color"];
      $q = $row["inventory"];



       echo "
       <table>
           <tr>
               <td>$id</td>
               <td>$species</td>
               <td>$price</td>
               <td>$color</td>
               <td>$q</td>
           </tr>
       </table>";
     }

} else {
    echo "0 results";
}
//////PLANT INVENTORY
echo "
<table>";
echo"
   <tr>
  <th colspan=\"5\">PLANT INVENTORY</th>
  </tr>";
echo"    <tr>";

echo"
      <th>ID</th>
      <th>Species</th>
      <th>Price</th>
      <th>Size</th>
      <th>Quantity</th>
    </tr>";


echo"</table>";


//////
echo "
<table>
    <tr>
  <th colspan=\"6\">PLANT INVENTORY</th>
  </tr>
    <tr>
      <th>Add to Cart</th>
      <th>ID</th>
      <th>Species</th>
      <th>Price</th>
      <th>Size</th>
      <th>Quantity</th>
    </tr>

</table>";
$query = "SELECT * FROM PlantInventory ";

$result = $conn->query($query);
if (!$result)
    die($conn->error);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
      $plantID = $row["itemID"];
      $plantSpecies = $row["plantSpecies"];
      $plantSize = $row["plantSize"];
      $plantQuant = $row["inventory"];
      $plantPrice = $row["itemPrice"];




       echo"<table>
          <tr>";
          echo"
          <form method=\"post\" action=\"view_cart.php\">
          <th> <input  type= \"submit\" name= \"$plantID\" value= \"Add to Cart\"></th>
          </form>";
          echo"
              <td>$plantID</td>
               <td>$plantSpecies</td>
               <td>$plantPrice</td>
               <td>$plantSize</td>
               <td>$plantQuant</td>
           </tr>
       </table>";
     }

} else {
    echo "0 results";
}
$conn->close();
    ?>
    <form method="post" action="view_inventory.php">
      <input  type= "submit" name= "viewCart" value= "View Cart">
      <input  type= "submit" name= "logout" value= "Logout">

    </form>
  </body>
  </body>
  </html>
