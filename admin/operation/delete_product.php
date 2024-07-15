<?php 
    if(isset($_GET["id"])){
        $productID = $_GET["id"];
        $productImage = $_GET["image"];
        $conn = mysqli_connect('localhost','root', '', 'onlineshop');
        if (mysqli_connect_errno()){
            exit(header('location:manage_product.php?connecterror=1'));
        }
        $ImageLocation = "../../image_product/";
        $sql = "DELETE FROM products WHERE ID = $productID";
        $result = mysqli_query($conn, $sql);
        if($result){
            unlink($ImageLocation . $productImage);
            exit(header("location:../manage_product.php?succsesed=1"));
        }
        else{
            exit(header("location:../manage_product.php?errorNotFoundImageForDelete=1"));
        }
    }
    else{
        exit(header('location:../manage_product.php'));
    }

?>