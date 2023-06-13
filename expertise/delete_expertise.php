<?php
session_start();
    require '../db.php';
    $id = $_GET['id'];

    $delete = "DELETE  FROM expertise WHERE id=$id";
    mysqli_query($db_connect, $delete);
    header('location:expertise.php');

    $select = "SELECT * FROM expertise  WHERE id=$id";
    $select_result = mysqli_query($db_connect, $select);
    $after_assoc= mysqli_fetch_assoc($select_result);

    $_SESSION['delete'] = 'Field Deleted Successfully';

?>

