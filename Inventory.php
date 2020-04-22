
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Inventory Page</title>
    <style>
        td {
            border: 1px solid;
            text-align: left;
            padding: 0.5em;
        }
        th {
            text-align: left;
        }
    </style>
</head>

<body>
<?php

class Inventory
{

    public function __construct()
    {

    }

    public function getFishInventory()
    {
        //Setting up the Table
        echo "<table>
      <tr>
        <th>Item ID</th>
        <th>Item Price</th>
        <th>Fish Color</th>
        <th>Fish Species</th>
      </tr>";
        //starting the Database Connection
        require 'login.php';
        $conn = new mysqli($host, $user, $pass, $db_name);
        if($conn->connect_error)
            die($conn->connect_error);
        // query the database for ALL the orders
        $query = "SELECT * FROM FishInventory";
        $result = $conn->query($query);
        //Displaying the Results of the Query
        while($row = $result->fetch_array())
        {
            $itemID = $row['itemID'];
            $itemPrice = $row['itemPrice'];
            $fishColor = $row['fishColor'];
            $fishSpecies = $row['fishSpecies'];
            $this->printHtml($itemID,$itemPrice, $fishColor,$fishSpecies);
        }
        echo "</table>";
    }

    public function getPlantInventory()
    {
        //Setting up the Table
        echo "<table>
      <tr>
        <th>Item ID</th>
        <th>Item Price</th>
        <th>Plant Size</th>
        <th>Plant Species</th>
        <th>Current Inventory</th>
      </tr>";
        //starting the Database Connection
        require 'login.php';
        $conn = new mysqli($host, $user, $pass, $db_name);
        if($conn->connect_error)
            die($conn->connect_error);
        // query the database for ALL of the Plants
        $query = "SELECT * FROM PlantInventory";
        $result = $conn->query($query);
        //Displaying the Results of the Query
        while($row = $result->fetch_array() )
        {
            $itemID = $row['itemID'];
            $itemPrice = $row['itemPrice'];
            $plantSize = $row['plantSize'];
            $plantSpecies = $row['plantSpecies'];
            $this->printHtml($itemID,$itemPrice, $plantSize,$plantSpecies);
        }
        echo "</table>";
    }

    public function searchFishInventory($userQuery)
    {
        //Setting up the Table
        echo "<table>
      <tr>
        <th>Item ID</th>
        <th>Item Price</th>
        <th>Fish Color</th>
        <th>Fish Species</th>
      </tr>";
        //starting the Database Connection
        require 'login.php';
        $conn = new mysqli($host, $user, $pass, $db_name);
        if($conn->connect_error)
            die($conn->connect_error);
        // query the database for ALL of the Plants
        $query = "SELECT * FROM FishInventory WHERE CONTAINS(fishSpecies),($userQuery))";
        $result = $conn->query($query);
        //Displaying the Results of the Query
        while($row = $result->fetch_array() )
        {
            $itemID = $row['itemID'];
            $itemPrice = $row['itemPrice'];
            $fishColor = $row['fishColor'];
            $fishSpecies = $row['fishSpecies'];
            $inventory = $row['inventory'];
        }
        echo "</table>";
    }

    public function searchPlantInventory($userQuery)
    {
        //Setting up the Table
        echo "<table>
      <tr>
        <th>Item ID</th>
        <th>Item Price</th>
        <th>Plant Size</th>
        <th>Plant Species</th>
        <th>Current Inventory</th>
      </tr>";
        //starting the Database Connection
        require 'login.php';
        $conn = new mysqli($host, $user, $pass, $db_name);
        if($conn->connect_error)
            die($conn->connect_error);
        // query the database for ALL of the Plants
        $query = "SELECT * FROM PlantInventory WHERE plantSpecies = $userQuery))";
        $result = $conn->query($query);
        //Displaying the Results of the Query
        while($row = $result->fetch_array() )
        {
            $itemID = $row['itemID'];
            $itemPrice = $row['itemPrice'];
            $plantSize = $row['plantSize'];
            $plantSpecies = $row['plantSpecies'];
            $inventory = $row['inventory'];
        }
        echo "</table>";
    }

    public function printHtml($item1, $item2, $item3, $item4, $item5)
    {
        echo "
      		<tr>
      			<td>$item1</td>
      			<td style =\"text-align: center\">$item2</td>
      			<td>$item3</td>
      			<td>$item4</td>
      			<td>$item5</td>
      		</tr>
          ";
    }
}
$current_Inventory = new Inventory();
$current_Inventory->getFishInventory();
$current_Inventory->getPlantInventory();
$current_Inventory->searchPlantInventory("tree");
$current_Inventory->searchFishInventory("goldfish");
?>
</body>
</html>
