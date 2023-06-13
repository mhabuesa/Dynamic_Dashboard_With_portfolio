<?php
session_start();
require 'db.php';
$title = 'Dashboard';
$header_title = 'Dashboard';
require 'dashboard_header.php'; 

$id = $_SESSION['id'];
$select_users = "SELECT * FROM users WHERE id !=$id";
$select_users_result = mysqli_query($db_connect, $select_users);
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
                                <h2>Our Honorable Users </h2>
                            </div>
                            <div class="card-body">
                               


                                
        <div class="row">  

        <?php
          foreach($select_users_result as $user){ ?> 

            <div class="col-md-6 col-xl-4">
                  <div class="card mb-3" style="background-color: #F8E9DB;">
                    <img height="300" class="card-img-top" src="/elephant/uploads/user/<?=($user['photo']?$user['photo']:'common.jpg')?>" alt="Card image cap">
                    <div class="card-body">
                        <p class="card-text"> User ID: <?=$user['id']?></p>
                        
                      <h5 class="card-title"><strong>Name: </strong> <?=$user['name']?></h5>
                      <p class="card-text">Email: <?=$user['email']?> </p>
                      <p class="card-text">
                        <small class="card-footer text-muted">Registered On: <?=$user['created_at']?></small>
                      </p>
                    </div>
                  </div>
            </div>
          
          <?php }   ?>
               
               

                


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
    require 'dashboard_footer.php';
?>









