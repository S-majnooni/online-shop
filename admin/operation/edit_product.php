<?php include("../action/if_admin.php"); ?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> ویرایش محصول </title>
    <link rel="stylesheet" href="edit_product.css">
</head>
<body>
    <?php 
    if(!isset($_GET["ID"])){
        // var_dump($_GET["ID"]);
        // exit;
        // exit(header('location:../manage_product.php?connecterror=1'));
    }
    $ProductID = $_GET["ID"];
    ?>

    <main id="main" class="main">
    <form  action="../action/edit_product.php" method="POST" enctype="multipart/form-data" >
        <div class="register-continer">
            <div class="register-cart">
                <?php 
                    
        
        // connection to database
        $conn = mysqli_connect('localhost','root', '', 'onlineshop');
        if (mysqli_connect_errno()){
            exit(header('location:originalpage.php?connecterror=1'));
        }
        $sqli = "SELECT * FROM products WHERE ID = $ProductID";
        $result = mysqli_query($conn, $sqli);
        $ProductInformation = mysqli_fetch_assoc($result);
        if(!$ProductInformation){
            exit(header('location:../manage_product.php'));
        }
                ?>

                    <h3 class="register-title"> ویرایش محصول </h3>
                    <div class="inputs-information">
                        <input type="hidden" name="id" value="<?= $ProductID ?>">
                        <input type="hidden" name="old-image" value="<?= $ProductInformation["image"]?>">
                        <input class="information-input" type="text" name="name" value="<?= $ProductInformation["name"]?>" placeholder=" نام محصول *">
                        <br>
                        <input class="information-input" type="number" name="stock" value="<?= $ProductInformation["stock"]?>" placeholder=" موجودی * ">
                        <br>
                        <input class="information-input" type="number" name="price" value="<?= $ProductInformation["price"]?>" placeholder=" قیمت *">
                        <br>
                        <input class="information-input" type="number" name="off-price" value="<?= $ProductInformation["off_price"]?>" placeholder=" قیمت با تخفیف ">
                        <br>
                        <textarea name="caption" class="information-input" id="addres-input" cols="30" rows="10" placeholder=" درباره محصول * "><?= $ProductInformation["caption"]?></textarea>
                        <br>
                        <input type="file" value="" name="image">
                        <br>
                        <input type="submit" value="ثبت" name="send" class="send-inputs">
                    </div>
            </div>
        </div>
    </form>
    </main>
</body>
</html>