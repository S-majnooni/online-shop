<?php 
    if(isset($_POST["send"])){
        $Cat_Name = htmlspecialchars($_POST["name"]);
        $Cat_ID = htmlspecialchars($_POST["Id"]);
        if(isset($Cat_Name) && !empty($Cat_Name)
        && isset($Cat_ID) && !empty($Cat_ID)){
            $conn = mysqli_connect('localhost','root', '', 'onlineshop');
            if (mysqli_connect_errno()){
                exit(header('location:../adminpanel.php?connecterror=1'));
            }
            $sql = "UPDATE categorys SET name = '$Cat_Name' WHERE ID = $Cat_ID";
            $result = mysqli_query($conn, $sql);
            if($result){
                exit(header('location:../manage_category.php?succesed=1&id='.$Cat_ID));
            }
            else{
                exit(header('location:../operation/edit_category.php?error=1&id='.$Cat_ID));
            }
        }
        else{
            exit(header('location:../operation/edit_category.php?errorinput=1&id='.$Cat_ID));
        }
    }
    else{
        exit(header("location:../operation/edit_category.php?id=$Cat_ID"));
    }
?>