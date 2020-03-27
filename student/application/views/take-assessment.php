<?php
require_once(APPPATH . 'utils/convert_gregorian_to_jalali.php');;
$url = 'http://otee.ir';

$myavatar = (count($query) > 0 ? $query[0]->picture : NULL);
$myfname = (count($query) > 0 ? $query[0]->firstname : " ");
$mylname = (count($query) > 0 ? $query[0]->lastname : "");
$mygender = (count($query) > 0 ? $query[0]->gender : NULL);

$record_found = 0;

$result = $exam;

if (count($result) > 0) {
	foreach ($result as $row) {
		$exam_id = $row->exam_id;
		$exam_name = $row->exam_title;
		$deadline = $row->exam_date;
		$duration = $row->exam_duration;
		$passmark = $row->passmark;
		$reexam = $row->re_exam;
		$terms = $row->exam_terms;
		$status = $row->exam_status;
		$today_date = date('Y/m/d');
		$next_retake = date('Y/m/d', strtotime($today_date . ' + ' . $reexam . ' days'));
		$dcv = date_format(date_create_from_format('Y/m/d', $deadline), 'Y/m/d');

		if ($status == '0') {
			header("location:./");
		}
	}
} else {
	header("location:./");
}
$question_count = count($question);

//ag ghablan em dade bashe
$result = $st_record;

if (count($result) > 0) {
	foreach ($result as $row) {
		$class_id = $row->class_id;
		$record_found = 1;
		$score = $row->score;
		$status = $row->status_student;
		$take_date = $row->take_date;
		$retake_date = $row->retake_date;
		$today_date = date('Y/m/d');
		$retakeconv = date_format(date_create_from_format('Y/m/d', $retake_date), 'Y/m/d');
		$tc = strtotime($today_date);
		$rc = strtotime($retakeconv);
		$dc = strtotime($dcv);
		$td = ($tc - $rc) / 86400;
		$dcc = ($tc - $dc) / 86400;
	}
}

?>
<!DOCTYPE html>
<html>

<head>
	<title>او تی | آزمون</title>

	<?php require('shared/links.php'); ?>

	<link href="<?php echo $url; ?>/assets/plugins/weather-icons-master/css/weather-icons.min.css" rel="stylesheet"
		  type="text/css"/>
	<link href="<?php echo $url; ?>/assets/plugins/metrojs/MetroJs.min.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo $url; ?>/assets/plugins/toastr/toastr.min.css" rel="stylesheet" type="text/css"/>

</head>
<body class="page-header-fixed">

<?php require('layout/profile-menu.php') ?>

<main class="page-content content-wrap">
	<?php require('layout/navbar.php'); ?>

	<?php
	$active_sidebar_item = '';
	$horizontal = false;
	require('layout/sidebar.php');
	?>

	<div class="page-inner">
		<div class="page-title">
			<h3>آزمون</h3>
			<div class="page-breadcrumb">
				<ol class="breadcrumb">
					<li><a href="<?php echo base_url(); ?>index.php/examinations">آزمون</a></li>
					<li class="active"><?php echo "$exam_name"; ?></li>
				</ol>
			</div>
		</div>
		<div id="main-wrapper">
			<div class="row col-md-12">
				<div class="col-md-6">

					<div class="row">
						<div class="panel panel-white">
							<div class="panel-heading">
								<h4 class="panel-title">مشخصات آزمون</h4>
							</div>
							<div class="panel-body">
								<div class="table-responsive project-stats">
									<table class="table">
										</thead>
										<tbody>
										<tr>
											<th scope="row">1</th>
											<td>نام آزمون</td>
											<td><?php echo "$exam_name"; ?></td>
										</tr>

										<tr>
											<th scope="row">2</th>
											<td>تاریخ انقضا</td>
											<td><?php echo convert_gregorian_to_jalali($deadline); ?></td>
										</tr>

										<tr>
											<th scope="row">3</th>
											<td>مدت زمان</td>
											<td><?php echo "$duration"; ?> <b>دقیقه.</b></td>
										</tr>

										<tr>
											<th scope="row">4</th>
											<td>زمان آزمون مجدد</td>
											<td><?php
												if ($record_found == "1") {
													echo convert_gregorian_to_jalali($retake_date);
												} else {
													echo convert_gregorian_to_jalali($next_retake);
												}
												?>
											</td>
										</tr>

										<tr>
											<th scope="row">5</th>
											<td>نمره قبولی</td>
											<td><?php echo "$passmark"; ?></td>
										</tr>

										<tr>
											<th scope="row">6</th>
											<td>سوالات</td>
											<td><b><?php echo $question_count; ?></b></td>
										</tr>

										</tbody>
									</table>
								</div>
							</div>
						</div>

					</div>

				</div>

				<div class="col-md-6">
					<div class="panel panel-white">
						<div class="panel-heading">
							<h3 class="panel-title">قوانین و مقررات</h3>
						</div>
						<div class="panel-body">
							<?php echo "$terms"; ?>
						</div>
					</div>
				</div>

				<div class="col-md-6">
					<div class="panel panel-white">
						<div class="panel-heading">
							<h3 class="panel-title">آزمون</h3>
						</div>
						<div class="panel-body">
							<?php
							if ($record_found == "1") {
								if ($td >= 0) {
									if ($dcc > 1) {
										print '
								<div class="alert alert-warning" role="alert">
                                این امتحان قبلاً منقضی شده است.
                                </div>';
									} else {
										$_SESSION['current_examid'] = $exam_id;
										$_SESSION['student_retake'] = 1;
										print '
                                 <div class="alert alert-success" role="alert">
                                  موفق باشید
                                    </div>
									'; ?>

										<a
											onclick="return confirm('برای شروع اماده اید؟')"
											class="btn btn-success"
											href="<?php echo base_url() ?>index.php/exam/Assessment/<?php echo $row->exam_id ?>"
										>
											آزمون مجدد
										</a>

										<?php
									}

								} else {
									print '
								<div class="alert alert-warning" role="alert">
                                تاریخ امتحان مجدد:  
                                ' . convert_gregorian_to_jalali($retake_date) . '
                                </div>';
								}

							} else {
								$_SESSION['current_examid'] = $exam_id;
								$_SESSION['student_retake'] = 0;

								if ($question_count > 0) {
									print '
	 								 <div  class="alert alert-success"  role="alert"> موفق باشید </div>
	 								 	<a
											onclick="return confirm(\'برای شروع آزمون اماده اید؟\')"
											class="btn btn-success"
											href="'.base_url().'index.php/exam/Assessment/'.$row->exam_id .'"
										>
										شروع آزمون
										</a>
									';
								} else {
									print '
									<div  class="alert alert-success"  role="alert"> برای این آزمون سوالی ثبت نشده است. لطفا در روزهای آینده بررسی کنید. </div>
								';
								}

								?>

								<?php
							}
							?>
						</div>
					</div>
				</div>

				<div class="col-md-6">
					<div class="panel panel-white">
						<div class="panel-heading">
							<h3 class="panel-title">تاریخچه آزمون</h3>
						</div>
						<div class="panel-body">
							<?php
							if ($record_found == "1") {
								print '
                                <div class="alert alert-info" role="alert">
							    	شما این امتحان را در تاریخ
                                    <strong>' . convert_gregorian_to_jalali($take_date) . '</strong>
                                    با نمره 
                                    <strong>' . $score . '</strong>
                                    گذرانده اید.
								</div>
                                    ';

							} else {
								print '
                                	<div class="alert alert-info" role="alert">
                                  		هیچ داده ای پیدا نشد.
									</div>';
							}
							?>
						</div>
					</div>
				</div>
			</div>

		</div>
		<div class="page-footer">
			<p class="no-s">
				<?php echo date('Y'); ?>&copy; Developed by
				<a href="https://www.instagram.com/afsoonaslanii/" target="_blank">Afsoon Aslanii</a>.
			</p>
		</div>
	</div>
</main>

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
<script src="<?php echo $url; ?>/assets/plugins/waypoints/jquery.waypoints.min.js"></script>
<script src="<?php echo $url; ?>/assets/plugins/jquery-counterup/jquery.counterup.min.js"></script>
<script src="<?php echo $url; ?>/assets/plugins/toastr/toastr.min.js"></script>
<script src="<?php echo $url; ?>/assets/plugins/flot/jquery.flot.min.js"></script>
<script src="<?php echo $url; ?>/assets/plugins/flot/jquery.flot.time.min.js"></script>
<script src="<?php echo $url; ?>/assets/plugins/flot/jquery.flot.symbol.min.js"></script>
<script src="<?php echo $url; ?>/assets/plugins/flot/jquery.flot.resize.min.js"></script>
<script src="<?php echo $url; ?>/assets/plugins/flot/jquery.flot.tooltip.min.js"></script>
<script src="<?php echo $url; ?>/assets/plugins/curvedlines/curvedLines.js"></script>
<script src="<?php echo $url; ?>/assets/plugins/metrojs/MetroJs.min.js"></script>
<script src="<?php echo $url; ?>/assets/js/modern.js"></script>
<script src="<?php echo $url; ?>/assets/js/canvasjs.min.js"></script>

</body>
</html>
