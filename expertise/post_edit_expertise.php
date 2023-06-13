<?php
session_start();
    require '../db.php';
    $topic = $_POST['topic'];
    $percentage = $_POST['percentage'];
    $id = $_POST['subject_id'];
    $update = "UPDATE expertise SET topic='$topic', percentage='$percentage' WHERE id=$id ";
    mysqli_query($db_connect, $update);
    header('location:expertise.php');
    $_SESSION['edit'] = 'Topic Edited Successfully'
?>