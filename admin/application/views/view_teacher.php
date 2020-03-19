<?php
$url = 'http://otee.ir';
$ms = $ms;
$description = $description;

$myavatar = (count($query1) > 0 ? $query1[0]->admin_picture : NULL);
$myfname = (count($query1) > 0 ? $query1[0]->admin_fname : "");
$mylname = (count($query1) > 0 ? $query1[0]->admin_lname : "");
$mygender = (count($query1) > 0 ? $query1[0]->gender : null);

$result = $query;

if (count($result) > 0) {

	foreach ($result as $row) {
		$teacher_id = $row->teacher_id;
		$tchfname = $row->teacher_fname;
		$tchlname = $row->teacher_lname;
		$tchgender = $row->gender;
		$tchemail = $row->email;
		$tchphone = $row->phone;

		$tchavatar = $row->teacher_picture;
		$tchstat = $row->acc_stat;
		// $qrcodetxt = 'ID:'.$teacher_id.', NAME: '.$tchfname.' '.$tchlname.', GENDER: '.$tchgender.', DEPARTMENT : '.$tchdepartment.', CATEGORY : '.$tchcategory.'';

	}
} //
else {
	header("location:./");
}
?>
<!DOCTYPE html>
<html>

<head>

	<title>OES | View Teacher</title>

	<?php require('shared/meta-tag.php') ?>

	<?php require('shared/links.php') ?>

	<link href="<?php echo $url; ?>/assets/plugins/offcanvasmenueffects/css/menu_cornerbox.css" rel="stylesheet"
		  type="text/css"/>
	<link href="<?php echo $url; ?>/assets/plugins/datatables/css/jquery.datatables.min.css" rel="stylesheet"
		  type="text/css"/>
	<link href="<?php echo $url; ?>/assets/plugins/datatables/css/jquery.datatables_themeroller.css" rel="stylesheet"
		  type="text/css"/>
	<link href="<?php echo $url; ?>/assets/plugins/x-editable/bootstrap3-editable/css/bootstrap-editable.css"
		  rel="stylesheet" type="text/css">
	<link href="<?php echo $url; ?>/assets/plugins/bootstrap-datepicker/css/datepicker3.css" rel="stylesheet"
		  type="text/css"/>
	<link href="<?php echo $url; ?>/assets/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo $url; ?>/assets/css/snack.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo $url; ?>/assets/plugins/summernote-master/summernote.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo $url; ?>/assets/plugins/bootstrap-datepicker/css/datepicker3.css" rel="stylesheet"
		  type="text/css"/>
	<link href="<?php echo $url; ?>/assets/plugins/bootstrap-colorpicker/css/colorpicker.css" rel="stylesheet"
		  type="text/css"/>
	<link href="<?php echo $url; ?>/assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet"
		  type="text/css"/>
	<link href="<?php echo $url; ?>/assets/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css"
		  rel="stylesheet" type="text/css"/>

</head>
<body<?php if ($ms == "1") {
	print 'onload="myFunction()"';
} ?> class="page-header-fixed">
<body>
<div class="overlay"></div>
<div class="menu-wrap">
	<nav class="profile-menu">
		<div class="profile">
			<?php
			if ($myavatar == NULL) {
				print'<img width="60" src="http://otee.ir/assets/images/' . $mygender . '.png" alt="' . $myfname . '">';
			} else {
				print '<img width="60" height="60" src="http://otee.ir/assets/images/' . $myavatar . '" alt="' . $myfname . '">';
			}

			?>
			<span><?php echo "$myfname"; ?><?php echo "$mylname"; ?></span></div>
		<div class="profile-menu-list">
			<a href="<?php echo base_url(); ?>index.php/profile"><i class="fa fa-user"></i><span>Profile</span></a>
			<a href="<?php echo base_url(); ?>index.php/logout"><i class="fa fa-sign-out"></i><span>خروج</span></a>
		</div>
	</nav>
	<button class="close-button" id="close-button">Close Menu</button>
</div>
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
	$active_sidebar_item = 'teachers';
	require('layout/sidebar.php');
	?>

	<div class="page-inner">
		<div class="page-title">
			<h3>View teacher - <?php echo "$tchfname"; ?> <?php echo "$tchlname"; ?></h3>

		</div>
		<div id="main-wrapper">
			<div class="row">
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-5">

							<div class="panel panel-white">
								<div class="panel-body">
									<div class="col-md-6">
										<?php
										if ($tchavatar == NULL) {
											print' <img class="img-responsive" src="http://otee.ir/assets/images/' . $tchgender . '.png" alt="' . $tchfname . '">';
										} else {
											print '<img src="http://otee.ir/assets/images/' . $myavatar . '" class="img-responsive"  alt="' . $myfname . '"/>';
										}

										?></div>
									<!--                                    <div class="col-md-6">-->
									<!--                                        --><?php //print '<img width="150" src="../assets/qrcode/qr_img.php?d='.$qrcodetxt.'">'; ?>
									<!--                                    </div>-->

								</div>
								<table class="table">
									<tbody>
									<tr>
										<th scope="row">1</th>
										<td>teacher ID</td>
										<td><b><?php echo "$teacher_id"; ?></b></td>

									</tr>
									<tr>
										<th scope="row">2</th>
										<td>First Name</td>
										<td><b><?php echo "$tchfname"; ?></b></td>

									</tr>
									<tr>
										<th scope="row">3</th>
										<td>Last Name</td>
										<td><b><?php echo "$tchlname"; ?></b></td>

									</tr>
									<tr>
										<th scope="row">4</th>
										<td>Gender</td>
										<td><b><?php echo "$tchgender"; ?></b></td>

									</tr>

									<tr>
										<th scope="row">7</th>
										<td>Email Address</td>
										<td><b><?php echo "$tchemail"; ?></b></td>

									</tr>
									<tr>
										<th scope="row">8</th>
										<td>Phone Number</td>
										<td><b><?php echo "$tchphone"; ?></b></td>

									</tr>
									</tbody>
								</table>
							</div>

						</div>

						<div class="col-md-7">

							<div class="panel panel-white">
								<div class="panel-body">
									<h3>دروس ارايه شده توسط استاد <?php echo " $tchlname"; ?></h3>
									<div class="table-responsive">
										<?php

										$result = $course;

										if (count($result) > 0) {
											print '
                                    									   <table id="example" class="display table" style="width: 100%; cellspacing: 0;">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>class code</th>
                                                                                    <th>class name</th>
                                                                                    <th>exam</th>
                                                                                    <th>Status</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tfoot>
                                                                                <tr>
                                                                                    <th>class code</th>
                                                                                    <th>class name</th>
                                                                                    <th>exam</th>
                                                                                    <th>Status</th>
                                                                                </tr>
                                                                            </tfoot>
                                                                            <tbody>';

											foreach ($result as $row) {
												print '
                                    									        <tr>
                                                                                    <td>' . $row->course_code . '</td>
                                                                                    <td>' . $row->course_name . '</td>
                                                                                    <td>' . "22" . '%</td>
                                                                                    <td>' . "33" . '</td>
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
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="page-footer">
			<p class="no-s">&copy; Developed by <a href="https://www.instagram.com/afsoonaslanii/" target="_blank">afsoon
					aslanii</a>.</p>
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
