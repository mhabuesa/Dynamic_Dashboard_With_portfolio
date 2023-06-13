<?php
session_start();
    require '../db.php';

    $id = $_GET['id'];

    $delete = "DELETE FROM testimonials WHERE id=$id";
    mysqli_query($db_connect, $delete);

    
    header('location:testimonial.php');
    $_SESSION['delete'] = 'Testimonial Deleted';
?>