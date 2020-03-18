<?php
$url = 'http://otee.ir';

$myavatar = (count($query)>0 ? $query[0]->student_picture : NULL);
$myfname = (count($query)>0 ? $query[0]->student_fname : " ");
$mylname = (count($query)>0 ? $query[0]->student_lname : "");
$mygender = (count($query)>0 ? $query[0]->gender : NULL);
$student_id = $query[0]->student_id;

$result = $record;

if (count($result) > 0) {
    
    foreach ($result as $row) {
    $exam_name = $row->exam_title;
	$score = $row->score;
	$status = $row->status_student;
	$next_retake = $row->retake_date;
	$taking_date = $row->take_date;
    }
} else {
    header("location:./");
}

 ?>
<!DOCTYPE html>
<html>
    
<head>
        
        <title>OES | Take Assessment</title>
        
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
                    <a href="profile"><i class="fa fa-user"></i><span>Profile</span></a>
                    <a href="logout"><i class="fa fa-sign-out"></i><span>Logout</span></a>
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
                        <li><a href="<?php echo base_url();?>index.php/dashboard" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-home"></span><p>Dashboard</p></a></li>
                        <li><a href="<?php echo base_url();?>index.php/exam" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-book"></span><p>Examinations</p></a></li>
                        <li><a href="<?php echo base_url();?>index.php/result" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-certificate"></span><p>Exam Results</p></a></li>

                    </ul>
                </div>
            </div>
            <div class="page-inner">
                <div class="page-title">
                    <h3>Assessment Results</h3>
                    <div class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li><a href="<?php echo base_url(); ?>index.php/exam">Assessments</a></li>
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
                                    <h4 class="panel-title">Results Information</h4>
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
                                                   <td>Student_name</td>
                                                   <td><?php echo "$myfname $mylname"; ?></td>
                                               </tr>
											    <tr>
                                                   <th scope="row">3</th>
                                                   <td>Score</td>
                                                   <td><?php echo "$score"; ?>%</td>
                                               </tr>

											   
											  <tr>
                                                   <th scope="row">4</th>
                                                   <td>Next Re-take</td>
                                                   <td><?php echo "$next_retake";?></td>
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
                                    <h3 class="panel-title">Status</h3>
                                </div>
                                <div class="panel-body">
                                <?php
								if ($status == "PASS") {
								print '
                                <div class="alert alert-success" role="alert">
                                        Well done! You have pass this examination.
                                    </div>';								
								}else{
																print '
                                <div class="alert alert-danger" role="alert">
                                       You have fail to pass this examination.
                                    </div>';		
									
								}
								
								?>
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
