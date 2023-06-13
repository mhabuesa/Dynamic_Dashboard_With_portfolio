<?php
    session_start();
    require '../db.php';

    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    date_default_timezone_set("Asia/Dhaka");
    $created_at = date("Y-m-d h:i:s");

    $insert = "INSERT INTO messages(name, email, subject, message, created_at) VALUES('$name', '$email', '$subject', '$message', '$created_at')";
    mysqli_query($db_connect, $insert);

    header('location:../index.php#contact');
    $_SESSION['sent_message'] = 'Message Send Successfully';

?>