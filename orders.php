<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> سفارشات </title>
    <link rel="stylesheet" href="admin/admin_css/manage_product.css">
    <style>
        .delete{
            text-decoration: none;
        }

        body{
            margin: 0px;
            font-family: koodak;
            direction: rtl;
    height: 825px;
    width: 100%;
    background: linear-gradient(to top right, #9c88ff, #0097e6,#FDA7DF);
    animation-name: changecolor;
    animation-duration: 30s;
    animation-delay: 3s;
    animation-fill-mode:none;
    animation-iteration-count:infinite;
    animation-direction: alternate;
}

@keyframes changecolor{
    10%{
        background: linear-gradient(to right, #9c88ff, #0097e6,#FDA7DF);
    }
    20%{
        background: linear-gradient(to bottom right, #9c88ff, #0097e6,#FDA7DF);
    }
    35%{
        background: linear-gradient(to bottom, #9c88ff, #0097e6,#FDA7DF);
    }
    50%{
        background: linear-gradient(to bottom left, #9c88ff, #0097e6,#FDA7DF);
    }
    65%{
        background: linear-gradient(to left, #9c88ff, #0097e6,#FDA7DF);
    }
    80%{
        background: linear-gradient(to top left, #9c88ff, #0097e6,#FDA7DF);
    }
    95%{
        background: linear-gradient(to top , #9c88ff, #0097e6,#FDA7DF);
    }
}

    .no-order{
        margin-right: 690px;
        font-size: 34px;
    }

    #ddd{
        padding-top: 300px;
        height: 400px;
        width: 100%;
    }
    </style>
</head>
<body>
    <?php 
    session_start();
        if(!isset($_SESSION["id"])){
            echo " <div id='ddd'><span class='no-order'> سفارشی وجود ندارد </span></div> ";
        }
        else { ?>
    <main id="mein" class="main">
        
            <!-- <div class="continer-product-management"> -->
            <table id="table-manage-product">
                <tr>
                    <th> ردیف کالا </th>
                    <th> نام کالا </th>
                    <th> تعداد کالا </th>
                    <th> قیمت کالا </th>
                    <th> محل دریافت </th>
                    <th> تنظیمات </th>
                </tr>
                <?php 
                $orders_for_user = $_SESSION["id"];
                $conn = mysqli_connect('localhost','root', '', 'onlineshop');
                if (mysqli_connect_errno()){
                    exit(header('location:manage_product.php?connecterror=1'));
                }
                $sql = "SELECT * FROM orders WHERE user_id = $orders_for_user";
                $result = mysqli_query($conn, $sql);
                $i = 1;
                while($orderInfo = mysqli_fetch_assoc($result)){
                ?>
                <tr class="detale-table">
                    <td> <?= $i?> </td>
                    <td> <?= $orderInfo["product_name"]?></td>
                    <td> <?= $orderInfo["order_stock"]?></td>
                    <td> <?= number_format($orderInfo["price"])?></td>
                    <td> <?= $orderInfo["receive_location"] ?></td>
                    <td class="">
                        <a href="php/delete_order.php?id=<?= $orderInfo["ID"]?>" class="delete"> لغو ارسال </a>
                    </td>
                </tr>
                <?php $i++; }?>
            </table>
        <!-- </div> -->
    </main>
    <?php } ?>
</body>
</html>