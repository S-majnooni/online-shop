<?php include("../action/if_admin.php"); ?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> ویرایش دسته بندی </title>
    <link rel="stylesheet" href="../admin_css/adminpanel.css">
    <link rel="stylesheet" href="../admin_css/add_category.css">
    <link rel="stylesheet" href="edit_category.css">
</head>
<body>
    <main id="main" >
    <?php 
    if(isset($_GET["id"])){
        $catId = $_GET["id"];
        // connection to database
        $conn = mysqli_connect('localhost','root', '', 'onlineshop');
        if (mysqli_connect_errno()){
            exit(header('location:originalpage.php?connecterror=1'));
        }
        $sql = "SELECT * FROM categorys WHERE ID = $catId";
        $result = mysqli_query($conn, $sql);
        $categoryInformation = mysqli_fetch_assoc($result);
        if(!$categoryInformation){
            exit(header('location:../manage_product.php'));
        }
    }
    ?>
        <form action="../action/edit_category.php" method="POST">
            <div class="cat-name">
                <input type="hidden" name="Id" value="<?= $catId ?>">
                <input class="add-cat" type="text" name="name" value=" <?= $categoryInformation["name"] ?> " placeholder=" نام دسته بندی * ">
            </div>
            <br>
            <input class="send-inputs" type="submit" name="send" value="ثبت">
            <img class="decor-img" src="../../gificon/login-3305943-2757111.png" alt="">
        </form>
    </main>
</body>
</html>