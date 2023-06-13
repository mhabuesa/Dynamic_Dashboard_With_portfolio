
<?php
session_start();
require '../db.php'; 
require '../login_check.php'; 
$title = 'Banner';
$header_title = 'Banner';
require '../dashboard_header.php'; 

$select_benner = "SELECT * FROM banner";
$select_benner_result = mysqli_query($db_connect, $select_benner);
$after_assoc_benner = mysqli_fetch_assoc($select_benner_result);


?>


<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="card mt-5">
                    <div class="card-header">
                        <h3> Banner Edit </h3>
                    </div>
                    <div class="card-body">
                        
                        <form action="post_banner.php" method="post" enctype="multipart/form-data">
                            <?php 
                            if(isset($_SESSION['success'])){?>

                                <div class="alert alert-success solid alert-dismissible fade show">
									<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
									<strong>Success!</strong>  <?=$_SESSION['success']?>
									<button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                                    </button>
                                </div>
                            <?php }  
                            
                            unset($_SESSION['success']);
                            ?>
                                <div class="mb-3">
                                    <label class="form-label"> Sub Title</label>
                                    <input type="text" class="form-control" name="sub_title" 
                                    value="<?=$after_assoc_benner['sub_title']?>">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label"> Title</label>
                                    <input type="text" class="form-control" name="title" 
                                    value="<?=$after_assoc_benner['title']?>">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"> Description</label> <br>
                                    
                                    
                                    <textarea name="desp" id="" cols="30" rows="5"><?=$after_assoc_benner['desp']?></textarea>
                                </div>
                                
                                <div class="mb-3">
                                    <label class="form-label"> Action</label>
                                    <input type="text" class="form-control" name="action_name" 
                                    value="<?=$after_assoc_benner['action_name']?>">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"> Action Link</label>
                                    <input type="text" class="form-control" name="link" 
                                    value="<?=$after_assoc_benner['link']?>">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"> Photo</label> <br>
                                    <input type="file" class="form-control mt-3" name="photo" onchange="document.getElementById('banner').src = window.URL.createObjectURL(this.files[0])">
                                </div>
                                <div class="my-3">
                                <img id="banner" src="../uploads/banner/<?=$after_assoc_benner['photo']?>" width="150" alt="">
                                </div>
                                
                                <button type="submit" class="btn btn-primary"> Update </button>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<?php require '../dashboard_footer.php' ; ?>