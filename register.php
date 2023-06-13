<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Gymove - Fitness Bootstrap Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./dashboard_asset/images/favicon.png">
    <link href="./dashboard_asset/css/style.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    
    <style>
      .pass{
        position: relative;
      }

      .pass i{
        color: black;
        position: absolute;
        width: 35px;
        height: 35px;
        text-align: center;
        line-height: 35px;
        right: 5px;
        top: 30px;
        border-radius: 3px;
        cursor: pointer;
      }
      .pass-text{
        font-size: 0.7rem;
        color: aliceblue;
        
        padding-left: 10px;
      }


    </style>
</head>

<body class="h-100 ">

        <!--**********************************
	Success Message
***********************************-->
   





    <div class="authincation h-100  ">
        
        <div class="container h-100">
            
            <div class="row justify-content-center h-100 align-items-center cont">
                <div class="col-md-6 ">
                
                

<div class="authincation-content ">
    <div class="row no-gutters">
        <div class="col-xl-12">
            <div class="auth-form ">
            <div class="text-center mb-3 mt-0">
                    <a ><img src="./dashboard_asset/images/logo-full.png" alt=""></a>
                    </div>
                <h3 class="text-center mb-3 text-white">Sign up your account</h3>
        <form action="post_register.php" method="post">

      <!-- Name  -->
            <div class="form-group">
                <label class="mb-1 text-white"><strong>Name</strong></label>
                <input type="text" class="form-control"  name="name" 
                value="<?=(isset($_SESSION['old_name'])?$_SESSION['old_name']:'')?>">
                
               <div class=" text-danger "> <?php if(isset( $_SESSION['name_err'])){
                        echo $_SESSION['name_err'] ;
                         unset($_SESSION['name_err']);
                         }?>
               </div>
            </div>
                        
            <!-- Email -->

            <div class="form-group">
                <label class="mb-1 text-white"><strong>Email</strong></label>
                <input type="text" class="form-control"  name="email"
                value="<?=(isset($_SESSION['old_email'])?$_SESSION['old_email']:'')?>">
                <div class=" text-danger "> <?php if(isset( $_SESSION['email_err'])){
                        echo $_SESSION['email_err'] ;
                         unset($_SESSION['email_err']);
                         }?>
               </div>

               <div class=" text-danger "> <?php if(isset( $_SESSION['exist'])){
                        echo $_SESSION['exist'] ;
                         unset($_SESSION['exist']);
                         }?>
               </div>

               
            </div>

                    <!-- pass -->
            <div class="form-group pass">
                <label class="mb-1 text-white"><strong>Password</strong></label>
                <input id="input" type="password" class="form-control"  
                value="<?=(isset($_SESSION['old_pass'])?$_SESSION['old_pass']:'')?>"
                 name="password">

                <div class="pass-text">  Uppercase, lowercase, Special Character, and Number must <br> be  used in Your Password  </div>
                <div class=" text-danger "> <?php if(isset( $_SESSION['pass_err'])){
                        echo $_SESSION['pass_err'] ;
                         unset($_SESSION['pass_err']);
                         }?>
               </div>
               <!-- Pass Req -->
               <div class=" text-danger "> <?php if(isset( $_SESSION['upper_pass'])){
                        echo $_SESSION['upper_pass'] ;
                         unset($_SESSION['upper_pass']);
                         }?>
                         
                         <?php if(isset( $_SESSION['lower_pass'])){
                        echo $_SESSION['lower_pass'] ;
                         unset($_SESSION['lower_pass']);
                         }?>
                         <?php if(isset( $_SESSION['spcl_pass'])){
                        echo $_SESSION['spcl_pass'] ;
                         unset($_SESSION['spcl_pass']);
                         }?>
                         <?php if(isset( $_SESSION['num_pass'])){
                        echo $_SESSION['num_pass'] ;
                         unset($_SESSION['num_pass']);
                         }?>
                         <?php if(isset( $_SESSION['len_pass'])){
                        echo $_SESSION['len_pass'] ;
                         unset($_SESSION['len_pass']);
                         }?>
               </div>
               
               





               <i class="fa fa-eye" id="show_pass"> </i>

            </div>


            <div class="form-group pass">
                <label class="mb-1 text-white"><strong>Confirm Password</strong></label>
                <input id="input2" type="password" class="form-control" 
                value="<?=(isset($_SESSION['old_con_pass'])?$_SESSION['old_con_pass']:'')?>"
                 name="con_password">
            
            <div class=" text-danger "> <?php if(isset( $_SESSION['con_pass_err'])){
                        echo $_SESSION['con_pass_err'] ;
                         unset($_SESSION['con_pass_err']);
                         }?>
            <?php if(isset( $_SESSION['match_pass_err'])){
                        echo $_SESSION['match_pass_err'] ;
                         unset($_SESSION['match_pass_err']);
                         }?>
            </div>
                <i class="fa fa-eye" id="show_pass2"> </i>
            </div>


               
               <?php
                    $gender = '';

                    if(isset($_SESSION['old_gender'])){
                        $gender = $_SESSION['old_gender'];
                    }
                ?>
            <div class="form-check">
            <input class="form-check-input" type="radio" name="gender" value="male"  <?=($gender == 'male'? 'checked':'')?> >
            <label class="form-check-label text-white">
                Male
            </label> <br>
            
            <input class="form-check-input" type="radio" name="gender" value="female"  <?=($gender == 'female'? 'checked':'')?> >
            <label class="form-check-label text-white" for="flexRadioDefault2">
                Female
            </label>
            <div class=" text-danger "> <?php if(isset( $_SESSION['gender_err'])){
                        echo $_SESSION['gender_err'] ;
                         unset($_SESSION['gender_err']);
                         }?>
               </div>
            </div>



            <div class="text-center mt-2">
                <button type="submit" class="btn bg-white text-primary btn-block">Sign up</button>
            </div>
        </form>
                <div class="new-account mt-3">
                    <p class="text-white">Already have an account? <a class="text-white" href="login.php">Sign in</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
                </div>
            </div>
        </div>
    </div>



<!--**********************************
	Scripts
***********************************-->
<script src="https://code.jquery.com/jquery-3.7.0.slim.min.js" integrity="sha256-tG5mcZUtJsZvyKAxYLVXrmjKBVLd6VpVccqz/r4ypFE=" crossorigin="anonymous"></script>
<!-- Required vendors -->
<script src="./dashboard_asset/vendor/global/global.min.js"></script>
<script src="./dashboard_asset/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
<script src="./dashboard_asset/js/custom.min.js"></script>
<script src="./dashboard_asset/js/deznav-init.js"></script>

<script>

$('#show_pass').click(function(){
         var input = document.getElementById('input');
         if(input.type == 'password'){
            input.type = 'text';
         }
         else{
            input.type = 'password';
         }
         
    })

    $('#show_pass2').click(function(){
         var input = document.getElementById('input2');
         if(input.type == 'password'){
            input.type = 'text';
         }
         else{
            input.type = 'password';
         }
         
    })
</script>

<!-- sweet alert  -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<?php
        if(isset($_SESSION['reg_success'])){ ?>
           
           
<script>

Swal.fire({
  position: 'center',
  icon: 'success',
  title: '<?=$_SESSION['reg_success']?>',
  showConfirmButton: false,
  timer: 1500
})
</script>
            
      <?php  } unset($_SESSION['reg_success']);?>


</body>
</html>

<?php
    unset($_SESSION['old_name']);
    unset($_SESSION['old_email']);
    unset($_SESSION['old_pass']);
    unset($_SESSION['old_con_pass']);
    unset($_SESSION['old_gender']);
?>