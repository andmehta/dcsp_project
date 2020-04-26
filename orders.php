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
		<link rel="stylesheet" href="assets/css/orders.css" />
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
						<h1>Nemo's Orders</h1>
					</header>

				</div>
			</section>

            <section id = "wrapper style1">
                <div class="inner">
                    <header class="align-center">
                        <br>
                        <h2>Checkout our Previous Orders!</h2>
                        <p>Here you will be able to see all of the orders that we will. However, you will only be able to see personal information for your orders specifically.</p>
                        <br>
                        <h3>Order History</h3>
                    </header>
            </section>

        <?php

        class Orders
        {

            public function __construct()
            {

            }

            public function getOrders()
            {
                //Setting up the Table
                echo "<table>
      <tr align = 'center'>
        <th>User</th>
        <th>Total Cost </th>
        <th>Date Placed </th>>
      </tr>";
                //starting the Database Connection
                require 'login.php';
                $conn = new mysqli($host, $user, $pass, $db_name);
                if($conn->connect_error)
                    die($conn->connect_error);
                // query the database for ALL the orders
                $query = "SELECT * FROM Orders";
                $result = $conn->query($query);
                //Displaying the Results of the Query
                while($row = $result->fetch_array())
                {
                    $username = $row['username'];
                    $totalCost = $row['totalCost'];
                    $datePlaced = $row['datePlaced'];
                    $this->printHtml($username,$totalCost, $datePlaced);
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
        <th>Item Quantity</th>
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
                    $quantity = $row['quantity'];
                }
                echo "</table>";
            }

            public function printHtml($item1, $item2, $item3)
            {
                echo "
      		<tr align = 'center'>
      			<td>$item1</td>
      			<td>$item2</td>
      			<td>$item3</td>
      		</tr>
          ";
            }
        }
        $previous_Orders = new Orders();
        $previous_Orders->getOrders();
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