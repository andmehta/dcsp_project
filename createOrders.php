<?php
  require_once 'login.php';
  $connection = new mysqli($hn, $un, $pw, $db);

  if ($connection->connect_error)
    die($connection->connect_error);

    $query = "CREATE TABLE orders (
  orderID    int primary key auto_increment,
  username   VARCHAR(32),
  orderTotal VARCHAR(32),
  cart       VARCHAR(32)
)";
$result = $connection->query($query);

if (!$result)
  die($connection->error);

  function add_order($connection, $oid, $un, $ot, $qty, $sp)
  {
    $query = "INSERT INTO lab5_orders (orderID, username, orderTotal, quantity, shipping)
      VALUES ('$oid', '$un', '$ot', '$qty', '$sp')";

    $result = $connection->query($query);

    if(!$result)
      die($connection->error);
  }

  echo 'Table orders created<br>';

  // ORDERS END


  $connection->close();
  ?>
