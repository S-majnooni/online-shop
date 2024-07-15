<?php 
    if(!isset($_GET["id"])){
        exit(header("location:../comment.php"));
    }
        $commentID = $_GET["id"];
        $conn = mysqli_connect('localhost','root', '', 'onlineshop');
        if (mysqli_connect_errno()){
            exit(header('location:manage_product.php?connecterror=1'));
        }
        $sql = "DELETE FROM orders WHERE ID = $commentID ";
        $result = mysqli_query($conn, $sql);
        if($result){
            exit(header("location:../comment.php?deleteOrderTrue=1"));
        }
        else{
            exit(header("location:../comment.php?deleteOrderFalse=1"));
        }
?>