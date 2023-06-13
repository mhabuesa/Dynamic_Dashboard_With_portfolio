<?php
    session_start();
    require '../login_check.php';
    require '../db.php';

    $name = $_POST['name'];
    $old_password = $_POST['old_password'];
    $password = $_POST['password'];
    $user_id = $_POST['user_id'];
    $after_hash = password_hash($password, PASSWORD_DEFAULT);

    $user_password = "SELECT * FROM users WHERE id=$user_id";
    $user_password_res = mysqli_query($db_connect, $user_password);
    $after_assoc_pass = mysqli_fetch_assoc($user_password_res );


    if($password){
        if(password_verify($old_password, $after_assoc_pass['password'])){
            $update = "UPDATE users SET name='$name', password='$after_hash' WHERE id=$user_id";
            mysqli_query($db_connect, $update);
            $_SESSION['updated'] = 'Profile Updated';
            header('location:profile_update.php');
        }
        else{
            $_SESSION['Wrong_pass'] = 'Current Password Not Correct';
            header('location:profile_update.php');
        }
    }
    else{
        $update = "UPDATE users SET name='$name' WHERE id=$user_id";
        mysqli_query($db_connect, $update);
        $_SESSION['updated'] = 'Profile Updated';
        header('location:profile_update.php');
    }
?>