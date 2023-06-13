<?php

    if(!isset($_SESSION['loged_in'])){
        header('location:/elephant/login.php');
    }
?>