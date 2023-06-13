<?php
    session_start();
    require '../db.php';
    $title = $_POST['title'];
    $desp = $_POST['desp'];

   if($title == ''){
    header('location:services.php');
        $_SESSION['err'] = 'Fil The Title Field';
   }
   else{
   if($desp == ''){
    header('location:services.php');
            $_SESSION['err'] = 'Fil The Description Field';
   }
   else{
    $insert = "INSERT INTO services(title, desp) VALUES('$title', '$desp')";
    mysqli_query($db_connect, $insert);
    header('location:services.php');
    $_SESSION['inserted'] = 'Data Inserted Successfully';
   }
   }
?>