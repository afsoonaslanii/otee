<?php
$url = 'http://otee.ir';
$ms = $ms;
$description = $description;

$myavatar = (count($query1) > 0 ? $query1[0]->teacher_picture : NULL);
$myfname = (count($query1) > 0 ? $query1[0]->teacher_fname : "");
$mylname = (count($query1) > 0 ? $query1[0]->teacher_lname : "");
$mygender = (count($query1) > 0 ? $query1[0]->gender : NULL);

$result = $query;

if (count($result) > 0) {

	foreach ($result as $row) {
		$user_id = $row->user_id;
		$student_id = $row->student_id;
		$sdfname = $row->student_fname;
		$sdlname = $row->student_lname;
		$sdgender = $row->gender;

		//$sddob = $row['dob'];
		$sdaddress = "";
		$sdemail = $row->email;
		$sdphone = $row->phone;
		$sddepartment = "";
		$sdcategory = "";
		$sdavatar = $row->student_picture;
		$sdstat = $row->acc_stat;

	}
} else {
	header("location:./");
}
?>
<!DOCTYPE html>
<html>

<head>

	<title>او تی | ویرایش دانش آموز</title>

	<?php require('shared/links.php') ?>

	<link href="<?php echo $url; ?>/assets/plugins/offcanvasmenueffects/css/menu_cornerbox.css" rel="stylesheet"
		  type="text/css"/>

	<link href="<?php echo $url; ?>/assets/plugins/summernote-master/summernote.css" rel="stylesheet" type="text/css"/>

	<?php require('shared/plugins.php') ?>

</head>
<body <?php if ($ms == "1") {
	print 'onload="myFunction()"';
} ?> class="page-header-fixed">

<?php require('layout/profile-menu.php') ?>

<?php require('layout/search-form.php') ?>

<main class="page-content content-wrap">

	<?php require('layout/navbar.php'); ?>

	<?php
	$active_sidebar_item = 'students';
	$horizontal = false;
	require('layout/sidebar.php');
	?>

	<div class="page-inner">
		<div class="page-title">
			<h3>ویرایش اطلاعات - <?php echo "$sdfname"; ?> <?php echo "$sdlname"; ?></h3>


		</div>
		<div id="main-wrapper">
			<div class="row">
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-12">

							<div class="panel panel-white">
								<div class="panel-body">
									<form
										action="<?php echo base_url(); ?>index.php/students/update_student"
										method="POST"
									>
										<div class="form-group">
											<label for="fname">نام</label>
											<input
												type="text"
												value="<?php echo "$sdfname"; ?>"
												class="form-control"
												placeholder="نام خود را وارد کنید"
												id="fname"
												name="fname"
												required
												autocomplete="off"
											/>
										</div>
										<div class="form-group">
											<label for="lname">نام خانوادگی</label>
											<input
												type="text"
												value="<?php echo "$sdlname"; ?>"
												class="form-control"
												placeholder="نام خانوادگی خودرا وارد کنید"
												id="lname"
												name="lname"
												required
												autocomplete="off"
											/>
										</div>
										<div class="form-group">
											<label for="male">مرد</label>
											<input
												type="radio" <?php if ($sdgender == "Male") {
												print ' checked ';
											} ?>
												id="male"
												name="gender"
												value="Male"
												required
											/>
											<label for="Female">زن</label>
											<input
												type="radio" <?php if ($sdgender == "Female") {
												print ' checked ';
											} ?>
												name="gender"
												id="Female"
												value="Female"
												required
											/>
										</div>
										<div class="form-group">
											<label for="email">آدرس ایمیل</label>
											<input
												type="email"
												value="<?php echo "$sdemail"; ?>"
												class="form-control"
												placeholder="ایمیل خودرا وارد کنید"
												id="email"
												name="email"
												autocomplete="off"
											/>
										</div>
										<div class="form-group">
											<label for="phone">نلفن همراه</label>
											<input
												type="text"
												value="<?php echo "$sdphone"; ?>"
												class="form-control"
												placeholder="تلفن همراه خودرا وارد کنید"
												id="phone"
												name="phone"
												required
												autocomplete="off"
											/>
										</div>
										<!--                                        <input type="hidden" name="student_id" value="-->
										<?php //echo "$student_id"; ?><!--">-->
										<input type="hidden" name="user_id" value="<?php echo "$user_id"; ?>">
										<button type="submit" class="btn btn-primary">
											به روزرسانی <?php echo "$sdfname"; ?>
										</button>
									</form>
								</div>
							</div>

						</div>
					</div>


				</div>
			</div>
		</div>
		<div class="page-footer">
			<p class="no-s"><?php echo date('Y'); ?> &copy; Developed by <a
					href="https://www.instagram.com/afsoonaslanii/" target="_blank">Afsoon Aslanii</a>.</p>
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
