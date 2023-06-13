<?php
    require '../db.php';

    $id = $_GET['id'];

    $select = "SELECT * FROM testimonials WHERE id=$id";
    $select_result = mysqli_query($db_connect, $select);
    $after_assoc = mysqli_fetch_assoc($select_result);


    if($after_assoc['status'] == 0){
        $update = "UPDATE testimonials SET status=1 WHERE id=$id";
        mysqli_query($db_connect, $update);
        header('location:testimonial.php');
    }

    else{
        $update = "UPDATE testimonials SET status=0 WHERE id=$id";
        mysqli_query($db_connect, $update);
        header('location:testimonial.php');
    }
?>