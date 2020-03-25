<?php
require_once 'shared/convert_date.php';
$url = 'http://otee.ir';

$myavatar = (count($query) > 0 ? $query[0]->teacher_picture : NULL);
$myfname = (count($query) > 0 ? $query[0]->teacher_fname : "");
$mylname = (count($query) > 0 ? $query[0]->teacher_lname : "");
$mygender = (count($query) > 0 ? $query[0]->gender : NULL);

$ms = $ms;
$description = $description;

// "SELECT * FROM tbl_examinations WHERE exam_id = '$exam_id'";
$result = $query1;

if (count($result) > 0) {

	foreach ($result as $row) {
		$exam_id = $row->exam_id;
		$excate = "";
		$exsubject = "";
		$exname = $row->exam_title;
		$exdate = $row->exam_date;
		$exduration = $row->exam_duration;
		$expassmark = $row->passmark;
		$exreex = $row->re_exam;
		$exterms = $row->exam_terms;
	}
} else {
	header("location:./");
}

$stdpass = 0;
$stdfail = 0;

$result = $query2;

if (count($result) > 0) {

	foreach ($result as $row) {
		$status = $row->status_student;
		if ($status == "PASS") {
			$stdpass++;
		} else {
			$stdfail++;

		}
	}
}
?>
<!DOCTYPE html>
<html>

<head>

	<title>او تی | خلاصه وضعیت</title>

	<?php require_once 'shared/links.php' ?>

	<link href="<?php echo $url; ?>/assets/plugins/datatables/css/jquery.datatables.min.css" rel="stylesheet"
		  type="text/css"/>
	<link href="<?php echo $url; ?>/assets/plugins/datatables/css/jquery.datatables_themeroller.css" rel="stylesheet"
		  type="text/css"/>
	<link href="<?php echo $url; ?>/assets/plugins/x-editable/bootstrap3-editable/css/bootstrap-editable.css"
		  rel="stylesheet" type="text/css">
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
<body <?php if ($ms == "1") {
	print 'onload="myFunction()"';
} ?> class="page-header-fixed">

<?php require_once 'layout/profile-menu.php' ?>
<?php require_once 'layout/search-form.php' ?>

<main class="page-content content-wrap">

	<?php require_once 'layout/navbar.php' ?>

	<?php
	$active_sidebar_item = 'summary';
	$horizontal = false;
	require_once('layout/sidebar.php');
	?>

	<div class="page-inner">
		<div class="page-title">
			<h3>خلاصه وضعیت - <?php echo "$exname"; ?></h3>


		</div>
		<div id="main-wrapper">
			<div class="row">
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-12">

							<div class="panel panel-white">
								<div class="panel-body">
									<div class="table-responsive project-stats col-md-4">
										<table class="table">
											<tbody>
											<tr>
												<th scope="row">1</th>
												<td>نام آزمون</td>
												<td><?php echo "$exname"; ?></td>
											</tr>
											<tr>
												<th scope="row">2</th>
												<td>موضوع</td>
												<td><?php echo "$exsubject"; ?></td>
											</tr>
											<tr>
												<th scope="row">3</th>
												<td>تاریخ پایان</td>
												<td><?php echo convert_date($exdate); ?></td>
											</tr>

											<tr>
												<th scope="row">4</th>
												<td>مدت زمان</td>
												<td><?php echo "$exduration"; ?> <b>دقیقه.</b></td>
											</tr>


											<tr>
												<th scope="row">5</th>
												<td>امتیاز</td>
												<td><?php echo "$expassmark"; ?>%</td>
											</tr>


											</tbody>
										</table>
									</div>
									<div class="col-md-8">
										<div id="chartContainer" style="height: 370px; direction: ltr"></div>
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
<script src="<?php echo $url; ?>/assets/js/canvasjs.min.js"></script>
<script>
    window.onload = function () {

        var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            exportEnabled: true,
            data: [{
                type: "pie",
                startAngle: 240,
                showInLegend: "true",
                legendText: "{label}",
                indexLabel: "{label} - {y}",
                dataPoints: [
                    {y: <?php echo "$stdpass"; ?>, label: "قبول شده"},
                    {y: <?php echo "$stdfail"; ?>, label: "مردود شده"},
                ]
            }]
        });
        chart.render();

    }
</script>
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
