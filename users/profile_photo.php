<?php
    session_start();
    require '../login_check.php';
    require '../db.php';
    $id = $_SESSION['id'];


    $photo = $_FILES['photo'];
    $after_explode = explode('.' , $photo['name']);
    $extension = end($after_explode);
    $allowed_extension = array('jpg', 'png', 'gif');

    $select_user = "SELECT * FROM users WHERE id=$id";
    $select_user_res = mysqli_query($db_connect, $select_user);
    $after_assoc = mysqli_fetch_assoc($select_user_res);

    if($after_assoc['photo'] == null){
        if(in_array($extension, $allowed_extension)){
            if($photo['size'] <= 1000000){
                $file_name = $id.'.'.$extension;
                $new_location = '../uploads/user/'.$file_name;
                move_uploaded_file($photo['tmp_name'], $new_location);
    
                $update = "UPDATE users SET photo='$file_name' WHERE id=$id";
                mysqli_query($db_connect, $update);
                $_SESSION['photo_success'] = 'Photo Updated';
                header("location:profile_update.php");
                
            }
            else{
                $_SESSION['size'] = 'Maximum size 1MB';
                header("location:profile_update.php");
            }
        }
        else{
            $_SESSION['extension'] = 'Photo Must be type of: jpg,png,gif';
            header("location:profile_update.php");
        }
    }

    else{

        
        $delete_from = '../uploads/user/'.$after_assoc['photo'];
        unlink($delete_from);

        if(in_array($extension, $allowed_extension)){
            if($photo['size'] <= 1000000){
                $file_name = $id.'.'.$extension;
                $new_location = '../uploads/user/'.$file_name;
                move_uploaded_file($photo['tmp_name'], $new_location);
    
                $update = "UPDATE users SET photo='$file_name' WHERE id=$id";
                mysqli_query($db_connect, $update);
                $_SESSION['photo_success'] = 'Photo Updated';
                header("location:profile_update.php");
                
            }
            else{
                $_SESSION['size'] = 'Maximum size 1MB';
                header("location:profile_update.php");
            }
        }
        else{
            $_SESSION['extension'] = 'Photo Must be type of: jpg,png,gif';
            header("location:profile_update.php");
        }
    }


    if($after_assoc['photo'] == null){
        $_SESSION['common_photo'] = '/elephant/dashboard_asset/images/profile/17.jpg';
    }
    




    
?>