<?php
session_start();

    $title = 'Add Menu';
    $header_title = 'Add Menu';

    require '../dashboard_header.php';
    require '../db.php';
    require '../login_check.php';

    $id = $_SESSION['id'];
    $select = "SELECT * FROM menus WHERE id != $id";
    $all_users = mysqli_query($db_connect, $select); 
    ?>



    <div class="content-body">
            <!-- row -->
			<div class="container-fluid">
				<div class="row">

                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h2>Add Menu </h2>
                            </div>
                            <div class="card-body">



                                

                            <?php if(isset($_SESSION['success'])){ ?>
                                    
                                <div class="alert alert-success solid alert-dismissible fade show">
									<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
									<strong>Success! </strong> <?=$_SESSION['success']?>
									<button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                                    </button>
                                </div>
                            <?php } unset($_SESSION['success']);   ?>
                               

                                <form action="post_menu.php" method="post" enctype="multipart/form-data">
                                    <label class="form-label"> Menu Name</label>
                                    <div class="mb-3">
                                        <input type="text" name="menu_name" class="mb-1 form-control" 
                                        value="<?=(isset($_SESSION['old_menu_name'])?$_SESSION['old_menu_name']:'')?>">
                                        <?php if(isset($_SESSION['err_menu_name'])){ ?>
                                        <div class=" text-danger"> <?= $_SESSION['err_menu_name'] ?></div>
                                        <?php } unset($_SESSION['err_menu_name']) ?>


                                    </div>
                                    <label class="form-label"> Menu Link</label>
                                    <div class="mb-3">
                                        <input type="text" name="menu_link" class="mb-1 form-control" 
                                        value="<?=(isset($_SESSION['old_menu_link'])?$_SESSION['old_menu_link']:'')?>">
                                        
                                        <?php if(isset($_SESSION['err_menu_link'])){ ?>
                                        <div class="text-danger"> <?= $_SESSION['err_menu_link'] ?></div>
                                        <?php } unset($_SESSION['err_menu_link']) ?>


                                    </div>
                                   
                                    <div class="mb-3">
                                       <button type="submit" class="btn btn-primary" > Add Menu</button>
                                    </div>

                                </form>
                            </div>
                            </div>
                            </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h2>Menu List </h2>
                            </div>
                            <div class="card-body">
                            <?php if(isset($_SESSION['delete'])){ ?>
                                    
                                    <div class="alert alert-success solid alert-dismissible fade show">
                                        <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
                                        <strong>Success! </strong> <?=$_SESSION['delete']?>
                                        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                                        </button>
                                    </div>
                                <?php } unset($_SESSION['delete']);   ?>
                        <table class="table table-bordered text-center">
                            <tr>
                                
                                <th> SL </th>
                                
                                <th> Menu Name </th>
                                <th> Menu Link </th>
                                
                                <th> Action </th>
                               
                            </tr>
                            <?php foreach($all_users as $key=> $user){?>

                            <tr>
                                <td> <?= $key+1?> </td>
                                
                                <td> <?= $user['menu_name']?> </td>
                                <td> <?= $user['menu_link']?> </td>
                                
                                
                                
                                <td>
                                    <div class="d-flex">
                                    <a href="menu_edit.php?id=<?=$user['id']?>" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                    <a href="delete_menu.php?id=<?=$user['id']?>" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                    </div>


                                    
                                </td>
                            </tr>
                                <?php }?>
                        </table>
                    </div>
                            </div>
                            </div>
                            </div>
                            </div>
                            </div>




<?php
        require '../dashboard_footer.php';
        unset($_SESSION['old_menu_name']);
        unset($_SESSION['old_menu_link']);
?>