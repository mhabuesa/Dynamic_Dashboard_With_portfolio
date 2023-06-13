<?php

session_start();
require '../login_check.php';
require '../db.php';


$id = $_SESSION['id'];
$select = "SELECT * FROM users WHERE id != $id";
$all_users = mysqli_query($db_connect, $select); 


$title = 'User List';
$header_title = 'User List';
require '../dashboard_header.php';

?>



<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Users List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>

<div class="content-body">
            <!-- row -->
			<div class="container-fluid">
				<div class="row">

    
        <div class="row">
            <div class="col-lg-12 m-auto">
                <div class="card">
                    <div class="card-header text-center">
                        <h3>Users List</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered ">
                            <tr>
                                <th> SL </th>
                                <th> ID </th>
                                <th> Name </th>
                                <th> Email </th>
                                <th> Gender </th>
                                <th> Action </th>
                            </tr>
                            <?php foreach($all_users as $key=> $user){?>

                            <tr>
                                <td> <?= $key+1?> </td>
                                <td> <?= $user['id']?> </td>
                                <td> <?= $user['name']?> </td>
                                <td> <?= $user['email']?> </td>
                                <td> <?= $user['gender']?> </td>
                                
                                
                                <td>
                                    <div class="d-flex">
                                    <a href="user_edit.php?id=<?=$user['id']?>" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                    <a href="delete_user.php?id=<?=$user['id']?>" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
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
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>

<?php
    require '../dashboard_footer.php';
?>