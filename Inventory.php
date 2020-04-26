<!DOCTYPE HTML>
<!--
	Urban by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<title>Nemo's Shop</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/inventory.css" />
	</head>
	<body>

		<!-- Header -->
			<header id="header" class="alt">
				<a href="#menu">Menu</a>
			</header>


        <!-- Nav -->
        <nav id="menu">
            <ul class="links">
                <li><a href="index.html">Home</a></li>
                <li><a href="inventory.php">Shop</a></li>
                <li><a href="orders.php">Orders</a></li>
                <li><a href="login_page.php">Login</a></li>
                <li><a href="elements.html">Elements</a></li>
            </ul>
        </nav>

		<!-- Banner -->
			<section id="banner">
				<div class="inner">
					<header>
						<h1>Nemo's Shop</h1>
					</header>

				</div>
			</section>

            <section id = "wrapper style1">
                <div class="inner">
                    <header class="align-center">
                        <br>
                        <h2>Learn more about our Inventory!</h2>
                        <p>Whether you are looking to start you first tank or upgrading your current one... we have what you need. For and questions or issues, please email our customer service team at support@nemosbowl.com</p>
                        <br>
                        <h3> Fish Inventory</h3>
                    </header>
            </section>
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
		<tr align = 'center'>
		    <th>Inventory Image</th>
			<th>Fish Species</th>
			<th>Fish Color</th>
			<th>Item Price</th>
			<th>Item Quantity</th>
			<th>Item ID Number</th>
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
		$fishSpecies = $row['fishSpecies'];
		$fishColor = $row['fishColor'];
		$itemPrice = $row['itemPrice'];
		$itemQuantity = $row['quantity'];
		$itemID = $row['itemID'];
		$this->printHtml($fishSpecies,$fishColor, $itemPrice,$itemQuantity, $itemID);
		}
		echo "</table>";
		}

		public function getPlantInventory()
		{
		//Setting up the Table
		echo "<table>
			<tr>
			    <th>Inventory Image</th>
				<th>Plant Species</th>
				<th>Plant Size</th>
				<th>Item Price</th>
				<th>Item Quantity</th>
				<th>Item ID Number</th>
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
			$itemQuantity = $row['quantity'];
			$this->printHtml($plantSpecies,$plantSize, $itemPrice,$itemQuantity, $itemID);
			}
			echo "</table>";
		}


		public function printHtml($item1, $item2, $item3, $item4, $item5)
		{
		echo "
		<tr align = 'center'>
		    <td><img src='images/inventory/$item1.jpg' alt= ''</img></td>
			<td valign = 'middle' width = '25%'>$item1</td>
			<td valign = 'middle' width = '25%'>$item2</td>
			<td valign = 'middle' width = '25%'>$item3</td>
			<td valign = 'middle' width = '25%'>$item4</td>
			<td valign = 'middle' width = '25%'>$item5</td>
		</tr>
		";
		}
		}
		$current_Inventory = new Inventory();
		$current_Inventory->getFishInventory();
		?>
        <section id = "wrapper style1">
            <div class="inner">
                <header class="align-center">
                    <br>
                    <h3> Plant Inventory</h3>
                </header>
            </div>
        </section>
        <?php
		$current_Inventory->getPlantInventory();
		?>

			</div>

		<!-- Footer -->
			<footer id="footer">
				<div class="copyright">
					<ul class="icons">
						<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
						<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
						<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
						<li><a href="#" class="icon fa-snapchat"><span class="label">Snapchat</span></a></li>
					</ul>
					<p>&copy; All rights reserved. Nemo's Bowl LLC 2020.</p>
				</div>
			</footer>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>