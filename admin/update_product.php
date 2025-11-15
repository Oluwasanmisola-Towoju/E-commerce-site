<?php
    session_start();

    if(!isset($_SESSION['user_email'])){
        header("location:../home/login.php");
    }

    elseif($_SESSION['usertype']=="user"){
        header("location:../home/login.php");
    }


    $conn = mysqli_connect("localhost", "root", "", "php_e-comm");
    $p_id = $_GET['id'];
    $sql = "SELECT * from products where id='$p_id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if(isset($_POST['update_product'])){
        $title = $_POST['title'];
        $des = $_POST['description'];
        $price = $_POST['price'];
        $qty = $_POST['qty'];

        $image_name = $_FILES['my_image']['name'];
            if($image_name){
                $tmp = explode(".",$image_name);
                $newFileName = round(microtime(true)).'.'.end($tmp);
                $uploadPath = "../product_images/".$newFileName;
                move_uploaded_file($_FILES['my_image']['tmp_name'],$uploadPath);

                $update_sql = "Update products set title = '$title', description = '$des', price = '$price', quantity = '$qty', image = '$newFileName' where id='$p_id' ";

                $data = mysqli_query($conn,$update_sql);

                if($data){
                    header('location:display_products.php');
                }    
            }
            else{
                $update_sql = "Update products set title = '$title', description = '$des', price = '$price', quantity = '$qty' where id='$p_id' ";

                $data = mysqli_query($conn,$update_sql);

                if($data){
                    header('location:display_products.php');
                }
            }
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
                        <a href="#">Users</a>
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
                    <h1>Update Page</h1>

                    <div class="my_form">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="div_deg">
                                <label for="">Title</label>
                                <input type="text" value="<?php echo $row['title'] ?>" name="title">
                            </div>
                            <div class="div_deg">
                                <label for="">Description</label>
                                <textarea name="description" id=""><?php echo $row['description'] ?></textarea>
                            </div>
                            <div class="div_deg">
                                <label for="">Price</label>
                                <input type="number" value="<?php echo $row['price'] ?>" name="price">
                            </div>
                            <div class="div_deg">
                                <label for="">Quantity</label>
                                <input type="number" value="<?php echo $row['quantity'] ?>" name="qty">
                            </div>
                            <div>
                                <label for="">Current Image</label>
                                <img width="80" height="80" src="../product_images/<?php  echo $row['image'] ?>" alt="">
                            </div>
                            <div class="div_deg">
                                <label for="">Change Image</label>
                                <input type="file" name="my_image">
                            </div>
                            <div class="div_deg">
                                <input type="submit" class="upd_btn" name="update_product" value="Update Product">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>