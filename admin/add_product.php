<?php
session_start();

if(!isset($_SESSION['user_email'])){
    header("location:../home/login.php");
}

elseif($_SESSION['usertype']=="user"){
    header("location:../home/login.php");
}

$conn = mysqli_connect("localhost", "root", "", "php_e-comm");

if(isset($_POST['add_product'])){
    $title = $_POST['title'];
    $des = $_POST['description'];
    $price = $_POST['price'];
    $qty = $_POST['qty'];

    $image_name = $_FILES['my_image']['name'];
        $tmp = explode(".",$image_name);
        $newFileName = round(microtime(true)).'.'.end($tmp);
        $uploadPath = "../product_images/".$newFileName;
        move_uploaded_file($_FILES['my_image']['tmp_name'],$uploadPath);

$sql = "INSERT into products(title,description,price,quantity,image) Values ('$title','$des','$price','$qty','$newFileName')";

$data = mysqli_query($conn,$sql);
    if($data){
        header('location:add_product.php');
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
                        <a href="#">Dashboard</a>
                    </li>
                    <li>
                        <a href="#">Users</a>
                    </li>
                    <li>
                        <a href="add_product.php">Add Products</a>
                    </li>
                    <li>
                        <a href="#">View Products</a>
                    </li>
                </ul>
            </div>

            <div class="header">
                <div class="admin_header">
                    <a href="../logout.php">Logout</a>
                </div>
                <div class="info">
                    <h1>Add Products</h1>
                    <div class="my_form">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="div_deg">
                                <label for="">Title</label>
                                <input type="text" name="title">
                            </div>
                            <div class="div_deg">
                                <label for="">Description</label>
                                <textarea name="description" id=""></textarea>
                            </div>
                            <div class="div_deg">
                                <label for="">Price</label>
                                <input type="number" name="price">
                            </div>
                            <div class="div_deg">
                                <label for="">Quatity</label>
                                <input type="number" name="qty">
                            </div>
                            <div class="div_deg">
                                <input type="submit" name="add_product" value="Add Product">
                            </div>
                            <div class="div_deg">
                                <label for="">Product Image</label>
                                <input type="file" name="my_image">
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>