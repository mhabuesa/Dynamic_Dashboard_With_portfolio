<?php
    session_start();
    require '../db.php';

    $sub_title = $_POST['sub_title'];
    $title = $_POST['title'];
    $desp = $_POST['desp'];
    $action_name = $_POST['action_name'];
    $link = $_POST['link'];
    $photo = $_FILES['photo'];

    $select = "SELECT * FROM banner";
    $select_result = mysqli_query($db_connect, $select);
    $after_assoc = mysqli_fetch_assoc($select_result);

    $after_explode = explode('.', $photo['name']);
    $extension = end($after_explode);
    $file_name = 'banner'.'.'.$extension;


    if(!$photo['name']){
        $update = "UPDATE banner SET sub_title='$sub_title', title='$title', desp='$desp', action_name='$action_name', link='$link' ";
        mysqli_query($db_connect, $update);
        header('location:banner.php');
        $_SESSION['success'] = 'Banner Update.'; 

    }

    else{
        $delete_from = '../uploads/banner/'.$after_assoc['photo'];
        unlink($delete_from);
        
        $new_location = '../uploads/banner/'.$file_name;
        move_uploaded_file($photo['tmp_name'], $new_location);

        $update = "UPDATE banner SET sub_title='$sub_title', title='$title', desp='$desp', action_name='$action_name', link='$link', photo='$file_name' ";
        mysqli_query($db_connect, $update);
        header('location:banner.php');
        $_SESSION['success'] = 'Banner Update.'; 


    }











































//     $after_explode = explode('.', $photo['name']);
//     $extension = end($after_explode);
//     $file_name = 'banner'.'.'.$extension;

    
// $select_benner = "SELECT * FROM banner";
// $select_result = mysqli_query($db_connect, $select_benner);
// $after_assoc = mysqli_fetch_assoc($select_result);



// if(!$photo['name']){
//     $update = "UPDATE banner SET sub_title='$sub_title', title='$title', desp='$desp', action_name='$action_name', link='$link' ";
//     mysqli_query($db_connect, $update);

//     $_SESSION['success'] = 'Banner Updated Successful';
//             header('location:banner.php');
// }
// else{
//     $delete_from = '../uploads/banner/'.$after_assoc['photo'];
//     unlink($delete_from);
//     $new_location = '../uploads/banner/'.$file_name ;
//     move_uploaded_file($photo['tmp_name'], $new_location);

//     $update = "UPDATE banner SET sub_title='$sub_title', title='$title', desp='$desp', action_name='$action_name', link='$link', photo='$file_name' ";
//     mysqli_query($db_connect, $update);

//     $_SESSION['success'] = 'Banner Updated Successful';
//             header('location:banner.php');
// }



// if($after_assoc_benner['photo']){
//     $file_name = 'banner'. '.'.$extension;
//     $new_location = '../uploads/banner/'.$file_name;
//     move_uploaded_file($logo['tmp_name'], $new_location);

//         $update = "UPDATE banner SET sub_title='$sub_title', title='$title', desp='$desp', action='$action' ,photo='$photo' ";
//         mysqli_query($db_connect, $update);

//         $_SESSION['success'] = 'Banner Updated Successful';
//             header('location:banner.php');
// }
// else{
//     $file_name = 'banner'. '.'.$extension;
//     $new_location = '../uploads/banner/'.$file_name;
//     move_uploaded_file($logo['tmp_name'], $new_location);

//         $update = "UPDATE banner SET sub_title='$sub_title', title='$title', desp='$desp', action='$action' ";
//         mysqli_query($db_connect, $update);

//         $_SESSION['success'] = 'Banner Updated Successful';
//             header('location:banner.php');
// }
  

        

  


?>