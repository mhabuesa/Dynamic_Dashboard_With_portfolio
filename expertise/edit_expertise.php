<?php
    session_start();
    require '../db.php';
    $title = 'Edit Expertise';
    $header_title = 'Edit Expertise';
    require '../dashboard_header.php';
    $id = $_GET['id'];
    $select = "SELECT * FROM expertise WHERE id=$id";
    $select_result = mysqli_query($db_connect, $select);
    $after_assoc = mysqli_fetch_assoc($select_result);
?>

		<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body ">
            <!-- row -->
			<div class="container-fluid">
				<div class="row ">
                    <div class="col-lg-6 m-auto">
                        <div class="card ">
                            <div class="card-header">
                                <h2>Edit Expertise </h2>
                            </div>
                            <div class="card-body">
                                <form action="post_edit_expertise.php" method="post">
                                    <div class="mb-3" >
                                        <label class="form-label"> Topic </label>
                                        <div>
                                            <input type="hidden" class="form-control" name="subject_id" 
                                            value="<?=$id?>">
                                            <input type="text" class="form-control" name="topic" 
                                            value="<?=$after_assoc['topic']?>">
                                        </div>
                                    </div>
                                    <div class="mb-3" >
                                        <label class="form-label"> Percentage </label>
                                        <div>
                                            <input type="number" class="form-control" name="percentage" 
                                            value="<?=$after_assoc['percentage']?>">
                                        </div>
                                    </div>
                                    <button class="btn btn-primary">Submit</button>
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