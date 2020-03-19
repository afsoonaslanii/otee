<?php
$url = 'http://otee.ir';

$ms = $ms;
$description = $description;

$myavatar = (count($query1)>0 ? $query1[0]->admin_picture : NULL);
$myfname = (count($query1)>0 ? $query1[0]->admin_fname : "");
$mylname = (count($query1)>0 ? $query1[0]->admin_lname : "");
$mygender = (count($query1)>0 ? $query1[0]->gender : null);



?>
<!DOCTYPE html>
<html>

<head>

    <title>OES | Manage Examinations</title>

	<?php require('shared/meta-tag.php') ?>

	<?php require('shared/links.php') ?>

    <link href="<?php echo $url; ?>/assets/plugins/offcanvasmenueffects/css/menu_cornerbox.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo $url; ?>/assets/plugins/datatables/css/jquery.datatables.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo $url; ?>/assets/plugins/datatables/css/jquery.datatables_themeroller.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo $url; ?>/assets/plugins/x-editable/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet" type="text/css">
    <link href="<?php echo $url; ?>/assets/plugins/bootstrap-datepicker/css/datepicker3.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo $url; ?>/assets/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo $url; ?>/assets/css/snack.css" rel="stylesheet" type="text/css"/>
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

	<?php require('layout/navbar.php'); ?>

	<?php
	$active_sidebar_item = 'exam';
	require('layout/sidebar.php');
	?>

	<div class="page-inner">
        <div class="page-title">
            <h3>Manage Examinations</h3>



        </div>
        <div id="main-wrapper">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">

                            <div class="panel panel-white">
                                <div class="panel-body">
                                    <div role="tabpanel">

                                        <ul class="nav nav-tabs" role="tablist">
                                            <li role="presentation" class="active"><a href="#tab1" role="tab" data-toggle="tab">course</a></li>
                                            <li role="presentation"><a href="#tab2" role="tab" data-toggle="tab">Add course</a></li>

                                            <li role="presentation"><a href="#tab5" role="tab" data-toggle="tab">Examinations</a></li>
                                            <li role="presentation"><a href="#tab6" role="tab" data-toggle="tab">Add Exam</a></li>
                                        </ul>

                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane active fade in" id="tab1">
                                                <div class="table-responsive">
                                                    <?php
                                                    $result = $showClass;

                                                    if (count($result) > 0) {
                                                        print '
										<table id="example" class="display table" style="width: 100%; cellspacing: 0;">
                                        <thead>
                                            <tr>
                                                <th>Course Name</th>
												<th>Course Code</th>
                                                <th>Teacher Name</th>
                                                <th>Teacher id</th>
                                                <th>status</th>
                                                <th>action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Course Name</th>
												<th>Course Code</th>
                                                <th>Teacher Name</th>
                                                <th>Teacher id</th>
                                                <th>status</th>
                                                <th>action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>';

                                                        foreach ($result as $row) {
                                                            $status = $row->course_status;
                                                            if ($status == "1") {
                                                                $st = '<p class="text-success">ACTIVE</p>';
                                                                $stl = '<a href="http://otee.ir/admin/index.php/exam/inactive_crs/'.$row->course_id.'">Make Inactive</a>';
                                                            }else{
                                                                $st = '<p class="text-danger">INACTIVE</p>';
                                                                $stl = '<a href="http://otee.ir/admin/index.php/exam/active_crs/'.$row->course_id.'">Make Active</a>';
                                                            }
                                                            print '
										       <tr>
                                                <td>'.$row->course_name.'</td>
												<td>'.$row->course_code.'</td>
                                                <td>'.$row->teacher_fname." ".$row->teacher_lname.'</td>
                                                <td>'.$row->teacher_id.'</td>
												<td>'.$st.'</td>
                                                <td><div class="btn-group" role="group">
                                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                    Select Action
                                                    <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li>'.$stl.'</li>
                                                    <li><a'; ?> onclick = "return confirm('Drop <?php echo $row->course_name; ?> ?')" <?php print ' href="http://otee.ir/admin/index.php/exam/drop_course/'.$row->course_code.'">Drop course</a></li>
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
                                            <div role="tabpanel" class="tab-pane fade" id="tab2">
                                                <form action="<?php echo base_url();?>index.php/exam/add_course" method="POST">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Course Name</label>
                                                        <input type="text" class="form-control" placeholder="Enter course name" name="coursename" required autocomplete="off">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Course Code</label>
                                                        <input type="number" class="form-control" placeholder="Enter course code" name="coursecode" required autocomplete="off">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Select Teacher</label>
                                                        <select class="form-control" name="teacherid" required>
                                                            <option value="" selected disabled>-Select Teacher</option>
                                                            <?php

                                                            $result = $teachers;

                                                            if (count($result) > 0) {

                                                                foreach($result as $row) {
                                                                    print '<option value="'.$row->teacher_id.'">'.$row->teacher_fname.' '.$row->teacher_lname.'</option>';
                                                                }
                                                            } else {

                                                            }
                                                            ?>

                                                        </select>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </form>
                                            </div>
                                            <div role="tabpanel" class="tab-pane fade" id="tab5">
                                                <div class="table-responsive">
                                                    <?php
                                                    $result = $query;
                                                    if (count($result) > 0) {
                                                        print '
										<table id="example" class="display table" style="width: 100%; cellspacing: 0;">
                                        <thead>
                                            <tr>
                                                 <th>Name</th>
												<th>Exam Date</th>
												<th>Exam duration (min)</th>
                                                <th>passmark</th>
                                                <th>re exam (day)</th>
												<th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Name</th>
												<th>Exam Date</th>
												<th>Exam duration (min)</th>
                                                <th>passmark</th>
                                                <th>re exam (day)</th>
												<th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>';

                                                        foreach ($result as $row) {
                                                            $status = $row->exam_status;
                                                            if ($status == "1") {
                                                                $st = '<p class="text-success">ACTIVE</p>';
                                                                $stl = '<a href="http://otee.ir/admin/index.php/exam/inactive_ex/'.$row->exam_id.'">Make Inactive</a>';
                                                            }else{
                                                                $st = '<p class="text-danger">INACTIVE</p>';
                                                                $stl = '<a href="http://otee.ir/admin/index.php/exam/active_ex/'.$row->exam_id.'">Make Active</a>';
                                                            }
                                                            print '
										       <tr>
                                                <td>'.$row->exam_title.'</td>
												<td>'.$row->exam_date.'</td>
                                                <td>'.$row->exam_duration.' min'.'</td>
                                                <td>'.$row->passmark.'</td>
												<td>'.$row->re_exam.'</td>
												<td>'.$st.'</td>
                                                <td><div class="btn-group" role="group">
                                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                    Select Action
                                                    <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li>'.$stl.'</li>
													<li><a href="http://otee.ir/admin/index.php/exam/edit_exam/'.$row->exam_id.'">Edit Exam</a></li>
													<li><a href="http://otee.ir/admin/index.php/question/view_question/'.$row->exam_id.'">View Questions</a></li>
													<li><a href="http://otee.ir/admin/index.php/exam/question/'.$row->exam_id.'">Add Questions</a></li>
                                                    <li><a'; ?> onclick = "return confirm('Drop <?php echo $row->exam_title; ?> ?')" <?php print ' href="http://otee.ir/admin/index.php/exam/drop_exam/'.$row->exam_id.'">Drop Exam</a></li>
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
                                            <div role="tabpanel" class="tab-pane fade" id="tab6">
                                                <form action="<?php echo base_url();?>index.php/exam/add_exam" method="POST">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Select course</label>
                                                        <select class="form-control" name="class_name" required>
                                                            <option value="" selected disabled>-Select active cours</option>
                                                            <?php
                                                            $result = $showActiveClass;

                                                            if (count($result) > 0) {
                                                                foreach($result as $row) {
                                                                    print '<option value="'.$row->class_id.'">'.$row->course_name.'</option>';
                                                                }
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Exam Name</label>
                                                        <input type="text" class="form-control" placeholder="Enter exam name" name="title" required autocomplete="off">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Exam Duration (Minutes)</label>
                                                        <input type="number" class="form-control" placeholder="Enter exam duration" name="duration" required autocomplete="off">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Passmark (%)</label>
                                                        <input type="number" class="form-control" placeholder="Enter passmark" name="passmark" required autocomplete="off">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">RE exam (if you take exam then show it again after some days)</label>
                                                        <input type="number" class="form-control" placeholder="Enter days to attempt" name="reexam" required autocomplete="off">
                                                    </div>
                                                    <div class="form-group">
                                                        <label >Deadline</label>
                                                        <input type="text" class="form-control date-picker" name="date" required autocomplete="off" placeholder="Select deadline">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Terms and conditions</label>
                                                        <textarea style="resize: none;" rows="6" class="form-control" placeholder="Enter Terms and conditions" name="terms" required autocomplete="off"></textarea>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Submit</button>

                                                </form>
                                            </div>
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
            <p class="no-s"><?php echo date('Y'); ?> &copy; Developed by <a href="https://www.instagram.com/afsoonaslanii/" target="_blank">Afsoon Aslanii</a>.</p>
        </div>
    </div>
</main>
<?php if ($ms == "1") {
    ?> <div class="alert alert-success" id="snackbar"><?php echo "$description"; ?></div> <?php
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
