<?php
session_start();
    require '../db.php';
    $title = $_POST['title'];
    $desp = $_POST['desp'];
    $id = $_POST['subject_id'];

    $update = "UPDATE services SET title='$title', desp='$desp' WHERE id=$id ";
    mysqli_query($db_connect, $update);
    header('location:services.php');
    $_SESSION['edit'] = 'Title Edited Successfully'
?>