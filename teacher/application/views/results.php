<?php
$url = 'http://otee.ir';

$myavatar = (count($query)>0 ? $query[0]->teacher_picture : NULL);
$myfname = (count($query)>0 ? $query[0]->teacher_fname : "");
$mylname = (count($query)>0 ? $query[0]->teacher_lname : "");
$mygender = (count($query)>0 ? $query[0]->gender : NULL);


$ms = $ms;
$description = $description;
?>
<!DOCTYPE html>
<html>

<head>

    <title>OES | Manage Results</title>

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
    <link href="<?php echo $url; ?>/assets/plugins/datatables/css/jquery.datatables.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo $url; ?>/assets/plugins/datatables/css/jquery.datatables_themeroller.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo $url; ?>/assets/plugins/x-editable/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet" type="text/css">
    <link href="<?php echo $url; ?>/assets/plugins/bootstrap-datepicker/css/datepicker3.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo $url; ?>/assets/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo $url; ?>/assets/images/icon.png" rel="icon">
    <link href="<?php echo $url; ?>/assets/css/modern.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo $url; ?>/assets/css/themes/green.css" class="theme-color" rel="stylesheet" type="text/css"/>
    <link href="<?php echo $url; ?>/assets/css/custom.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo $url; ?>/assets/css/snack.css" rel="stylesheet" type="text/css"/>
    <script src="<?php echo $url; ?>/assets/plugins/3d-bold-navigation/js/modernizr.js"></script>
    <script src="<?php echo $url; ?>/assets/plugins/offcanvasmenueffects/js/snap.svg-min.js"></script>


    <link href="<?php echo $url; ?>/assets/plugins/summernote-master/summernote.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo $url; ?>/assets/plugins/bootstrap-datepicker/css/datepicker3.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo $url; ?>/assets/plugins/bootstrap-colorpicker/css/colorpicker.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo $url; ?>/assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo $url; ?>/assets/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css"/>




</head>
<body <?php if ($ms == "1") { print 'onload="myFunction()"'; } ?>  class="page-header-fixed">
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
            <a href="profile.php"><i class="fa fa-user"></i><span>Profile</span></a>
            <a href="logout.php"><i class="fa fa-sign-out"></i><span>خروج</span></a>
        </div>
    </nav>
    <button class="close-button" id="close-button">Close Menu</button>
</div>
<form class="search-form" action="search.php" method="GET">
    <div class="input-group">
        <input type="text" name="keyword" class="form-control search-input" placeholder="Search student..." required>
        <span class="input-group-btn">
                    <button class="btn btn-default close-search waves-effect waves-button waves-classic" type="button"><i class="fa fa-times"></i></button>
                </span>
    </div>
</form>
<main class="page-content content-wrap">
    <div class="navbar">
        <div class="navbar-inner">
            <div class="sidebar-pusher">
                <a href="javascript:void(0);" class="waves-effect waves-button waves-classic push-sidebar">
                    <i class="fa fa-bars"></i>
                </a>
            </div>
            <div class="logo-box">
                <a href="./" class="logo-text"><span>OES v4</span></a>
            </div>
            <div class="search-button">
                <a href="javascript:void(0);" class="waves-effect waves-button waves-classic show-search"><i class="fa fa-search"></i></a>
            </div>
            <div class="topmenu-outer">
                <div class="top-menu">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="javascript:void(0);" class="waves-effect waves-button waves-classic show-search"><i class="fa fa-search"></i></a>
                        </li>

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
                                <li role="presentation"><a href="profile.php"><i class="fa fa-user"></i>Profile</a></li>
                                <li role="presentation"><a href="logout.php"><i class="fa fa-sign-out m-r-xs"></i>خروج</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="logout.php" class="log-out waves-effect waves-button waves-classic">
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
                            <span><?php echo "$myfname"; ?> <?php echo "$mylname"; ?><br><small>OES Administrator</small></span>
                        </div>
                    </a>
                </div>
            </div>
            <ul class="menu accordion-menu">
                <li><a href="<?php echo base_url();?>index.php/dashboard" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-home"></span><p>Dashboard</p></a></li>
                <li><a href="<?php echo base_url();?>index.php/exam" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-book"></span><p>Examinations</p></a></li>
                <li><a href="<?php echo base_url();?>index.php/question" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-question-sign"></span><p>Questions</p></a></li>
                <li class="active"><a href="<?php echo base_url();?>index.php/results" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-certificate"></span><p>Exam Results</p></a></li>

            </ul>
        </div>
    </div>
    <div class="page-inner">
        <div class="page-title">
            <h3>Manage Results</h3>



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
                                        $result = $query1;
                                        if (count($result) > 0) {
                                            print '
										<table id="example" class="display table" style="width: 100%; cellspacing: 0;">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
												<th>Class id</th>
                                                <th>Date</th>
                                                <th>Duration</th>
												<th>Passmark</th>
												<th>RE Exam</th>
												<th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Name</th>
												<th>Class id</th>
                                                <th>Date</th>
                                                <th>Duration</th>
												<th>Passmark</th>
												<th>RE Exam</th>
												<th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>';

                                            foreach ($result as $row) {
                                                $status = $row->exam_status;
                                                if ($status == '1') {
                                                    $st = '<p class="text-success">ACTIVE</p>';
                                                    $stl = '<a href="pages/make_ex_in.php?id='.$row->exam_id.'">Make Inactive</a>';
                                                }else{
                                                    $st = '<p class="text-danger">INACTIVE</p>';
                                                    $stl = '<a href="pages/make_ex_ac.php?id='.$row->exam_id.'">Make Active</a>';
                                                }
                                                print '
										       <tr>
                                                <td>'.$row->exam_title.'</td>
												<td>'.$row->class_id.'</td>
                                                <td>'.$row->exam_date.'</td>
												<td>'.$row->exam_duration.'<b> min.</b></td>
												<td>'.$row->passmark.'<b>%</b></td>
												<td>'.$row->re_exam.'<b> day(s)</b></td>
												<td>'.$st.'</td>
                                                <td><div class="btn-group" role="group">
                                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                    Select Action
                                                    <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu" role="menu">
                                                  
													<li><a href="http://otee.ir/teacher/index.php/results/view_results/'.$row->exam_id.'">View Results</a></li>
									                <li><a href="http://otee.ir/teacher/index.php/results/summary/'.$row->exam_id.'">Short Summary</a></li>
													
                                                </ul>
                                            </div></td>
          
                                            </tr>';
                                            }

                                            print '
									   </tbody>
                                       </table>  ';
                                        } else {
                                            print '
												<div class="alert alert-info" role="alert">
                                        Nothing was found in database.
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
            <p class="no-s"><?php echo date('Y'); ?> &copy; Developed by <a href="https://www.instagram.com/afsoonaslanii/" target="_blank">Afsoon Aslanii</a>.</p>
        </div>
    </div>
</main>
<?php if ($ms == "1") {
    ?> <div class="alert alert-success" id="snackbar"><?php echo "$description"; ?></div> <?php
}else{

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
<script src="<?php echo $url; ?>/assets/plugins/summernote-master/summernote.min.js"></script>
<script src="<?php echo $url; ?>/assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
<script src="<?php echo $url; ?>/assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>
<script src="<?php echo $url; ?>/assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
<script src="<?php echo $url; ?>/assets/js/pages/form-elements.js"></script>


<script>
    function myFunction() {
        var x = document.getElementById("snackbar");
        x.className = "show";
        setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
    }
</script>
</body>

</html>
