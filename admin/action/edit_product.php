<?php 
    if(isset($_POST["send"])){
        // post values in variable
        $product_Name = $_POST["name"];
        $product_Stock = $_POST["stock"];
        $product_Price = $_POST["price"];
        $product_OffPrice = $_POST["off-price"];
        if(empty($product_OffPrice)){
            $product_OffPrice = "NULL";
        }
        $product_Caption = $_POST["caption"];
        $product_Image = $_FILES["image"];
        $ImageName = $product_Image["name"];
        $ImagePath = pathinfo($ImageName);
        $ImageName = $ImagePath["filename"] . time() . '.' . $ImagePath["extension"];
        $product_ID = $_POST["id"];
        $product_OldImage = $_POST["old-image"];
        // connection to database
        $conn = mysqli_connect('localhost','root', '', 'onlineshop');
        if (mysqli_connect_errno()){
            exit(header('location:../operation/edit_product.php?connecterror=1'));
        }
        if(isset($product_Name) && !empty($product_Name)
        && isset($product_Stock) && !empty($product_Stock)
        && isset($product_Price) && !empty($product_Price)
        && isset($product_OffPrice)
        && isset($product_Caption) && !empty($product_Caption)
        && isset($product_Image) && !empty($product_Image)
        && isset($product_OldImage) && !empty($product_OldImage)){
            if($product_Image["error"] == 4){
                $sql = "UPDATE products SET name = '$product_Name', stock = $product_Stock, price = $product_Price, off_price = $product_OffPrice, caption = '$product_Caption' WHERE ID = $product_ID";
                $result = mysqli_query($conn, $sql);
                if($result){
                    exit(header("location:../manage_product.php?succesed=1"));
                }
                else{
                    exit(header("location:../manage_product.php?NOsuccesed=1"));
                }
            }
            else{
                $ImageLocation = "../../image_product/";
                if($product_Image["error"] == 0){
                    if($product_Image["type"] == "image/jpg"
                    || $product_Image["type"] == "image/jpeg"
                    || $product_Image["type"] == "image/png"
                    || $product_Image["type"] == "image/tiff"
                    || $product_Image["type"] == "image/gif"
                    ){
                        if($product_Image["size"] < (1024 * 1024) *  3){
                            if(!file_exists($ImageLocation . $ImageName)){
                                $ImageSave = move_uploaded_file($product_Image["tmp_name"], $ImageLocation . $ImageName);
                                if($ImageSave){
                                    $sqli = "UPDATE products SET name = '$product_Name', stock = $product_Stock, price = $product_Price, off_price = $product_OffPrice, caption = '$product_Caption', image = '$ImageName' WHERE ID = $product_ID";
                                    $resultt = mysqli_query($conn, $sqli);
                                    if($resultt){
                                        $UpdateImage = unlink($ImageLocation . $product_OldImage);
                                        if($UpdateImage){
                                            exit(header('location:../manage_product.php?succes=1'));
                                        }
                                        else{
                                            exit(header('location:../operation/edit_product.php?ErrorUpdateImage=1&id=' . $product_ID));
                                        }
                                    }
                                    else{
                                        exit(header('location:../operation/edit_product.php?ErrorUpdate=1&id=' . $product_ID));
                                    }
                                }
                                else{
                                    exit(header('location:../add_product.php?errorSaveImage=1&id='.$product_ID));
                                }
                            }
                            else{
                                exit(header('location:../operation/edit_product.php?retryimage=1&id='.$product_ID));
                            }
                        }
                        else{
                            exit(header('location:../operation/edit_product.php?sizeimage=1&id='.$product_ID));
                        }
                    }
                    else{
                        exit(header('location:../operation/edit_product.php?formatimage=1&id='. $product_ID));
                    }
                }
                else{
                    exit(header('location:../operation/edit_product.php?errorimage=1&id='.$product_ID));
                }
            }
        }
        else{
            exit(header('location:../operation/edit_product.php?errorinput=1&id='.$product_ID));
        }
    }
    else{
        exit(header("location:../operation/edit_product.php?id = $product_ID"));
    }
?>