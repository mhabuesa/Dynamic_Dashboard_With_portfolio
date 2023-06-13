<?php
session_start();
require '../login_check.php';
$title = 'Portfolio - Details';
$header_title = 'Portfolio - Details';
    require '../dashboard_header.php';


    $id = $_GET['id'];

$select_portfolio = "SELECT * FROM portfolios WHERE id=$id";
$portfolio_result = mysqli_query($db_connect, $select_portfolio);
$after_assoc_portfolio = mysqli_fetch_assoc($portfolio_result);

?>


<div class="content-body">
            <!-- row -->
			<div class="container-fluid">
				<div class="row">
                    <div class="col-lg-8">
                        <div class="card">

                        <div class="card-header">
                            <h2>Portfolio Details</h2>
                        </div>

                        <div class="card-body">

                        <form action="details_portfolio_post.php" method="post">
                            
                    <div>

                        <input type="hidden" name="id" value="<?=$after_assoc_portfolio['id']?>">
                        
                        <label class="label-control" ><strong> Title</strong></label>
                        <input 
                       style="width: 350px;"
                        class="form-control" 
                        type="text" 
                        name="title" 
                        value="<?=$after_assoc_portfolio['title']?>">
                    </div>
                    
                    <div class="mt-4">
                        <label class="label-control" ><strong>Sub Title</strong></label>
                        <input 
                        style="width: 350px;"
                        class="form-control" 
                        type="text" 
                        name="desp" 
                        value="<?=$after_assoc_portfolio['desp']?>">
                    </div>
                    <div class="mt-4">
                        <label class="label-control" ><strong>Description</strong></label>
                        <textarea class="form-control" name="long_desp" id="" cols="30" rows="10"><?=$after_assoc_portfolio['long_desp']?></textarea>
                    </div class="mt-4">


                    <div class="mt-4">
                        <label class="label-control" ><strong> Project</strong></label>
                        <input 
                       style="width: 350px;"
                        class="form-control" 
                        type="text" 
                        name="demo" 
                        value="<?=$after_assoc_portfolio['demo']?>">
                    </div>

                    <div class="mt-4">
                        <label class="label-control" ><strong> Project Link</strong></label>
                        <input 
                       style="width: 350px;"
                        class="form-control" 
                        type="text" 
                        name="demo_link" 
                        value="<?=$after_assoc_portfolio['demo_link']?>">
                    </div>

                    <button class="btn btn-primary mt-5"> Update Portfolio</button>
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


<?php if(isset($_SESSION['success_port'])) {?> 
    
<script>
    Swal.fire({
  position: 'center',
  icon: 'success',
  title: '<?=$_SESSION['success_port']?>',
  showConfirmButton: false,
  timer: 1500
})
</script>    
    
<?php }  unset($_SESSION['success_port'])?>