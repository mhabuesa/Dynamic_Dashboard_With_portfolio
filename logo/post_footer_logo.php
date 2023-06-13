<?php
session_start();
require '../login_check.php';
require '../db.php';

    $logo = $_FILES['footer_logo'];
    $after_explode = explode('.', $logo['name']);
    $extension = end($after_explode);
    $allowed_extension = array('jpg', 'png', 'webp', 'gif');

    $select_user = "SELECT * FROM footerlogos ";
    $select_user_res = mysqli_query($db_connect, $select_user);
    $after_assoc = mysqli_fetch_assoc($select_user_res);
    

if($after_assoc['logo'] == null){
    if(in_array($extension, $allowed_extension)){
        if($logo['size'] <= 1000000){
            
            $file_name = 'footer_logo' . '.'  .$extension;
            $new_location = '../uploads/logo/'.$file_name;
            move_uploaded_file($logo['tmp_name'], $new_location);
            
            $update = "UPDATE footerlogos SET logo='$file_name' ";
            mysqli_query($db_connect, $update);
            
            $_SESSION['footer_success'] = 'Logo Updated Successful';
            header('location:logo.php');
        }

        else{
            $_SESSION['footer_error'] = 'Maximum Size 1MB';
        header('location:logo.php');
        }   
    }

    else{
        $_SESSION['footer_error'] = 'Supported Format: jpg, png, webp, gif';
        header('location:logo.php');
    }
}

else{
    $delete_from = '../uploads/logo/'.$after_assoc['logo'];
        unlink($delete_from);

        if(in_array($extension, $allowed_extension)){
            if($logo['size'] <= 1000000){
                
                $file_name = 'footer_logo' . '.'  .$extension;
                $new_location = '../uploads/logo/'.$file_name;
                move_uploaded_file($logo['tmp_name'], $new_location);
                
                $update = "UPDATE footerlogos SET logo='$file_name' ";
                mysqli_query($db_connect, $update);
                
                $_SESSION['footer_success'] = 'Logo Updated Successful';
                header('location:logo.php');
            }
    
            else{
                $_SESSION['footer_error'] = 'Maximum Size 1MB';
            header('location:logo.php');
            }   
        }
    
        else{
            $_SESSION['footer_error'] = 'Supported Format: jpg, png, webp, gif';
            header('location:logo.php');
        }


}
    
    
    
?>