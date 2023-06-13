<?php
session_start();
    require '../db.php';

    $menu_name = $_POST['menu_name'];
    $menu_link = $_POST['menu_link'];
    $id = $_POST['user_id'];


        $update = "UPDATE menus SET menu_name='$menu_name', menu_link='$menu_link' WHERE id=$id";
        mysqli_query($db_connect, $update);
        header('location:menu_edit.php?id='.$id);
        $_SESSION['menu_updated'] = 'Menu Updated Successfully';
   

   
?>

