<!DOCTYPE html>

<html lang = "en-US">

<head>

  <!--

  Date:
  -->

    <title> Restaurants </title>
    <style>
    td, th, tr {
      border: 1px solid;
      text-align: center;
      padding: 0.5em;
      width: 100px;
      }
    </style>
</head>

<?php

class Cart{

    public $itemQuantity;
    public $cartArray;



    public function __construct()
    {

          $this->itemQuantity = 0;
          $this->cartArray = 0;


    }

    public function addItem()
    {

      echo "blank method";

      //var_dump($_SESSION);

      require 'login.php';


      $conn = new mysqli($hn, $un, $pw, $db);
      if ($conn->connect_error)
        die($conn->connect_error);

      $query = "SELECT * FROM user_table";
      $result = $conn->query($query);
      if(!$result)
        die($conn->error);


      $conn->close();
      //return $blank;

  }

  public function removeItem()
  {

    echo "blank method";
    require "login.php";

    $connection = new mysqli($hn, $un, $pw, $db);

    if ($connection->connect_error)
      die($connection->connect_error);


      $query  = "INSERT INTO user_table (first_name, last_name, username, password, email, address, city, state, zip, phone_number, isAdmin)
        VALUES('$first_name', '$last_name', '$username', '$password', '$email', '$address', '$city', '$state', '$zip',
           '$phone_number', '$isAdmin')";

      $result = $connection->query($query);

      if (!$result)
        die($connection->error);
      $connection->close();


  }

  public function viewCart()
  {

    require 'login.php';

    echo"<table>

    <tr>
      <th> first_name </th>
      <th> last_name </th>
      <th> username </th>
      <th> password </th>
      <th> email </th>
      <th> address </th>
      <th> city </th>
      <th> state </th>
      <th> zip </th>
      <th> phone number </th>
      <th> isAdmin </th>
    </tr>


    </table>";

    $conn = new mysqli($hn, $un, $pw, $db);
    if ($conn->connect_error)
      die($conn->connect_error);

    $query = "SELECT * FROM user_table";
    $result = $conn->query($query);
    if(!$result)
      die($conn->error);

    while($row = $result->fetch_assoc())
    {

      $first_name = $row["first_name"];
      $last_name = $row["last_name"];
      $username = $row["username"];
      $password = $row["password"];
      $email = $row["email"];
      $address = $row["address"];
      $city = $row["city"];
      $state = $row["state"];
      $zip = $row["zip"];
      $phone_number = $row["phone_number"];
      $isAdmin = $row["isAdmin"];

      echo "

      <table>
      <tr>
      <td> $first_name </td>
      <td> $last_name </td>
      <td> $username </td>
      <td> $password </td>
      <td> $email </td>
      <td> $address </td>
      <td> $city </td>
      <td> $state </td>
      <td> $zip </td>
      <td> $phone_number </td>
      <td> $isAdmin </td>
      </tr>
      </table>


      ";

    }

    $conn->close();


  }

  public function checkout()
  {



          require 'login.php';
          //echo $username;

          $conn = new mysqli($hn, $un, $pw, $db);
          if ($conn->connect_error)
            die($conn->connect_error);

          $query = "SELECT username FROM user_table WHERE username = '$username'";
          $result = $conn->query($query);
          if(!$result){
            die($conn->error);

          }

          while($row = $result->fetch_assoc())
          {
            $username1 = $row["username"];
            //echo $username;
          }


          $conn->close();
          return $username1;

  }




}



?>
