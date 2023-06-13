<?php
session_start();
    require '../db.php';

    $id = $_GET['id'];

    $select = "SELECT * FROM services WHERE id=$id";
    $select_result = mysqli_query($db_connect, $select);
    $after_assoc = mysqli_fetch_assoc($select_result);

    $services_count = "SELECT COUNT(*) as total FROM services WHERE status=1";
    $services_count_res = mysqli_query($db_connect, $services_count);
    $after_assoc_services_count = mysqli_fetch_assoc($services_count_res);

    if($after_assoc['status'] == 0){
        if($after_assoc_services_count['total'] >= 6){
            $_SESSION['max'] = 'Maximum 6 item can be Added';
            header('location:services.php');
        }

        else{
            $update = "UPDATE services SET status = 1 WHERE id=$id";
            mysqli_query($db_connect, $update);
            header('location:services.php'); 
        }
    }

  
   else{

    if($after_assoc_services_count['total'] <= 4){
        $_SESSION['min'] = 'Minimum 4 items at least active';
        header('location:services.php');
    }

    else{
        $update = "UPDATE services SET status = 0 WHERE id=$id";
        mysqli_query($db_connect, $update);
        header('location:services.php'); 
    }



   
   }
?>