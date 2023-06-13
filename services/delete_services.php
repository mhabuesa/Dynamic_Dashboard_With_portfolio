<?php
session_start();
    require '../db.php';
    $id = $_GET['id'];



    $select = "SELECT COUNT(id) as total FROM services";
    $select_result = mysqli_query($db_connect, $select);
    $after_assoc = mysqli_fetch_assoc($select_result);
    
    if($after_assoc['total'] <=6 ){
        header('location:services.php');
        $_SESSION['must_4'] = 'Minimum 6 items are required';
    }
    else{
        $delete = "DELETE FROM services WHERE id=$id";
    $delete_result = mysqli_query($db_connect, $delete);
    header('location:services.php');
    $_SESSION['delete'] = 'Field Deleted Successfully';
    }
?>