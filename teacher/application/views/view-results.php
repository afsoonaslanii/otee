<?php
require_once(APPPATH.'utils/convert_gregorian_to_jalali.php');;
$url = 'http://otee.ir';

$myavatar = (count($query) > 0 ? $query[0]->picture : NULL);
$myfname = (count($query) > 0 ? $query[0]->firstname : "");
$mylname = (count($query) > 0 ? $query[0]->lastname : "");
$mygender = (count($query) > 0 ? $query[0]->gender : NULL);

$ms = $ms;
$description = $description;

//$sql = "SELECT * FROM tbl_assessment_records WHERE exam_id = '$exam_id'";
//    $result = $query1;
//
//    if (count($result) > 0) {
//
//        foreach ($result as $row) {
//            $exam_name = $row->exam_title;
//        }
//    }
$exam_name = "test"
?>
<!DOCTYPE html>
<html>

<head>

	<title>او تی | <?php echo "$exam_name" ?> نتیجه</title>

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
			<h3><?php echo "$exam_name" ?> نتیجه</h3>
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
                                                <th>نام دانش آموز</th>
												<th>شناسه دانش آموز</th>
												<th>نام آزمون</th>
                                                <th>امتیاز</th>
                                                <th>وضعیت</th>
												<th>تاریخ</th>
												<th>تاریخ آزمون مجدد</th>
                                                <th>عملیات</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>نام دانش آموز</th>
												<th>شناسه دانش آموز</th>
												<th>نام آزمون</th>
                                                <th>امتیاز</th>
                                                <th>وضعیت</th>
												<th>تاریخ</th>
												<th>تاریخ آزمون مجدد</th>
                                                <th>عملیات</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>';

											foreach ($result as $row) {
												print '
										       <tr>
                                                <td>' . $row->firstname . '</td>
												<td>' . $row->user_id . '</td>
                                                <td>' . $row->exam_title . '</td>
                                                <td><b>' . $row->score . '%</b></td>
												<td>' . $row->status_student . '</td>
												<td>' . convert_gregorian_to_jalali($row->take_date) . '</td>
												<td>' . convert_gregorian_to_jalali($row->retake_date) . '</td>
												<td><div class="btn-group" role="group">
                                                <button 
                                                type="button"
                                                 class="btn btn-default dropdown-toggle" 
                                                 data-toggle="dropdown"
                                                  aria-expanded="false"
                                                  >
                                                    انتخاب
                                                    <span class="caret"></span>
                                                </button>
                                               <ul class="dropdown-menu" role="menu">
                                                  
                          <li>
                          <a onclick = "return confirm(\'فعال سازی مجدد آزمون برای ' . $row->firstname . '?\')"  href="pages/re-activate.php/">فعال سازی مجدد</a></li>
                                  
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
                                        اطلاعاتی برای نمایش وجود ندارد.
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
			<p class="no-s"><?php echo date('Y'); ?> &copy; Developed by <a
					href="https://www.instagram.com/afsoonaslanii/" target="_blank">Afsoon Aslanii</a>.</p>
		</div>
	</div>
</main>
<?php if ($ms == "1") {
	?>
	<div class="alert alert-success" id="snackbar"><?php echo "$description"; ?></div> <?php
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
