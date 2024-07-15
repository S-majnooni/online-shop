<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/profile.css">
    <title>
        <?php 
             $tittle1 = isset($_SESSION['name']) ? ($_SESSION['name'] == '') ? '' : $_SESSION['name'] : '';
             echo htmlspecialchars($tittle1);
             $tittle2 = isset($_COOKIE['name']) ? ($_COOKIE['name'] == '') ? '' : $_COOKIE['name'] : '';
             echo htmlspecialchars($tittle2);
        ?>
    </title>
</head>
<body>
    <?php 
    if(isset($_SESSION['name']) || isset($_COOKIE['name'])){
        
            // connection to database
            $conn = mysqli_connect('localhost','root', '', 'onlineshop');
            if (mysqli_connect_errno()){
                exit(header('location:../operation/edit_product.php?connecterror=1'));
            }
            $USER_ID = $_SESSION["id"];
            $sql = "SELECT * FROM users WHERE ID = $USER_ID";
            $result = mysqli_query($conn, $sql);
            $userinfo = mysqli_fetch_assoc($result)
    ?>
    <main>
        <div class="user-profile-card">
            <h3> <img class="img-user" src="image_user/<?= $userinfo["image"] ?>" alt=""> </h3>
            <div class="valus-user">
                <div class="information-user">
                    <span>نام:</span>
                    <span>
                        <?=
                        $userinfo["first_name"]
                        ?>
                    </span>
                </div>
                
                <div class="information-user">
                    <span>نام خانوادگی:</span>
                    <span>
                        <?=
                        $userinfo["last_name"]
                        ?>
                    </span>
                </div>

                <div class="information-user">
                    <span>ایمیل:</span>
                    <span>
                        <?=
                        $userinfo["gmail"]
                        ?>
                    </span>
                </div>

                <div class="information-user">
                    <span>شماره تلفن:</span>
                    <span>
                        <?= 
                        $userinfo["phone_number"]
                        ?>
                    </span>
                </div>

                <div class="information-user">
                    <span>نام کاربری:</span>
                    <span>
                        <?=
                        $userinfo["user_name"]
                        ?>
                    </span>
                </div>

                <div class="information-user">
                    <span>آدرس:</span>
                    <span>
                        <?=
                        $userinfo["addres"]
                        ?>
                    </span>
                </div>
            </div>
        </div>
        <div class="edit-delet-button">
            <div class="edit-delet-card">
                <a href="php/edit_profile.php" class="edit"> <span> ویرایش اطلاعات </span> </a>
                <a href="php/delete_profile.php?id=<?= $USER_ID ?>&image=<?= $userinfo["image"] ?>" class="delet"> حذف حساب کاربری </a> 
            </div>
        </div>
    </main>
    <?php }else{ ?>
        <div class="guid">
        <span class="alert-acc"> شما به حساب خود ورود نکردید </span>
        <a class="click-for-login" href="loginpage.php"> برای ورود به سایت کلیک کنید </a>
        </div>
    <?php }?>
</body>
</html>