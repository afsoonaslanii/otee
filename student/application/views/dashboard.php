<?php
$url = 'http://otee.ir';

$myavatar = (count($query)>0 ? $query[0]->student_picture : NULL);
$myfname = (count($query)>0 ? $query[0]->student_fname : " ");
$mylname = (count($query)>0 ? $query[0]->student_lname : "");
$mygender = (count($query)>0 ? $query[0]->gender : NULL);

$students_in_my_class = '44';
$active_examinations = count($active_exam);
$my_subjects = '44';
$passed_exam = count($pass);
$failed_exam = count($fail);
$locked_exams = count($inactive_exam);
$attended_exams = '44';
$notice = '44';
?>
<!DOCTYPE html>
<html>

<head>
    <title>OES | Student Dashboard</title>

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
	require('layout/sidebar.php');
	?>

    <div class="page-inner">
        <div class="page-title">
            <h3>Student Dashboard</h3>
            <div class="page-breadcrumb">
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url(); ?>index.php/dashboard">Home</a></li>
                    <li class="active">Student Dashboard</li>
                </ol>
            </div>
        </div>
        <div id="main-wrapper">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel info-box panel-white">
                        <div class="panel-body">
                            <div class="info-box-stats">
                                <p class="counter"><?php echo number_format($students_in_my_class); ?></p>
                                <span class="info-box-title">STUDENTS IN MY CLASS</span>
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
                                <p><span class="counter"><?php echo number_format($active_examinations); ?></span></p>
                                <span class="info-box-title">ACTIVE EXAMINATIONS</span>
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
                                <p class="counter"><?php echo number_format($my_subjects); ?></p>
                                <span class="info-box-title">SUBJECTS</span>
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
                                <p class="counter"><?php echo number_format($passed_exam); ?></p>
                                <span class="info-box-title">PASSED EXAMS</span>
                            </div>
                            <div class="info-box-icon">
                                <i class="icon-like"></i>
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
                                <p><span class="counter"><?php echo number_format($failed_exam); ?></span></p>
                                <span class="info-box-title">FAILED EXAMS</span>
                            </div>
                            <div class="info-box-icon">
                                <i class="icon-dislike"></i>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel info-box panel-white">
                        <div class="panel-body">
                            <div class="info-box-stats">
                                <p class="counter"><?php echo number_format($locked_exams); ?></p>
                                <span class="info-box-title">LOCKED EXAMS</span>
                            </div>
                            <div class="info-box-icon">
                                <i class="icon-lock"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="panel info-box panel-white">
                        <div class="panel-body">
                            <div class="info-box-stats">
                                <p class="counter"><?php echo number_format($attended_exams); ?></p>
                                <span class="info-box-title">ATTENDED EXAMS</span>
                            </div>
                            <div class="info-box-icon">
                                <i class="icon-check"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 col-md-12">
                    <div class="panel panel-white">
                        <div class="panel-heading">
                            <h4 class="panel-title">Notice</h4>
                        </div>
<!--                        <div class="panel-body">-->
<!--                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">-->
<!---->
<!--                                --><?php
//                                include '../database/config.php';
//                                $sql = "SELECT * FROM tbl_notice ORDER by id DESC";
//                                $result = $conn->query($sql);
//
//                                if ($result->num_rows > 0) {
//                                    $tabno = 1;
//                                    while($row = $result->fetch_assoc()) {
//                                        print '
//							<div class="panel panel-default">
//                            <div class="panel-heading" role="tab" id="heading'.$tabno.'">
//                            <h4 class="panel-title">
//                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse'.$tabno.'" aria-expanded="false" aria-controls="collapse'.$tabno.'">
//                            '.$row['title'].'
//                            </a>
//                            </h4>
//                            </div>
//                            <div id="collapse'.$tabno.'" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading'.$tabno.'">
//                            <div class="panel-body">
//                            '.$row['description'].'
//							<hr><i class="fa fa-calendar"></i> '.$row['post_date'].' | <i class="fa fa-refresh"></i> '.$row['last_update'].'
//                            </div>
//                            </div>
//                            </div>';
//                                        $tabno++;
//                                    }
//                                } else {
//                                    print '
//						<div class="alert alert-info" role="alert">
//                          Nothing was found in database.
//                        </div>';
//                                }
//                                $conn->close();
//
//                                ?>
<!---->
<!--                            </div>-->
<!--                        </div>-->
                    </div>
                </div>
            </div>



        </div>
        <div class="page-footer">
            <p class="no-s"><?php echo date('Y'); ?> &copy; Developed by <a href="https://www.instagram.com/afsoonaslanii/" target="_blank">Afsoon Aslanii</a>.</p>
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
