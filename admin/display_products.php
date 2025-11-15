<?php
session_start();

if(!isset($_SESSION['user_email'])){
    header("location:../home/login.php");
}

elseif($_SESSION['usertype']=="user"){
    header("location:../home/login.php");
}
    $conn = mysqli_connect("localhost", "root", "", "php_e-comm");

    if(isset($_GET['id'])){
        $p_id = $_GET['id'];
        $del_sql = "DELETE from products where id='$p_id'";
        $data = mysqli_query($conn,$del_sql);
        if($data){
            header("location:display_products.php");
        }
    }
    $sql = "SELECT * from products";
    $result = mysqli_query($conn,$sql);
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
                    <h1>
                        All Products
                    </h1>
                    <table>
                        <tr>
                            <th>
                                Title
                            </th>
                            <th>
                                Description
                            </th>
                            <th>
                                Quantity
                            </th>
                            <th>
                                Price
                            </th>
                            <th>
                                Image
                            </th>
                            <th>
                                Delete
                            </th>
                            <th>
                                Update
                            </th>
                        </tr>

                        <?php
                            while($row = mysqli_fetch_assoc($result)){
                                
                            
                        ?>
                        <tr>
                            <td><?php echo $row['title'] ?>

                            </td>
                            
                            <td><?php echo $row['description'] ?>
                                
                            </td>
                            
                            <td><?php echo $row['price'] ?>
                                
                            </td>
                            
                            <td><?php echo $row['quantity'] ?>
                                
                            </td>
                            
                            <td>
                                <img height="100" width="100" src="../product_images/<?php echo $row['image'] ?>" alt="">
                            </td>
                            <td>
                                <a onclick="return confirm('Are you sure you want to delete this');"  class="del_btn" href="display_products.php?id=<?php echo $row['id']?>">Delete</a>
                            </td>
                            <td>
                                <a href="update_product.php?id=<?php echo $row['id'] ?>" class="upd_btn">Update</a>
                            </td>
                        </tr>
                        <?php
                            }
                        ?>

                        
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>