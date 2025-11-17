<?php
    error_reporting(0);
    session_start();
    $my_email = $_SESSION['user_email'];
    $user_email = $_GET['email'];

    $conn = mysqli_connect("localhost", "root", "", "php_e-comm");

    if($my_email){
        $sql = "SELECT * from Orders where email='$my_email'";
        $result = mysqli_query($conn,$sql);
    }
    elseif($user_email){
        $sql = "SELECT * from Orders where email='$user_email'";
        $result = mysqli_query($conn,$sql);
    }
    else{
        header("location:home/login.php");
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
                    <a href="contact.php">Contact</a>
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
                         class="logout_btn" href="user_order.php?email<?php echo $_SESSION['user_email']  ?>">ORDERS</a>

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
        <table>
            <tr>
                <th>Product  Title</th>
                <th>Price</th>
                <th>Image</th>
            </tr>
            <?php
                while($row = mysqli_fetch_assoc($result)){
            ?>
            <tr>
                <td><?php echo $row['title'] ?></td>
                <td><?php echo $row['price'] ?></td>
                <td>
                    <img width="100" height="100"  src="product_images/<?php echo $row['image']?>">
                </td>
            </tr>
            <?php

                }
            ?>
            
        </table>
</body>
</html>