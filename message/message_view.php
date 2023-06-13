<?php
session_start();
require '../db.php';
$title = 'Message Details';
$header_title = 'Message';

$id = $_GET['id'];

$update = "UPDATE messages SET status=1 WHERE id=$id";
mysqli_query($db_connect, $update);
require '../dashboard_header.php'; 

$select_message = "SELECT * FROM messages WHERE id=$id";
$message_result = mysqli_query($db_connect, $select_message);
$after_assoc_message = mysqli_fetch_assoc($message_result);


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
                                <h2>Message Details </h2>
                            </div>
                            <div class="card-body">

                              <table class="table table-bordered">
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Subject</th>
                                    <th>Message</th>
                                </tr>

                                <tr>
                                    <td><?=$after_assoc_message['name']?></td>
                                    <td><?=$after_assoc_message['email']?></td>
                                    <td><?=$after_assoc_message['subject']?></td>
                                    <td><?=$after_assoc_message['message']?></td>
                                </tr>
                              </table>

                            <a class="btn btn-primary" href="message.php" >Back to Message Box</a>

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









