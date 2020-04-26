
<?php
session_start();
?>

<!--
Name:           Eli Lawrence
ID:             el862
Assignment:     Lab 5
Date:           3/5/2020
-->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Page</title>
    <style>
        td, th, tr {
            border: 1px solid;
            text-align: center;
            padding: 0.5em;
            width: 100px;
        }
    </style>
</head>

<body>
<h1>Admin Page</h1>


<?php
require "login.php";
//var_dump($_SESSION);

if(isset($_GET['Logged']))
{
    $_SESSION["active"] = 0;

    header("Location: logout_page.php");
}

if(isset($_GET['delete']))
{
    $conn = new mysqli($hn, $un, $pw, $db);
    if ($conn->connect_error)
        die($conn->connect_error);

    if(isset($_GET['deleted']))
    {
        $deletable = $_GET['deleted'];
    }
    else {
        echo "You must provide a user to delete.";
    }

    $query = "DELETE FROM user_table WHERE username = '$deletable'";
    $result = $conn->query($query);
    if(!$result)
        die($conn->error);
}

if (($_SESSION != NULL) && ($_SESSION["type"] == 1))
{


    echo"Welcome back Administrator";
    echo"<br>";

    require 'login.php';
    require 'User.php';
    $object = new User();

    $object->viewTable();



}
else{
    echo"You must be logged in as an administrator to view this page. Press log out below to go to the log in page.";
}

?>



<form method="GET" action="admin_page.php">

    <label>User to delete (username): </label>
    <input type="text" name="deleted" value="<?php echo $deletable; ?>"> <br>
    <input type="submit" name="delete" value="Delete"><br><br><br>
    <input type="submit" name="Logged" value="Log Out">
</form>

</body>

</html>