<?php
$url = 'http://otee.ir';

$myavatar = (count($query)>0 ? $query[0]->student_picture : NULL);
$myfname = (count($query)>0 ? $query[0]->student_fname : " ");
$mylname = (count($query)>0 ? $query[0]->student_lname : "");
$mygender = (count($query)>0 ? $query[0]->gender : NULL);

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
        $next_retake = date('m/d/Y', strtotime($today_date. ' + '.$reexam.' days'));
        $dcv = date_format(date_create_from_format('m/d/Y', $deadline), 'Y/m/d');

        if ($status == '0') {
            header("location:./");
        }
    }
} else {
    header("location:./");
}
$quest = 0;
$sql = $question;

if (count($sql)> 0) {

    foreach ($sql as $row) {
        $quest++;
    }
}

//ag ghablan em dade bashe
$result = $st_record;

if (count($result) > 0) {
    foreach ($result as $row) {
        $class_id = $row->class_id;
        $record_found = 1;
        $score = $row->score;
        $status =$row->status_student;
        $take_date = $row->take_date;
        $retake_date = $row->retake_date;
        $today_date = date('Y/m/d');
        $retakeconv = date_format(date_create_from_format('m/d/Y', $retake_date), 'Y/m/d');
        $tc = strtotime($today_date);
        $rc = strtotime($retakeconv);
        $dc = strtotime($dcv);
        $td = ($tc - $rc)/86400;
        $dcc = ($tc - $dc)/86400;
    }
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>OES | Take Assessment</title>

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
	$active_sidebar_item = '';
	require('layout/sidebar.php');
	?>

    <div class="page-inner">
        <div class="page-title">
            <h3>Take Assessment</h3>
            <div class="page-breadcrumb">
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url();?>index.php/examinations">Assessments</a></li>
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
                                <h4 class="panel-title">Examination Properties</h4>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive project-stats">
                                    <table class="table">
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Exam Name</td>
                                            <td><?php echo "$exam_name"; ?></td>
                                        </tr>

                                        <tr>
                                            <th scope="row">2</th>
                                            <td>Deadline</td>
                                            <td><?php echo "$deadline"; ?></td>
                                        </tr>

                                        <tr>
                                            <th scope="row">3</th>
                                            <td>Duration</td>
                                            <td><?php echo "$duration"; ?> <b>min.</b></td>
                                        </tr>

                                        <tr>
                                            <th scope="row">4</th>
                                            <td>Next Re-take</td>
                                            <td><?php
                                                if ($record_found == "1") {
                                                    echo "$retake_date";
                                                }else{
                                                    echo "$next_retake";
                                                }

                                                ?></td>
                                        </tr>

                                        <tr>
                                            <th scope="row">5</th>
                                            <td>Passmark</td>
                                            <td><?php echo "$passmark"; ?>%</td>
                                        </tr>

                                        <tr>
                                            <th scope="row">6</th>
                                            <td>Questions</td>
                                            <td><b><?php echo "$quest"; ?></b></td>
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
                            <h3 class="panel-title">Terms and conditions</h3>
                        </div>
                        <div class="panel-body">
                            <?php echo "$terms"; ?>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="panel panel-white">
                        <div class="panel-heading">
                            <h3 class="panel-title">Take Assessment</h3>
                        </div>
                        <div class="panel-body">
                            <?php
                            if ($record_found == "1") {
                                if ($td >= 0){
                                    if ($dcc > 1){
                                        print '
								<div class="alert alert-warning" role="alert">
                                The exam is already expired.
                                </div>';
                                    }else{
                                        $_SESSION['current_examid'] = $exam_id;
                                        $_SESSION['student_retake'] = 1;
                                        print '
                                 <div class="alert alert-success" role="alert">
                                  You are good to go.
                                    </div>
									'; ?>

                                        <a onclick="return confirm('Are you sure you want to begin ?')" class="btn btn-success" href="http://otee.ir/student/index.php/exam/Assessment/<?php echo $row->exam_id ?>">Retake Assessment</a>

                                        <?php
                                    }

                                }else{
                                    print '
								<div class="alert alert-warning" role="alert">
                                You will be able to retake this exam on '.$retake_date.'
                                </div>';
                                }

                            }else{
                                $_SESSION['current_examid'] = $exam_id;
                                $_SESSION['student_retake'] = 0;
                                print '
                                 <div class="alert alert-success" role="alert">
                                  You are good to go.
                                    </div>

									'; ?>
                                <a onclick="return confirm('Are you sure you want to begin ?')" class="btn btn-success" href="http://otee.ir/student/index.php/exam/Assessment/<?php echo $row->exam_id ?>">Begin Assessment</a>

                                <?php
                            }

                            ?>

                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="panel panel-white">
                        <div class="panel-heading">
                            <h3 class="panel-title">Assessment History</h3>
                        </div>
                        <div class="panel-body">
                            <?php
                            if ($record_found == "1") {
                                print '
                                 <div class="alert alert-info" role="alert">
                                  You attend this exam on <strong>'.$take_date.'</strong> , your score was <strong>'.$score.'%</strong>
                                    </div>';

                            }else{
                                print '
                                 <div class="alert alert-info" role="alert">
                                  No records found.
                                    </div>';

                            }

                            ?>

                        </div>
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
