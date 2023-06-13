<?php
    session_start();
    require '../db.php';
    $id = $_GET['id'];
    $select = "SELECT * FROM expertise WHERE id=$id";
    $select_result = mysqli_query($db_connect, $select);
    $after_assoc  = mysqli_fetch_assoc($select_result);

    $select_count = "SELECT COUNT(*) as total FROM expertise WHERE status=1";
    $select_count_result = mysqli_query($db_connect, $select_count);
    $after_assoc_count = mysqli_fetch_assoc($select_count_result);


    if( $after_assoc['status'] == 0){
        
        if($after_assoc_count['total'] >= 6){

            $_SESSION['max'] = 'Maximum 6 item can be Added';
            header('location:expertise.php');
        }
        
        else{
            
        $update = "UPDATE expertise SET status=1 WHERE id=$id";
        mysqli_query($db_connect, $update);
        header('location:expertise.php');
        }
    }

    else{
        if($after_assoc_count['total'] <= 4){
            $_SESSION['min'] = 'Minimum 4 items at least active';
            header('location:expertise.php');
        }

        else{
            $update = "UPDATE expertise SET status=0 WHERE id=$id";
        mysqli_query($db_connect, $update);
        header('location:expertise.php');
        }
    }


?>