<?php include("action/if_admin.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> کاربران </title>
    <link rel="stylesheet" href="admin_css/adminpanel.css">
    <link rel="stylesheet" href="admin_css/manage_product.css">
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
                    <a id="select-link-admin" href="users.php"> کاربران </a>
                    <a class="link-admin" href="order.php"> سفارشات </a>
                    <a class="link-admin" href="comment.php"> نظرات </a>
                    <a class="link-admin" href="exit.php"> خروج </a>
                </ul>
            </div>
        </div>

        <!-- <div class="continer-product-management"> -->
            <table id="table-manage-product">
                <tr>
                    <th> ردیف کاربران </th>
                    <th> نام کاربر </th>
                    <th> نام خانوادگی کاربر </th>
                    <th> ایمیل کاربر </th>
                    <th> تاریخ عضویت </th>
                    <th> تنظیمات </th>
                </tr>
                <?php 
                $conn = mysqli_connect('localhost','root', '', 'onlineshop');
                if (mysqli_connect_errno()){
                    exit(header('location:manage_product.php?connecterror=1'));
                }
                $sql = "SELECT * FROM users ORDER BY ID ";
                $result = mysqli_query($conn, $sql);
                $i = 1;
                while($userInfo = mysqli_fetch_assoc($result)){
                ?>
                <tr class="detale-table">
                    <td> <?= $i?> </td>
                    <td> <?= $userInfo["first_name"]?></td>
                    <td> <?= $userInfo["last_name"]?></td>
                    <td> <?= $userInfo["gmail"]?></td>
                    <td> <?= $userInfo["date"]?></td>
                    <td class="">
                        <a href="operation/delete_user.php?id=<?= $userInfo["ID"]?>" class="delete"> حذف </a>
                    </td>
                </tr>
                <?php $i++; }?>
            </table>
        <!-- </div> -->
    </main>
    
</body>
</html>