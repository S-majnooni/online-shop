<?php 
    if(isset($_GET["id"])){
        $orderID = $_GET["id"];
        $conn = mysqli_connect('localhost','root', '', 'onlineshop');
        if (mysqli_connect_errno()){
            exit(header('location:manage_product.php?connecterror=1'));
        }
        $sql = "DELETE FROM orders WHERE ID = $orderID ";
        $result = mysqli_query($conn, $sql);
        if($result){
            exit(header("location:../order.php?deleteOrderTrue=1"));
        }
        else{
            exit(header("location:../order.php?deleteOrderFalse=1"));
        }
    }
    else{
        exit(header("location:../order.php"));
    }
?>