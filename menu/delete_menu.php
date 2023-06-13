<?php
session_start();
require '../db.php';

    $id = $_GET['id'];

    $delete = "DELETE FROM menus WHERE id=$id";
    mysqli_query($db_connect, $delete);
    $_SESSION['delete'] = ' Menu Deleted Successfully';

    header('location:menu.php');

?>