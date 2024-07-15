<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>محصولات</title>
    <link rel="stylesheet" href="css/products.css">
    <link rel="icon" href="icon&logotitle/webicon.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        .logout{
            margin-left: 50px;
        }

        .register-link-icon{
            margin-left: 50px;
        }
    </style>
</head>
<body>
    <?php 
    // connection to database
    $conn = mysqli_connect('localhost','root', '', 'onlineshop');
    if (mysqli_connect_errno()){
        exit(header('location:originalpage.php?connecterror=1'));
    }
    ?>
    <!-- navbar of page -->
    <nav>
        <ul>
            <!-- nav user icon: 4parts -->
            <div class="icon-of-user-right">
                <a href="profile.php" class="nav-link">
                    <i class="fa-solid fa-user" id="user-icon"></i>
                </a>
                <a href="originalpage.php" class="nav-link">
                    <i class="fa-solid fa-house" id="home-icon"></i>
                </a>
                <a href="" class="nav-link">
                    <i class="fa-solid fa-cart-shopping" id="shop-icon"></i>
                </a>
                <a href="orders.php" class="nav-link">
                    <i class="fa-solid fa-basket-shopping"></i>
                </a>
                <a href="" class="nav-link"> 
                    <i class="fa-solid fa-sun"></i> / <i class="fa-solid fa-moon"></i>
                </a>
            </div>
            

            <!-- nav logo -->
            <div class="logo-center">
                <img class="logo" src="./icon&logotitle/logoweb.jpg" alt="">
            </div>
            

            <!-- nav login & register icon -->
            <div class="icon-of-register-user-left">
                <?php 
                    session_start();
                    if(isset($_SESSION["id"]) ){
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
        </ul>
    </nav>
    <!-- finish navbar -->

    <!-- start select and search -->
    <div class="select-search">
        <div class="search-products">
            <span> <i class="fa-solid fa-magnifying-glass"></i> </span>
            <form action="php/search.php" method="GET">
            <input  class="products-search" type="search" name="search" placeholder="جستجو"> 
            </form>
        </div>
        <div class="select-products">
            <form action="" method="POST">
                <span> <i class="fa-solid fa-filter"></i> </span>
                <select class="products-search" name="selectproduct" id="">
                    <option name="allproduct" value=""> تمام محصولات </option>
                    <?php 
                    $sql = "SELECT * FROM categorys ORDER BY ID";
                    $result = mysqli_query($conn, $sql);
                    while($category = mysqli_fetch_assoc($result)){
                    ?>
                    <option name="mobile" value=""> <?= $category["name"] ?> </option>
                    <?php } ?>
                </select>
            </form>
        </div>
    </div>
    
    <!-- start all products -->
    <div class="all-products">
            <!-- org price right products -->
            <div class="org-products">

                <?php 
                    $query = "SELECT * FROM products WHERE off_price IS NULL";
                    $finish = mysqli_query($conn, $query);
                    while($product_org = mysqli_fetch_assoc($finish)){
                ?>
                <!-- one product -->
                <div class="product">
                    <div class="image-product">
                        <img class="img-product" src="image_product/<?= $product_org["image"] ?>" alt="">
                    </div>
                    <div class="information-product">
                        <div class="colors">
                            <a class="color red"></a>
                            <a class="color blue"></a>
                            <a class="color yellow"></a>
                            <a class="color purple"></a>
                        </div>
                        <div class="caption">
                            <span> <?= $product_org["name"] ?> </span>
                            <span> <?= number_format($product_org["price"]) ?> </span>
                        </div>
                    </div>
                    <div class="buy-product">
                        <a href="productpage.php?id=<?= $product_org["ID"] ?>"><div class="buy"> مشاهده  </div></a>
                        <button class="save-stars" >
                            <div class="stars">
                                <i class="fa-solid fa-star star" ></i>
                                <i class="fa-solid fa-star star" ></i>
                                <i class="fa-solid fa-star star" ></i>
                                <i class="fa-solid fa-star star" ></i>
                                <i class="fa-solid fa-star star" ></i>
                            </div>
                            <i class="fa-solid fa-bookmark" id="save" ></i>
                        </button>
                    </div>
                </div>
                <?php } ?>
            </div>


            <!-- discount left main products -->
            
            <!-- one product -->
            <div class="discount-products">
                <?php 
                    $query_off = "SELECT * FROM products WHERE off_price IS NOT NULL ORDER BY ID DESC"; 
                    $result_off = mysqli_query($conn, $query_off);
                    while($product_off = mysqli_fetch_assoc($result_off)){
                ?>
                <div class="product-discount">
                    <div class="image-proposal-star-product">
                        <img class="image-product-discount" src="image_product/<?= $product_off["image"] ?>" alt="">
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
                    <div class="name-product-discount">
                        <span> <?= $product_off["name"] ?> </span>
                    </div>
                    <div class="price-product-discount">
                        <span class="price-buy"> <?= number_format($product_off["off_price"]) ?> </span>
                        <span class="currency-buy"> تومان </span>
                    </div>
                    <div class="price-product-discount">
                        <span class="price-org"> <?= number_format($product_off["price"]) ?> </span>
                        <span class="currency-org"> تومان </span>
                    </div>
                    <div class="buy-product-discount">
                        <a href="productpage.php?id=<?= $product_off["ID"] ?>"><div class="buy-discount"> مشاهده </div></a>
                        <button class="savebtn-product">
                            <i class="fa-solid fa-bookmark" id="save-product"></i>
                        </button>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
        <!-- finish all products -->

        <!-- footer of page -->
<footer>
        <div class="about-us">
            <h2  class="title-aboutus">
                <span class="product-write"> درباره ما </span>
            </h2>
            <div class="about-us-write-animation">
                <span class="write-about-us"> <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                     Consequatur odit repellat praesentium culpa saepe enim velit quaerat adipisci,
                      hic recusandae quod porro voluptatum ad provident.
                       Ab facilis et quis nostrum, deleniti id numquam vel
                        ea consequatur beatae nisi repudiandae.
                         Quod laboriosam quae delectus quasi odio,
                          quidem aut nesciunt porro nisi.
                          Lorem ipsum dolor sit amet consectetur adipisicing elit.
                           Sapiente perspiciatis praesentium et facilis eaque reiciendis quis temporibus odit dicta,
                            cum optio velit.
                             Facere quas nesciunt optio ut ipsam expedita fugiat omnis nisi illum
                              ipsa, laborum eaque porro culpa nam labore minus ipsum.
                               Doloremque deleniti incidunt culpa molestiae voluptatum harum illum!
                               Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Non enim magnam doloribus explicabo quae officiis nam dolore doloremque a sint ipsum
                                , deserunt impedit atque quis earum quia quisquam ad ab incidunt quos
                                 in ea praesentium libero! Saepe aliquid temporibus quae soluta,
                                  ullam eaque quibusdam! Iusto, molestias porro quae iste officiis
                                   quisquam ipsa dolores, nostrum esse, veritatis impedit est!
                                    Saepe sequi voluptates hic et itaque odio odit debitis eos
                                     omnis dolore.
                </p> </span>

                <div class="img-about-us">
                    <img class="image-about-us" src="gificon/aboutus.gif" alt="">
                </div>
            </div>
        </div>


        <!-- relationship with we -->

        <div class="relationship">
            <h2  class="title-relationship">
                <span class="product-write"> راه های ارتباطی با ما </span>
            </h2>

            <div class="relationships">
                <a href=""><i class="fa-brands fa-instagram" id="instagram"></i></a>
                <a href=""><i class="fa-solid fa-paper-plane" id="telegram"></i></a>
                <a href=""><i class="fa-solid fa-envelope" id="gmail"></i></a>
                <a href=""><i class="fa-brands fa-x-twitter" id="twitter"></i></a>
                <a href=""><i class="fa-brands fa-facebook" id="facebook"></i></a>
                <a href=""><i class="fa-brands fa-whatsapp" id="whatsapp"></i></a>
            </div>
        </div>
        <div class="warning">
            <span> کپی بدون اجازه مالک سایت پیگرد قانونی دارد © </span>
        </div>
    </footer>
    <!-- finish footer -->
</body>
</html>