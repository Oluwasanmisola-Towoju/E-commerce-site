<?php
    session_start();
    $_SESSION['user_email'] = $_GET['email'];

    $conn = mysqli_connect("localhost", "root", "", "php_e-comm");
    $p_id = $_GET['id'];
    $u_email = $_GET['email'];

    $p_sql = "SELECT * from products where id = '$p_id' ";

    $p_result = mysqli_query($conn,$p_sql);

    $p_row = mysqli_fetch_assoc($p_result);

    $p_title = $p_row['title'];
    $p_price = $p_row['price'];
    $p_image = $p_row['image'];

    $u_sql = "SELECT * from user where email = '$u_email' ";
    $u_result = mysqli_query($conn,$u_sql);

    $u_row = mysqli_fetch_assoc($u_result);
    $u_name = $u_row['name'];
    $u_email = $u_row['email'];
    $u_phone = $u_row['phone'];
    $u_address = $u_row['address'];

    $status = "In Progress";

    $order_sql = "INSERT into orders(title,price,image,username,email,phone,address,status) VALUES ('$p_title','$p_price','$p_image','$u_name','$u_email','$u_phone','$u_address','$status')";

    $order_result = mysqli_query($conn,$order_sql);

    if($order_result){
        $_SESSION['user_email'] = $_GET['email'];
        header("location:user_order.php");
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title></title>
</head>
<body>
            <nav>
            <input type="checkbox" id="check">
            <label for="check" class="checkbtn">
                <i class="fa fa-bars"></i>
            </label>
            <label class="my_logo">
                My Ecommerce Site
            </label>
            <ul>
                <li>
                    <a href="#">Home</a>
                </li>
                <li>
                    <a href="#">Contact</a>
                </li>

                <?php
                    if($_SESSION['user_email']){

                ?>

                    <a style="transition: color 0.3s ease,
                              transform 0.2s ease;
                              display: inline-block;
                              background: skyblue;
                              color: white;
                              padding: 10px;
                              border-radius: 14px"
                               
                        href="logout.php">LOGOUT</a>

                <?php

                    }
                    else{
                ?>
                    <li>
                    <a href="home/register.php">Register</a>
                    </li>
                    <li>
                        <a href="home/login.php">Login</a>
                    </li>
                <?php

                    }
                ?>
            </ul>
        </nav>
</body>
</html>