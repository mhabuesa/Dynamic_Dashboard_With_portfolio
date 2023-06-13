<?php
session_start();
    require '../db.php';

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $pass_after_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $id = $_POST['user_id'];

    if(!$password){
        $update = "UPDATE users SET name='$name', email='$email' WHERE id=$id";
        mysqli_query($db_connect, $update);
        header('location:user_edit.php?id='.$id);
        $_SESSION['info_updated'] = 'User Info Updated';
    }

    else{
        $update = "UPDATE users SET name='$name', email='$email', password='$pass_after_hash' WHERE id=$id";
        mysqli_query($db_connect, $update);
        header('location:user_edit.php?id='.$id);
        $_SESSION['info_updated'] = 'User Info Updated';
    }
?>

