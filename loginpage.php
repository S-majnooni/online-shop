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
    <title> ورود</title>
    <link rel="stylesheet" href="css/registerpage.css">
    <link rel="stylesheet" href="originalpage.css">
    <link rel="stylesheet" href="css/loginpage.css">
    <link rel="icon" href="icon&logotitle/webicon.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
    <main>
    <audio controls autoplay loop hidden src="musicweb/Camilla-Solheim-Sostenuto-320.mp3"></audio>
        <div class="register-continer">
            <div class="register-cart">
                <img class="login-animation" src="gificon/logining.gif" alt="">
                <form id="form-login" action="validationlogin.php" method="POST">
                    <h3 class="register-title">  ورود </h3>
                    <div class="inputs-information">
                        <input class="information-input" type="text" name="gmail" placeholder=" ایمیل یا نام کاربری خود را وارد کنید *">
                        <br>
                        <input class="information-input" type="password" name="pass-org" placeholder=" رمز خود را وارد کنید *">
                        <br>
                        <input type="submit" value="ورود" name="send" class="send-inputs">
                        <br>
                        <br>
                        <input type="checkbox" name="check-user" checked> <span> مرا بخاطر بسپار </span>
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
            <a href="registerpage.php">
                    <span class="question-account"> آیا حساب کاربری ندارید؟ </span>
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

        // allert is wrong passwords values
        if (isset($_GET['passesnotequal'])){
            echo "<script> alert(' رمز عبور های وارد شده باهم مطابقت ندارند! ') </script>";
        };

        // allert is wrong password
        if (isset($_GET['informationwrong'])){
            echo "<script> alert(' اطلاعات وارد شده صحیح نمی باشد ! ') </script>";
        };


        if (isset($_GET['haveaccount'])){
            echo "<script> alert(' این حساب قبلا در سایت وجود داشته است ! ') </script>";
        };
    ?>
</body>
</html>