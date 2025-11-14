<?php

session_start();

error_reporting(0);

$conn = mysqli_connect("localhost", "root", "", "php_e-comm");

$sql = "SELECT * from products";

$result = mysqli_query($conn,$sql);

?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title></title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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

        <div>
            <img class="my_cover" src="cover.jpg" alt="dim(6912 x 3456)">
        </div>
    <div>
        <h3 class="p_title">
            Products
        </h3>
    </div>

        <div class="my_card">
            <?php
            while($row = mysqli_fetch_assoc($result)){

            ?>
            <div class="card">
                <img class="p_image" src="./product_images/<?php echo $row['image'] ?>">
                    <h4>
                        <?php
                            echo $row['title'];
                        ?>
                    </h4>
                        <p>
                            <?php
                            echo $row['description'];
                            ?>
                        </p>
                        <p>
                            Price: <?php
                                    echo $row['price'];
                                    ?>
                        </p>

                        <?php
                        if($_SESSION['user_email']){
                        ?>

                        <a href="my_order.php?id=<?php echo $row['id'] ?>&email=<?php echo $_SESSION['user_email']?>">Buy now</a>
                        
                        <?php
                        }
                        else{
                        ?>

                            <a href="home/login.php">Buy now</a>
                        <?php
                        }
                        ?>
                        </div>
            
            <?php

            }

            ?>

            <div class="card">
                <img class="p_image" src="./images/watch.jpeg">
                    <h4>
                        Watch
                    </h4>
                        <p>
                            The Hublot watch is a Swiss luxury watch defined by the "Art of Fusion", blending precious gold with modern materials like ceramic and rubber. It features a bold, recognizable porthole-shaped case and H-screws, exemplified by the flagship Big Bang collection. Hublot movements, such as the in-house Unico, are often skeletonized for mechanical display. It represents a sporty, avant-garde style in high-end horology
                        </p>
                        <p>
                            Price: $50
                        </p>
                            <a href="#">Buy now</a>
            </div>
            <div class="card">
                <img class="p_image" src="./images/air.jpg">
                    <h4>
                        Phone
                    </h4>
                        <p>
                            This is an ultra-premium model characterized by its revolutionary thinness and lightness, measuring just 5.6mm thick with a Grade 5 titanium frame. It boasts a stunning 6.5-inch Super Retina XDR display featuring ProMotion's fluid 120Hz adaptive refresh rate. Powered by the high-performance Apple A19 Pro chip, it offers incredible speed and advanced on-device AI capabilities. The design includes a durable Ceramic Shield 2 and features like the versatile Action button
                        </p>
                        <p>
                            Price: $50
                        </p>
                            <a href="#">Buy now</a>
            </div>
            <div class="card">
                <img class="p_image" src="./images/shoe.jpg">
                    <h4>
                        Shoe
                    </h4>
                        <p>
                            The Air Force 1 is a legendary sneaker that debuted in 1982 as a basketball shoe and quickly became a streetwear icon. It was the first Nike shoe to incorporate "Air" cushioning technology in its sole, providing lightweight comfort and impact absorption. The design is instantly recognizable by its classic, slightly chunky construction, often featuring a smooth leather upper. It is available in popular Low, Mid, and High-top silhouettes.
                        </p>
                        <p>
                            Price: $50
                        </p>
                            <a href="#">Buy now</a>
            </div>
            
        </div>
        <div class="footer">
            <div class="footer_title">
                <h3>My Ecommerce Site</h3>
            </div>
            <div class="footer_content">
                <div>
                    <h4>Services</h4>
                    <p>
                        <a href="#">Web</a>
                    </p>
                    <p>
                        <a href="#">App</a>
                    </p>
                    <p>
                        <a href="#">Digital</a>
                    </p>
                </div>
                <div>
                    <h4>Social links</h4>
                    <p>
                        <a href="#">Facebook</a>
                    </p>
                    <p>
                        <a href="#">X</a>
                    </p>
                    <p>
                        <a href="#">Instagram</a>
                    </p>
                </div>
                <div>
                    <h4>Quick links</h4>
                    <p>
                        <a href="#">Home</a>
                    </p>
                    <p>
                        <a href="#">Products</a>
                    </p>
                    <p>
                        <a href="#">Contact</a>
                    </p>
                    <p>
                        <a href="home/register.php">Register</a>
                    </p>
                    <p>
                        <a href="home/login.php">Login</a>
                    </p>
                </div>
                <div>
                    <h4>Location</h4>
                    <p>
                        Western Union Street
                    </p>
                    <p>
                        Email: myecomm@gmail.com
                    </p>
                    <p>
                        Phone: 09019648094
                    </p>
                </div>
            </div>

            <footer>
                <hr/>
                <h3>Copyright @charles 2025</h3>
            </footer>
        </div>
    </body>
</html>