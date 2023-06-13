<?php
    session_start();
    require '../db.php';

    $title = $_POST['title'];
    $desp = $_POST['desp'];
    $long_desp = $_POST['long_desp'];
    $demo = $_POST['demo'];
    $demo_link = $_POST['demo_link'];



    $insert = "INSERT INTO portfolios(title, desp, long_desp, demo, demo_link) VALUES('$title', '$desp', '$long_desp', '$demo', '$demo_link')";
    $insert_result = mysqli_query($db_connect, $insert);
    $id = mysqli_insert_id($db_connect);


    $photo = $_FILES['photo'];
    $explode = explode('.',$photo['name']);
    $extension = end($explode);


    $file_name =$id. '.'.$extension;
    $new_location = '../uploads/portfolio/'.$file_name;
    move_uploaded_file($photo['tmp_name'], $new_location);

    $update = "UPDATE portfolios SET photo='$file_name' WHERE id=$id";
    mysqli_query($db_connect, $update);
    $_SESSION['success'] = 'Inserted Successfully';
    header('location:portfolio.php');
    



?>