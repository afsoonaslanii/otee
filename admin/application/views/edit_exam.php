<?php
$url = 'http://otee.ir';

$ms = $ms;
$description = $description;

$myavatar = (count($query1) > 0 ? $query1[0]->admin_picture : NULL);
$myfname = (count($query1) > 0 ? $query1[0]->admin_fname : "");
$mylname = (count($query1) > 0 ? $query1[0]->admin_lname : "");
$mygender = (count($query1) > 0 ? $query1[0]->gender : null);


$result = $query;

if (count($result) > 0) {

	foreach ($result as $row) {
		$exam_id = $row->exam_id;
		$exname = $row->exam_title;
		$exdate = $row->exam_date;
		$exduration = $row->exam_duration;
		$passmark = $row->passmark;
		$reexam = $row->re_exam;
	}
} else {
	header("location:./");
}

?>
<!DOCTYPE html>
<html>

<head>

	<title>OES | Edit Exam</title>

	<?php require('shared/meta-tag.php') ?>

	<?php require('shared/links.php') ?>

	<link href="<?php echo $url; ?>/assets/plugins/offcanvasmenueffects/css/menu_cornerbox.css" rel="stylesheet" type="text/css"/>

	<link href="<?php echo $url; ?>/assets/plugins/summernote-master/summernote.css" rel="stylesheet" type="text/css"/>

	<?php require('shared/plugins.php') ?>

</head>
<body <?php if ($ms == "1") {
	print 'onload="myFunction()"';
} ?> class="page-header-fixed">

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
<main class="page-content content-wrap">

	<?php require('layout/navbar.php'); ?>

	<?php
	$active_sidebar_item = 'exam';
	$horizontal = false;
	require('layout/sidebar.php');
	?>

	<div class="page-inner">
		<div class="page-title">
			<h3>Edit Exam - <?php echo "$exname"; ?></h3>


		</div>
		<div id="main-wrapper">
			<div class="row">
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-12">

							<div class="panel panel-white">
								<div class="panel-body">
									<form action="<?php echo base_url(); ?>index.php/exam/update_exam" method="POST">
										<div class="form-group">
											<label for="exampleInputEmail1">Exam Name</label>
											<input type="text" class="form-control" value="<?php echo "$exname"; ?>"
												   placeholder="Enter exam name" name="examtitle" required
												   autocomplete="off">
										</div>
										<div class="form-group">
											<label for="exampleInputEmail1">Exam Duration (Minutes)</label>
											<input type="number" class="form-control"
												   value="<?php echo "$exduration"; ?>"
												   placeholder="Enter exam duration" name="duration" required
												   autocomplete="off">
										</div>
										<div class="form-group">
											<label for="exampleInputEmail1">Passmark (%)</label>
											<input type="number" class="form-control" value="<?php echo "$passmark"; ?>"
												   placeholder="Enter passmark" name="passmark" required
												   autocomplete="off">
										</div>
										<div class="form-group">
											<label for="exampleInputEmail1">RE exam (if you take exam then show it again
												after some days)</label>
											<input type="number" class="form-control" value="<?php echo "$reexam"; ?>"
												   placeholder="Enter days to attempt" name="reexam" required
												   autocomplete="off">
										</div>
										<div class="form-group">
											<label>Deadline</label>
											<input type="text" class="form-control date-picker"
												   value="<?php echo "$exdate"; ?>" name="date" required
												   autocomplete="off" placeholder="Select deadline">
										</div>
										<input type="hidden" name="examid" value="<?php echo "$exam_id"; ?>">

										<button type="submit" class="btn btn-primary">Submit</button>
									</form>
								</div>
							</div>

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
        setTimeout(function () {
            x.className = x.className.replace("show", "");
        }, 3000);
    }
</script>
</body>

</html>
