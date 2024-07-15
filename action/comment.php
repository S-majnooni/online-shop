<?php 
    if(isset($_POST["send"])){
        session_start();
        if(!isset($_SESSION['name'])){
            exit(header("location:../productpage.php?errorlogforcomment=1&id=".$_POST["ID-Comment"]));
        }
        else{
        $comment = htmlspecialchars($_POST["comment"]);
        $user_name = $_SESSION['name'];
        $user_ID = $_SESSION["id"];
        $productID_comm = $_POST["ID-Comment"];
        if(!empty($comment) && isset($comment)){
            // connection to database
            $link = mysqli_connect('localhost','root', '', 'onlineshop');
            if (mysqli_connect_errno()){
                exit(header('location:originalpage.php?connecterror=1'));
            }
            $sql = "INSERT INTO comments(user_id, product_id, user_name, comment) VALUES($user_ID, $productID_comm, '$user_name', '$comment')";
            $result = mysqli_query($link, $sql);
            if($result){
                exit(header("location:../productpage.php?id=$productID_comm"));
            }
            else{
                exit(header("location:../productpage.php?errorcomment=1&id=" . $productID_comm));
            }
        }
        else{
            exit(header("location:../productpage.php?emptycomment=1&id=".$productID_comm));
        }
        }
    }
    else{
        exit(header("location:../productpage.php?emptycomment=1&id=".$productID_comm));
    }
    
?>