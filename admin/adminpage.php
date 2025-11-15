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
        <link rel="stylesheet" type="text/css" href="admin_style.css">
        <title></title>
    </head>
    <body>
        <div class="wrapper">
            <div class="sidebar">
                <h2>Ecomm Admin</h2>
                <ul>
                    <li>
                        <a href="adminpage.php">Dashboard</a>
                    </li>
                    <li>
                        <a href="users.php">Users</a>
                    </li>
                    <li>
                        <a href="add_product.php">Add Products</a>
                    </li>
                    <li>
                        <a href="display_products.php">View Products</a>
                    </li>
                    <li>
                        <a href="all_orders.php">Orders</a>
                    </li>
                </ul>
            </div>

            <div class="header">
                <div class="admin_header">
                    <a href="../logout.php">Logout</a>
                </div>
                <div class="info">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis aperiam dolorem distinctio tempore omnis, excepturi ex vitae quam quis voluptates accusantium dolorum in alias obcaecati assumenda laudantium nihil pariatur vero.
                    </p>
                </div>
            </div>
        </div>
    </body>
</html>