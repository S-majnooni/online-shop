<?php 
    session_start();
    if(!isset($_SESSION["id"])){
        exit(header("location:../originalpage.php"));
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> ویرایش اطلاعات </title>
    <link rel="stylesheet" href="../css/registerpage.css">
    <link rel="stylesheet" href="../originalpage.css">
    <link rel="icon" href="../icon&logotitle/webicon.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        #edit-title{
            padding-top: 20px;
        }
    </style>
</head>
<body>
    <main>
    <audio controls autoplay loop hidden src="../musicweb/Camilla-Solheim-Sostenuto-320.mp3"></audio>
        <div class="register-continer">
            <div class="register-cart">
                <form action="edit_validation_profile.php" method="POST" enctype="multipart/form-data" >
                    <h3 id="edit-title" class="register-title"> ویرایش اطلاعات </h3>
                    <div class="inputs-information">
                        <input type="hidden" name="id" value="<?= $_SESSION["id"] ?>" id="">
                        <input type="hidden" name="old_image_user" value="<?= $_SESSION["image"] ?>" id="">
                        <input class="information-input" type="text" name="firstname" value="<?= $_SESSION["name"] ?>" placeholder=" نام خود را وارد کنید *">
                        <br>
                        <input class="information-input" type="text" name="lastname" value="<?= $_SESSION["last_name"] ?>" placeholder=" نام خانوادگی خود را وارد کنید ">
                        <br>
                        <input class="information-input" type="email" name="gmail" value="<?= $_SESSION["gmail"] ?>" placeholder=" ایمیل خود را وارد کنید *">
                        <br>
                        <input class="information-input" type="text" name="number" value="<?= $_SESSION["phone_number"] ?>" placeholder=" شماره تماس خود را وارد کنید ">
                        <br>
                        <input class="information-input" type="text" name="username" value="<?= $_SESSION["user_name"] ?>" placeholder=" نام کاربری را وارد کنید ">
                        <br>
                        <textarea name="addres" class="information-input" id="addres-input" cols="30" rows="10" placeholder=" آدرس خود را وارد کنید "><?= $_SESSION["addres"] ?></textarea>
                        <br>
                        <input type="file" name="image">
                        <input type="submit" value="ثبت" name="send" class="send-inputs">
                    </div>
                </form>
            </div>
        </div>
        <div class="register-img">
            <div class="register-poster">
                <img src="../gificon/login-3305943-2757111.png" alt="">
            </div>
        </div>
    </main>
</body>
</html>