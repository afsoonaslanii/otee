<?php
date_default_timezone_set('Asia/Tehran');

$url = 'http://otee.ir';

$myavatar = (count($query) > 0 ? $query[0]->student_picture : NULL);
$myfname = (count($query) > 0 ? $query[0]->student_fname : " ");
$mylname = (count($query) > 0 ? $query[0]->student_lname : "");
$mygender = (count($query) > 0 ? $query[0]->gender : NULL);
$student_id = $query[0]->student_id;

$exam_id = $_SESSION['current_examid'];
$retake_status = $_SESSION['student_retake'];
$result = $exam;

if (count($exam) > 0) {

	foreach ($result as $row) {
		$class_id = $row->class_id;
		$exam_name = $row->exam_title;
		$subject = '';
		$deadline = $row->exam_date;
		$duration = $row->exam_duration;
		$passmark = $row->passmark;
		$reexam = $row->re_exam;
		$terms = '';
		$status = $row->exam_status;
		$today_date = date('Y/m/d');
		$next_retake = date('Y/m/d', strtotime($today_date . ' + ' . $reexam . ' days'));
		$today_date = date('Y/m/d');
	}
} else {
	header("location:./");
}
?>
<!DOCTYPE html>
<html>

<head>
	<title>اوتی | امتحانات</title>

	<?php require('shared/links.php'); ?>

	<link href="<?php echo $url; ?>/assets/plugins/offcanvasmenueffects/css/menu_cornerbox.css" rel="stylesheet"
		  type="text/css"/>
	<link href="<?php echo $url; ?>/assets/css/snack.css" rel="stylesheet" type="text/css"/>
</head>
<body <?php if ($ms == "1") {
	print 'onload="myFunction()"';
} ?> class="page-header-fixed page-horizontal-bar">

<?php require('layout/profile-menu.php') ?>

<main class="page-content content-wrap container">
	<?php require('layout/navbar.php'); ?>

	<?php
	$active_sidebar_item = '';
	$horizontal = true;
	require('layout/sidebar.php');
	?>

	<div class="page-inner">
		<div class="page-title">
			<h3>امتحانات</h3>
			<div class="page-breadcrumb">
				<ol class="breadcrumb">
					<li><a href="./">خانه</a></li>
					<li><a href="<?php echo base_url(); ?>index.php/exam">امتحانات</a></li>
					<li class="active"><?php echo "$exam_name"; ?></li>
				</ol>
			</div>
		</div>
		<div id="main-wrapper">
			<div class="row">
				<div class="panel panel-white">
					<div class="panel-body">
						<div class="tabs-below" role="tabpanel">
							<form
								action="<?php echo base_url() ?>index.php/exam/submit_assessment"
								method="POST"
								name="quiz"
								id="quiz_form"
							>
								<div class="tab-content">
									<?php
									$result = $question;

									if (count($result) > 0) {
										$qno = 1;
										foreach ($result as $row) {
											$qsid = $row->question_id;
											$qs = $row->question;
											$type = 'MC';
											$op1 = $row->option1;
											$op2 = $row->option2;
											$op3 = $row->option3;
											$op4 = $row->option4;
											$ans = $row->answer;
											$enan = $row->$ans;
											$point = $row->point;
											if ($type == "FB") {
												if ($qno == "1") {
													print '
											<div role="tabpanel" class="tab-pane active fade in" id="tab' . $qno . '">
                                             <p><b>' . $qno . '.</b> ' . $qs . '</p>
											 <p><input type="text" name="an' . $qno . '"  class="form-control" placeholder="جواب خودرا وارد کنید" autocomplete="off">
											 <input type="hidden" name="qst' . $qno . '" value="' . base64_encode($qs) . '">
											 <input type="hidden" name="ran' . $qno . '" value="' . base64_encode($ans) . '">
                                             </div>
											';
												} else {
													print '
											<div role="tabpanel" class="tab-pane fade in" id="tab' . $qno . '">
                                             <p><b>' . $qno . '.</b> ' . $qs . '</p>
											 <p><input type="text" name="an' . $qno . '"  class="form-control" placeholder="جواب خودرا وارد کنید" autocomplete="off">
					                         <input type="hidden" name="qst' . $qno . '" value="' . base64_encode($qs) . '">
											 <input type="hidden" name="ran' . $qno . '" value="' . base64_encode($ans) . '">
                                             </div>
											';
												}
												$qno = $qno + 1;
											} else {

												if ($qno == "1") {
													print '
											<div role="tabpanel" class="tab-pane active fade in" id="tab' . $qno . '">
                                             <p><b>' . $qno . '.</b> ' . $qs . ' </p>
                                             <p>نمره سوال: ' . $point . '
                                             <input type="hidden" name="point' . $qno . '" value="' . $point . '"/>
                                             </p>
											 <p><input type="radio" name="an' . $qno . '"  class="form-control" value="' . $op1 . '"> ' . $op1 . '</p>
											 <p><input type="radio" name="an' . $qno . '"  class="form-control" value="' . $op2 . '"> ' . $op2 . '</p>
											 <p><input type="radio" name="an' . $qno . '"  class="form-control" value="' . $op3 . '"> ' . $op3 . '</p>
											 <p><input type="radio" name="an' . $qno . '"  class="form-control" value="' . $op4 . '"> ' . $op4 . '</p>
											 <input type="hidden" name="qst' . $qno . '" value="' . base64_encode($qs) . '">
											 <input type="hidden" name="ran' . $qno . '" value="' . base64_encode($enan) . '">
											 <input type="hidden" name="questionid" value="' . $qsid . '">
                                             </div>
											';
												} else {
													print '
											<div role="tabpanel" class="tab-pane fade in" id="tab' . $qno . '">
                                             <p><b>' . $qno . '.</b> ' . $qs . '</p>
                                             <p>نمره سوال: ' . $point . '
                                             <input type="hidden" name="point' . $qno . '" value="' . $point . '"/>
                                             </p>
											 <p><input type="radio" name="an' . $qno . '"  class="form-control" value="' . $op1 . '"> ' . $op1 . '</p>
											 <p><input type="radio" name="an' . $qno . '"  class="form-control" value="' . $op2 . '"> ' . $op2 . '</p>
											 <p><input type="radio" name="an' . $qno . '"  class="form-control" value="' . $op3 . '"> ' . $op3 . '</p>
											 <p><input type="radio" name="an' . $qno . '"  class="form-control" value="' . $op4 . '"> ' . $op4 . '</p>
											 <input type="hidden" name="qst' . $qno . '" value="' . base64_encode($qs) . '">
											 <input type="hidden" name="ran' . $qno . '" value="' . base64_encode($enan) . '">
											 <input type="hidden" name="questionid" value="' . $qsid . '">
                                             </div>
											';
												}
												$qno = $qno + 1;
											}

										}
									}

									?>
								</div>

								<ul class="nav nav-tabs" role="tablist">
									<?php
									$result = $question;

									if (count($result) > 0) {
										$qno = 1;
										$total_questions = 0;
										foreach ($result as $row) {
											$total_questions++;
											if ($qno == "1") {
												print '<li role="presentation" class="active"><a href="#tab' . $qno . '" role="tab" data-toggle="tab">' . $qno . '</a></li>';
											} else {
												print '<li role="presentation"><a href="#tab' . $qno . '" role="tab" data-toggle="tab">' . $qno . '</a></li>';
											}

											$qno = $qno + 1;
										}
									} else {

									}

									?>
									<input type="hidden" name="totalquestion" value="<?php echo "$total_questions"; ?>">
									<input type="hidden" name="examid" value="<?php echo "$exam_id"; ?>">
									<input type="hidden" name="studentid" value="<?php echo "$student_id"; ?>">
									<input type="hidden" name="classid" value="<?php echo "$class_id"; ?>">
									<input type="hidden" name="passmark" value="<?php echo "$passmark"; ?>">
									<input type="hidden" name="retake" value="<?php echo "$next_retake"; ?>">
								</ul>


						</div>
						<br>
						<input
							onclick="return confirm('آیا مطمئن هستید که می خواهید آزمون خود را ثبت کنید؟')"
							class="btn btn-success"
							type="submit"
							value="ثبت آزمون"
						>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="page-footer">
			<p class="no-s">
				<?php echo date('Y'); ?> &copy; Developed by
				<a href="https://www.instagram.com/afsoonaslanii/" target="_blank">Afsoon Aslanii</a>
				.
			</p>
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

<script type="text/javascript">
    var max_time = <?php echo "$duration" ?>;
    var c_seconds = 0;
    var total_seconds = 60 * max_time;
    max_time = parseInt(total_seconds / 60);
    c_seconds = parseInt(total_seconds % 60);
    document.getElementById("quiz-time-left").innerHTML = '' + max_time + ':' + c_seconds + 'Min';

    function init() {
        document.getElementById("quiz-time-left").innerHTML = '' + max_time + ':' + c_seconds + ' Min';
        setTimeout("CheckTime()", 999);
    }

    function CheckTime() {
        document.getElementById("quiz-time-left").innerHTML = '' + max_time + ':' + c_seconds + ' Min';
        if (total_seconds <= 0) {
            setTimeout('document.quiz.submit()', 1);

        } else {
            total_seconds = total_seconds - 1;
            max_time = parseInt(total_seconds / 60);
            c_seconds = parseInt(total_seconds % 60);
            setTimeout("CheckTime()", 999);
        }

    }

    init();
</script>
</body>

</html>


