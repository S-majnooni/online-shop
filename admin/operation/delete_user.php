<?php 

    if(isset($_GET["id"])){
        $userID = $_GET["id"];
        $conn = mysqli_connect('localhost','root', '', 'onlineshop');
        if (mysqli_connect_errno()){
            exit(header('location:manage_product.php?connecterror=1'));
        }
        $sql = "DELETE FROM users WHERE ID = $userID";
        $result = mysqli_query($conn, $sql);
        if($result){
            exit(header("location:../users.php?succsesed=1"));
        }
        else{
            exit(header("location:../users.php?errordelete"));
        }
    }
    else{
        exit(header('location:../manage_user.php'));
    }

?>