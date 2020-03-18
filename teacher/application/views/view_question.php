<?php
$url = 'http://otee.ir';

$ms = $ms;
$description = $description;

$myavatar = (count($query1)>0 ? $query1[0]->teacher_picture : NULL);
$myfname = (count($query1)>0 ? $query1[0]->teacher_fname : "");
$mylname = (count($query1)>0 ? $query1[0]->teacher_lname : "");
$mygender = (count($query1)>0 ? $query1[0]->gender : null);


    $result = $exam;

    if (count($result) > 0) {

        foreach($result as $row) {
            $exam_name =$row->exam_title;
        }
    } else {
        header("location:./");
    }

?>
<!DOCTYPE html>
<html>

<head>


    <title>OES | View Exam</title>

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
    <link href="<?php echo $url; ?>/assets/images/icon.png" rel="icon">
    <link href="<?php echo $url; ?>/assets/css/modern.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo $url; ?>/assets/css/themes/green.css" class="theme-color" rel="stylesheet" type="text/css"/>
    <link href="<?php echo $url; ?>/assets/css/custom.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo $url; ?>/assets/css/snack.css" rel="stylesheet" type="text/css"/>
    <script src="<?php echo $url; ?>/assets/plugins/3d-bold-navigation/js/modernizr.js"></script>
    <script src="<?php echo $url; ?>/assets/plugins/offcanvasmenueffects/js/snap.svg-min.js"></script>

</head>
<body <?php if ($ms == "1") { print 'onload="myFunction()"'; } ?>   class="page-header-fixed page-horizontal-bar" >
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
            <a href="logout.php"><i class="fa fa-sign-out"></i><span>Logout</span></a>
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
<main class="page-content content-wrap container">
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
                    <ul class="nav navbar-nav navbar-left">
                        <li>


                    </ul>
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
                                <li role="presentation"><a href="logout.php"><i class="fa fa-sign-out m-r-xs"></i>Log out</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="logout.php" class="log-out waves-effect waves-button waves-classic">
                                <span><i class="fa fa-sign-out m-r-xs"></i>Log out</span>
                            </a>
                        </li>
                        <li>

                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="horizontal-bar sidebar">
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
                <li><a href="<?php echo base_url();?>index.php/results" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-certificate"></span><p>Exam Results</p></a></li>
            </ul>
        </div>
    </div>
    <div class="page-inner">
        <div class="page-title">
            <h3>View Examination</h3>
            <div class="page-breadcrumb">
                <ol class="breadcrumb">
                    <li><a href="./">Home</a></li>
                    <li><a href="examinations.php">Examinations</a></li>
                    <li class="active"><?php echo "$exam_name"; ?></li>
                </ol>
            </div>
        </div>
        <div id="main-wrapper">
            <div class="row">
                <div class="panel panel-white">
                    <div class="panel-body">
                        <div class="tabs-below" role="tabpanel">

                            <div class="tab-content">
                                <?php

                                $result = $question;

                                if (count($result) > 0) {
                                    $qno = 1;
                                    foreach ($result as $row) {
                                        $exam_id = $row->exam_id;
                                        $qs = $row->question;
                                        $type = 'MC';
                                        $op1 = $row->option1;
                                        $op2 = $row->option2;
                                        $op3 = $row->option3;
                                        $op4 = $row->option4;
                                        if ($type == "FB") {
                                            if ($qno == "1") {
                                                print '
											<div role="tabpanel" class="tab-pane active fade in" id="tab'.$qno.'">
                                             <p><b>'.$qno.'.</b> '.$qs.'</p>
											 <p><input type="text" name="'.$qno.'"  class="form-control" placeholder="Enter your answer">
											 <hr>
											 <a  class="btn btn-twitter m-b-xs"href="edit-question.php?id='.$row->question_id.'"><i class="fa fa-pencil"></i></a>
											 <a';?> onclick = "return confirm('Drop this question ?')" <?php print 'class="btn btn-youtube m-b-xs"href="pages/drop_question.php?id='.$row->question_id.'&eid='.$exam_id.'"><i class="fa fa-trash-o"></i></a>
											 
                                             </div>
											';
                                            }else{
                                                print '
											<div role="tabpanel" class="tab-pane fade in" id="tab'.$qno.'">
                                             <p><b>'.$qno.'.</b> '.$qs.'</p>
											 <p><input type="text" name="'.$qno.'"  class="form-control" placeholder="Enter your answer">
											 <hr>
											 <a  class="btn btn-twitter m-b-xs"href="edit-question.php?id='.$row->question_id.'"><i class="fa fa-pencil"></i></a>
											 <a';?> onclick = "return confirm('Drop this question ?')" <?php print 'class="btn btn-youtube m-b-xs"href="pages/drop_question.php?id='.$row->question_id.'&eid='.$exam_id.'"><i class="fa fa-trash-o"></i></a>
                                             </div>
											';
                                            }

                                            $qno = $qno + 1;
                                        }else{

                                            if ($qno == "1") {

                                                print '
											<div role="tabpanel" class="tab-pane active fade in" id="tab'.$qno.'">
                                             <p><b>'.$qno.'.</b> '.$qs.'</p>
											 <p><input type="radio" name="'.$qno.'"  class="form-control" value='.$op1.'> '.$op1.'</p>
											 <p><input type="radio" name="'.$qno.'"  class="form-control" value='.$op2.'> '.$op2.'</p>
											 <p><input type="radio" name="'.$qno.'"  class="form-control" value='.$op3.'> '.$op3.'</p>
											 <p><input type="radio" name="'.$qno.'"  class="form-control" value='.$op4.'> '.$op4.'</p>
											 <hr>
											 <a  class="btn btn-twitter m-b-xs"href="edit-question.php?id='.$row->question_id.'"><i class="fa fa-pencil"></i></a>
											 <a';?> onclick = "return confirm('Drop this question ?')" <?php print 'class="btn btn-youtube m-b-xs"href="http://otee.ir/teacher/index.php/question/drop_question/'.$row->question_id.'"><i class="fa fa-trash-o"></i></a>
                                             </div>
											';
                                            }else{
                                                print '
											<div role="tabpanel" class="tab-pane fade in" id="tab'.$qno.'">
                                             <p><b>'.$qno.'.</b> '.$qs.'</p>
											 <p><input type="radio" name="'.$qno.'"  class="form-control" value='.$op1.'> '.$op1.'</p>
											 <p><input type="radio" name="'.$qno.'"  class="form-control" value='.$op2.'> '.$op2.'</p>
											 <p><input type="radio" name="'.$qno.'"  class="form-control" value='.$op3.'> '.$op3.'</p>
											 <p><input type="radio" name="'.$qno.'"  class="form-control" value='.$op4.'> '.$op4.'</p>
											 <hr>
											 <a  class="btn btn-twitter m-b-xs"href="edit-question.php?id='.$row->question_id.'"><i class="fa fa-pencil"></i></a>
											 <a';?> onclick = "return confirm('Drop this question ?')" <?php print 'class="btn btn-youtube m-b-xs"href="pages/drop_question.php?id='.$row->question_id.'&eid='.$exam_id.'"><i class="fa fa-trash-o"></i></a>
                                             </div>
											';
                                            }

                                            $qno = $qno + 1;


                                        }

                                    }
                                } else {

                                }

                                ?>

                            </div>


                            <ul class="nav nav-tabs" role="tablist">
                                <?php

                                $result = $question;

                                if (count($result) > 0) {
                                    $qno = 1;
                                    foreach ($result as $row) {
                                        if ($qno == "1") {
                                            print '<li role="presentation" class="active"><a href="#tab'.$qno.'" role="tab" data-toggle="tab">Q'.$qno.'</a></li>';
                                        }else{
                                            print '<li role="presentation"><a href="#tab'.$qno.'" role="tab" data-toggle="tab">Q'.$qno.'</a></li>';
                                        }

                                        $qno = $qno + 1;
                                    }
                                } else {

                                }

                                ?>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-footer">
            <p class="no-s"><?php echo date('Y'); ?> &copy; Developed by <a href="https://www.instagram.com/beatsbybwire/" target="_blank">Bwire Charles Mashauri</a>.</p>
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
<script src="<?php echo $url; ?>/assets/js/modern.min.js"></script>

<script>
    function myFunction() {
        var x = document.getElementById("snackbar");
        x.className = "show";
        setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
    }
</script>
</body>

</html>
