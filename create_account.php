<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Nemo's Bowl</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="assets/css/create_account.css" />
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
s
</section>

<section id = "wrapper style1">
    <div class="inner">
        <header class="align-center">
            <br>
            <h2>Create an Account!</h2>
            <p>With no obligations there is no reason not to sign-up. This will allow you to save your information, track orders, and stay engaged with our community and updates. Let's get you set up to buy some fish.</p>
            <br>
        </header>
</section>


<?php
$first_name = "";
$last_name = "";
$username = "";
$password = "";
$password2 = "";
$email = "";
$address = "";
$city = "";
$state = "";
$zip = "";
$phone_number = "";
$isAdmin = "user";
$flag1 = 1;
$flag2 = 1;
$flag3 = 1;
$flag4 = 1;
$flag5 = 1;
$salt1    = "qm&h*";
$salt2    = "pg!@";
$email_match_error = "";
$un_match_error = "";
$email_error ="";
$username_error ="";
$empty_error ="";
$zip_error ="";
$pw_match_error ="";

$error = "";

if(isset($_GET['back_login']))
{
    header("Location: login_page.php");
}

if(isset($_GET['Submitted']))
{

    if(isset($_GET['first_name']))
    {

        $first_name = $_GET['first_name'];

    }

    if(isset($_GET['last_name']))
    {

        $last_name = $_GET['last_name'];

    }

    if(isset($_GET['username']))
    {

        $username = $_GET['username'];

    }

    if(isset($_GET['password']))
    {
        $password = $_GET['password'];
        $save = $password;
        $password = hash('ripemd128', "$salt1$password$salt2");

    }

    if(isset($_GET['password2']))
    {
        $password2 = $_GET['password2'];
        $save2 = $password2;
        $password2 = hash('ripemd128', "$salt1$password2$salt2");

    }

    if(isset($_GET['email']))
    {
        $email = $_GET['email'];

    }

    if(isset($_GET['address']))
    {
        $address = $_GET['address'];

    }

    if(isset($_GET['city']))
    {
        $city = $_GET['city'];

    }

    if(isset($_GET['state']))
    {
        $state = $_GET['state'];

    }

    if(isset($_GET['zip']))
    {
        $zip = $_GET['zip'];

    }

    if(isset($_GET['phone_number']))
    {
        $phone_number = $_GET['phone_number'];

    }

}


require 'User.php';
$object = new User();

if(isset($_GET['Submitted']))
{

    if($first_name != "" & $last_name != "" & $username != "" & $password != "" & $password2 != ""
        & $email != "" & $address != "" & $city != "" & $state != "" & $zip != ""  & $phone_number != "")
    {
        $flag1 = 0;
        $empty_error = "";
    }
    else{
        $flag1 = 1;
        $empty_error = "Please fill out every field.";
    }

    if(strlen($username) >= 5)
    {
        $flag2 = 0;
        $username_error = "";
    }
    else
    {
        $username_error = "Username must be at least 5 characters in length.";
        $flag2 = 1;
    }

    if(preg_match("/^([a-zA-Z0-9]+)(@{1})([a-zA-Z0-9]+)(.{1})([a-zA-Z0-9]+)$/", $email, $match))
    {
        $email_error = "";
        $flag3 = 0;
    }
    else {
        $email_error = "Invalid email format.";
        $flag3 = 1;
    }

    if(preg_match("/^([0-9]+)$/", $zip, $match))
    {
        $zip_error = "";
        $flag4 = 0;
    }
    else{
        $zip_error = "Zip code format incorrect";
        $flag4 = 1;
    }

    if($save != ""){
        if($password == $password2)
        {
            $pw_match_error = "";
            $flag5 = 0;
        }
        else{
            $flag5 = 1;
            $pw_match_error = "Passwords do not match.";
        }
    }

    $returned = $object->filter($username);
    $returned2 = $object->email_filter($email);

    if($username != "")
    {
        if ($returned == $username)
        {
            $un_match_error = "This username is already in use. Please choose a unique username.";
            $flag6 = 1;
        }
        else {
            $flag6 = 0;
            $un_match_error = "";
        }
    }

    if($email != "")
    {
        if ($returned2 == $email)
        {
            $email_match_error = "There is already an email set up with an account. We do not support account recovery at this time so good luck remembering your password.";
            $flag7 = 1;
        }
        else {
            $flag7 = 0;
            $email_match_error = "";
        }
    }

    if($flag1 == 0 & $flag2 == 0 & $flag3 == 0 & $flag4 == 0 & $flag5 == 0 & $flag6 == 0 & $flag7 == 0)
    {

        $_SESSION["account"] = 1;
        $object->createAccount($first_name, $last_name, $username, $password, $email, $address, $city,
            $state, $zip, $phone_number, $isAdmin);
        //$object->viewTable();
        //echo "";
        header("Location: login_page.php");


    }
    else {

        echo "";

    }

}


?>


    <p style="color: red">
        <?php echo $email_error;
        echo "<br>";
        echo $username_error;
        echo "<br>";
        echo $empty_error;
        echo "<br>";
        echo $zip_error;
        echo "<br>";
        echo $pw_match_error;
        echo "<br>";
        echo $un_match_error;
        echo "<br>";
        echo $email_match_error;
        ?>

    </p>

    <form method="GET" action="create_account.php">
        <label>First Name: </label>
        <input type="text" name="first_name" value="<?php echo $first_name; ?>"> <br><br>

        <label>Last Name: </label>
        <input type="text" name="last_name" value="<?php echo $last_name; ?>"> <br><br>

        <label>New Username: </label>
        <input type="text" name="username" value="<?php echo $username; ?>"> <br><br>

        <label>New Password: </label>
        <input type="password" name="password" value="<?php echo $save; ?>"> <br><br>
        <label>Confirm Password: </label>
        <input type="password" name="password2" value="<?php echo $save2; ?>"> <br><br>

        <label>Email: </label>
        <input type="text" name="email" value="<?php echo $email; ?>"> <br><br>

        <label>Street Address: </label>
        <input type="text" name="address" value="<?php echo $address; ?>"> <br><br>

        <label>City: </label>
        <input type="text" name="city" value="<?php echo $city; ?>"> <br><br>

        <label>State: </label>
        <input type="text" name="state" value="<?php echo $state; ?>"> <br><br>

        <label>Zip: </label>
        <input type="text" name="zip" value="<?php echo $zip; ?>"> <br><br>

        <label>Phone Number: </label>
        <input type="text" name="phone_number" value="<?php echo $phone_number; ?>"> <br><br>



        <input type="submit" name="Submitted" value="Submit Form"><br>
        <br>
        <input type="submit" name="back_login" value="Back to Login page">
    </form>







</body>
</html>