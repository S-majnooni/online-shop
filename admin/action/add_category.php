<?php 
    if(isset($_POST["send"])){
        $name_category = htmlspecialchars($_POST["name"]);
        if(isset($name_category) && !empty($name_category)){
            // connection to database
            $conn = mysqli_connect('localhost','root', '', 'onlineshop');
            if (mysqli_connect_errno()){
                exit(header('location:../add_product.php?connecterror=1'));
            }
            $sql = "INSERT INTO categorys(name) VALUE('$name_category')";
            $result = mysqli_query($conn, $sql);
            if($result){
                exit(header("location:../manage_category.php?succesed=1"));
            }
            else{
                exit(header("location:../add_category.php?errorsucces=1"));
            }
        }
        else{
            exit(header("location:../add_category.php?errorinput=1"));
        }
    }
    else{
        exit(header("location:../add_category.php?error=1"));
    }
?>