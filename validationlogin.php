<?php
    // post values in variable
    $email = $_POST['gmail'];
    $password = $_POST['pass-org'];
    // $checksave = $_POST['check-user'];

    // if to click submit
    if(isset($_POST['send'])){
        session_start();
        
        // if not empty inputs
        if(!empty($password) && !empty($email)){
            // connection to database
            $conn = mysqli_connect('localhost','root', '', 'onlineshop');
            if (mysqli_connect_errno()){
                header('location:originalpage.php?connecterror=1');
            }
            // select user in database
            $sql = "SELECT * FROM users WHERE gmail = '$email' OR user_name = '$email'";
            $result = mysqli_query($conn, $sql);
            $user = mysqli_fetch_assoc($result);
            // if user has in database
            if($user){
                // check the password input of user whith user in database
                if(password_verify($password, $user['passwordd'])){
                    // if check box (remember me) is true , saved in coockie
                        if ($_POST["check-user"]){
                            setcookie("id", $user['ID'], time() + 86400);
                            setcookie("name", $user["first_name"], time() + 86400);
                            setcookie("last_name", $user['last_name'], time() + 86400);
                            setcookie("gmail", $user['gmail'], time() + 86400);
                            setcookie("phone_number", $user['phone_number'], time() + 86400);
                            setcookie("user_name", $user['user_name'], time() + 86400);
                            setcookie("passwordd", $user['passwordd'], time() + 86400);
                            setcookie("addres", $user['addres'], time() + 86400);
                            setcookie("admin", $user['is_admin'], time() + 86400);
                            setcookie("image", $user['image'], time() + 86400);
                            session_unset();
                            exit(header('location:originalpage.php?logtosite=1'));
                        }
                    // if check box (remember me) is false , saved in session
                        else{
                            $_SESSION["id"] = $user['ID'];
                            $_SESSION["name"] = $user['first_name'];
                            $_SESSION["last_name"] = $user['last_name'];
                            $_SESSION["gmail"] = $user['gmail'];
                            $_SESSION["phone_number"] = $user['phone_number'];
                            $_SESSION["user_name"] = $user['user_name'];
                            $_SESSION["password"] = $user['passwordd'];
                            $_SESSION["addres"] = $user['addres'];
                            $_SESSION["admin"] = $user['is_admin'];
                            $_SESSION["image"] = $user['image'];
                            setcookie("id", "", time() - 86400);
                            setcookie("name", "", time() - 86400);
                            setcookie("last_name", "", time() - 86400);
                            setcookie("gmail", "", time() - 86400);
                            setcookie("phone_number", "", time() - 86400);
                            setcookie("user_name", "", time() - 86400);
                            setcookie("passwordd", "", time() - 86400);
                            setcookie("addres", "", time() - 86400);
                            setcookie("admin", "", time() + 86400);
                            exit(header('location:originalpage.php?logtosite=1'));
                        }
                }
                else{
                    exit(header("location:loginpage.php?passnotmatchemail=1"));
                }
            }
            else{
                exit(header("location:loginpage.php?notfounduser=1"));
            }
        }
    }    
?>