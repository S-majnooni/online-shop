<?php
    
    // post values in variable
    $fname = htmlspecialchars($_POST['firstname']);
    $lname = htmlspecialchars($_POST['lastname']);
    $email = htmlspecialchars($_POST['gmail']);
    $phonenumber = $_POST['number'];
    $username = htmlspecialchars($_POST['username']);
    $password = password_hash($_POST['pass-org'], PASSWORD_BCRYPT);
    // $retrypassword = $_POST['pass-retry'];
    $location = htmlspecialchars($_POST['addres']);
    $image_user = $_FILES["image"];
    $image_name = $image_user["name"];
    $image_path = pathinfo($image_name);
    $image_name = $image_path["filename"] . time() . "." . $image_path["extension"];

    // if to click submit
    if(isset($_POST['send'])){

        //check the first name
        if(empty($fname)){
            exit(header('location:registerpage.php?emptyinputs=1'));
        }
        else{
            if(!empty($fname)){

            }
            else{
                exit(header('location:registerpage.php?emptyinputs=1'));
            }
        }

        
        // check the email address
        if (empty($email)){
            exit(header('location:registerpage.php?emptyinputs=1'));
        }
        else{
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                
            }
            else{

            }
        }

        //check the password
        if(empty($_POST['pass-org']) || empty($_POST['pass-retry'])){
            exit(header('location:registerpage.php?emptyinputs=1'));
        }
        else{
            if(strlen($_POST['pass-org']) > 6 || strlen($_POST['pass-retry']) > 6 &&
             strlen($_POST['pass-org']) < 12 || strlen($_POST['pass-retry']) < 12 ){
                if($_POST['pass-org'] != $_POST['pass-retry']){
                    exit(header('location:registerpage.php?passesnotequal=1'));
                }
                else{
                        // if(preg_match("[A-Za-z0-9]", $_POST["pass-org"])){
                            // connection to database
                        // $conn = mysqli_connect('localhost','root', '', 'onlineshop');
                        // if (mysqli_connect_errno()){
                        //     exit(header('location:originalpage.php?connecterror=1'));
                        // }
                        // // check have a user in the database
                        // $checkuser = "SELECT * FROM users WHERE gmail = '$email'";
                        // $user = mysqli_query($conn, $checkuser);
                        // if(mysqli_num_rows($user) > 0){
                        //     exit(header("Location:loginpage.php?haveaccount=1"));
                        // }
                        // save to database
                        // $sql = "INSERT INTO users(first_name, last_name, gmail, phone_number, user_name, passwordd, addres, image) VALUES ('$fname', '$lname', '$email', $phonenumber, '$username', '$password', '$location', '$image_name')";
                        // $result = mysqli_query($conn, $sql);
                        // if ($result){
                        //     exit(header('location:originalpage.php?saved=1'));
                        // }
                        // else{
                            
                        // }
                        // }
                        // else{
                        //     echo "error";
                        // }
                }
            }
            else{
                exit(header('location:registerpage.php?passmoresixnum=1'));
            }
        }

        if(isset($image_user) && !empty($image_user)){
            if($image_user["error"] == 0){
                if($image_user["type"] == "image/jpg"
                || $image_user["type"] == "image/jpeg"
                || $image_user["type"] == "image/png"
                || $image_user["type"] == "image/tiff"
                || $image_user["type"] == "image/gif"
                ){
                    if($image_user["size"] < (1024 * 1024) *  3){
                        $image_location = "image_user/";
                        if(!file_exists($image_location . $image_name)){
                            $Image_save = move_uploaded_file($image_user["tmp_name"], $image_location . $image_name);
                            if($Image_save){
                                $conn = mysqli_connect('localhost','root', '', 'onlineshop');
                                if (mysqli_connect_errno()){
                                    exit(header('location:originalpage.php?connecterror=1'));
                                }
                                // check have a user in the database
                                $checkuser = "SELECT * FROM users WHERE gmail = '$email'";
                                $user = mysqli_query($conn, $checkuser);
                                if(mysqli_num_rows($user) > 0){
                                    exit(header("Location:loginpage.php?haveaccount=1"));
                                }
                                // save to database
                                $sql = "INSERT INTO users(first_name, last_name, gmail, phone_number, user_name, passwordd, addres, image) VALUES ('$fname', '$lname', '$email', '$phonenumber', '$username', '$password', '$location', '$image_name')";
                                $result = mysqli_query($conn, $sql);
                                if ($result){
                                    exit(header('location:originalpage.php?saved=1'));
                                }
                                else{

                                }
                            }
                        }
                        else{
                            exit(header('location:registerpage.php?retryimage=1'));
                        }
                    }
                    else{
                        exit(header('location:registerpage.php?sizeimage=1'));
                    }
                }
                else{
                    exit(header('location:registerpage.php?formatimage=1'));
                }
            }
            else{
                exit(header('location:registerpage.php?errorimage=1'));
            }
        }
        else{
            echo "error";
        }
    }    
?>