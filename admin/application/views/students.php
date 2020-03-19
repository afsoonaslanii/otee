<?php
$url = 'http://otee.ir';

$myavatar = (count($query1) > 0 ? $query1[0]->admin_picture : NULL);
$myfname = (count($query1) > 0 ? $query1[0]->admin_fname : "");
$mylname = (count($query1) > 0 ? $query1[0]->admin_lname : "");
$mygender = (count($query1) > 0 ? $query1[0]->gender : null);

$ms = $ms;
$description = $description;

?>
<!DOCTYPE html>
<html>

<head>

	<title>OES | Manage Students</title>

	<?php require('shared/meta-tag.php') ?>

	<?php require('shared/links.php') ?>

	<link href="<?php echo $url; ?>/assets/plugins/offcanvasmenueffects/css/menu_cornerbox.css" rel="stylesheet"
		  type="text/css"/>

	<link href="<?php echo $url; ?>/assets/plugins/summernote-master/summernote.css" rel="stylesheet" type="text/css"/>

	<?php require('shared/plugins.php') ?>
</head>
<body <?php if ($ms == "1") {
	print 'onload="myFunction()"';
} ?> class="page-header-fixed">
<body>

<?php require('layout/profile-menu.php') ?>

<form class="search-form" action="search.php" method="GET">
	<div class="input-group">
		<input type="text" name="keyword" class="form-control search-input" placeholder="Search student..." required>
		<span class="input-group-btn">
                    <button class="btn btn-default close-search waves-effect waves-button waves-classic"
							type="button"><i class="fa fa-times"></i></button>
                </span>
	</div>
</form>
<main class="page-content content-wrap">

	<?php require('layout/navbar.php'); ?>

	<?php
	$active_sidebar_item = 'students';
	require('layout/sidebar.php');
	?>

	<div class="page-inner">
		<div class="page-title">
			<h3>Manage Students</h3>


		</div>
		<div id="main-wrapper">
			<div class="row">
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-12">

							<div class="panel panel-white">
								<div class="panel-body">
									<div role="tabpanel">

										<ul class="nav nav-tabs" role="tablist">

											<li role="presentation" class="active"><a href="#tab5" role="tab"
																					  data-toggle="tab">Students</a>
											</li>
											<li role="presentation"><a href="#tab6" role="tab" data-toggle="tab">Add
													Students</a></li>


										</ul>

										<div class="tab-content">
											<div role="tabpanel" class="tab-pane active fade in" id="tab5">
												<div class="table-responsive">
													<?php
													$result = $query2;

													if (count($result) > 0) {
														print '
										<table id="example" class="display table" style="width: 100%; cellspacing: 0;">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
												<th>Gender</th>
												<th>Username</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Name</th>
												<th>Gender</th>
												<th>Username</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>';

														foreach ($result as $row) {

															$status = $row->acc_stat;
															if ($status == "1") {
																$st = '<p class="text-success">ACTIVE</p>';
																$stl = '<a href="http://otee.ir/admin/index.php/students/inactive_st/' . $row->user_id . '">Make Inactive</a>';
															} else {
																$st = '<p class="text-danger">INACTIVE</p>';
																$stl = '<a href="http://otee.ir/admin/index.php/students/active_st/' . $row->user_id . '">Make Active</a>';
															}
															print '
										       <tr>
                                                <td>' . $row->student_fname . ' ' . $row->student_lname . '</td>
												<td>' . $row->gender . '</td>
                                                <td>' . $row->username . '</td>
                                                <td>' . $st . '</td>
                                                <td><div class="btn-group" role="group">
                                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                    Select Action
                                                    <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li>' . $stl . '</li>
													<li><a href="http://otee.ir/admin/index.php/students/edit_student/' . $row->user_id . '">Edit Student</a></li>
													<li><a href="http://otee.ir/admin/index.php/students/view_student/' . $row->user_id . '/' . $row->student_id . '">View Student</a></li>
                                                    <li><a'; ?> onclick = "return confirm('Drop <?php echo $row->student_fname; ?> ?')" <?php print ' href="http://otee.ir/admin/index.php/students/drop_sd/' . $row->user_id . '">Drop Student</a></li>
                                                </ul>
                                            </div></td>
          
                                            </tr>';
														}

														print '
									   </tbody>
                                       </table>  ';
													} else {
														print '
												<div class="alert alert-info" role="alert">
                                        Nothing was found in database.
                                    </div>';

													}


													?>

												</div>

											</div>
											<div role="tabpanel" class="tab-pane fade" id="tab6">
												<form action="<?php echo base_url(); ?>index.php/students/addStudent"
													  method="POST">
													<div class="form-group">
														<label for="exampleInputEmail1">First Name</label>
														<input type="text" class="form-control"
															   placeholder="Enter first name" name="fname" required
															   autocomplete="off">
													</div>
													<div class="form-group">
														<label for="exampleInputEmail1">Last Name</label>
														<input type="text" class="form-control"
															   placeholder="Enter last name" name="lname" required
															   autocomplete="off">
													</div>
													<div class="form-group">
														<label for="exampleInputEmail1">Male</label>
														<input type="radio" name="gender" value="Male" required>
														<label for="exampleInputEmail1">Female</label>
														<input type="radio" name="gender" value="Female" required>
													</div>
													<div class="form-group">
														<label for="exampleInputEmail1">Email Address</label>
														<input type="email" class="form-control"
															   placeholder="Enter email address" name="email" required
															   autocomplete="off">
													</div>
													<div class="form-group">
														<label for="exampleInputEmail1">Phone</label>
														<input type="text" class="form-control"
															   placeholder="Enter phone" name="phone" required
															   autocomplete="off">
													</div>
													<div class="form-group">
														<label for="exampleInputEmail1">Select Department</label>
														<!--                                                        <select class="form-control" name="department" required>-->
														<!--                                                            <option value="" selected disabled>-Select department-</option>-->
														<!--                                                            --><?php
														//                                                            include '../database/config.php';
														//                                                            $sql = "SELECT * FROM tbl_departments WHERE status = 'Active' ORDER BY name";
														//                                                            $result = $conn->query($sql);
														//
														//                                                            if ($result->num_rows > 0) {
														//
														//                                                                while($row = $result->fetch_assoc()) {
														//                                                                    print '<option value="'.$row['name'].'">'.$row['name'].'</option>';
														//                                                                }
														//                                                            } else {
														//
														//                                                            }
														//                                                            $conn->close();
														//                                                            ?>
														<!---->
														<!--                                                        </select>-->
													</div>

													<div class="form-group">
														<label for="exampleInputEmail1">Select Category</label>
														<!--                                                        <select class="form-control" name="category" required>-->
														<!--                                                            <option value="" selected disabled>-Select category-</option>-->
														<!--                                                            --><?php
														//                                                            include '../database/config.php';
														//                                                            $sql = "SELECT * FROM tbl_categories WHERE status = 'Active' ORDER BY name";
														//                                                            $result = $conn->query($sql);
														//
														//                                                            if ($result->num_rows > 0) {
														//
														//                                                                while($row = $result->fetch_assoc()) {
														//                                                                    print '<option value="'.$row['name'].'">'.$row['name'].'</option>';
														//                                                                }
														//                                                            } else {
														//
														//                                                            }
														//                                                            $conn->close();
														//                                                            ?>
														<!---->
														<!--                                                        </select>-->
													</div>

													<div class="form-group">
														<label>Username</label>
														<input type="text" class="form-control " name="username"
															   required autocomplete="off" placeholder="Set username">
													</div>


													<button type="submit" class="btn btn-primary">Submit</button>
												</form>
											</div>

										</div>
									</div>
								</div>
							</div>

						</div>
					</div>


				</div>
			</div>
		</div>
		<div class="page-footer">
			<p class="no-s"><?php echo date('Y'); ?> &copy; Developed by <a
					href="https://www.instagram.com/afsoonaslanii/" target="_blank">afsoon aslanii</a>.</p>
		</div>
	</div>
</main>
<?php if ($ms == "1") {
	?>
	<div class="alert alert-success" id="snackbar"><?php echo "$description"; ?></div> <?php
} else {

}
?>

<div class="cd-overlay"></div>

<script src="<?php echo $url; ?>/assets/plugins/jquery/jquery-2.1.4.min.js"></script>
<script src="<?php echo $url; ?>/assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="<?php echo $url; ?>/assets/plugins/pace-master/pace.min.js"></script>
<script src="<?php echo $url; ?>/assets/plugins/jquery-blockui/jquery.blockui.js"></script>
<script src="<?php echo $url; ?>/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo $url; ?>/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="<?php echo $url; ?>/assets/plugins/switchery/switchery.min.js"></script>
<script src="<?php echo $url; ?>/assets/plugins/uniform/jquery.uniform.min.js"></script>
<script src="<?php echo $url; ?>/assets/plugins/offcanvasmenueffects/js/classie.js"></script>
<script src="<?php echo $url; ?>/assets/plugins/offcanvasmenueffects/js/main.js"></script>
<script src="<?php echo $url; ?>/assets/plugins/waves/waves.min.js"></script>
<script src="<?php echo $url; ?>/assets/plugins/3d-bold-navigation/js/main.js"></script>
<script src="<?php echo $url; ?>/assets/plugins/jquery-mockjax-master/jquery.mockjax.js"></script>
<script src="<?php echo $url; ?>/assets/plugins/moment/moment.js"></script>
<script src="<?php echo $url; ?>/assets/plugins/datatables/js/jquery.datatables.min.js"></script>
<script src="<?php echo $url; ?>/assets/plugins/x-editable/bootstrap3-editable/js/bootstrap-editable.js"></script>
<script src="<?php echo $url; ?>/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="<?php echo $url; ?>/assets/js/modern.min.js"></script>
<script src="<?php echo $url; ?>/assets/js/pages/table-data.js"></script>
<script src="<?php echo $url; ?>/assets/plugins/select2/js/select2.min.js"></script>
<script src="<?php echo $url; ?>/assets/plugins/summernote-master/summernote.min.js"></script>
<script src="<?php echo $url; ?>/assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
<script src="<?php echo $url; ?>/assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>
<script src="<?php echo $url; ?>/assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
<script src="<?php echo $url; ?>/assets/js/pages/form-elements.js"></script>


<script>
    function myFunction() {
        var x = document.getElementById("snackbar");
        x.className = "show";
        setTimeout(function () {
            x.className = x.className.replace("show", "");
        }, 3000);
    }
</script>
</body>

</html>
