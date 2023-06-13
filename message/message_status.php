<?php
    require '../db.php';
    $id = $_GET['id'];

    $select_status = "SELECT * FROM messages WHERE id=$id";
    $status_result = mysqli_query($db_connect, $select_status );
    $after_assoc_status = mysqli_fetch_assoc($status_result);


if($after_assoc_status['status'] == 0){
    $update = "UPDATE messages SET status=1";
    mysqli_query($db_connect, $update);
    header('location:message_read.php?id='.$after_assoc_status['id']);
}
else{
    header('location:message_read.php?id='.$after_assoc_status['id']);
}
?>