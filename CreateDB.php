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
    email    VARCHAR(32),
    password VARCHAR(32),
    address  VARCHAR(32),
    city     VARCHAR(32),
    state    VARCHAR(32), 
    zip      VARCHAR(32),
    phone    VARCHAR(32)
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
$email = 'jm@gmail.com';
$pw = 'password';
$address = '107 Cherry Laurel';
$city = "Ridgeland";
$state = "Ms";
$zip = '39157';
$phone = "6015033475";
$token = hash('ripemd128', "$salt1$pw$salt2");

add_user($connection, $forename, $surname, $type, $username, $email, $pw, $address, $city, $state, $zip, $phone, $token);

$forename = 'Jake';
$surname = 'Manning';
$type = 'user';
$username = 'jm';
$email = 'jm@gmail.com';
$pw = 'password';
$address = '107 Cherry Laurel';
$city = "Ridgeland";
$state = "Ms";
$zip = '39157';
$phone = "6015033475";
$token = hash('ripemd128', "$salt1$pw$salt2");

add_user($connection, $forename, $surname, $type, $username, $email, $pw, $address, $city, $state, $zip, $phone, $token);

$forename = 'Jake';
$surname = 'Manning';
$type = 'user';
$username = 'jm';
$email = 'jm@gmail.com';
$pw = 'password';
$address = '107 Cherry Laurel';
$city = "Ridgeland";
$state = "Ms";
$zip = '39157';
$phone = "6015033475";
$token = hash('ripemd128', "$salt1$pw$salt2");

add_user($connection, $forename, $surname, $type, $username, $email, $pw, $address, $city, $state, $zip, $phone, $token);

echo 'Table Users created and populated<br>';

//Creating a function for continued addition

function add_user($connection, $fn, $sn, $ty, $un,$email, $pw,$address,$city,$state,$zip,$phone,$token)
{
    $query = "INSERT INTO users (forename, surname, type, username, email, password, address, city, state, zip, phone)
      VALUES('$fn', '$sn', '$ty', '$un','$email', '$pw','$address','$city','$state','$zip','$phone')";
    $result = $connection->query($query);
    if (!$result){
        die($connection->error);
    }
}
// --------------- Finished the USERS Table --------------- //



// --------------- Creating the Orders Table --------------- //

$connection = new mysqli($host, $user, $pass, $db_name);
if ($connection->connect_error){
    die($connection->error);
}

$query = "CREATE TABLE Orders (
    orderid      VARCHAR(32),
    username     VARCHAR(32),
    totalCost    VARCHAR(32),
    datePlaced    VARCHAR(32)
  )";

$result = $connection->query($query);

if (!$result)
    die($connection->error);

add_order($connection, "1","jake", "$23", "4/25");
add_order($connection, "2","andrew", "$54323", "4/28");
add_order($connection, "3","daniel", "$234", "4/21");
add_order($connection, "4","boyce", "$3", "4/22");
add_order($connection, "5","eli", "$432", "4/24");


function add_order($connection, $orderid, $username, $totalCost, $datePlaced)
{
    $query = "INSERT INTO Orders (username, totalCost, datePlaced)
      VALUES ('$username', '$totalCost', '$datePlaced')";
    $result = $connection->query($query);
    if (!$result)
        die($connection->error);
}

echo 'Table Orders created and populated<br>';




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



