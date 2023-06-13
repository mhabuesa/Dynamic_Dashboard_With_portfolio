<?php
    session_start();
    require '../db.php';
    $title = 'Services';
    $header_title = 'Services';
    require '../dashboard_header.php';

    $select_services = "SELECT * FROM services";
    $services_result = mysqli_query($db_connect, $select_services);
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
                                <h2>Services Lists </h2>
                            </div>
                            <div class="card-body">
                                
                               <table class="table table-bordered" >

                               <tr>
                                <th> SL </th>
                                <th> Topic </th>
                                <th> Percentage </th>
                                <th> Status </th>
                                <th> Action </th>
                               </tr>

                               <?php
                                   foreach($services_result as $sl=> $services){ ?>
                                    <tr>
                                    <td><?= $sl+1 ?></td>
                                    <td><?= $services['title'] ?></td>
                                    <td><?= $services['desp'] ?></td>
                                    <td> <a href="services_status.php?id=<?=$services['id']?> " class="btn btn-<?=$services['status']==0?'dark':'success' ?>"> <?=$services['status']==0?'OFF':'ON' ?> </a> </td>
                                    
                                    <td>
                                    <a href="edit_services.php?id=<?=$services['id']?>" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                    <a href="delete_services.php?id=<?=$services['id']?>" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                    </td>
                                    </tr>
                                <?php   } ?>

                               </table>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header">
                                <h2>Services Add </h2>
                            </div>

                            <div class="card-body">
                                <?php 
                                if(isset($_SESSION['err'])){ ?> 
                                
                                <div class="alert alert-danger solid alert-dismissible fade show">
									<svg viewBox="0 0 24 24" width="24 " height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
									<strong>Error!</strong> <?=$_SESSION['err']?>
									<button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                                    </button>
                                </div>
                                
                                <?php } unset($_SESSION['err']) ?>

                    <form action="post_services.php" method="post">

                        <div class="mb-3">    
                            <label class="form-label"> Title </label>
                            <div>
                                <input class="form-control" type="text" name="title" placeholder="Enter Your Title">
                            </div>
                        </div>

                        <div class="mb-3 mt-3">    
                           
                            <div class="mb-3">
                            <label class="form-label"> Description </label>
                            <textarea class="form-control" name="desp"  rows="5"></textarea>
                            </div>
                        </div>
                            
                        <button class="btn btn-primary"> Add Services </button>
                               
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


<?php if(isset($_SESSION['max'])) { ?> 
    <script>
        Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: '<?=$_SESSION['max']?>',
})
    </script>
   <?php } unset($_SESSION['max']); ?>

   <?php if(isset($_SESSION['min'])) { ?> 
    <script>
        Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: '<?=$_SESSION['min']?>',
})
    </script>
   <?php } unset($_SESSION['min']); ?> 



   <!-- Expertise Added -->
   <?php if(isset($_SESSION['inserted'])) { ?> 
    <script>
Swal.fire({
  position: 'top-end',
  icon: 'success',
  title: '<?=$_SESSION['inserted']?>',
  showConfirmButton: false,
  timer: 1800
})
    </script>
   <?php } unset($_SESSION['inserted']); ?> 

<!-- Expertise Edited -->
   <?php if(isset($_SESSION['edit'])) { ?> 
    <script>
Swal.fire({
  position: 'top-end',
  icon: 'success',
  title: '<?=$_SESSION['edit']?>',
  showConfirmButton: false,
  timer: 1800
})
    </script>
   <?php } unset($_SESSION['edit']); ?> 


<!-- Expertise Delete -->
   <?php if(isset($_SESSION['delete'])) { ?> 
    <script>
Swal.fire({
  position: 'top-end',
  icon: 'success',
  title: '<?=$_SESSION['delete']?>',
  showConfirmButton: false,
  timer: 1800
})
    </script>
   <?php } unset($_SESSION['delete']); ?> 


<!-- Must 4 item required - Delete -->
   <?php if(isset($_SESSION['must_4'])) { ?> 
    <script>
Swal.fire({
    icon: 'error',
  title: 'Oops...',
  title: '<?=$_SESSION['must_4']?>',
  showConfirmButton: false,
  timer: 1800
})
    </script>
   <?php } unset($_SESSION['must_4']); ?> 


  