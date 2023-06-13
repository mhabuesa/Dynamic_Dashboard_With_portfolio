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
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./dashboard_asset/images/favicon.png">
    <link href="./dashboard_asset/css/style.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
</head>

<body class="h-100">
    <div class="authincation h-100">
        <div class="container h-100">
    <div class="row justify-content-center h-100 align-items-center">
        <div class="col-md-6">
            <div class="authincation-content">
                <div class="row no-gutters">
                    <div class="col-xl-12">
                    <div class="auth-form">
                    <div class="text-center mb-3">
                    <a ><img src="./dashboard_asset/images/logo-full.png" alt=""></a>
                    </div>
                    <h3 class="text-center mb-4 text-white">Sign in your account</h3>
                    <form action="post_login.php" method="post">
                        <div class="form-group">
                            <label class="mb-1 text-white"><strong>Email</strong></label>
                            <input type="email" class="form-control" name="email" 
                            value="<?=(isset($_SESSION['old_email'])?$_SESSION['old_email']:'')?>" >
                            <div class=" text-danger "> <?php if(isset( $_SESSION['exist'])){
                        echo $_SESSION['exist'] ;
                         unset($_SESSION['exist']);
                         }?>
               </div>
                        </div>
                        <div class="form-group">
                            <label class="mb-1 text-white"><strong>Password</strong></label>
                            <input type="password" class="form-control"  name="password"
                            value="<?=(isset($_SESSION['old_pass'])?$_SESSION['old_pass']:'')?>" >
                            <div class=" text-danger "> <?php if(isset( $_SESSION['pass_err'])){
                        echo $_SESSION['pass_err'] ;
                         unset($_SESSION['pass_err']);
                         }?>
                            <div class=" text-danger "> <?php if(isset( $_SESSION['wrong_pass'])){
                        echo $_SESSION['wrong_pass'] ;
                         unset($_SESSION['wrong_pass']);
                         }?>
               </div>
                        </div>
                        
                        <div class="text-center mt-4">
                            <button type="submit" class="btn bg-white text-primary btn-block">Sign Me In</button>
                        </div>
                        
                    </form>
                                    
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
    <!-- Required vendors -->
    <script src="./dashboard_asset/vendor/global/global.min.js"></script>
	<script src="./dashboard_asset/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="./dashboard_asset/js/custom.min.js"></script>
    <script src="./dashboard_asset/js/deznav-init.js"></script>

</body>

</html>

<?php
    unset($_SESSION['old_email']);
    unset($_SESSION['old_pass']);
?>