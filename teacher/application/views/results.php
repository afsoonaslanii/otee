<?php
require_once 'shared/convert_date.php';
$url = 'http://otee.ir';

$myavatar = (count($query) > 0 ? $query[0]->teacher_picture : NULL);
$myfname = (count($query) > 0 ? $query[0]->teacher_fname : "");
$mylname = (count($query) > 0 ? $query[0]->teacher_lname : "");
$mygender = (count($query) > 0 ? $query[0]->gender : NULL);


$ms = $ms;
$description = $description;
?>
<!DOCTYPE html>
<html>

<head>

	<title>او تی | مدیریت نتایج آزمون</title>

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
	$active_sidebar_item = 'result';
	$horizontal = false;
	require_once('layout/sidebar.php');
	?>

	<div class="page-inner">
		<div class="page-title">
			<h3>مدیریت نتایج آزمون</h3>
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
                                                <th>نام</th>
												<th>شناسه کلاس</th>
                                                <th>تاریخ</th>
                                                <th>مدت زمان</th>
												<th>امتیاز</th>
												<th>آزمون مجدد</th>
												<th>وضعیت</th>
                                                <th>عملیات</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>نام</th>
												<th>شناسه کلاس</th>
                                                <th>تاریخ</th>
                                                <th>مدت زمان</th>
												<th>امتیاز</th>
												<th>آزمون مجدد</th>
												<th>وضعیت</th>
                                                <th>عملیات</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>';

											foreach ($result as $row) {
												$status = $row->exam_status;
												if ($status == '1') {
													$st = '<p class="text-success">فعال</p>';
													$stl = '
                                                    <a href="pages/make_ex_in.php?id=' . $row->exam_id . '">
                                                    	غیرفعال کردن
													</a>';
												} else {
													$st = '<p class="text-danger">غیرفعال</p>';
													$stl = '
                                                    <a href="pages/make_ex_ac.php?id=' . $row->exam_id . '">
                                                    	فعال کردن
													</a>';
												}
												print '
										       <tr>
                                                <td>' . $row->exam_title . '</td>
												<td>' . $row->class_id . '</td>
                                                <td>' . convert_date($row->exam_date) . '</td>
												<td>' . $row->exam_duration . '<b> دقیقه.</b></td>
												<td>' . $row->passmark . '<b>%</b></td>
												<td>' . $row->re_exam . '<b> روز</b></td>
												<td>' . $st . '</td>
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
													<a href="' . base_url() . 'index.php/results/view_results/' . $row->exam_id . '">
													نمایش نتیجه
													</a>
													</li>
									                <li>
									                <a href="' . base_url() . 'index.php/results/summary/' . $row->exam_id . '">
									                خلاصه وضعیت
									                </a>
									                </li>
													
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
                                        اطلاعاتی پیدا نشد.
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
