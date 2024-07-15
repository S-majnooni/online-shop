<?php 
    if(isset($_POST["send"])){
        session_start();
        if(isset($_POST["id"])){
            $order_productID = $_POST["id"];
            $order_stock = $_POST["stock"];
            $order_price = $_POST["price_order"];
            $order_productname = $_POST["name_order"];
            $order_userID = $_SESSION["id"];
            $order_username = $_SESSION["name"];
            $order_addres = $_SESSION["addres"];
            // connection to database
            $link = mysqli_connect('localhost','root', '', 'onlineshop');
            if (mysqli_connect_errno()){
                exit(header('location:originalpage.php?connecterror=1'));
            }
            $order_max_price = $order_price * $order_stock;
            $query = "INSERT INTO orders(user_id, user_name, product_id, product_name, order_stock, price, receive_location) VALUES($order_userID, '$order_username', $order_productID, '$order_productname', $order_stock, $order_max_price, '$order_addres') ";
            $result = mysqli_query($link, $query);
            if($result){
                exit(header("location:../originalpage.php?trueOrder=1"));
            }
            else{
                exit(header("location:../orderpage.php?falseOrder=1&id=".$order_productID));
            }
        }
        else{
            exit(header("location:../originalpage.php?notfoundproduct=1"));
        }
    }
?>