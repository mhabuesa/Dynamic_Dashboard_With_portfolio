<?php
    session_start();
    require '../db.php';

    $id = $_POST['id'];
    $photo = $_FILES['photo'];

    $explode = explode('.', $photo['name']);
    $extension = end($explode);

    $select_user = "SELECT * FROM users WHERE id=$id";
    $select_user_result = mysqli_query($db_connect, $select_user);
    $after_assoc_user = mysqli_fetch_assoc($select_user_result);

    if($after_assoc_user['photo'] == null){
        $file_name = $id.'.'.$extension;
        $new_location = '../uploads/user/'.$file_name;
        move_uploaded_file($photo['tmp_name'], $new_location);

        $update = "UPDATE users SET photo='$file_name' WHERE id=$id";
        mysqli_query($db_connect, $update);
        $_SESSION['photo_success'] = 'Photo Updated Successfully';
        header('location:user_edit.php?id='.$id);
    }
    else{
        $delete = '/elephant/uploads/user/'.$file_name;
        unlink('$delete');

        $file_name = $id.'.'.$extension;
        $new_location = '../uploads/user/'.$file_name;
        move_uploaded_file($photo['tmp_name'], $new_location);


        $file_name = $id.'.'.$extension;
        $new_location = '../uploads/user/'.$file_name;


        $update = "UPDATE users SET photo='$file_name' WHERE id=$id";
        mysqli_query($db_connect, $update);
        $_SESSION['photo_success'] = 'Photo Updated Successfully';
        header('location:user_edit.php?id='.$id);

    }

?>