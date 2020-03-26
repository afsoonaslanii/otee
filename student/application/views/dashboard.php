<?php
$url = 'http://otee.ir';

$myavatar = (count($query)>0 ? $query[0]->picture : NULL);
$myfname = (count($query)>0 ? $query[0]->firstname : " ");
$mylname = (count($query)>0 ? $query[0]->lastname : "");
$mygender = (count($query)>0 ? $query[0]->gender : NULL);

$active_examinations = $active_exam;
$passed_exam = $pass;
$failed_exam = $fail;
?>
<!DOCTYPE html>
<html>

<head>
    <title>اوتی | پنل دانش آموز</title>

	<?php require('shared/links.php'); ?>

    <link href="<?php echo $url; ?>/assets/plugins/weather-icons-master/css/weather-icons.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo $url; ?>/assets/plugins/metrojs/MetroJs.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo $url; ?>/assets/plugins/toastr/toastr.min.css" rel="stylesheet" type="text/css"/>

</head>

<body class="page-header-fixed">

<?php require('layout/profile-menu.php') ?>

<main class="page-content content-wrap">
	<?php require('layout/navbar.php'); ?>

	<?php
	$active_sidebar_item = 'dashboard';
	$horizontal = false;
	require('layout/sidebar.php');
	?>

    <div class="page-inner">
        <div class="page-title">
            <h3>پنل دانش آموز</h3>
            <div class="page-breadcrumb">
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url(); ?>index.php/dashboard">خانه</a></li>
                    <li class="active">پنل دانش آموز</li>
                </ol>
            </div>
        </div>
        <div id="main-wrapper">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="panel info-box panel-white">
                        <div class="panel-body">
                            <div class="info-box-stats">
                                <p><span class="counter"><?php echo number_format($active_examinations); ?></span></p>
                                <span class="info-box-title">آزمون های فعال</span>
                            </div>
                            <div class="info-box-icon">
                                <i class="icon-book-open"></i>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="panel info-box panel-white">
                        <div class="panel-body">
                            <div class="info-box-stats">
                                <p class="counter"><?php echo number_format($passed_exam); ?></p>
                                <span class="info-box-title">امتحان های قبول شده</span>
                            </div>
                            <div class="info-box-icon">
                                <i class="icon-like"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="panel info-box panel-white">
                        <div class="panel-body">
                            <div class="info-box-stats">
                                <p><span class="counter"><?php echo number_format($failed_exam); ?></span></p>
                                <span class="info-box-title">امتحانت قبول نشده</span>
                            </div>
                            <div class="info-box-icon">
                                <i class="icon-dislike"></i>
                            </div>

                        </div>
                    </div>
                </div>

<!--                <div class="col-lg-12 col-md-12">-->
<!--                    <div class="panel panel-white">-->
<!--                        <div class="panel-heading">-->
<!--                            <h4 class="panel-title">اطلاعات</h4>-->
<!--                        </div>-->
<!--                        <div class="panel-body">-->
<!--                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->



        </div>
        <div class="page-footer">
            <p class="no-s">
				<?php echo date('Y'); ?>
				&copy; Developed by
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
