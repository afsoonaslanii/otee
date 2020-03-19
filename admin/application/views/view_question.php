<?php
$url = 'http://otee.ir';

$ms = $ms;
$description = $description;

$myavatar = (count($query1) > 0 ? $query1[0]->admin_picture : NULL);
$myfname = (count($query1) > 0 ? $query1[0]->admin_fname : "");
$mylname = (count($query1) > 0 ? $query1[0]->admin_lname : "");
$mygender = (count($query1) > 0 ? $query1[0]->gender : null);


$result = $exam;

if (count($result) > 0) {

	foreach ($result as $row) {
		$exam_name = $row->exam_title;
	}
} else {
	header("location:./");
}

?>
<!DOCTYPE html>
<html>

<head>


	<title>OES | View Exam</title>

	<?php require('shared/meta-tag.php') ?>

	<?php require('shared/links.php') ?>

	<link href="<?php echo $url; ?>/assets/plugins/offcanvasmenueffects/css/menu_cornerbox.css" rel="stylesheet"
		  type="text/css"/>


</head>
<body <?php if ($ms == "1") {
	print 'onload="myFunction()"';
} ?> class="page-header-fixed page-horizontal-bar">

<?php require('layout/profile-menu.php') ?>

<form class="search-form" action="search.php" method="GET">
	<div class="input-group">
		<input type="text" name="keyword" class="form-control search-input" placeholder="Search student..." required>
		<span class="input-group-btn">
                    <button class="btn btn-default close-search waves-effect waves-button waves-classic"
							type="button"><i class="fa fa-times"></i></button>
                </span>
	</div>
</form>
<main class="page-content content-wrap container">

	<?php require('layout/navbar.php'); ?>

	<?php
	$active_sidebar_item = 'question';
	require('layout/sidebar.php');
	?>

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
											<div role="tabpanel" class="tab-pane active fade in" id="tab' . $qno . '">
                                             <p><b>' . $qno . '.</b> ' . $qs . '</p>
											 <p><input type="text" name="' . $qno . '"  class="form-control" placeholder="Enter your answer">
											 <hr>
											 <a  class="btn btn-twitter m-b-xs"href="edit-question.php?id=' . $row->question_id . '"><i class="fa fa-pencil"></i></a>
											 <a'; ?> onclick = "return confirm('Drop this question ?')" <?php print 'class="btn btn-youtube m-b-xs"href="pages/drop_question.php?id=' . $row->question_id . '&eid=' . $exam_id . '"><i class="fa fa-trash-o"></i></a>
											 
                                             </div>
											';
											} else {
												print '
											<div role="tabpanel" class="tab-pane fade in" id="tab' . $qno . '">
                                             <p><b>' . $qno . '.</b> ' . $qs . '</p>
											 <p><input type="text" name="' . $qno . '"  class="form-control" placeholder="Enter your answer">
											 <hr>
											 <a  class="btn btn-twitter m-b-xs"href="edit-question.php?id=' . $row->question_id . '"><i class="fa fa-pencil"></i></a>
											 <a'; ?> onclick = "return confirm('Drop this question ?')" <?php print 'class="btn btn-youtube m-b-xs"href="pages/drop_question.php?id=' . $row->question_id . '&eid=' . $exam_id . '"><i class="fa fa-trash-o"></i></a>
                                             </div>
											';
											}

											$qno = $qno + 1;
										} else {

											if ($qno == "1") {

												print '
											<div role="tabpanel" class="tab-pane active fade in" id="tab' . $qno . '">
                                             <p><b>' . $qno . '.</b> ' . $qs . '</p>
											 <p><input type="radio" name="' . $qno . '"  class="form-control" value=' . $op1 . '> ' . $op1 . '</p>
											 <p><input type="radio" name="' . $qno . '"  class="form-control" value=' . $op2 . '> ' . $op2 . '</p>
											 <p><input type="radio" name="' . $qno . '"  class="form-control" value=' . $op3 . '> ' . $op3 . '</p>
											 <p><input type="radio" name="' . $qno . '"  class="form-control" value=' . $op4 . '> ' . $op4 . '</p>
											 <hr>
											 <a  class="btn btn-twitter m-b-xs"href="edit-question.php?id=' . $row->question_id . '"><i class="fa fa-pencil"></i></a>
											 <a'; ?> onclick = "return confirm('Drop this question ?')" <?php print 'class="btn btn-youtube m-b-xs"href="http://otee.ir/admin/index.php/question/drop_question/' . $row->question_id . '"><i class="fa fa-trash-o"></i></a>
                                             </div>
											';
											} else {
												print '
											<div role="tabpanel" class="tab-pane fade in" id="tab' . $qno . '">
                                             <p><b>' . $qno . '.</b> ' . $qs . '</p>
											 <p><input type="radio" name="' . $qno . '"  class="form-control" value=' . $op1 . '> ' . $op1 . '</p>
											 <p><input type="radio" name="' . $qno . '"  class="form-control" value=' . $op2 . '> ' . $op2 . '</p>
											 <p><input type="radio" name="' . $qno . '"  class="form-control" value=' . $op3 . '> ' . $op3 . '</p>
											 <p><input type="radio" name="' . $qno . '"  class="form-control" value=' . $op4 . '> ' . $op4 . '</p>
											 <hr>
											 <a  class="btn btn-twitter m-b-xs"href="edit-question.php?id=' . $row->question_id . '"><i class="fa fa-pencil"></i></a>
											 <a'; ?> onclick = "return confirm('Drop this question ?')" <?php print 'class="btn btn-youtube m-b-xs"href="pages/drop_question.php?id=' . $row->question_id . '&eid=' . $exam_id . '"><i class="fa fa-trash-o"></i></a>
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
											print '<li role="presentation" class="active"><a href="#tab' . $qno . '" role="tab" data-toggle="tab">Q' . $qno . '</a></li>';
										} else {
											print '<li role="presentation"><a href="#tab' . $qno . '" role="tab" data-toggle="tab">Q' . $qno . '</a></li>';
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
			<p class="no-s"><?php echo date('Y'); ?> &copy; Developed by <a
					href="https://www.instagram.com/afsoonaslanii/" target="_blank">Afsoon Aslanii</a>.</p>
		</div>
	</div>
</main>
<?php if ($ms == "1") {
	?>
	<div class="alert alert-success" id="snackbar"><?php echo "$description"; ?></div> <?php
} else {

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
        setTimeout(function () {
            x.className = x.className.replace("show", "");
        }, 3000);
    }
</script>
</body>

</html>
