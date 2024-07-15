<?php include("action/if_admin.php"); ?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> سفارشات </title>
    <link rel="stylesheet" href="admin_css/adminpanel.css">
    <link rel="stylesheet" href="admin_css/manage_product.css">
    <style>
        .setting-orders {
            display: flex;
            row-gap: 4px;
            flex-direction: column;
        }
    </style>
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
                    <a id="select-link-admin" href="order.php"> سفارشات </a>
                    <a class="link-admin" href="comment"> نظرات </a>
                    <a class="link-admin" href="exit.php"> خروج </a>
                </ul>
            </div>
        </div>

        <!-- <div class="continer-product-management"> -->
            <table id="table-manage-product">
                <tr>
                    <th> ردیف سفارش </th>
                    <th> نام کالا </th>
                    <th> نام خریدار </th>
                    <th> تعداد کالا </th>
                    <th> قیمت پرداختی </th>
                    <th> محل تحویل </th>
                    <th> تنظیمات </th>
                </tr>
                <?php 
                $conn = mysqli_connect('localhost','root', '', 'onlineshop');
                if (mysqli_connect_errno()){
                    exit(header('location:manage_product.php?connecterror=1'));
                }
                $sql = "SELECT * FROM orders ORDER BY ID ";
                $result = mysqli_query($conn, $sql);
                $i = 1;
                while($OrderInfo = mysqli_fetch_assoc($result)){
                ?>
                <tr id="datale-tab" class="detale-table">
                    <td> <?= $i?> </td>
                    <td> <?= $OrderInfo["product_name"]?></td>
                    <td> <?= $OrderInfo["user_name"]?></td>
                    <td> <?= $OrderInfo["order_stock"]?></td>
                    <td> <?= number_format($OrderInfo["price"]) ?></td>
                    <td> <?= $OrderInfo["receive_location"] ?></td>
                    <td class="setting-orders">
                        <a href="" class="edit"> در حال ارسال ... </a>
                        <a href="operation/delete_order.php?id=<?= $OrderInfo["ID"]?>" class="delete"> لغو ارسال </a>
                    </td>
                </tr>
                <?php $i++; }?>
            </table>
        <!-- </div> -->
    </main>
    
</body>
</html>