<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- first product -->
    <div class="products">


            <!-- second product -->
            <?php 
                // connection to database
                $conn = mysqli_connect('localhost','root', '', 'onlineshop');
                if (mysqli_connect_errno()){
                    exit(header('location:originalpage.php?connecterror=1'));
                }
                $sql = "SELECT * FROM products WHERE off_price IS NULL ORDER BY RAND() LIMIT 4";
                $result = mysqli_query($conn, $sql);
                while($product = mysqli_fetch_assoc($result)){
            ?>
            <div class="product-for-user">
                <div class="image-proposal-star-product">
                    <img class="image-product" src="image_product/<?= $product["image"] ?>" alt="">
                    <div class="proposalandstar">
                        <div class="proposal-product"> پیشنهاد ما </div>
                        <div class="stars-product">
                            <i class="fa-solid fa-star star"></i>
                            <i class="fa-solid fa-star star"></i>
                            <i class="fa-solid fa-star star"></i>
                            <i class="fa-solid fa-star star"></i>
                            <i class="fa-solid fa-star star"></i>
                        </div>
                    </div>
                </div>
                <div class="name-product">
                    <span> <?= $product["name"] ?> </span>
                </div>
                <div class="price-product">
                    <span class="price-buy"> <?= number_format($product["price"]) ?> </span>
                    <span class="currency-buy"> تومان </span>
                </div>
                <div class="buy-product">
                    <a href="productpage.php?id=<?= $product["ID"] ?>"><div class="buy"> مشاهده </div></a>
                    <button class="savebtn-product">
                        <i class="fa-solid fa-bookmark" id="save-product"></i>
                    </button>
                </div>
            </div>
            <?php } ?>
</body>
</html>