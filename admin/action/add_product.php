<?php 
// connection to database
$conn = mysqli_connect('localhost','root', '', 'onlineshop');
if (mysqli_connect_errno()){
    exit(header('location:../add_product.php?connecterror=1'));
}
    // post values in variable
    $NameProduct = $_POST["name"];
    $StockProduct = $_POST["stock"];
    $PriceProduct = $_POST["price"];
    $OffPriceProduct = $_POST["off-price"];
    if(empty($OffPriceProduct)){
        $OffPriceProduct = "NULL";
    }
    $CaptionProdudct = $_POST["caption"];
    $ImageProduct = $_FILES["image"];
    $ImageName = $ImageProduct["name"];
    $ImagePath = pathinfo($ImageName);
    $ImageName = $ImagePath["filename"] . time() . '.' . $ImagePath["extension"];
    // save in variable image info

    if(isset($_POST["send"])){
        // check the inputs
        if(
            isset($NameProduct) && !empty($NameProduct)
            && isset($StockProduct) && !empty($StockProduct)
            && isset($PriceProduct) && !empty($PriceProduct)
            && isset($OffPriceProduct)
            && isset($CaptionProdudct) && !empty($CaptionProdudct)
            && isset($ImageProduct) && !empty($ImageProduct)
        ){
            $ImageLocation = "../../image_product/";
            if($ImageProduct["error"] == 0){
                if($ImageProduct["type"] == "image/jpg"
                || $ImageProduct["type"] == "image/jpeg"
                || $ImageProduct["type"] == "image/png"
                || $ImageProduct["type"] == "image/tiff"
                || $ImageProduct["type"] == "image/gif"
                ){
                    if($ImageProduct["size"] < (1024 * 1024) *  3){
                        if(!file_exists($ImageLocation . $ImageName)){
                            $ImageSave = move_uploaded_file($ImageProduct["tmp_name"], $ImageLocation . $ImageName);
                            if($ImageSave){
                                $query = "INSERT INTO products(name, stock, price, off_price, caption, image) VALUES ('$NameProduct', $StockProduct, $PriceProduct, $OffPriceProduct,'$CaptionProdudct', '$ImageName')" ;
                                $result = mysqli_query($conn, $query);
                                if($result){
                                    exit(header('location:../manage_product.php?succes=1'));
                                }
                                else{
                                    exit(header('location:../add_product.php?errorinput=1'));
                                }
                            }
                            else{
                                exit(header('location:../add_product.php?errorSaveImage=1'));
                            }
                        }
                        else{
                            exit(header('location:../add_product.php?retryimage=1'));
                        }
                    }
                    else{
                        exit(header('location:../add_product.php?sizeimage=1'));
                    }
                }
                else{
                    exit(header('location:../add_product.php?formatimage=1'));
                }
            }
            else{
                exit(header('location:../add_product.php?errorimage=1'));
            }
        }
        else{
            exit(header('location:../add_product.php?emptyinputs=1'));
        }
    }
?>