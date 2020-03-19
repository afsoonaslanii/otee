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

    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta charset="UTF-8">
    <meta name="description" content="Online Examination System" />
    <meta name="keywords" content="Online Examination System" />
    <meta name="author" content="Bwire Charles Mashauri" />

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
    <link href="<?php echo $url; ?>/assets/plugins/pace-master/themes/blue/pace-theme-flash.css" rel="stylesheet"/>
    <link href="<?php echo $url; ?>/assets/plugins/uniform/css/uniform.default.min.css" rel="stylesheet"/>
    <link href="<?php echo $url; ?>/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo $url; ?>/assets/plugins/fontawesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo $url; ?>/assets/plugins/line-icons/simple-line-icons.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo $url; ?>/assets/plugins/offcanvasmenueffects/css/menu_cornerbox.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo $url; ?>/assets/plugins/waves/waves.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo $url; ?>/assets/plugins/switchery/switchery.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo $url; ?>/assets/plugins/3d-bold-navigation/css/style.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo $url; ?>/assets/plugins/slidepushmenus/css/component.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo $url; ?>/assets/plugins/weather-icons-master/css/weather-icons.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo $url; ?>/assets/plugins/metrojs/MetroJs.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo $url; ?>/assets/plugins/toastr/toastr.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo $url; ?>/assets/images/icon.png" rel="icon">
    <link href="<?php echo $url; ?>/assets/css/modern.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo $url; ?>/assets/css/themes/green.css" class="theme-color" rel="stylesheet" type="text/css"/>
    <link href="<?php echo $url; ?>/assets/css/custom.css" rel="stylesheet" type="text/css"/>

    <script src="<?php echo $url; ?>/assets/plugins/3d-bold-navigation/js/modernizr.js"></script>
    <script src="<?php echo $url; ?>/assets/plugins/offcanvasmenueffects/js/snap.svg-min.js"></script>

</head>

<body class="page-header-fixed">
<div class="overlay"></div>
<div class="menu-wrap">
    <nav class="profile-menu">
        <div class="profile">
            <?php
            if ($myavatar == NULL) {
                print'<img width="60" src="http://otee.ir/assets/images/'.$mygender.'.png" alt="'.$myfname.'">';
            }else{
                print '<img width="60" height="60" src="http://otee.ir/assets/images/'.$myavatar.'" alt="'.$myfname.'">';
            }

            ?>
            <span><?php echo "$myfname"; ?> <?php echo "$mylname"; ?></span></div>
        <div class="profile-menu-list">
            <a href="<?php echo base_url(); ?>index.php/profile"><i class="fa fa-user"></i><span>Profile</span></a>
            <a href="<?php echo base_url(); ?>index.php/logout"><i class="fa fa-sign-out"></i><span>خروج</span></a>
        </div>
    </nav>
    <button class="close-button" id="close-button">Close Menu</button>
</div>

<main class="page-content content-wrap">
    <div class="navbar">
        <div class="navbar-inner">
            <div class="sidebar-pusher">
                <a href="javascript:void(0);" class="waves-effect waves-button waves-classic push-sidebar">
                    <i class="fa fa-bars"></i>
                </a>
            </div>
            <div class="logo-box">
                <a href="" class="logo-text"><span>OES v4</span></a>
            </div>

            <div class="topmenu-outer">
                <div class="top-menu">
                    <ul class="nav navbar-nav navbar-right">


                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle waves-effect waves-button waves-classic" data-toggle="dropdown">
                                <span class="user-name"><?php echo "$myfname"; ?> <?php echo "$mylname"; ?><i class="fa fa-angle-down"></i></span>
                                <?php
                                if ($myavatar == NULL) {
                                    print' <img class="img-circle avatar"  width="40" height="40" src="http://otee.ir/assets/images/'.$mygender.'.png" alt="'.$myfname.'">';
                                }else{
                                    print '<img width="40" height="40" class="img-circle avatar" src="http://otee.ir/assets/images/'.$myavatar.'" alt="'.$myfname.'">';
                                }

                                ?>
                            </a>
                            <ul class="dropdown-menu dropdown-list" role="menu">
                                <li role="presentation"><a href="<?php echo base_url(); ?>index.php/profile"><i class="fa fa-user"></i>Profile</a></li>
                                <li role="presentation"><a href="<?php echo base_url(); ?>index.php/logout"><i class="fa fa-sign-out m-r-xs"></i>خروج</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/logout" class="log-out waves-effect waves-button waves-classic">
                                <span><i class="fa fa-sign-out m-r-xs"></i>خروج</span>
                            </a>
                        </li>
                        <li>

                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="page-sidebar sidebar">
        <div class="page-sidebar-inner slimscroll">
            <div class="sidebar-header">
                <div class="sidebar-profile">
                    <a href="javascript:void(0);" id="profile-menu-link">
                        <div class="sidebar-profile-image">
                            <?php
                            if ($myavatar == NULL) {
                                print' <img class="img-circle img-responsive" src="http://otee.ir/assets/images/'.$mygender.'.png" alt="'.$myfname.'">';
                            }else{
                                print '<img  src="http://otee.ir/assets/images/'.$myavatar.'" class="img-circle img-responsive"  alt="'.$myfname.'"/>';
                            }

                            ?>

                        </div>
                        <div class="sidebar-profile-details">
                            <span><?php echo "$myfname"; ?> <?php echo "$mylname"; ?><br><small>OES Student</small></span>
                        </div>
                    </a>
                </div>
            </div>
            <ul class="menu accordion-menu">
                <li class="active"><a href="<?php echo base_url();?>index.php/dashboard" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-home"></span><p>Dashboard</p></a></li>
                <li><a href="<?php echo base_url();?>index.php/exam" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-book"></span><p>Examinations</p></a></li>
                <li><a href="<?php echo base_url();?>index.php/result" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-certificate"></span><p>Exam Results</p></a></li>

            </ul>
        </div>
    </div>
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
