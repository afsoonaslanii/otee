<?php
$url = 'http://localhost/iQuiz';

$myavatar = (count($query)>0 ? $query[0]->admin_picture : NULL);
$myfname = (count($query)>0 ? $query[0]->admin_fname : "");
$mylname = (count($query)>0 ? $query[0]->admin_lname : "");
$mygender = (count($query)>0 ? $query[0]->gender : NULL);

$ms = $ms;
$description = $description;

// "SELECT * FROM tbl_examinations WHERE exam_id = '$exam_id'";
$result = $query1;

if (count($result) > 0) {

    foreach ($result as $row) {
     $exam_id = $row->exam_id;
     $excate = "";
	 $exsubject = "";
	 $exname = $row->exam_title;
	 $exdate = $row->exam_date;
	 $exduration = $row->exam_duration;
	 $expassmark = $row->passmark;
	 $exreex = $row->re_exam;
	 $exterms = $row->exam_terms;
    }
} else {
    header("location:./");
}

$stdpass = 0;
$stdfail = 0;

//"SELECT * FROM tbl_assessment_records WHERE exam_id = '$exam_id'";
$result = $query2;

if (count($result) > 0) {
   
    foreach ($result as $row) {
     $status = $row->status_student;
	 if ($status == "PASS"){
		 $stdpass++;
	 }else{
		$stdfail++; 
		 
	 }
    }
}

?>
<!DOCTYPE html>
<html>
   
<head>
        
        <title>OES | Short Summary</title>
        
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
                    print'<img width="60" src="http://localhost/iQuiz/assets/images/'.$mygender.'.png" alt="'.$myfname.'">';
                }else{
                    print '<img width="60" height="60" src="http://localhost/iQuiz/assets/images/'.$myavatar.'" alt="'.$myfname.'">';
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
                                            print' <img class="img-circle avatar"  width="40" height="40" src="http://localhost/iQuiz/assets/images/'.$mygender.'.png" alt="'.$myfname.'">';
                                        }else{
                                            print '<img width="40" height="40" class="img-circle avatar" src="http://localhost/iQuiz/assets/images/'.$myavatar.'" alt="'.$myfname.'">';
                                        }
						
						                ?>
                                    </a>
                                    <ul class="dropdown-menu dropdown-list" role="menu">
                                        <li role="presentation"><a href="profile"><i class="fa fa-user"></i>Profile</a></li>
                                        <li role="presentation"><a href="logout"><i class="fa fa-sign-out m-r-xs"></i>Log out</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="logout" class="log-out waves-effect waves-button waves-classic">
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
                                    print' <img class="img-circle img-responsive" src="http://localhost/iQuiz/assets/images/'.$mygender.'.png" alt="'.$myfname.'">';
                                }else{
                                    print '<img  src="http://localhost/iQuiz/assets/images/'.$myavatar.'" class="img-circle img-responsive"  alt="'.$myfname.'"/>';
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
                        <li><a href="<?php echo base_url();?>index.php/teachers" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-user"></span><p>teacher</p></a></li>
                        <li><a href="<?php echo base_url();?>index.php/students" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon glyphicon-education"></span><p>Students</p></a></li>
                        <li><a href="<?php echo base_url();?>index.php/exam" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-book"></span><p>Examinations</p></a></li>
                        <li><a href="<?php echo base_url();?>index.php/question" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-question-sign"></span><p>Questions</p></a></li>
                        <li><a href="<?php echo base_url();?>index.php/results" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-certificate"></span><p>Exam Results</p></a></li>
                    </ul>
                </div>
            </div>
            <div class="page-inner">
                <div class="page-title">
                    <h3>Results Summary - <?php echo "$exname"; ?></h3>



                </div>
                <div id="main-wrapper">
                    <div class="row">
                        <div class="col-md-12">
						<div class="row">
                            <div class="col-md-12">

                                <div class="panel panel-white">
                                    <div class="panel-body">
									                               <div class="table-responsive project-stats col-md-4">  
                                       <table class="table">
                                           <tbody>
                                               <tr>
                                                   <th scope="row">1</th>
                                                   <td>Exam Name</td>
                                                   <td><?php echo "$exname"; ?></td>
                                               </tr>
											     <tr>
                                                   <th scope="row">2</th>
                                                   <td>Subject</td>
                                                   <td><?php echo "$exsubject"; ?></td>
                                               </tr>
											    <tr>
                                                   <th scope="row">3</th>
                                                   <td>Deadline</td>
                                                   <td><?php echo "$exdate"; ?></td>
                                               </tr>
											   
											    <tr>
                                                   <th scope="row">4</th>
                                                   <td>Duration</td>
                                                   <td><?php echo "$exduration"; ?> <b>min.</b></td>
                                               </tr>
											   
											   
											   <tr>
                                                   <th scope="row">5</th>
                                                   <td>Passmark</td>
                                                   <td><?php echo "$expassmark"; ?>%</td>
                                               </tr>
											   
					
                                              
                                           </tbody>
                                        </table>
                                    </div>
                                    <div class="col-md-8">
									<div id="chartContainer" style="height: 370px;"></div>
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
}
?>

        <div class="cd-overlay"></div>
<script src="<?php echo $url; ?>/assets/js/canvasjs.min.js"></script>
<script>
window.onload = function() {

var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
exportEnabled: true,
	data: [{
		type: "pie",
		startAngle: 240,
				showInLegend: "true",
		legendText: "{label}",
		indexLabel: "{label} - {y}",
		dataPoints: [
			{y: <?php echo "$stdpass"; ?>, label: "Passed Students"},
			{y: <?php echo "$stdfail"; ?>, label: "Failed Students"},

		]
	}]
});
chart.render();

}
</script>
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
