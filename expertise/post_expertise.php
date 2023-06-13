<?php
    session_start();
    require '../db.php';
    $topic = $_POST['topic'];
    $percentage = $_POST['percentage'];

   if($topic == ''){
    header('location:expertise.php');
    $_SESSION['err'] = 'Enter Your Topic';
   }
   else{
   if($percentage == ''){
    header('location:expertise.php');
    $_SESSION['err'] = 'Enter Percentage';
   }
   else{
    $insert = "INSERT INTO expertise(topic, percentage) VALUES('$topic', '$percentage')";
    mysqli_query($db_connect, $insert);
    $_SESSION['inserted'] = 'Data Inserted Successfully';
    header('location:expertise.php');
   }
   }
?>