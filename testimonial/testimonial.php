<?php
session_start();
require '../db.php';
$title = 'Testimonial';
$header_title = 'Testimonial';
require '../dashboard_header.php';  

$select_testimonial = "SELECT * FROM testimonials";
$testimonial_result = mysqli_query($db_connect, $select_testimonial);
?>
		<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
			<div class="container-fluid">
				<div class="row">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-header">
                                <h2>Portfolio List </h2>
                            </div>
                            <div class="card-body">
                    <?php
                            if(isset($_SESSION['delete'])){ ?>
                        <div class="alert alert-success solid alert-dismissible fade show">
                            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
                            <strong>Success!</strong> <?=$_SESSION['delete']?>
                            <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                            </button>
                        </div>
                        
                        
                            
                        <?php }  unset($_SESSION['delete'])?>
                                <table class="table table-bordered">
                                    <tr>
                                        <th> SL</th>
                                        <th> Description </th>
                                        <th> Name </th>
                                        <th>About Name </th>
                                        <th> Photo </th>
                                        <th> Status </th>
                                        <th> Action </th>
                                    </tr>

                                    <?php
                                        foreach($testimonial_result as $key=> $testimonial) { ?> 

                                        <tr>
                                            <td><?=$key+1?> </td>
                                            <td><?= $testimonial['desp']?></td>
                                            <td><?= $testimonial['name']?></td>
                                            <td><?= $testimonial['name_about']?></td>
                                            
                                            
                                            <td>
                                                <img width="100" src="../uploads/testimonial/<?= $testimonial['photo']?>" alt="">
                                            </td>
                                            <td>
                                                <a class="btn btn-<?=($testimonial['status']== 0?'dark':'success')?>" href="testimonial_status.php?id=<?=$testimonial['id']?>" > <?=($testimonial['status']== 0?'OFF':'ON')?> </a>
                                            </td>

                                            <td>
                                                <a href="delete_testimonial.php?id=<?=$testimonial['id']?>" class="btn btn-danger"> Delete </a>
                                            </td>

                                            
                                        
                                        </tr>
                                        <?php  } ?>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header">
                                <h2>Add Portfolio </h2>
                            </div>
                            <div class="card-body">
                                <form action="testimonial_post.php" method="post" enctype="multipart/form-data">
                                    


                <?php
                    if(isset($_SESSION['success'])){ ?>
                        <div class="alert alert-success solid alert-dismissible fade show">
                        <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
                        <strong>Success!</strong> <?=$_SESSION['success']?>
                        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                        </button>
                        </div>
                                
                               
                                    
                <?php }  unset($_SESSION['success'])?>
                                
                               

                        
                        <div class="mb-3">
                        <label class="mb-1 text-black"><strong>Description</strong></label>
                        <input type="text" name="desp" class="form-control">
                        </div>
                        <div class="mb-3">
                        <label class="mb-1 text-black"><strong>Name</strong></label>
                        <input type="text" name="name" class="form-control">
                        </div>
                        <div class="mb-3">
                        <label class="mb-1 text-black"><strong>Name About</strong></label>
                        <input type="text" name="name_about" class="form-control">
                        </div>

                        <div class="mb-3">
                        <label class="mb-1 text-black"><strong>Photo</strong></label>
                        <input type="file" name="photo" class="form-control">
                        </div>

                        <div class="mb-3">

                            <button type="submit" class="btn btn-primary" >Add Testimonial </button>
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









