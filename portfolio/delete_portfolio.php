<?php
session_start();
require '../db.php';
    $id = $_GET['id'];

    $delete = "DELETE FROM portfolios WHERE id=$id";
    mysqli_query($db_connect, $delete);
    $_SESSION['delete'] = 'Portfolio Delete Successfully';
    header('location:portfolio.php');
?>