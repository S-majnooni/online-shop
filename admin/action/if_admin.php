<?php 
    session_start();
    if(!isset($_SESSION["admin"]) || $_SESSION["admin"] != 1){
        exit(header("location:../originalpage.php"));
    }
?>