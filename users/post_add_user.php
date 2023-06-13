<?php
session_start();
require '../db.php' ;
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $con_password = $_POST['con_password'];
    $gender = $_POST['gender'];
    $num_pass = preg_match('@[0-9]@',$password);
    $upper_pass = preg_match('@[A-Z]@',$password);
    $lower_pass = preg_match('@[a-z]@',$password);
    $spcl_pass = preg_match('@[!,#,$,%<^,&,*,(,),_,-,=,+]@',$password);



    $email_exist ="SELECT COUNT(*) AS total FROM users WHERE email ='$email'";
    $email_exist_result = mysqli_query($db_connect ,$email_exist);
    $after_assoc = mysqli_fetch_assoc($email_exist_result);

    //name
    $flag = false;
    if(!$name){
        $flag = true;
        $_SESSION['name_err'] = 'Please Enter Your Name';
        
    }
    else{
        $_SESSION['old_name'] = $name;
    }

    //email
    if(!$email){
        $flag = true;
        $_SESSION['email_err'] = 'Please Enter Your Email';
    }
    else{
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $flag = true;
            $_SESSION['email_err'] = 'Invalid Email Format';
            $_SESSION['old_email'] = $email;


            if($after_assoc['total'] == 1){
            
            }
               

                else{
                    $_SESSION['exist'] = 'This Email already Registered Yet';
                    header('location:./add_user.php');
                }

        }
        else{
        $_SESSION['old_email'] = $email;
        }
    }


    //password
    if(!$password){
        $flag = true;
        $_SESSION['pass_err'] = 'Please Enter Your Password';
        $_SESSION['old_pass'] = $password;
    }
    else{
        

        if(!$upper_pass){
            $flag = true;
            $_SESSION['upper_pass'] = 'Uppercasr Requered, ';
            $_SESSION['old_pass'] = $password;
        }

        if(!$lower_pass){
            $flag = true;
            $_SESSION['lower_pass'] = 'Lowercasr Requered, ';
            $_SESSION['old_pass'] = $password;
        }

        if(!$spcl_pass){
            $flag = true;
            $_SESSION['spcl_pass'] = 'Special Charecter Requered, ';
            $_SESSION['old_pass'] = $password;
        }

        if(!$num_pass){
            $flag = true;
            $_SESSION['num_pass'] = 'Number Requered, ';
            $_SESSION['old_pass'] = $password;
        }

        if(strlen($password) < 8){
            $flag = true;
            $_SESSION['len_pass'] = 'Minimum 8 Charecter Requered.';
            $_SESSION['old_pass'] = $password;
        }
        $_SESSION['old_pass'] = $password;
    }



    //con_password
    if(!$con_password){
        $flag = true;
        $_SESSION['con_pass_err'] = 'Please Enter Your Confirm Password';
    }
    else{

        if($password !=$con_password){
            $flag= true;
            $_SESSION['match_pass_err'] = "Doesn't match Your Password ";
        }
        $_SESSION['old_con_pass'] = $con_password;
    }


    //gender
    if(!$gender){
        $flag = true;
        $_SESSION['gender_err'] = 'Please Enter Your Gender';
    }
    else{
        $_SESSION['old_gender'] = $gender;
    }


   

    if($flag){
        header('location:./add_user.php');
    }

    else{

        $_SESSION['old_name'] = '';
        $_SESSION['old_email'] = '';
        $_SESSION['old_pass'] = '';
        $_SESSION['old_con_pass'] = '';
        $_SESSION['old_gender'] = '';


        $after_hash = password_hash($password, PASSWORD_DEFAULT);
        
        $insert = "INSERT INTO users(name, email, password, gender) VALUES('$name', '$email', '$after_hash', '$gender')";
        mysqli_query($db_connect, $insert);


        
            
            
          



        $_SESSION['reg_success'] = 'Account Created Successfully ';
        header('location:./add_user.php');
    }




?>