<?php
require_once(APPPATH.'utils/convert_gregorian_to_jalali.php');;
$url = 'http://otee.ir';

$ms = $ms;
$description = $description;

$myavatar = (count($query1) > 0 ? $query1[0]->picture : NULL);
$myfname = (count($query1) > 0 ? $query1[0]->firstname : "");
$mylname = (count($query1) > 0 ? $query1[0]->lastname : "");
$mygender = (count($query1) > 0 ? $query1[0]->gender : null);


$result = $query;

if (count($result) > 0) {

	foreach ($result as $row) {
		$exam_id = $row->exam_id;
		$exname = $row->exam_title;
		$exdate = convert_gregorian_to_jalali($row->exam_date);
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

	<title>او تی | ویرایش آزمون</title>

	<?php require_once 'shared/links.php' ?>

	<link href="<?php echo $url; ?>/assets/plugins/datatables/css/jquery.datatables.min.css" rel="stylesheet"
		  type="text/css"/>
	<link href="<?php echo $url; ?>/assets/plugins/datatables/css/jquery.datatables_themeroller.css" rel="stylesheet"
		  type="text/css"/>
	<link href="<?php echo $url; ?>/assets/plugins/x-editable/bootstrap3-editable/css/bootstrap-editable.css"
		  rel="stylesheet" type="text/css">
	<link href="<?php echo $url; ?>/assets/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo $url; ?>/assets/css/snack.css" rel="stylesheet" type="text/css"/>

	<link href="<?php echo $url; ?>/assets/plugins/summernote-master/summernote.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo $url; ?>/assets/plugins/bootstrap-datepicker/css/datepicker3.css" rel="stylesheet"
		  type="text/css"/>
	<link href="<?php echo $url; ?>/assets/plugins/bootstrap-colorpicker/css/colorpicker.css" rel="stylesheet"
		  type="text/css"/>
	<link href="<?php echo $url; ?>/assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet"
		  type="text/css"/>
	<link href="<?php echo $url; ?>/assets/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css"
		  rel="stylesheet" type="text/css"/>

	<link href="https://unpkg.com/persian-datepicker@1.2.0/dist/css/persian-datepicker.min.css" rel="stylesheet" type="text/css"/>

</head>
<body <?php if ($ms == "1") {
	print 'onload="myFunction()"';
} ?> class="page-header-fixed">

<?php require_once 'layout/profile-menu.php' ?>
<?php require_once 'layout/search-form.php' ?>

<main class="page-content content-wrap">
	<?php require_once 'layout/navbar.php' ?>

	<?php
	$active_sidebar_item = '';
	$horizontal = false;
	require_once('layout/sidebar.php');
	?>

	<div class="page-inner">
		<div class="page-title">
			<h3>ویرایش آزمون - <?php echo "$exname"; ?></h3>
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
											<label for="examtitle">نام آزمون</label>
											<input
												type="text"
												class="form-control"
												value="<?php echo "$exname"; ?>"
												placeholder="نام آزمون را وارد کنید"
												id="examtitle"
												name="examtitle"
												required
												autocomplete="off"
											/>
										</div>
										<div class="form-group">
											<label for="duration">زمان آزمون (دقیقه)</label>
											<input
												type="number"
												class="form-control"
												value="<?php echo "$exduration"; ?>"
												placeholder="مدت زمان آزمون (دقیقه)"
												id="duration"
												name="duration"
												required
												autocomplete="off"
											/>
										</div>
										<div class="form-group">
											<label for="passmark">امتیاز قبولی</label>
											<input
												type="number"
												class="form-control"
												value="<?php echo "$passmark"; ?>"
												placeholder="امتیاز قبولی را وارد کنید"
												id="passmark"
												name="passmark"
												required
												autocomplete="off"
											/>
										</div>
										<div class="form-group">
											<label for="reexam">
												امتحان مجدد ( فعال شدن امتحان در روز های آینده)
											</label>
											<input
												type="number"
												class="form-control" value="<?php echo "$reexam"; ?>"
												placeholder="امتحان مجدد پس از چند روز فعال شود؟"
												id="reexam"
												name="reexam"
												required
												autocomplete="off"
											/>
										</div>
										<div class="form-group">
											<label for="date">تاریخ پایان</label>
											<input
												type="text"
												class="form-control persian-date-picker"
												value="<?php echo "$exdate"; ?>"
												id="date"
												name="date"
												required
												autocomplete="off"
												placeholder="تاریخ پایان را انتخاب کنید"
											/>
										</div>
										<input type="hidden" name="exam_id" value="<?php echo "$exam_id"; ?>">

										<button type="submit" class="btn btn-primary">ثبت</button>
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
					href="https://www.instagram.com/beatsbybwire/" target="_blank">Bwire Charles Mashauri</a>.</p>
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

<script src="https://unpkg.com/persian-date@1.1.0/dist/persian-date.min.js"></script>
<script src="https://unpkg.com/persian-datepicker@1.2.0/dist/js/persian-datepicker.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $(".persian-date-picker").pDatepicker({
            initialValue : false,
            initialValueType:'persian',
            format : 'YYYY/M/D',
            calendar:{
                persian: {
                    locale: 'en'
                }
            }
        });
    });
</script>


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
