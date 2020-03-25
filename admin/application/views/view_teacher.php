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

	}
}
else {
	header("location:./");
}
?>
<!DOCTYPE html>
<html>

<head>

	<title>او تی | مشاهده آموزگار</title>

	<?php require('shared/meta-tag.php') ?>

	<?php require('shared/links.php') ?>

	<link href="<?php echo $url; ?>/assets/plugins/offcanvasmenueffects/css/menu_cornerbox.css" rel="stylesheet"
		  type="text/css"/>

	<link href="<?php echo $url; ?>/assets/plugins/summernote-master/summernote.css" rel="stylesheet" type="text/css"/>

	<?php require('shared/plugins.php') ?>

</head>
<body<?php if ($ms == "1") {
	print 'onload="myFunction()"';
} ?> class="page-header-fixed">
<body>

<?php require('layout/profile-menu.php') ?>
<?php require('layout/search-form.php') ?>

<main class="page-content content-wrap">

	<?php require('layout/navbar.php'); ?>

	<?php
	$active_sidebar_item = 'teachers';
	$horizontal = false;
	require('layout/sidebar.php');
	?>

	<div class="page-inner">
		<div class="page-title">
			<h3>مشاهده آموزگار - <?php echo "$tchfname"; ?> <?php echo "$tchlname"; ?></h3>

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
											print' <img class="img-responsive" src="' . $url . '/assets/images/' . $tchgender . '.png" alt="' . $tchfname . '">';
										} else {
											print '<img src="' . $url . '/assets/images/' . $myavatar . '" class="img-responsive"  alt="' . $myfname . '"/>';
										}

										?>
									</div>
								</div>
								<table class="table">
									<tbody>
									<tr>
										<th scope="row">1</th>
										<td>شناسه آموزگار</td>
										<td><b><?php echo "$teacher_id"; ?></b></td>

									</tr>
									<tr>
										<th scope="row">2</th>
										<td>نام</td>
										<td><b><?php echo "$tchfname"; ?></b></td>

									</tr>
									<tr>
										<th scope="row">3</th>
										<td>نام خانوادگی</td>
										<td><b><?php echo "$tchlname"; ?></b></td>

									</tr>
									<tr>
										<th scope="row">4</th>
										<td>جنسیت</td>
										<td><b><?php echo "$tchgender"; ?></b></td>

									</tr>

									<tr>
										<th scope="row">7</th>
										<td>آدرس ایمیل</td>
										<td><b><?php echo "$tchemail"; ?></b></td>

									</tr>
									<tr>
										<th scope="row">8</th>
										<td>تلفن همراه</td>
										<td><b><?php echo "$tchphone"; ?></b></td>

									</tr>
									</tbody>
								</table>
							</div>

						</div>

						<div class="col-md-7">

							<div class="panel panel-white">
								<div class="panel-body">
									<h3>دروس ارايه شده توسط <?php echo " $tchlname"; ?></h3>
									<div class="table-responsive">
										<?php

										$result = $course;

										if (count($result) > 0) {
											print '
                                    									   <table id="example" class="display table" style="width: 100%; cellspacing: 0;">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>کد درس</th>
                                                                                    <th>نام درس</th>
                                                                                    <th>امتحان</th>
                                                                                    <th>وضعیت</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tfoot>
                                                                                <tr>
                                                                                    <th>کد درس</th>
                                                                                    <th>نام درس</th>
                                                                                    <th>امتحان</th>
                                                                                    <th>وضعیت</th>
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
                                                                            اطلاعاتی برای نمایش پیدا نشد.
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
