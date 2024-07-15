<?php 
session_start();
if(isset($_SESSION["id"])){
    session_destroy();
    exit(header("location:../originalpage.php"));
}
if(isset($_COOKIE["name"])){
    setcookie("name", "", time() - 86400);
    exit(header("location:../originalpage.php"));
}
?>