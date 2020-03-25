<?php
require_once(APPPATH.'utils\convert_gregorian_to_jalali.php');
$url = 'http://otee.ir';

$myavatar = (count($query) > 0 ? $query[0]->student_picture : NULL);
$myfname = (count($query) > 0 ? $query[0]->student_fname : " ");
$mylname = (count($query) > 0 ? $query[0]->student_lname : "");
$mygender = (count($query) > 0 ? $query[0]->gender : NULL);

$ms = $ms;
$description = $description;

?>
<!DOCTYPE html>
<html>

<head>

	<title>او تی | نتایج امتحانات</title>

	<?php require('shared/links.php'); ?>

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

</head>
<body <?php if ($ms == "1") {
	print 'onload="myFunction()"';
} ?> class="page-header-fixed">

<?php require('layout/profile-menu.php') ?>

<main class="page-content content-wrap">
	<?php require('layout/navbar.php'); ?>

	<?php
	$active_sidebar_item = 'result';
	$horizontal = false;
	require('layout/sidebar.php');
	?>

	<div class="page-inner">
		<div class="page-title">
			<h3>نتایج من</h3>

		</div>
		<div id="main-wrapper">
			<div class="row">
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-12">

							<div class="panel panel-white">
								<div class="panel-body">
									<div class="table-responsive">
										<?php
										$result = $record;
										if (count($result) > 0) {
											print '
										<table id="example" class="display table" style="width: 100%; cellspacing: 0;">
                                        <thead>
                                            <tr>
                                                <th>کد آزمون</th>
                                                <th>نام آزمون</th>
												<th>نام آموزگار</th>
												<th>نمره</th>
												<th>تاریخ</th>
                                                <th>وضعیت</th>
												<th>آزمون مجدد</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>کد آزمون</th>
                                                <th>نام آزمون</th>
												<th>نام آموزگار</th>
												<th>نمره</th>
												<th>تاریخ</th>
                                                <th>وضعیت</th>
												<th>آزمون مجدد</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>';

											foreach ($result as $row) {

												print '
										       <tr>
										        <td>' . $row->exam_id . '</td>
                                                <td>' . $row->exam_title . '</td>
											    <td>' . $row->teacher_fname . ' ' . $row->teacher_lname . '</td>
												<td>' . $row->score . '%</td>
                                                <td>' . convert_gregorian_to_jalali($row->take_date) . '</td>
												<td>' . $row->status_student . '</td>
                                                <td>' . convert_gregorian_to_jalali($row->retake_date) . '</td>

                                            </tr>';
											}

											print '
									   </tbody>
                                       </table>  ';
										} else {
											print '
												<div class="alert alert-info" role="alert">
                                        نتیجه ای در پایگاه داده یافت نشد.
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
			<p class="no-s">
				<?php echo date('Y'); ?> &copy; Developed by
				<a href="https://www.instagram.com/afsoonaslanii/" target="_blank">Afsoon Aslanii</a>.
			</p>
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
