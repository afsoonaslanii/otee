<?php
$url = 'http://otee.ir';

$myavatar = (count($query) > 0 ? $query[0]->teacher_picture : NULL);
$myfname = (count($query) > 0 ? $query[0]->teacher_fname : "");
$mylname = (count($query) > 0 ? $query[0]->teacher_lname : "");
$mygender = (count($query) > 0 ? $query[0]->gender : NULL);


//$teacher = $query_te;
//$students = $query_st;
//$examination = $exam_cont;
//$active_teacher = $active_tech;
//$inactive_teacher = $inactive_tech;

$teacher = '22';
$students = '22';
$examination = '22';
$active_teacher = '22';
$inactive_teacher = '22';
$fp = "fp";
$pp = "pp";
$notice = 66;
$questions = 77;
$banned_students = 88;

//$std_pass = $pass_st;
//$std_fails = $fail_st;

$std_pass = '22';
$std_fails = '22';
?>
<!DOCTYPE html>
<html>

<head>

	<title>او تی | پنل آموزگار</title>
	<?php require_once 'shared/links.php' ?>

	<link href="<?php echo $url; ?>/assets/plugins/weather-icons-master/css/weather-icons.min.css" rel="stylesheet"
		  type="text/css"/>
	<link href="<?php echo $url; ?>/assets/plugins/metrojs/MetroJs.min.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo $url; ?>/assets/plugins/toastr/toastr.min.css" rel="stylesheet" type="text/css"/>

</head>
<body class="page-header-fixed">

<?php require_once 'layout/profile-menu.php' ?>
<?php require_once 'layout/search-form.php' ?>

<main class="page-content content-wrap">

	<?php require_once 'layout/navbar.php' ?>

	<?php
	$active_sidebar_item = 'dashboard';
	$horizontal = false;
	require_once('layout/sidebar.php');
	?>

	<div class="page-inner">
		<div class="page-title">
			<h3>پنل آموزگار</h3>
			<div class="page-breadcrumb">
				<ol class="breadcrumb">
					<li><a href="<?php echo base_url(); ?>index.php/dashboard">خانه</a></li>
					<li class="active">پنل آموزگار</li>
				</ol>
			</div>
		</div>
		<div id="main-wrapper">
			<div class="row">
				<div class="col-lg-3 col-md-6">
					<div class="panel info-box panel-white">
						<div class="panel-body">
							<div class="info-box-stats">
								<p class="counter"><?php echo number_format($teacher); ?></p>
								<span class="info-box-title">آموزگاران</span>
							</div>
							<div class="info-box-icon">
								<i class="icon-user"></i>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="panel info-box panel-white">
						<div class="panel-body">
							<div class="info-box-stats">
								<p class="counter"><?php echo number_format($students); ?></p>
								<span class="info-box-title">دانش آموزان</span>
							</div>
							<div class="info-box-icon">
								<i class="icon-graduation"></i>
							</div>

						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="panel info-box panel-white">
						<div class="panel-body">
							<div class="info-box-stats">
								<p><span class="counter"><?php echo number_format($examination); ?></span></p>
								<span class="info-box-title">امتحان ها</span>
							</div>
							<div class="info-box-icon">
								<i class="icon-book-open"></i>
							</div>

						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="panel info-box panel-white">
						<div class="panel-body">
							<div class="info-box-stats">
								<p class="counter"><?php echo number_format($active_teacher); ?></p>
								<span class="info-box-title">آموزگاران فعال</span>
							</div>
							<div class="info-box-icon">
								<i class="icon-docs"></i>
							</div>
						</div>
					</div>
				</div>

				<div class="col-lg-3 col-md-6">
					<div class="panel info-box panel-white">
						<div class="panel-body">
							<div class="info-box-stats">
								<p class="counter"><?php echo number_format($inactive_teacher); ?></p>
								<span class="info-box-title">آموزگاران غیرفعال</span>
							</div>
							<div class="info-box-icon">
								<i class="icon-tag"></i>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="panel info-box panel-white">
						<div class="panel-body">
							<div class="info-box-stats">
								<p class="counter"><?php echo number_format($notice); ?></p>
								<span class="info-box-title">اطلاعیه ها</span>
							</div>
							<div class="info-box-icon">
								<i class="icon-list"></i>
							</div>

						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="panel info-box panel-white">
						<div class="panel-body">
							<div class="info-box-stats">
								<p><span class="counter"><?php echo number_format($questions); ?></span></p>
								<span class="info-box-title">سوالات</span>
							</div>
							<div class="info-box-icon">
								<i class="icon-question"></i>
							</div>

						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="panel info-box panel-white">
						<div class="panel-body">
							<div class="info-box-stats">
								<p class="counter"><?php echo number_format($banned_students); ?></p>
								<span class="info-box-title">دانش آموزان غیرمجاز</span>
							</div>
							<div class="info-box-icon">
								<i class="icon-lock"></i>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12 col-md-12">
					<div class="panel panel-white">
						<div class="row">
							<div class="col-sm-12">
								<div class="visitors-chart">
									<div class="panel-body">
										<div
											id="chartContainer"
											style="height: 370px; max-width: 920px; margin: 0 auto; direction: ltr"
										>

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

<script>
    window.onload = function () {

        var chart = new CanvasJS.Chart("chartContainer", {
            theme: "light1",
            exportEnabled: true,
            animationEnabled: true,
            title: {
                text: "نمودار دانش آموزان"
            },
            data: [{
                type: "pie",
                startAngle: 25,
                toolTipContent: "<b>{label}</b>: {y}",
                showInLegend: "true",
                legendText: "{label}",
                indexLabelFontSize: 14,
                indexLabel: "{label} - {y}",
                dataPoints: [
                    {y: <?php echo "$std_pass"; ?>, label: "دانش آموزان قبول شده"},
                    {y: <?php echo "$std_fails"; ?>, label: "دانش آموزان مردود شده"}

                ]
            }]
        });
        chart.render();

    }
</script>

</body>


</html>
