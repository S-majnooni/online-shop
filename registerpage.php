<?php 
session_start();
if(isset($_SESSION["name"]) ){
    exit(header("location:originalpage.php"));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ثبت نام</title>
    <link rel="stylesheet" href="css/registerpage.css">
    <link rel="stylesheet" href="originalpage.css">
    <link rel="icon" href="icon&logotitle/webicon.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
    <main>
    <audio controls autoplay loop hidden src="musicweb/Camilla-Solheim-Sostenuto-320.mp3"></audio>
        <div class="register-continer">
            <div class="register-cart">
                <img class="login-animation" src="gificon/logining.gif" alt="">
                <form action="validation.php" method="POST" enctype="multipart/form-data" >
                    <h3 class="register-title"> ثبت نام </h3>
                    <div class="inputs-information">
                        <input class="information-input" type="text" name="firstname" value="" placeholder=" نام خود را وارد کنید *">
                        <br>
                        <input class="information-input" type="text" name="lastname" placeholder=" نام خانوادگی خود را وارد کنید ">
                        <br>
                        <input class="information-input" type="email" name="gmail" value="" placeholder=" ایمیل خود را وارد کنید *">
                        <br>
                        <input class="information-input" type="text" name="number" placeholder=" شماره تماس خود را وارد کنید ">
                        <br>
                        <input class="information-input" type="text" name="username" placeholder=" نام کاربری را وارد کنید ">
                        <br>
                        <input class="information-input" type="password" name="pass-org" value="" placeholder=" رمز خود را وارد کنید *">
                        <br>
                        <input class="information-input" type="password" name="pass-retry" placeholder=" رمز خود را تکرار کنید *">
                        <br>
                        <textarea name="addres" class="information-input" id="addres-input" cols="30" rows="10" placeholder=" آدرس خود را وارد کنید "></textarea>
                        <br>
                        <input type="file" name="image">
                        <input type="submit" value="ثبت" name="send" class="send-inputs">
                    </div>
                </form>
            </div>
        </div>
        <div class="register-img">
            <a href="originalpage.php" class="nav-link" id="home-in-register">
                        <i class="fa-solid fa-house" id="home-icon"></i>
            </a>
            <div class="register-poster">
                <img src="gificon/login-3305943-2757111.png" alt="">
            </div>
            <a href="loginpage.php">
                    <span class="question-account"> آیا حساب کاربری دارید؟ </span>
            </a>
        </div>
    </main>

    <!-- alerts is for informations -->
    <?php
        // alert for empty inputs
        if(isset($_GET['emptyinputs'])){
            echo "<script> alert(' اطلاعات لازم را کامل پر کنید! ') </script>";
        }

        // alert is error password is more than 6 number
        if (isset($_GET['passmoresixnum'])){
            echo "<script> alert(' رمز شما باید بیشتر از 6 رقم باشد! ') </script>";
        };

        if (isset($_GET['errorpass'])){
            echo "<script> alert(' رمز باید شامل اعداد، حروف کوچک و بزرگ و . _ باشد ') </script>";
        };

        // allert is wrong passwords values
        if (isset($_GET['passesnotequal'])){
            echo "<script> alert(' رمز عبور های وارد شده باهم مطابقت ندارند! ') </script>";
        };
        if (isset($_GET['gotologin'])){
            echo "<script> alert(' شما از قبل حساب کاربری ایحاد کرده اید! ') </script>";
        };
        if(isset($_GET['saved'])){
            echo "<script> alert('کاربر عزیز اطلاعات شما با موفقیت ثبت شد '); </script>";
        }
    ?>
</body>
</html>