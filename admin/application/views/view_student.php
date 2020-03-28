<?php
$url = 'http://otee.ir';
$ms = $ms;
$description = $description;

$myavatar = (count($query1) > 0 ? $query1[0]->picture : NULL);
$myfname = (count($query1) > 0 ? $query1[0]->firstname : "");
$mylname = (count($query1) > 0 ? $query1[0]->lastname : "");
$mygender = (count($query1) > 0 ? $query1[0]->gender : null);

$result = $query;

if (count($result) > 0) {

	foreach ($result as $row) {
		$user_id = $row->user_id;
		$sdfname = $row->firstname;
		$sdlname = $row->lastname;
		$sdgender = $row->gender;
		$sdemail = $row->email;
		$sdphone = $row->phone;
		$sdavatar = $row->picture;
		$sdstat = $row->status;
		// $qrcodetxt = 'ID:'.$user_id.', NAME: '.$sdfname.' '.$sdlname.', GENDER: '.$sdgender.', DEPARTMENT : '.$sddepartment.', CATEGORY : '.$sdcategory.'';

	}
} else {
	header("location:./");
}
?>
<!DOCTYPE html>
<html>

<head>

	<title>او تی | مشاهده اطلاعات دانش آموز</title>

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


<main class="page-content content-wrap">

	<?php require('layout/navbar.php'); ?>

	<?php
	$active_sidebar_item = 'students';
	$horizontal = false;
	require('layout/sidebar.php');
	?>

	<div class="page-inner">
		<div class="page-title">
			<h3>اطلاعات - <?php echo "$sdfname"; ?> <?php echo "$sdlname"; ?></h3>
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
										if ($sdavatar == NULL) {
											print' <img class="img-responsive" src="' . $url . '/assets/images/' . $sdgender . '.png" alt="' . $sdfname . '">';
										} else {
											print '<img src="' . $url . '/assets/images/' . $myavatar . '" class="img-responsive"  alt="' . $myfname . '"/>';
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
										<td>شناسه</td>
										<td><b><?php echo "$user_id"; ?></b></td>

									</tr>
									<tr>
										<th scope="row">2</th>
										<td>نام</td>
										<td><b><?php echo "$sdfname"; ?></b></td>

									</tr>
									<tr>
										<th scope="row">3</th>
										<td>نام خانوادگی</td>
										<td><b><?php echo "$sdlname"; ?></b></td>

									</tr>
									<tr>
										<th scope="row">4</th>
										<td>جنسیت</td>
										<td><b><?php echo "$sdgender"; ?></b></td>

									</tr>
									<tr>
										<th scope="row">5</th>
										<td>ایمیل</td>
										<td><b><?php echo "$sdemail"; ?></b></td>

									</tr>
									<tr>
										<th scope="row">6</th>
										<td>تلفن همراه</td>
										<td><b><?php echo "$sdphone"; ?></b></td>

									</tr>
									</tbody>
								</table>
							</div>

						</div>

						<div class="col-md-7">

							<div class="panel panel-white">
								<div class="panel-body">
									<h3><?php echo "$sdfname"; ?> دروس اخذ شده توسط </h3>
									<div class="table-responsive">
										<?php
										$result = $class;

										if (count($result) > 0) {
											print '
									   <table id="example" class="display table" style="width: 100%; cellspacing: 0;">
                                        <thead>
                                            <tr>
                                                <th>کد درس</th>
                                                <th>نام درس</th>
                                                <th>امتیاز</th>
                                                <th>وضعیت</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>کد درس</th>
                                                <th>نام درس</th>
                                                <th>امتیاز</th>
                                                <th>وضعیت</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>';

											foreach ($result as $row) {
												print '
									        <tr>
							                    <td>' . $row->course_code . '</td>
									            <td>' . $row->course_name . '</td>
                                                <td>' . $row->score . '٪</td>
                                                <td>' . $row->status_student . '</td>
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
			<p class="no-s"><?php echo date('Y'); ?> &copy; Developed by <a
					href="https://www.instagram.com/afsoonaslanii/" target="_blank">Afsoon Aslanii</a>.</p>
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
