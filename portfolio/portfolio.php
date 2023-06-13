<?php
session_start();
require '../db.php';
$title = 'Portfolio';
$header_title = 'Portfolio';
require '../dashboard_header.php';   

$select = "SELECT * FROM portfolios";
$select_result = mysqli_query($db_connect, $select);
?>
		<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
			<div class="container-fluid">
				<div class="row">
                    <div class="col-lg-7">
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
                                    <tr class="text-center">
                                        <th> SL</th>
                                        <th> Title </th>
                                        <th> Description </th>
                                        <th> Photo </th>
                                        <th> Action </th>
                                    </tr>

                                    <?php
                                        foreach($select_result as $key=> $portfolio) { ?> 

                                        <tr>
                                            <td><?=$key+1?> </td>
                                            <td><?= $portfolio['title']?></td>
                                            <td><?= $portfolio['desp']?></td>
                                            <td>
                                                <img width="100" src="../uploads/portfolio/<?= $portfolio['photo']?>" alt="">
                                            </td>

                                            <td>
                                               

                                <div class="d-flex">
                                    <a href="details_portfolio.php?id=<?=$portfolio['id']?>" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-info"></i></a>

                                    <a href="delete_portfolio.php?id=<?=$portfolio['id']?>" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                </div>


                                            </td>

                                            
                                        
                                        </tr>
                                        <?php  } ?>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="card">
                            <div class="card-header">
                                <h2>Add Portfolio </h2>
                            </div>
                            <div class="card-body">
                                <form action="portfolio_post.php" method="post" enctype="multipart/form-data">
                                    
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
                        <label class="mb-1 text-black"><strong>Title</strong></label>
                        <input type="text" name="title" class="form-control">
                        </div>

                        <div class="mb-3">
                        <label class="mb-1 text-black"><strong>Sub Title</strong></label>
                        <input type="text" name="desp" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="mb-1 text-black"><strong>Description</strong></label>
                            <textarea class="form-control" name="long_desp" id="" cols="30" rows="10"></textarea>
                        </div>
                        
                        <div class="mb-3">
                            <label class="mb-1 text-black"><strong>Project</strong></label>
                            <input type="text" name="demo" class="form-control">
                            <label class="mb-1 text-black"><strong>Project Link</strong></label>
                        <input type="text" name="demo_link" class="form-control">
                        </div>

                        <div class="mb-3">
                        <label class="mb-1 text-black"><strong>Photo</strong></label>
                        <input type="file" name="photo" class="form-control">
                        </div>

                        <div class="mb-3">

                            <button type="submit" class="btn btn-primary" >Add Portfolio </button>
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









