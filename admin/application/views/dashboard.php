<?php
$url = 'http://otee.ir';

$myavatar = (count($query) > 0 ? $query[0]->admin_picture : NULL);
$myfname = (count($query) > 0 ? $query[0]->admin_fname : "");
$mylname = (count($query) > 0 ? $query[0]->admin_lname : "");
$mygender = (count($query) > 0 ? $query[0]->gender : NULL);


$teacher = $query_te;
$students = $query_st;
$examination = $exam_cont;
$active_teacher = $active_tech;
$inactive_teacher = $inactive_tech;
$fp = "fp";
$pp = "pp";
$notice = 66;
$questions = 77;
$banned_students = 88;

$std_pass = $pass_st;
$std_fails = $fail_st;
?>
<!DOCTYPE html>
<html>

<head>

	<title>iQuiz | Admin Dashboard</title>

	<?php require('shared/meta-tag.php') ?>

	<?php require('shared/links.php') ?>

	<link href="<?php echo $url; ?>/assets/plugins/offcanvasmenueffects/css/menu_cornerbox.css" rel="stylesheet"
		  type="text/css"/>
	<link href="<?php echo $url; ?>/assets/plugins/weather-icons-master/css/weather-icons.min.css" rel="stylesheet"
		  type="text/css"/>
	<link href="<?php echo $url; ?>/assets/plugins/metrojs/MetroJs.min.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo $url; ?>/assets/plugins/toastr/toastr.min.css" rel="stylesheet" type="text/css"/>

</head>
<body class="page-header-fixed">
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
			<a href='<?php echo base_url(); ?>index.php/profile'><i class="fa fa-user"></i><span>Profile</span></a>
			<a href="<?php echo base_url(); ?>index.php/logout"><i class="fa fa-sign-out"></i><span>خروج</span></a>
		</div>
	</nav>
	<button class="close-button" id="close-button">خروج</button>
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
	$active_sidebar_item = 'dashboard';
	require('layout/sidebar.php');
	?>

	<div class="page-inner">
		<div class="page-title">
			<h3>Admin Dashboard</h3>
			<div class="page-breadcrumb">
				<ol class="breadcrumb">
					<li><a href="<?php echo base_url(); ?>index.php/dashboard">home</a></li>
					<li class="active">Admin dashboard</li>
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
								<span class="info-box-title">TEACHERS</span>
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
								<span class="info-box-title">STUDENTS</span>
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
								<span class="info-box-title">EXAMINATIONS</span>
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
								<span class="info-box-title">ACTIVE TEACHER</span>
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
								<span class="info-box-title">INACTIVE TEACHER</span>
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
								<span class="info-box-title">NOTICE</span>
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
								<span class="info-box-title">QUESTIONS</span>
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
								<span class="info-box-title">BANNED STUDENTS</span>
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
										<div id="chartContainer"
											 style="height: 370px; max-width: 920px; margin: 0 auto;"></div>
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
                text: "Piechart presentation of students assessments in FAIL and PASS"
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
                    {y: <?php echo "$std_pass"; ?>, label: "Student Passing Exams"},
                    {y: <?php echo "$std_fails"; ?>, label: "Student Failing Exams"}

                ]
            }]
        });
        chart.render();

    }
</script>

</body>


</html>
