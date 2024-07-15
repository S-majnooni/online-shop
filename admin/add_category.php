<?php include("action/if_admin.php"); ?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> افزودن دسته بندی </title>
    <link rel="stylesheet" href="admin_css/manage_product.css">   
    <link rel="stylesheet" href="admin_css/adminpanel.css">
    <link rel="stylesheet" href="admin_css/add_category.css">

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
    <main id="main">
        <!-- admin access bar -->
        <div class="admin-navbar">
            <h1 style="text-align: center; margin-bottom: 40px;"> داشبورد </h1>
            <div class="admin-access-link">
                <ul>
                    <a class="link-admin" href="adminpanel.php"> وضعیت </a>
                    <a class="link-admin" href="manage_product.php"> مدیریت کالاها </a>
                    <a class="link-admin" href="add_product.php"> افزودن کالا </a>
                    <a class="link-admin" href="manage_category.php"> مدیریت دسته بندی ها</a>
                    <a id="select-link-admin" href="add_category.php"> افزودن دسته بندی </a>
                    <a class="link-admin" href="users.php"> کاربران </a>
                    <a class="link-admin" href="order.php"> سفارشات </a>
                    <a class="link-admin" href="comment.php"> نظرات </a>
                    <a class="link-admin" href="exit.php"> خروج </a>
                </ul>
            </div>
        </div>

        <form action="action/add_category.php" method="POST">
            <div class="cat-name">
                <input class="add-cat" type="text" name="name" placeholder=" نام دسته بندی * ">
            </div>
            <br>
            <input class="send-inputs" type="submit" name="send" value="ثبت">
            <img class="decor-img" src="../gificon/login-3305943-2757111.png" alt="">
        </form>
    </main>
</body>
</html>