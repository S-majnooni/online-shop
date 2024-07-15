<?php 
session_start();
    if(isset($_GET["id"])){
        $user_ID = $_GET["id"];
        $user_IMAGE = $_GET["image"];
        $conn = mysqli_connect('localhost','root', '', 'onlineshop');
        if (mysqli_connect_errno()){
            exit(header('location:originalpage.php?connecterror=1'));
        }
        $sql = "DELETE FROM users WHERE ID = $user_ID";
        $result = mysqli_query($conn, $sql);
        $image_location = "../image_user/";
        if($result){
            unlink($image_location . $user_IMAGE);
            session_destroy();
            exit(header("location:../originalpage.php?DeleteAccountIsTrue= 1"));
        }
        else{
            exit(header("location:../originalpage.php?DeleteAccountIsFalse= 1"));
        }
    }
    else{
        exit(header("location:../profile.php"));
    }
?>