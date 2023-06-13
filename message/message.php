<?php
session_start();
require '../db.php';
$title = 'Message Box';
$header_title = 'Message';
require '../dashboard_header.php'; 

$select_message = "SELECT * FROM messages";
$message_result = mysqli_query($db_connect, $select_message);
?>
		<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
			<div class="container-fluid">
				<div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h2>Message Box </h2>
                            </div>
                            <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="example">
                                   <thead>
                                   <tr>
                                        <th> SL </th>
                                        <th> Name </th>
                                        <th> Email </th>
                                        <th> Status </th>
                                        <th> Action </th>
                                    </tr>
                                   </thead>

                                   <tbody>
                                   <?php
                                        foreach($message_result  as $key=> $message){ ?> 
                                        <tr style="background: red;" >
                                            <td><?=$key+1?></td>
                                            <td><?=$message['name']?></td>
                                            <td><?=$message['email']?></td>
                                            <td>
                                               <a href="message_view.php?id=<?=$message['id']?>" class="btn btn-<?=($message['status']== 0?'dark':'success')?>"> <?=($message['status']== 0?'Unseen':'Seen')?> </a>
                                            </td>
                                            <td>
                                               <button data-link="message_delete.php?id=<?=$message['id']?>" class="btn del_btn btn-danger"> Delete </button>
                                            </td>
                                        </tr>
                                       <?php } ?>
                                   </tbody>
                                </table>
                                </div>
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






<script>

   


    $('.del_btn').click(function(){
        var link = $(this).attr('data-link');
    
        Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.isConfirmed) {
    window.location.href = link;
  }
})
    })
</script>


