<?php

$conn = mysqli_connect("localhost", "root", "", "php_e-comm");
$order_id = $_GET['id'];
$deliver = "Delivered";
$sql = "UPDATE orders set status='$deliver' where id='$order_id'";
$result = mysqli_query($conn,$sql);

if($result){
    header("location:all_orders.php");
}
?>