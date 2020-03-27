<?php
require_once(APPPATH.'utils/convert_gregorian_to_jalali.php');;
$url = 'http://otee.ir';

$myavatar = (count($query) > 0 ? $query[0]->picture : NULL);
$myfname = (count($query) > 0 ? $query[0]->firstname : " ");
$mylname = (count($query) > 0 ? $query[0]->lastname : "");
$mygender = (count($query) > 0 ? $query[0]->gender : NULL);
$student_id = $query[0]->user_id;

$result = $record;

?>
<!DOCTYPE html>
<html>

<head>
	<title>او تی | نتایج امتحان</title>

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
			<h3>نتایج امتحان ها</h3>
			<div class="page-breadcrumb">
				<ol class="breadcrumb">
					<li><a href="<?php echo base_url(); ?>index.php/exam">امتحان ها</a></li>
<!--					<li class="active">--><?php //echo "$exam_name"; ?><!--</li>-->
				</ol>
			</div>
		</div>
		<div id="main-wrapper">
			<div class="row">


				<?php
				if (count($result) > 0) {

					foreach ($result as $row) {
						print '
						<div class="col-md-6">
					<div class="panel panel-white">
							<div class="panel-heading">
								<h4 class="panel-title">اطلاعات آزمون</h4>
							</div>
							<div class="panel-body">
								<div class="table-responsive project-stats">
									<table class="table">
										</thead>
										<tbody>
										<tr>
											<th scope="row">1</th>
											<td>نام آزمون</td>
											<td>';
												echo $row->exam_title;
												print'
											</td>
										</tr>
										<tr>
											<th scope="row">2</th>
											<td>نام دانش آموز</td>
											<td>';
												echo "$myfname $mylname";
											print'
											</td>
										</tr>
										<tr>
											<th scope="row">3</th>
											<td>نمره</td>
											<td>';
											echo $row->score;
											print'</td>
										</tr>

										<tr>
											<th scope="row">4</th>
											<td>تاریخ</td>
											<td>';
											echo convert_gregorian_to_jalali($row->take_date);
											print'</td>
										</tr>

										<tr>
											<th scope="row">5</th>
											<td>زمان آزمون مجدد</td>
											<td>';
											echo convert_gregorian_to_jalali($row->retake_date);
											print'</td>
										</tr>

										<tr>
											<th scope="row">6</th>
											<td>وضعیت</td>
											<td>';

												if ($row->status_student == "PASS") {
													print '
                                <div class="alert alert-success" role="alert">
                                   قبول
                                </div>';
												} else {
													print '
                                <div class="alert alert-danger" role="alert">
                                  مردود
                                </div>';
												}
											print '
											</td>
										</tr>

										</tbody>
									</table>
								</div>
							</div>
						</div>
				</div>
						';
					}
				}else{
					print '
					<div class="alert alert-info" role="alert">
                                       اطلاعاتی در پایگاه داده یافت نشد.
                                    </div>
					';
				}
				?>

			</div>
		</div>

		<div class="page-footer">
			<p class="no-s">
				<?php echo date('Y'); ?> &copy; Developed by
				<a href="https://www.instagram.com/afsoonaslanii/" target="_blank">Afsoon aslani</a>.
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
