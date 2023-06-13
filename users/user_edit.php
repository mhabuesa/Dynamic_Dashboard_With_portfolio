<?php
session_start();
require '../db.php';
$title = 'User Edit';
$header_title = 'User Edit';

require '../dashboard_header.php';

    $id = $_GET['id'];
    $select = "SELECT * FROM users WHERE id=$id";
    $select_result = mysqli_query($db_connect, $select);
    $after_assoc = mysqli_fetch_assoc($select_result);

?>




<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
			<div class="container-fluid">
				<div class="row">
                    <div class="col-lg-6">
                        <div class="card mt-5">
                            <div class="card-header">
                            <h3>Update User Info</h3>

                            

                            </div>

                            <div class="card-body">
                            
                            <form action="update_user.php" method="post">
                            
                            <!-- Alert Header start-->
                            <?php 
                            if(isset($_SESSION['info_updated'])){?>
                            
                            <div class="alert alert-secondary solid alert-dismissible fade show">
									<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><path d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3"></path></svg>
									<strong>Done!</strong>  <?=$_SESSION['info_updated']?>
									<button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                                    </button>
                                </div>
								

                                <?php }  
                            
                            unset($_SESSION['info_updated']);
                            ?>
                            <!-- Alert Header End-->
                                <div class="mb-3">
                                    <label class="form-label"> Name</label>
                                    <input type="hidden" class="form-control" name="user_id" 
                                    value="<?=$id?>">
                                    <input type="text" class="form-control" name="name" 
                                    value="<?=$after_assoc['name']?>">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label"> Email</label>
                                    <input type="email" class="form-control" name="email" 
                                    value="<?=$after_assoc['email']?>">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label"> Password</label>
                                    <input type="password" class="form-control" name="password">
                                </div>
                                <button type="submit" class="btn btn-primary"> Update </button>
                            </form>
                            </div>
                            </div>
                            </div>




                            <div class="col-lg-4 m-auto ">
                        <div class="card mt-5">
                            <div class="card-header">
                            <h3>Update User Info</h3>
                            </div>

                            <div class="card-body">
                            
                            <form action="user_photo_edit.php" method="post" enctype="multipart/form-data">
                                <div>
                                    <label class="label-control"> Pick a Photo</label>
                                    <input type="hidden" name="id" value="<?=$after_assoc['id']?>">
                                    <input class="form-control" type="file" name="photo" id="blah" onchange="preview()">
                                </div>
                                <div class="mt-5">
                                    <label class="label-control"> Current Photo</label> <br>
                            <?php
                                    if($after_assoc['photo'] == null){?>
                                <img id="frame" src="/elephant/uploads/user/common.jpg" width="200" alt=""/>
                            <?php  } else{?>
                                <img id="frame" src="/elephant/uploads/user/<?=$after_assoc['photo']?>" width="200" alt=""/>
                            <?php  } ?> 
                                </div>

                                <button class="btn btn-info mt-4" >Update Photo</button>
                            </form>
                            
                            </div>
                            </div>
                            </div>



                            </div>
                            </div>
                            </div>








                <?php
    require '../dashboard_footer.php';
?>


<?php
        if(isset($_SESSION['photo_success'])){ ?>
           
           
<script>

Swal.fire({
  position: 'center',
  icon: 'success',
  title: '<?=$_SESSION['photo_success']?>',
  showConfirmButton: false,
  timer: 1500
})
</script>
            
      <?php  } unset($_SESSION['photo_success']);?>








