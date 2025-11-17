<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "php_e-comm");


if(!isset($_SESSION['user_email'])){
    header("location:../home/login.php");
}

elseif($_SESSION['usertype']=="user"){
    header("location:../home/login.php");
}

$user_sql = "SELECT * from user";
$u_result = mysqli_query($conn,$user_sql);
$total_user = mysqli_num_rows($u_result);

$product_sql = "SELECT * from products";
$u_result = mysqli_query($conn,$product_sql);
$total_product = mysqli_num_rows($u_result);

$order_sql = "SELECT * from orders";
$u_result = mysqli_query($conn,$order_sql);
$total_order = mysqli_num_rows($u_result);

$status = 'Delivered';
$deliver_sql = "SELECT * from orders Where status='$status' ";
$u_result = mysqli_query($conn,$deliver_sql);
$total_delivery = mysqli_num_rows($u_result);
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
                   <div class="card">
                    <div class="my_card">
                        <h3>Total Users</h3>
                        <hr>
                        <p><?php echo $total_user ?></p>
                    </div>
                    <div class="my_card">
                        <h3>Total Products</h3>
                        <hr>
                        <p><?php echo $total_product ?></p>
                    </div>
                    <div class="my_card">
                        <h3>Total Orders</h3>
                        <hr>
                        <p><?php echo $total_order ?></p>
                    </div>
                    <div class="my_card">
                        <h3>Total Delivered</h3>
                        <hr>
                        <p><?php echo $total_delivery ?></p>
                    </div>
                   </div>
                </div>
            </div>
        </div>
    </body>
</html>