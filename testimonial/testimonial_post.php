<?php
    session_start();
    require '../db.php';

    $desp = $_POST['desp'];
    $name = $_POST['name'];
    $name_about = $_POST['name_about'];


    $insert = "INSERT INTO testimonials(desp, name, name_about) VALUES('$desp', '$name', '$name_about')";
    $insert_result = mysqli_query($db_connect, $insert);
    $id = mysqli_insert_id($db_connect);


    $photo = $_FILES['photo'];
    $explode = explode('.' , $photo['name']);
    $extension = end($explode);


    $file_name = $id. '.'. $extension;
    $new_location = '../uploads/testimonial/'.$file_name;
    move_uploaded_file($photo['tmp_name'], $new_location);

    $update = "UPDATE testimonials SET photo='$file_name' WHERE id=$id";
    mysqli_query($db_connect, $update);
    $_SESSION['success'] = 'Inserted Successfully';
    header('location:testimonial.php');

?>