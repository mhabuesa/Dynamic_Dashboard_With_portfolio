<?php
        session_start();
        require '../login_check.php';
        require '../db.php';
        $title = 'Profile Update';
        $header_title = 'Profile Update';
    require '../dashboard_header.php';
?>

<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
			<div class="container-fluid">
				<div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h2>Profile Update </h2>
                            </div>
    <div class="card-body">


        <!-- Alert Header start-->
        <?php
            if(isset($_SESSION['updated'])){ ?> 

                    <div class="alert alert-success solid alert-dismissible fade show">
                        <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
                        <strong>Success! </strong><?=$_SESSION['updated']?>  
                        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                        </button>
                    </div>

                <?php unset($_SESSION['updated']); } ?>
        <!-- Alert Header start-->


        <form action="post_profile_update.php" method="post">
            <div class="mb-3">
                <label class="mb-1 text-black"><strong>Name</strong></label>
                
                <input type="hidden" name="user_id" class="form-control" 
                value="<?=$after_assoc_user['id']?>" >

                <input type="text" name="name" class="form-control"
                value="<?=$after_assoc_user['name']?>">

            </div>
            <div class="mb-3">
            <label class="mb-1 text-black"><strong>Current Password</strong></label>
                <input type="password" name="old_password" class="form-control border ">
                <?php
            if(isset($_SESSION['Wrong_pass'])){ ?> 
                <div class=" text-danger"><?=$_SESSION['Wrong_pass']?>  </div>
            <?php unset($_SESSION['Wrong_pass']); } ?>
                
            </div>
            <div class="mb-3">
                <label class="mb-1 text-black"><strong>New Password</strong></label>
                <input type="password" name="password" class="form-control border ">
            </div>
            <div class="mb-3">
                <button class="btn btn-primary"> Update Info </button>
            </div>
        </form>
    </div>
                        </div>
            </div>
                    



            <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h2>Profile Photo Update </h2>
                            </div>
    <div class="card-body">
       
        <form action="profile_photo.php" method="post" enctype="multipart/form-data">

                 <!--Alert Header Success Start-->
                <?php
                 if(isset($_SESSION['photo_success'])){ ?> 


                    <div class="alert alert-success solid alert-dismissible fade show">
                        <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
                        <strong>Success! </strong><?=$_SESSION['photo_success']?>  
                        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                        </button>
                    </div>

                <?php unset($_SESSION['photo_success']); } ?>
                    <!--Alert Header Success End-->

                    <!--Alert Header Size Start-->
                    <?php
            if(isset($_SESSION['size'])){ ?> 

                                <div class="alert alert-warning solid alert-dismissible fade show">
									<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>
									<strong>Warning!</strong> <?=$_SESSION['size']?>
									<button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                                    </button>
								</div>
                <?php unset($_SESSION['size']); } ?>
                <!--Alert Header Size end-->
                    <!--Alert Header Extension Start-->
                    <?php
            if(isset($_SESSION['extension'])){ ?> 

                                <div class="alert alert-warning solid alert-dismissible fade show">
									<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>
									<strong>Warning!</strong> <?=$_SESSION['extension']?>
									<button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                                    </button>
								</div>
                <?php unset($_SESSION['extension']); } ?>
                <!--Alert Header Extension end-->




            
            <div class="mb-3">
                <label class="mb-1 text-black"><strong>Choose Your Photo</strong></label>
                
                <input style="cursor: pointer;" id="blah" type="file" name="photo" class="form-control mb-5" onchange="preview()">
                <?php
                if($after_assoc_user['photo'] == null){?>
                    <img id="frame" src="/elephant/dashboard_asset/images/profile/17.jpg" width="200" alt=""/>
             <?php  } else{?>
                <img id="frame" src="/elephant/uploads/user/<?=$after_assoc_user['photo']?>" width="200" alt=""/>
                <?php  } ?> 

                <!-- <img id="frame" src="" width="100px" height="100px"/> -->


                

               
                

               
                

            </div>
            <div class="mb-3">
                <button class="btn btn-primary"> Update Info </button>
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