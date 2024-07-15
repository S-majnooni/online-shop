<?php include("action/if_admin.php"); ?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> مدیریت محصولات </title>
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
                    <a id="select-link-admin" href="manage_product.php"> مدیریت کالاها </a>
                    <a class="link-admin" href="add_product.php"> افزودن کالا </a>
                    <a class="link-admin" href="manage_category.php"> مدیریت دسته بندی ها</a>
                    <a class="link-admin" href="add_category.php"> افزودن دسته بندی </a>
                    <a class="link-admin" href="users.php"> کاربران </a>
                    <a class="link-admin" href="order.php"> سفارشات </a>
                    <a class="link-admin" href="comment"> نظرات </a>
                    <a class="link-admin" href="exit.php"> خروج </a>
                </ul>
            </div>
        </div>

        <!-- <div class="continer-product-management"> -->
            <table id="table-manage-product">
                <tr>
                    <th> ردیف کالا </th>
                    <th> نام کالا </th>
                    <th> تعداد کالا </th>
                    <th> قیمت کالا </th>
                    <th> قیمت با تخفیف </th>
                    <th> تنظیمات </th>
                </tr>
                <?php 
                $conn = mysqli_connect('localhost','root', '', 'onlineshop');
                if (mysqli_connect_errno()){
                    exit(header('location:manage_product.php?connecterror=1'));
                }
                $sql = "SELECT * FROM products ORDER BY ID ";
                $result = mysqli_query($conn, $sql);
                $i = 1;
                while($ProductInfo = mysqli_fetch_assoc($result)){
                ?>
                <tr class="detale-table">
                    <td> <?= $i?> </td>
                    <td> <?= $ProductInfo["name"]?></td>
                    <td> <?= $ProductInfo["stock"]?></td>
                    <td> <?= number_format($ProductInfo["price"])?></td>
                    <td> <?php
                    if(empty($ProductInfo["off_price"])){
                        $ProductInfo["off_price"] = $ProductInfo["price"];
                    }
                    echo number_format($ProductInfo["off_price"])?></td>
                    <td class="">
                        <a href="operation/edit_product.php?ID=<?= $ProductInfo["ID"]?>" class="edit"> ویرایش </a>
                        <a href="operation/delete_product.php?id=<?= $ProductInfo["ID"]?>&image=<?= $ProductInfo["image"]?>" class="delete"> حذف </a>
                    </td>
                </tr>
                <?php $i++; }?>
            </table>
        <!-- </div> -->
    </main>
    
</body>
</html>