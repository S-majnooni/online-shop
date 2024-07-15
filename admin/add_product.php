<?php include("action/if_admin.php"); ?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>افزودن محصول</title>
    <link rel="stylesheet" href="admin_css/add_product.css">
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
    <main id="main">
        <!-- admin access bar -->
        <div class="admin-navbar">
            <h1 style="text-align: center; margin-bottom: 40px;"> داشبورد </h1>
            <div class="admin-access-link">
                <ul>
                    <a class="link-admin" href="adminpanel.php"> وضعیت </a>
                    <a class="link-admin" href="manage_product.php"> مدیریت کالاها </a>
                    <a id="select-link-admin" href="add_product.php"> افزودن کالا </a>
                    <a class="link-admin" href="manage_category.php"> مدیریت دسته بندی ها</a>
                    <a class="link-admin" href="add_category.php"> افزودن دسته بندی </a>
                    <a class="link-admin" href="users.php"> کاربران </a>
                    <a class="link-admin" href="order.php"> سفارشات </a>
                    <a class="link-admin" href="comment.php"> نظرات </a>
                    <a class="link-admin" href="exit.php"> خروج </a>
                </ul>
            </div>
        </div>

    <form action="action/add_product.php" method="POST" enctype="multipart/form-data" >
        <div class="register-continer">
            <div class="register-cart">
                    <h3 class="register-title"> افزودن محصول </h3>
                    <div class="inputs-information">
                        <input class="information-input" type="text" name="name" value="" placeholder=" نام محصول *">
                        <br>
                        <input class="information-input" type="number" name="stock" placeholder=" موجودی * ">
                        <br>
                        <input class="information-input" type="number" name="price" value="" placeholder=" قیمت *">
                        <br>
                        <input class="information-input" type="number" name="off-price" placeholder=" قیمت با تخفیف ">
                        <br>
                        <textarea name="caption" class="information-input" id="addres-input" cols="30" rows="10" placeholder=" درباره محصول * "></textarea>
                        <br>
                        <input type="file" name="image">
                        <br>
                        <input type="submit" value="ثبت" name="send" class="send-inputs">
                    </div>
            </div>
        </div>
    </form>
    </main>
</body>
</html>