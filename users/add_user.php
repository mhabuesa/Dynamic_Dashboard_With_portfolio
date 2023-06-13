<?php
        session_start();
        require '../login_check.php';
        require '../db.php';
        $title = 'Add User';
        $header_title = 'Add User';
    require '../dashboard_header.php';

?>
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

<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
			<div class="container-fluid">
				<div class="row">
                    <div class="col-lg-5">
                        <div class="card  bg-dark">
                            <div class="card-header mb-0">

                            
                                <h2>Add New User</h2>
                            
                            
                               
                                
                            </div>
    <div class="card-body">
        
            <form action="post_add_user.php" method="post">
               
            
            
            <!-- Header Alert Start -->
                <?php if(isset( $_SESSION['reg_success'])){?>
                    
                        <div class="alert alert-success solid alert-dismissible fade show">
                            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
                            <strong>Success!</strong> <?=$_SESSION['reg_success']?>
                            <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                            </button>
                        </div>
                 <?php }  unset($_SESSION['reg_success']);?>
                <!-- Header Alert Start -->


<!-- Name  -->
      <div class="form-group">
          <label class="mb-1 text-black"><strong>Name</strong></label>
          <input type="text" class="form-control "  name="name" 
          value="<?=(isset($_SESSION['old_name'])?$_SESSION['old_name']:'')?>">
          
         <div class=" text-danger "> <?php if(isset( $_SESSION['name_err'])){
                  echo $_SESSION['name_err'] ;
                   unset($_SESSION['name_err']);
                   }?>
         </div>
      </div>
                  
      <!-- Email -->

      <div class="form-group">
          <label class="mb-1 text-black"><strong>Email</strong></label>
          <input type="text" class="form-control "  name="email"
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
          <label class="mb-1 text-black"><strong>Password</strong></label>
          <input id="input" type="password" class="form-control "  
          value="<?=(isset($_SESSION['old_pass'])?$_SESSION['old_pass']:'')?>"
           name="password">

          <div class=" text-black">  Uppercase, lowercase, Special Character, and Number must be  used in Your Password  </div>
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
          <label class="mb-1 text-black"><strong>Confirm Password</strong></label>
          <input id="input2" type="password" class="form-control "
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
          <label class="mb-1 text-black"><strong>Select Your Gender</strong></label>
      <div class="form-check">      
      <input class="form-check-input border border-primary" type="radio" name="gender" value="male"  <?=($gender == 'male'? 'checked':'')?> >
      <label class="form-check-label text-black">
          Male
      </label> <br>
      
      <input class="form-check-input border border-primary" type="radio" name="gender" value="female"  <?=($gender == 'female'? 'checked':'')?> >
      <label class="form-check-label text-black" for="flexRadioDefault2">
          Female
      </label>
      <div class=" text-danger "> <?php if(isset( $_SESSION['gender_err'])){
                  echo $_SESSION['gender_err'] ;
                   unset($_SESSION['gender_err']);
                   }?>
         </div>
      </div>



      <div class="text-center mt-2">
          <button type="submit" class="btn btn-primary   ">Create Account</button>
      </div>
  </form>
    </div>
                        </div>
            </div>
                    



            
                </div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->







<?php
    require '../dashboard_footer.php';
?>