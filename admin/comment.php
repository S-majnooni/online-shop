<?php include("action/if_admin.php"); ?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> نظرات </title>
    <link rel="stylesheet" href="admin_css/manage_product.css">   
    <link rel="stylesheet" href="admin_css/adminpanel.css">
    <link rel="stylesheet" href="admin_css/comment.css">
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
                    <a class="link-admin" href="add_category.php"> افزودن دسته بندی </a>
                    <a class="link-admin" href="users.php"> کاربران </a>
                    <a class="link-admin" href="order.php"> سفارشات </a>
                    <a id="select-link-admin" href="comment.php"> نظرات </a>
                    <a class="link-admin" href="exit.php"> خروج </a>
                </ul>
            </div>
        </div>

        
        <!-- <div class="continer-product-management"> -->
        <table id="table-manage-product">
                <tr>
                    <th> ردیف کاربر </th>
                    <th> نام کاربر </th>
                    <th> ایمیل کاربر </th>
                    <th> نام کالا </th>
                    <th> نظر کاربر </th>
                    <th> تنظیمات </th>
                </tr>
                <?php 
                    $conn = mysqli_connect('localhost','root', '', 'onlineshop');
                    if (mysqli_connect_errno()){
                        exit(header('location:manage_product.php?connecterror=1'));
                    }
                    $sql = "SELECT comments.ID,comments.user_id, comments.user_name, products.name, users.gmail, comments.comment FROM comments INNER JOIN products ON products.ID = comments.product_id INNER JOIN users ON users.ID = comments.user_id";
                    $result = mysqli_query($conn, $sql);
                    $i = 1;
                    while($commentInfo = mysqli_fetch_assoc($result)){
                ?>
                <tr class="detale-table">
                    <td> <?= $commentInfo["user_id"] ?> </td>
                    <td> <?= $commentInfo["user_name"] ?> </td>
                    <td> <?= $commentInfo["gmail"]?></td>
                    <td> <?= $commentInfo["name"]?></td>
                    <td> <?= $commentInfo["comment"] ?></td>
                    <td class="">
                        <a href="operation/delete_comment.php?id=<?= $commentInfo["ID"]?>" class="delete"> حذف </a>
                    </td>
                </tr>
                <?php $i++; } ?>
            </table>
    </main>
</body>
</html>