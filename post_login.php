<?php
require 'db.php';
session_start();

    $email = $_POST['email'];
    $pass = $_POST['password'];

    $email_exist ="SELECT COUNT(*) AS total FROM users WHERE email ='$email'";
    $email_exist_result = mysqli_query($db_connect ,$email_exist);
    $after_assoc = mysqli_fetch_assoc($email_exist_result);
    

    if($after_assoc['total'] == 1){
        $_SESSION['old_email'] = $email;
        $user_pass = "SELECT * FROM users WHERE email='$email'";
        $user_pass_result = mysqli_query($db_connect, $user_pass);
        $after_assoc_pass = mysqli_fetch_assoc($user_pass_result);
        
        if(password_verify($pass, $after_assoc_pass['password'])){
            $_SESSION['loged_in'] = 'Login Successfully';
            $_SESSION['id'] = $after_assoc_pass['id'];
            header('location:dashboard.php');
        }

        else{
            $_SESSION['wrong_pass'] = 'Wrong Password';
            $_SESSION['old_pass'] = $pass;
            header('location:login.php');
        }
        
        
        
        
        // header('location:dashboard.php');
        
    }
    else{
        $_SESSION['old_email'] = $email;
        $_SESSION['exist'] = 'Email does not Exist or Not Registered Yet';
        header('location:login.php');
    }




    
    // $flag = false ;

    // if(!$email){
    //     $flag = true ;
    //     $_SESSION['email_err'] = 'Please Enter Your Email';
    // }

    // if(!$pass){
    //     $flag = true ;
    //     $_SESSION['pass_err'] = 'Please Enter Your Password';
    // }


    // if($flag){
    //     header('location:login.php');
    // }

    // else{

    //     header('location:dashboard.php');
    // }
  
   
?>