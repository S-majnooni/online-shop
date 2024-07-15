<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fire shop</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="originalpage.css">
    <link rel="icon" href="icon&logotitle/webicon.ico">
    <script src="js/time.js"></script>
    <style>
        .logout{
            margin-left: 50px;
        }

        .register-link-icon{
            margin-left: 50px;
        }

        .go-to-admin-panel{
            width: 100%;
            height: 36px;
            background-color: #00b894;
            color: white;
            text-decoration: none;
            font-size: 24px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 8px;
        }

        .felash{
            margin-right: 10px;
        }
    </style>
</head>
<body>
    
    <!-- navbar of page -->
    <nav>
        <ul>
            <!-- nav user icon: 4parts -->
            <div class="icon-of-user-right">
                <a href="profile.php" class="nav-link">
                    <i class="fa-solid fa-user" id="user-icon"></i>
                </a>
                <a href="" class="nav-link">
                    <i class="fa-solid fa-house" id="home-icon"></i>
                </a>
                <a href="products.php" class="nav-link">
                    <i class="fa-solid fa-cart-shopping" id="shop-icon"></i>
                </a>
                <a href="orders.php" class="nav-link">
                    <i class="fa-solid fa-basket-shopping"></i>
                </a>
                <a href="" class="nav-link"> 
                    <i class="fa-solid fa-sun"></i> / <i class="fa-solid fa-moon"></i>
                </a>
                <?php 
                    session_start();
                    if(isset($_SESSION["admin"]) && $_SESSION["admin"] == 1 ){
                        echo "<a href='admin/adminpanel.php' class='nav-link'> 
                                <i class='fa-solid fa-user-tie'></i>
                            </a>";
                    }
                ?>
                
            </div>
            

            <!-- nav logo -->
            <div class="logo-center">
                <img class="logo" src="./icon&logotitle/logoweb.jpg" alt="">
            </div>
            

            <!-- nav login & register icon -->
            <div class="icon-of-register-user-left">
                <?php 
                    if(isset($_SESSION["name"]) ){
                        echo "<a href='php/logout.php' class='nav-link logout'>
                            <i class='fa-solid fa-right-from-bracket'></i>
                        </a>";
                    }
                    else{
                        echo "<a href='registerpage.php' class='register-link-icon'>
                            <img class='register-icon' src='./gificon/register.gif' alt='>
                            <span class='register-write'>ثبت نام / ورود</span>
                        </a>";
                    }
                ?>
                
            </div>
        </ul>
    </nav>
    <!-- finish navbar -->

    
    <!-- header images of page -->
    <header>
        <!-- information for header images -->
        <div class="header-information-dotes">
            <!-- view information images button -->
            <div class="view-images-information">
                <div class="button-information">
                    <a class="view-information" href="">  مشاهده اطلاعات  </a>
                </div>
            </div>
            
            
            <!-- dote for number of images header -->
            <div class="dote">
                <div class="dotes">
                    <div class="dote-image-information"></div>
                    <div class="dote-image-information"></div>
                    <div class="dote-image-information"></div>
                    <div class="dote-image-information"></div>
                    <div class="dote-image-information"></div>
                </div>
            </div>
        </div>
    </header>
    <!-- finish header -->


    <!-- main of page -->
    <main>
        <!-- view all product and search -->
        <div class="product-search">
            <span class="see-all-products">
                <a class="see-all-product" href="products.php"> مشاهده تمامی محصولات <i class="fa-solid fa-left-long"></i> </a>
            </span>
            <div class="search">
                <span> <i class="fa-solid fa-magnifying-glass"></i> </span>
                <input  class="products-search" type="search" placeholder="جستجو"> 
            </div>
        </div>


        <!-- discount products -->
        <h2  class="product-title">
            <i class="fa-solid fa-fire" id="fire-discount"></i> <span class="product-write"> تخفیف </span>
        </h2>


        <!-- first product -->
        <div class="products">

            <?php 
                // connection to database
                $link = mysqli_connect('localhost','root', '', 'onlineshop');
                if (mysqli_connect_errno()){
                    exit(header('location:originalpage.php?connecterror=1'));
                }
                $query = "SELECT * FROM products WHERE off_price IS NOT NULL ORDER BY ID DESC LIMIT 4";
                $finish = mysqli_query($link, $query);
                while($product_off = mysqli_fetch_assoc($finish)){
            ?>
            <!-- second product -->
            <div class="product">
                <div class="image-proposal-star-product">
                    <img class="image-product" src="image_product/<?= $product_off["image"] ?>" alt="">
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
                    <span> <?= $product_off["name"] ?> </span>
                </div>
                <div class="price-product">
                    <span class="price-buy"> <?= number_format($product_off["off_price"]) ?> </span>
                    <span class="currency-buy"> تومان </span>
                </div>
                <div class="price-product">
                    <span class="price-org"> <?= number_format($product_off["price"]) ?> </span>
                    <span class="currency-org"> تومان </span>
                </div>
                <div class="buy-product">
                    <a href="productpage.php?id=<?= $product_off["ID"] ?>"><div class="buy"> مشاهده </div></a>
                    <button class="savebtn-product">
                        <i class="fa-solid fa-bookmark" id="save-product"></i>
                    </button>
                </div>
            </div>
            <?php } ?>


            <!-- see all the porduct -->
            <span class="see-all-products in-products-main">
                <a class="see-all-product" href="products.php"> مشاهده تمامی محصولات <i class="fa-solid fa-left-long"></i> </a>
            </span>
        </div>


        <!-- special product -->
        <h2  class="product-title">
            <i class="fa-solid fa-gift" id="gift-special"></i> <span class="product-write"> ویژه </span>
        </h2>


        <!-- special notfication -->
        <div class="specials">
            <div class="special-notf">
                <div class="amazing-special">
                    <span class="amazing-special-write"> پیشنهاد شگفت انگیز </span>
                </div>
                <div class="special-product">
                    <img class="image-special" src="icon&logotitle/xiaomiheader.png" alt="">
                    <div class="information-special">
                        <div class="price-special-percent-discount">
                            <span class="price-special"> 8,000,000 تومان </span>
                            <span class="percent-discount"> 50% تخفیف </span>
                        </div>
                        <div class="name-product-special">
                            <span> موبایل شیائومی 14 </span>
                        </div>
                        <hr class="special-dotted">
                        <div class="time-special"> <span id="hour">19</span> : <span id="minute">26</span> : <span id="secound">36</span> </div>
                        <span class="write-for-time-special"> امکان سفارش تا پایان زمان </span>
                        <a href="" class="write-special-amazing"><span class="amazing-buy-special-write"> سفارش محصول </span></a>
                    </div>
                </div>
            </div>


            <!-- special poster -->
            <div class="poster-special-discount">
                <img  class="image-special-poster" src="icon&logotitle/9310095-perview.jpg" alt="">
                <img  class="image-special-poster" src="icon&logotitle/9310095-perview (2).jpg" alt="">
            </div>
        </div>


        <!-- for user product -->
        <h2  class="product-title-user">
            <i class="fa-solid fa-tag" id="tag-for-user"></i> <span class="product-write"> برای شما </span>
        </h2>


        <!-- connect for user products from php file -->
        <?php
        include ('php/mainforuser.php');
        ?>


            <!-- see all the porduct -->
            <span class="see-all-products in-products-main">
                <a class="see-all-product" href="products.php"> مشاهده تمامی محصولات <i class="fa-solid fa-left-long"></i> </a>
            </span>
        </div>
    </main>
    <!-- finish main -->


    <!-- connect footer from php file -->
    <?php 
    include ('php/footer.php');
    ?>

    <!-- alert save the information user -->
    <?php
        if(isset($_GET['saved'])){
            echo "<script> alert('کاربر عزیز اطلاعات شما با موفقیت ثبت شد '); </script>";
        }

        if(isset($_GET['logtosite'])){
            echo "<script> alert(' کاربر گرامی شما به حساب خود با موفقیت وارد شدید !'); </script>";
        }

        if(isset($_GET['connecterror'])){
            echo "<script>alert(' مشکلی در ارتباط با سرور رخ داده است ')</script>" . mysqli_connect_error();
        }
    ?>
    
</body>
</html>