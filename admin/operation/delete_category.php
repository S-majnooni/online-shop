<?php 
    if(isset($_GET["id"])){
        $Cat_ID = $_GET["id"];
        $conn = mysqli_connect('localhost','root', '', 'onlineshop');
        if (mysqli_connect_errno()){
            exit(header('location:manage_product.php?connecterror=1'));
        }
        $sql = "DELETE FROM categorys WHERE ID = $Cat_ID";
        $result = mysqli_query($conn, $sql);
        if($result){
            exit(header("location:../manage_category.php?succsesed=1"));
        }
        else{
            exit(header("location:../manage_category.php?errorDelete=1"));
        }
    }
    else{
        exit(header('location:../manage_category.php'));
    }
?>