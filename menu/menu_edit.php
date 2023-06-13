<?php
session_start();
require '../db.php';

$title = 'Edit Menu';
$header_title = 'Edit Menu';
require '../dashboard_header.php';

    $id = $_GET['id'];
    $select = "SELECT * FROM menus WHERE id=$id";
    $select_result = mysqli_query($db_connect, $select);
    $after_assoc = mysqli_fetch_assoc($select_result);

?>




<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body" >
            <!-- row -->
			<div class="container-fluid">
				<div class="row">
                    <div class="col-lg-6 m-auto">

                        <div class="card mt-5" >
                            <div class="card-header">
                            <h3>Update Menu</h3>
                            </div>

                            <div class="card-body">
                            
                            <form action="post_menu_edit.php" method="post">
                            <?php 
                            if(isset($_SESSION['menu_updated'])){?>
                                <div class=" alert alert-success"> 
                                    <?=$_SESSION['menu_updated']?>
                                </div>
                            <?php }  
                            
                            unset($_SESSION['menu_updated']);
                            ?>
                                <div class="mb-3">
                                    <label class="form-label">Menu Name</label>
                                    <input type="hidden" class="form-control" name="user_id" 
                                    value="<?=$id?>">
                                    <input type="text" class="form-control" name="menu_name" 
                                    value="<?=$after_assoc['menu_name']?>">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label"> Menu Link</label>
                                    <input type="text" class="form-control" name="menu_link" 
                                    value="<?=$after_assoc['menu_link']?>">
                                </div>

                                
                                <button type="submit" class="btn btn-primary"> Update Menu </button>
                            </form>
                            <button type="text" class="btn btn-success mt-2"> <i class="fa-sharp fa-solid fa-arrow-left fa-beat" ></i> <a href="menu.php" class="text-white">Back to Menu</a> </button>
                            </div>
                            </div>
                            </div>
                            </div>
                            </div>
                            </div>








                <?php
    require '../dashboard_footer.php';
?>








