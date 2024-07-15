<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ثبت نام</title>
    <link rel="stylesheet" href="css/registerpage.css">
    <link rel="stylesheet" href="originalpage.css">
    <link rel="icon" href="icon&logotitle/webicon.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        .product-image{
            width: 430px;
            height: 430px;
            border: 1px solid lightgray;
            box-shadow: 0px 0px 60px 3px lightgray;
            border-radius: 24px;
        }

        .order-title{
            padding-top: 50px;
        }
    </style>
</head>
<body>
    <?php 
        if(!isset($_GET["id"])){
            exit(header("location:originalpage.php"));
        }
        session_start();
        $order_productID = $_GET["id"];
        $order_productImage = $_GET["image"];
        // connection to database
        $link = mysqli_connect('localhost','root', '', 'onlineshop');
        if (mysqli_connect_errno()){
            exit(header('location:originalpage.php?connecterror=1'));
        }
        $query = "SELECT * FROM products WHERE ID = $order_productID";
        $result = mysqli_query($link, $query);
        $order_product = mysqli_fetch_assoc($result);
    ?>
    <main>
    <audio controls autoplay loop hidden src="musicweb/Camilla-Solheim-Sostenuto-320.mp3"></audio>
        <div class="register-continer">
            <div class="register-cart">
                <form action="php/orders.php" method="POST" enctype="multipart/form-data" >
                    <h3 class="register-title order-title"> ثبت سفارش </h3>
                    <div class="inputs-information">
                        <div class="information-input" value="" > نام محصول : <?= $order_product["name"]?> </div>
                        <br>
                        <input type="hidden" name="id" value="<?= $order_productID ?>">
                        <input type="hidden" name="name_order" value="<?= $order_product["name"] ?>">
                        <input type="hidden" name="price_order" value="<?php 
                        if(empty($order_product["off_price"])){
                            echo $order_product["price"];
                        }
                        else{
                            echo $order_product["off_price"];
                        }
                        ?>">
                        <div class="information-input" value=""> نام خریدار : <?= $_SESSION["name"]?> </div>
                        <br>
                        <input name="stock" type="number" class="information-input" value="">
                        <br>
                        <div class="information-input" value=""> قیمت : <?php 
                        if(empty($order_product["off_price"])){
                            echo number_format($order_product["price"]);
                        }
                        else{
                            echo number_format($order_product["off_price"]);
                        }
                        ?> </div>
                        <br>
                        <div class="information-input" value=""> نشانی : <?= $_SESSION["addres"] ?> </div>
                        <br>
                        <input type="submit" value="ثبت" name="send" class="send-inputs">
                    </div>
                </form>
            </div>
        </div>
        <div class="register-img">
            <a href="originalpage.php" class="nav-link" id="home-in-register">
                        <i class="fa-solid fa-house" id="home-icon"></i>
            </a>
            <div class="register-poster">
                <img class="product-image" src="image_product/<?= $order_productImage ?>" alt="">
            </div>
        </div>
    </main>
</body>
</html>