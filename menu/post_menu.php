<?php
    session_start();
    require '../db.php';

    $menu_name = $_POST['menu_name'];
    $menu_link = $_POST['menu_link'];




    $flag = false;
    
    if(!$menu_name){
        $flag = true;
        $_SESSION['err_menu_name'] = 'Please Enter Menu Name';
        $_SESSION['old_menu_name'] = $menu_name;

    }
    else{
        $_SESSION['old_menu_name'] = $menu_name;
    }
    if(!$menu_link){
        $flag = true;
        $_SESSION['err_menu_link'] = 'Please Enter Menu Link';
        $_SESSION['old_menu_link'] = $menu_link;

    }
    else{
        $_SESSION['old_menu_link'] = $menu_link;
    }

 

    if($flag){
        header('location:menu.php');
    }

    else{
        $_SESSION['old_menu_name'] = '';
        $_SESSION['old_menu_link'] = '';
        
        $insert = "INSERT INTO menus(menu_name, menu_link) VALUES('$menu_name', '$menu_link') ";
        mysqli_query($db_connect, $insert);
        header('location:menu.php');
        $_SESSION['success'] = 'Menu Added Successfully';
    }
    

?>