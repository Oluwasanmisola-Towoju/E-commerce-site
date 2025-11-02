<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$conn = mysqli_connect("localhost", "root", "", "php_e-comm");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if(isset($_POST['register'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];  // Changed from number to phone to match form field
    $address = $_POST['address'];
    $pass = $_POST['password'];
    $usertype = "user";

    $sql = "INSERT INTO user (name,email,password,phone,address,usertype) VALUES ('$name', '$email', '$pass', '$phone', '$address', '$usertype')";

    $data = mysqli_query($conn, $sql);

    if($data){
        echo "Success";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
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
        <h2>
            Register Page
        </h2>
        <div class="my_form">
            <h2>
                Register Form
            </h2>
            <form action="register.php" method="POST">
                <div class="input_deg">
                    <label>
                        Name:
                    </label>
                    <input type="text" name="name">
                </div>
                                <div class="input_deg">
                    <label>
                        Email:
                    </label>
                    <input type="email" name="email">
                </div>
                                <div class="input_deg">
                    <label>
                        Number:
                    </label>
                    <input type="number" name="phone">
                </div>
                                <div class="input_deg">
                    <label>
                        Address:
                    </label>
                    <input type="text" name="address">
                </div>
                <div class="input_deg">
                    <label>
                        Password:
                    </label>
                    <input type="password" name="password">
                </div>
                        <div class="input_deg">
                    <label>
                        Submit:
                    </label>
                    <input type="submit" name="register" value="register">
                </div>
            </form>
        </div>
    </body>
</html>