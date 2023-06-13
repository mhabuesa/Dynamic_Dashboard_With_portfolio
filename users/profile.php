<?php
        session_start();
        require '../login_check.php';
        require '../db.php';

        $title = 'Profile';
        $header_title = 'Profile';
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
                                <h2> Your Profile </h2>
                            </div>
    <div class="card-body">
        
      


            <div class="mb-4">
                <label class="mb-1">
                    <h4> <b> Name: </b></h4>
                    <strong><?=$after_assoc_user['name']?></strong>
                </label>
            </div>
            <div class="mb-4">
                <label class="mb-1">
                    <h4> <b> Email Address: </b></h4>
                    <strong><?=$after_assoc_user['email']?></strong>
                </label>
            </div>
            <div class="mb-4">
                <label class="mb-1">
                    <h4> <b> Profile Photo: </b></h4>
                    <?php
                if($after_assoc_user['photo'] == null){?>
                    <img src="/elephant/dashboard_asset/images/profile/17.jpg" width="200" alt=""/>
             <?php  } else{?>
                <img src="/elephant/uploads/user/<?=$after_assoc_user['photo']?>" width="200" alt=""/>
                <?php  } ?> 
                </label>
            </div>

            



            
            <div class="mb-3">
               <a href="/elephant/users/profile_update.php"> <button class="btn btn-primary">  Update Your Info </button></a> 
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