<?php 
    session_start();
    if(isset($_POST["send"])){
        $user_name = htmlspecialchars($_POST["firstname"]);
        $user_family = htmlspecialchars($_POST["lastname"]);
        $user_email = $_POST["gmail"];
        $user_phone = $_POST["number"];
        $user_userName = htmlspecialchars($_POST["username"]);
        $user_addres = htmlspecialchars($_POST["addres"]);
        $user_ID = $_POST["id"];
        $user_oldImage = $_POST["old_image_user"];
        $user_newImage = $_FILES["image"];
        $newImage_name = $user_newImage["name"];
        $newImage_path = pathinfo($newImage_name);
        $newImage_name = $newImage_path["filename"] . time() . "." . $newImage_path["extension"];

        $conn = mysqli_connect('localhost','root', '', 'onlineshop');
                if (mysqli_connect_errno()){
                    exit(header('location:../originalpage.php?connecterror=1'));
                }
        
        if(isset($user_name) && !empty($user_name)
        && isset($user_email) && !empty($user_email)
        && isset($user_oldImage) && !empty($user_oldImage)
        && isset($user_newImage) && !empty($user_newImage)
        ){
            if($user_newImage["error"] == 4){
                
                $sql = "UPDATE users SET first_name = '$user_name', last_name = '$user_family', gmail = '$user_email', phone_number = '$user_phone', user_name = '$user_userName', addres = '$user_addres'  WHERE ID = $user_ID";
                $result = mysqli_query($conn, $sql);
                if($result){
                    exit(header('location:../profile.php?succesd=1'));
                }
                else{
                    exit(header('location:../profile.php?NOSuccesd=1'));
                }
            }
            else{
                if($user_newImage["error"] == 0){
                    if($user_newImage["type"] == "image/jpg"
                    || $user_newImage["type"] == "image/jpeg"
                    || $user_newImage["type"] == "image/png"
                    || $user_newImage["type"] == "image/tiff"
                    || $user_newImage["type"] == "image/gif"
                    ){
                        if($user_newImage["size"] < (1024 * 1024) *  3){
                            $image_location = "../image_user/";
                            if(!file_exists($image_location . $newImage_name)){
                                $Image_save = move_uploaded_file($user_newImage["tmp_name"], $image_location . $newImage_name);
                                if($Image_save){
                                    // save to database
                                    $sqli = "UPDATE users SET first_name = '$user_name', last_name = '$user_family', gmail = '$user_email', phone_number = '$user_phone', user_name = '$user_userName', addres = '$user_addres', image = '$newImage_name' WHERE ID = $user_ID";
                                    $finish = mysqli_query($conn, $sqli);
                                    if ($finish){
                                        $update_newImage_user = unlink($image_location . $user_oldImage);
                                        if($update_newImage_user){
                                            exit(header('location:../profile.php?saved=1'));
                                        }
                                        else{
                                            exit(header('location:../profile.php?NOsaved=1'));
                                        }
                                    }
                                    else{
    
                                    }
                                }
                            }
                            else{
                                exit(header('location:edit_profile.php?retryimage=1'));
                            }
                        }
                        else{
                            exit(header('location:edit_profile.php?sizeimage=1'));
                        }
                    }
                    else{
                        exit(header('location:edit_profile.php?formatimage=1'));
                    }
                }
                else{
                    exit(header('location:edit_profile.php?errorimage=1'));
                }
            }
        }
        else{
            exit(header("location:edit_profile.php?emptyInputs=1"));
        }
    }
?>