<?php include("action/if_admin.php"); ?> 


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> داشبورد </title>
    <link rel="stylesheet" href="admin_css/adminpanel.css">
</head>
<body>

    <div id="hr-panel">
        <div class="admin-profile">
            <a href="../profile.php">
            <?= $_SESSION["name"] . " " . $_SESSION["last_name"] ?>
            </a>
            <img src="../image_user/<?= $_SESSION["image"] ?>" alt="" class="admin-photo">
        </div>
    </div>

    
    <!-- start main -->
    <main id="main">
        <!-- admin access bar -->
        <div class="admin-navbar">
            <h1 style="text-align: center; margin-bottom: 40px;"> داشبورد </h1>
            <div class="admin-access-link">
                <ul>
                    <a id="select-link-admin" href="adminpanel.php"> وضعیت </a>
                    <a class="link-admin" href="manage_product.php"> مدیریت کالاها </a>
                    <a class="link-admin" href="add_product.php"> افزودن کالا </a>
                    <a class="link-admin" href="manage_category.php"> مدیریت دسته بندی ها</a>
                    <a class="link-admin" href="add_category.php"> افزودن دسته بندی </a>
                    <a class="link-admin" href="users.php"> کاربران </a>
                    <a class="link-admin" href="order.php"> سفارشات </a>
                    <a class="link-admin" href="comment.php"> نظرات </a>
                    <a class="link-admin" href="exit.php"> خروج </a>
                </ul>
            </div>
        </div>


        <!-- start details access for admin -->
        <div class="details">
            <!-- access details boxs -->
            <div class="information-box">
                <?php 
                // connection to database
                $conn = mysqli_connect('localhost','root', '', 'onlineshop');
                if (mysqli_connect_errno()){
                    exit(header('location:originalpage.php?connecterror=1'));
                }
                ?>
                <div class="red-color">
                    <h2> تعداد کاربران </h2>
                    <span>
                        <?php 
                            $sql = "SELECT COUNT(*) AS ID FROM users";
                            $result = mysqli_query($conn, $sql);
                            while($users = mysqli_fetch_assoc($result)){
                                echo $users["ID"];
                            }
                        ?>
                    </span>
                </div>
                <div class="blue-color">
                    <h2> تعداد محصولات </h2>
                    <span>
                        <?php 
                            $sql = "SELECT COUNT(*) AS ID FROM products";
                            $result = mysqli_query($conn, $sql);
                            while($products = mysqli_fetch_assoc($result)){
                                echo $products["ID"];
                            }
                        ?>
                    </span>
                </div>
                <div class="green-color">
                    <h2> تعداد دسته بندی </h2>
                    <span>
                        <?php 
                            $sql = "SELECT COUNT(*) AS ID FROM categorys";
                            $result = mysqli_query($conn, $sql);
                            while($category = mysqli_fetch_assoc($result)){
                                echo $category["ID"];
                            }
                        ?>
                    </span>
                </div>
                <div class="orange-color">
                    <h2>تعداد سفارشات</h2>
                    <span>
                        <?php 
                            $sql = "SELECT COUNT(*) AS ID FROM orders";
                            $result = mysqli_query($conn, $sql);
                            while($orders = mysqli_fetch_assoc($result)){
                                echo $orders["ID"];
                            }
                        ?>
                    </span>
                </div>
            </div>
            <div class="chart">
                 <!-- <img src="../imageweb/chart.png" alt="" class="chart-image">  -->
                <img src="../gificon/login-3305943-2757111.png" alt="" class="chart-image">
            </div>
        </div>
    </main>
</body>
</html>