<?php
session_start();
    require '../db.php';

    $id = $_POST['id'];
    $title = $_POST['title'];
    $desp = $_POST['desp'];
    $long_desp = $_POST['long_desp'];
    $demo = $_POST['demo'];
    $demo_link = $_POST['demo_link'];



    $update = "UPDATE portfolios SET title='$title', desp='$desp', long_desp='$long_desp', demo='$demo', demo_link='$demo_link' WHERE id=$id ";
    mysqli_query($db_connect, $update);

    $_SESSION['success_port'] = 'Portfolio Info Update Successfully';
    header('location:details_portfolio.php?id='.$id);
?>