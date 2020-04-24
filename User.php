<!DOCTYPE html>

<html lang = "en-US">

<head>

  <!--
  Name: Eli Lawrence
  Program: Lab 3 restaraunts.php
  Date: 2/22/2020
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

class User{

    public $userID;
    public $username;
    public $firstname;
    public $password;
    public $admin;


    public function __construct()
    {

          $this->userID = 0;
          $this->username = 0;
          $this->firstname = 0;
          $this->password = 0;
          $this->admin = 0;

    }

    public function login($in_username, $in_password)
    {


      $match = 0;
      $salt1    = "qm&h*";
      $salt2    = "pg!@";
      $error1 = "";
      $error2 = "";




      //var_dump($_SESSION);

      require 'login.php';


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
        $fn_array[] = $first_name;
        $last_name  = $row["last_name"];
        $sn_array[] = $last_name;
        $username     = $row["username"];
        $un_array[] = $username;
        $password = $row["password"];
        $pw_array[] = $password;
        /*
        $email = $row["email"];
        $address = $row["address"];
        $city = $row["city"];
        $state = $row["state"];
        $zip = $row["zip"];
        $phone_number = $row["phone_number"];
        */
        $type = $row["isAdmin"];
        $t_array[] = $type;



      }


      if(isset($_GET['Submitted']))
      {
        foreach($fn_array as $value)
        {
          ++$j;
        }

        for ($i = 0 ; $i < $j ; ++$i)
        {
          if($un_array[$i] == $in_username)
            {

              $error1 = "";
              $check = hash('ripemd128', "$salt1$in_password$salt2");
              if($check == $pw_array[$i])
              {
                echo "hi";
                $match = 1;
                $error1 = "";
                if($t_array[$i] == "user"){
                  $_SESSION["active"] = 1;
                  $_SESSION["type"] = 0;
                  $_SESSION["un"] = $un_array[$i];
                  header("Location: user_page.php");
                  break;
                }
                if($t_array[$i] == "admin"){
                  $_SESSION["active"] = 1;
                  $_SESSION["type"] = 1;

                  header("Location: admin_page.php");
                  break;
                }

              }
              else{
                $match = 0;
                $error1 = "Invalid username or password.";
              }
            }
          else{
            $error1 = "Invalid username or password.";
          }
        }

      }

      $conn->close();
      return $error1;

  }

  public function createAccount($first_name, $last_name, $username, $password, $email, $address,
  $city, $state, $zip, $phone_number, $isAdmin)
  {

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

  public function viewTable()
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

  public function filter($username)
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

  public function email_filter($email)
  {


          require 'login.php';
          //echo $username;

          $conn = new mysqli($hn, $un, $pw, $db);
          if ($conn->connect_error)
            die($conn->connect_error);

          $query = "SELECT email FROM user_table WHERE email = '$email'";
          $result = $conn->query($query);
          if(!$result){
            die($conn->error);

          }

          while($row = $result->fetch_assoc())
          {
            $email1 = $row["email"];
            //echo $email;
          }


          $conn->close();
          return $email1;

  }



}



?>
