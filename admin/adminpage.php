<?php
session_start();

if(!isset($_SESSION['user_email'])){
    header("location:../home/login.php");
}

elseif($_SESSION['usertype']=="user"){
    header("location:../home/login.php");
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../style.css">
        <title></title>
    </head>
    <body>
        adminpage

        <a href="../logout.php">Logout</a>
    </body>
</html>