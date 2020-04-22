<?php
require_once 'login.php';
$connection = new mysqli($host, $user, $pass, $db_name);
if ($connection->connect_error) {
    die($connection->connect_error);
}

// --------------- Creating the USERS Table --------------- //
$query = "CREATE TABLE users (
    forename VARCHAR(32),
    surname  VARCHAR(32),
    type     VARCHAR(10),
    username VARCHAR(32),
    password VARCHAR(32)
  )";
$result = $connection->query($query);
if (!$result)
    die($connection->error);

$salt1 = "qm&h*";
$salt2 = "pg!@";

$forename = 'Jake';
$surname = 'Manning';
$type = 'user';
$username = 'jm';
$password = 'password';
$token = hash('ripemd128', "$salt1$password$salt2");

add_user($connection, $forename, $surname, $type, $username, $token);

$forename = 'Eli';
$surname = 'Lawrence';
$type = 'user';
$username = 'el';
$password = 'password';
$token = hash('ripemd128', "$salt1$password$salt2");

add_user($connection, $forename, $surname, $type, $username, $token);

$forename = 'Andrew';
$surname = 'Mehta';
$type = 'admin';
$username = 'admin';
$password = 'admin';
$token = hash('ripemd128', "$salt1$password$salt2");

add_user($connection, $forename, $surname, $type, $username, $token);

echo 'Table Users created and populated<br>';

//Creating a function for continued addition

function add_user($connection, $fn, $sn, $ty, $un, $pw)
{
    $query = "INSERT INTO users (forename, surname, type, username, password)
      VALUES('$fn', '$sn', '$ty', '$un', '$pw')";
    $result = $connection->query($query);
    if (!$result){
        die($connection->error);
    }
}
// --------------- Finished the USERS Table --------------- //





// --------------- Creating the PlantInventory Table --------------- //

$connection = new mysqli($host, $user, $pass, $db_name);
if ($connection->connect_error){
    die($connection->error);
}

$query = "CREATE TABLE PlantInventory (
    itemID       VARCHAR(32),
    itemPrice    VARCHAR(32),
    plantSize    VARCHAR(32),
    plantSpecies VARCHAR(10),
    quantity    VARCHAR(10)
  )";

$result = $connection->query($query);

if (!$result)
    die($connection->error);

add_plant($connection, "0001", "$23", "1", "tree", "2");
add_plant($connection, "0002", "$13", "2", "bush", "2");
add_plant($connection, "0003", "$35", "3", "shrub", "2");
add_plant($connection, "0004", "$101", "4", "fern", "2");
add_plant($connection, "0005", "$189", "5", "vine", "2");
add_plant($connection, "0006", "$24", "6", "flower", "2");
add_plant($connection, "0007", "$60", "7", "vegetable", "2");

function add_plant($connection, $iid, $ip, $psize, $pspecies, $quantity)
{
    $query = "INSERT INTO PlantInventory (itemID, itemPrice, plantSize, plantSpecies, quantity)
      VALUES ('$iid', '$ip', '$psize', '$pspecies', '$quantity')";
    $result = $connection->query($query);
    if (!$result)
        die($connection->error);
}

echo 'Table PlantInventory created and populated<br>';

// --------------- Finished the PlantInventory Table --------------- //





// --------------- Creating the FishInventory Table --------------- //

$connection = new mysqli($host, $user, $pass, $db_name);
if ($connection->connect_error)
    die($connection->connect_error);

$query = "CREATE TABLE FishInventory (
    itemID       VARCHAR(32),
    itemPrice    VARCHAR(32),
    fishColor    VARCHAR(32),
    fishSpecies  VARCHAR(10),
    quantity    VARCHAR(10)
  )";

$result = $connection->query($query);

if (!$result)
    die($connection->error);

add_fish($connection, "0011", "$23", "orange", "goldfish", "2");
add_fish($connection, "0022", "$13", "grey", "shark", "2");
add_fish($connection, "0033", "$35", "pink", "jellyfish", "2");
add_fish($connection, "0044", "$101", "pink", "shrimp", "2");
add_fish($connection, "0055", "$189", "green", "bass", "2");
add_fish($connection, "0066", "$24", "red", "octopus", "2");
add_fish($connection, "0077", "$60", "red", "salmon", "2");

function add_fish($connection, $iid, $ip, $fc, $fspecies, $quantity)
{
    $query = "INSERT INTO FishInventory (itemID, itemPrice, fishColor, fishSpecies, quantity)
      VALUES ('$iid', '$ip', '$fc', '$fspecies','$quantity')";
    $result = $connection->query($query);
    if (!$result)
        die($connection->error);
}

echo 'Table FishInventory created and populated<br>';

// --------------- Finished the FishInventory Table --------------- //


$connection->close();