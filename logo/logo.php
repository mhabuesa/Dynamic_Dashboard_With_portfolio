<?php
session_start();
require '../login_check.php';
require '../db.php';

$title = 'Logo Update';
$header_title = 'Logo Update';
require '../dashboard_header.php'; 
?>

<?php
$select_user = "SELECT * FROM logos";
$select_user_result = mysqli_query($db_connect, $select_user);
$after_assoc_user = mysqli_fetch_assoc($select_user_result);

$select_footer = "SELECT * FROM footerlogos";
$select_footer_logos = mysqli_query($db_connect, $select_footer);
$after_assoc_footer = mysqli_fetch_assoc($select_footer_logos);

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
                                <h2>Main Logo </h2>
                            </div>
                            <div class="card-body">

                            <!-- Header Error start-->
                            <?php if(isset($_SESSION['error'])){ ?>

                                <div class="alert alert-warning solid alert-dismissible fade show">
									<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>
									<strong>Warning! </strong> <?=$_SESSION['error']?>
									<button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                                    </button>
								</div>

                                <?php } unset($_SESSION['error']);   ?>
                                <!-- Header Error end-->

                                <!-- Header Success start-->
                                <?php if(isset($_SESSION['success'])){ ?>
                                   <div class="alert alert-secondary solid alert-dismissible fade show">
									<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><path d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3"></path></svg>
									<strong>Done! </strong>  <?=$_SESSION['success']?>
									<button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                                    </button>
                                </div>
                                    <?php } unset($_SESSION['success']);   ?>
                                    <!-- Header Success end-->
                               

                                <form action="post_logo.php" method="post" enctype="multipart/form-data">
                                
                                    <div class="mb-3">
                                        <input type="file" id="blah2" name="main_logo" class="mb-3 form-control cursor-pointer" style="cursor: pointer;" onchange="preview2()">
                                        <img id="frame2" src="/elephant/uploads/logo/<?=$after_assoc_user['logo']?>" width="200" alt=""/>


                                    </div>
                                    <div class="mb-3">
                                       <button type="submit" class="btn btn-primary" > Update Logo</button>
                                    </div>

                                </form>
                            </div>

                        </div>
                    </div>

                    <div class="col-lg-6">
                    <div class="card">
                            <div class="card-header">
                                <h2>Footer Logo </h2>
                            </div>
                            <div class="card-body">

                            <!-- Header Error start-->
                            <?php if(isset($_SESSION['footer_error'])){ ?>

                                <div class="alert alert-warning solid alert-dismissible fade show">
                                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>
                                    <strong>Warning! </strong> <?=$_SESSION['footer_error']?>
                                    <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                                    </button>
                                </div>

                                <?php } unset($_SESSION['footer_error']);   ?>
                                <!-- Header Error end-->

                                <!-- Header Success start-->
                                <?php if(isset($_SESSION['footer_success'])){ ?>
                                <div class="alert alert-secondary solid alert-dismissible fade show">
                                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><path d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3"></path></svg>
                                    <strong>Done! </strong>  <?=$_SESSION['footer_success']?>
                                    <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                                    </button>
                                </div>
                            <?php } unset($_SESSION['footer_success']);   ?>
                                    <!-- Header Success end-->


                            <?php if(isset($_SESSION['footer_error'])){ ?>
                                    <div class="alert alert-warning"> <?=$_SESSION['footer_error']?></div>
                                    <?php } unset($_SESSION['footer_error']);   ?>
                            <?php if(isset($_SESSION['footer_success'])){ ?>
                                    <div class="alert alert-success"> <?=$_SESSION['footer_success']?></div>
                                    <?php } unset($_SESSION['footer_success']);   ?>
                               

                                <form action="post_footer_logo.php" method="post" enctype="multipart/form-data">
                                
                                    <div class="mb-3">
                                   
                                   
                                   
                                    <input type="file" id="blah3" name="footer_logo" class="mb-3 form-control cursor-pointer" style="cursor: pointer;" onchange="preview3()">
                                        <img id="frame3" src="/elephant/uploads/logo/<?=$after_assoc_footer['logo']?>" width="200" alt=""/>



                                    </div>
                                    <div class="mb-3">
                                       <button type="submit" class="btn btn-primary" > Update Logo</button>
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