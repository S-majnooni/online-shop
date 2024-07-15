<?php 
    // connection to database
    $link = mysqli_connect('localhost','root', '', 'onlineshop');
    if (mysqli_connect_errno()){
        exit(header('location:originalpage.php?connecterror=1'));
    }
    if(isset($_GET["id"])){
        $ProductID = $_GET["id"];
        $query = "SELECT * FROM products WHERE ID = $ProductID";
        $finish = mysqli_query($link, $query);
        $product_Information = mysqli_fetch_assoc($finish);
        $Product_Image = $product_Information["image"];
        if(!$ProductID){
            exit(header("location:originalpage.php?notfoundproduct=1"));
        }
    }else{
        exit(header("location:originalpage.php?notfoundproduct=1"));
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?= $product_Information["name"] ?> </title>
    <link rel="stylesheet" href="css/productpage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="icon" href="icon&logotitle/webicon.ico">
</head>
<body>
    <!-- nav for product -->
    <nav>
        <ul>
            <a href="originalpage.php" class="nav-link" > <i class="fa-solid fa-house"></i> </a>
            <a href="" class="nav-link" > <i class="fa-solid fa-left-long"></i> </a>
        </ul>
    </nav>
    <!-- finish nav -->

    <!-- main product -->
    <main>
        <!-- rgiht information product -->
        <div class="information-product">
            <div class="img-star-name-colors-categori-caption">
                <div class="image-product">
                    <img src="image_product/<?= $Product_Image ?>" alt="" class="img-product">
                </div>
                <div class="stars">
                    <i class="fa-solid fa-star star"></i>
                </div>
                <div class="name-colors-category-caption">
                    <div class="name-product">
                        <span> نام محصول </span>
                        <span class="name" > <?= $product_Information["name"] ?> </span>
                    </div>
                    <div class="select-colors">
                        <div class="select-color">
                            <span> انتخاب رنگ </span>
                        </div>
                        <div class="colors">
                            <div class="color blue"></div>
                            <div class="color yellow"></div>
                            <div class="color black"></div>
                        </div>
                    </div>
                    <div class="category">
                        <span> دسته بندی </span>
                        <span> Lorem </span>
                    </div>
                    <div class="caption">
                        <span> توضیحات : </span>
                        <br>
                        <span> <?= $product_Information["caption"] ?> </span>
                    </div>
                </div>
            </div>
            

            <!-- left information product -->
            <div class="comment-video">
                <div class="comment-icon">
                    <i class="fa-solid fa-comments"></i>
                </div>
                <div class="comment-continer" >
                    <div class="comment-box">
                        <div class="send-comment">
                            <form action="php/comment.php" method="POST">
                            <input type="hidden" name="ID-Comment" value="<?= $ProductID ?>">
                            <textarea name="comment" class="comment" id="" cols="30" rows="10" placeholder="نظر خود را بنویسید"></textarea>
                            <input type="submit" name="send" value=" ارسال " class="send"></input>
                            </form>
                        </div>
                        <div class="users-comment">
                            <?php 
                                $sql = "SELECT * FROM comments WHERE product_id = $ProductID ORDER BY ID DESC";
                                $result3 = mysqli_query($link, $sql);
                                while($comments = mysqli_fetch_assoc($result3)){;
                            ?>
                            <span><?= $comments["user_name"] ?> : <?= $comments["comment"] ?> </span>
                            <?php }?>
                        </div>
                    </div>
                </div>
                <h4> مرتبط ها </h4>
                <div class="video-product">
                    <video class="video" src="videoweb/visionprotest.mp4" controls></video>
                </div>
            </div>
            <?php 
                session_start();
                if(isset($_SESSION["id"])){
                    echo "<a href='orderpage.php?id=$ProductID&image=$Product_Image'>
                            <div class='buy-box'> <span> خرید </span> </div>
                        </a>";
                }
                else{
                    echo "<a href='loginpage.php'>
                            <div class='buy-box'> <span> برای خرید وارد سایت شوید </span> </div>
                        </a>";
                }
            ?>






        </div>
    </main>
</body>
</html>