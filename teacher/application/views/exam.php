<?php
require_once(APPPATH.'utils/convert_gregorian_to_jalali.php');;
$url = 'http://otee.ir';

$ms = $ms;
$description = $description;

$myavatar = (count($query1) > 0 ? $query1[0]->picture : NULL);
$myfname = (count($query1) > 0 ? $query1[0]->firstname : "");
$mylname = (count($query1) > 0 ? $query1[0]->lastname : "");
$mygender = (count($query1) > 0 ? $query1[0]->gender : null);


?>
<!DOCTYPE html>
<html>

<head>

	<title>او تی | مدیریت امتحان ها</title>

	<?php require_once 'shared/links.php' ?>

	<link href="<?php echo $url; ?>/assets/plugins/line-icons/simple-line-icons.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo $url; ?>/assets/plugins/waves/waves.min.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo $url; ?>/assets/plugins/switchery/switchery.min.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo $url; ?>/assets/plugins/3d-bold-navigation/css/style.css" rel="stylesheet" type="text/css"/>
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
	$active_sidebar_item = 'exam';
	$horizontal = false;
	require_once('layout/sidebar.php');
	?>

	<div class="page-inner">
		<div class="page-title">
			<h3>مدیریت امتحان ها</h3>


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
											<li role="presentation" class="active">
												<a href="#tab1" role="tab" data-toggle="tab">
													درس ها
												</a>
											</li>
											<li role="presentation">
												<a href="#tab2" role="tab" data-toggle="tab">
													افزودن درس
												</a>
											</li>

											<li role="presentation">
												<a href="#tab5" role="tab" data-toggle="tab">
													امتحان ها
												</a>
											</li>
											<li role="presentation">
												<a href="#tab6" role="tab" data-toggle="tab">
													افزودن آزمون
												</a>
											</li>
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
                                                <th>نام درس</th>
												<th>کد درس</th>
                                                <th>نام آموزگار</th>
                                                <th>شناسه آموزگار</th>
                                                <th>وضعیت</th>
                                                <th>عملیات</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>نام درس</th>
												<th>کد درس</th>
                                                <th>نام آموزگار</th>
                                                <th>شناسه آموزگار</th>
                                                <th>وضعیت</th>
                                                <th>عملیات</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>';

														foreach ($result as $row) {
															$status = $row->course_status;
															if ($status == "1") {
																$st = '<p class="text-success">فعال</p>';
																$stl = '
																<a href="' . base_url() . 'index.php/exam/inactive_crs/' . $row->course_id . '">
																غیرفعال کردن
																</a>';
															} else {
																$st = '<p class="text-danger">غیرفعال</p>';
																$stl = '
																<a href="' . base_url() . 'index.php/exam/active_crs/' . $row->course_id . '">
																فعال کردن
																</a>';
															}
															print '
										       <tr>
                                                <td>' . $row->course_name . '</td>
												<td>' . $row->course_code . '</td>
                                                <td>' . $row->firstname . " " . $row->lastname . '</td>
                                                <td>' . $row->user_id . '</td>
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
                                                    <li>' . $stl . '</li>
                                                    <li>
                                                    <a'; ?> onclick = "return confirm('حذف درس <?php echo $row->course_name; ?> ?')" <?php print ' href="' . base_url() . 'index.php/exam/drop_course/' . $row->course_code . '">
 													حذف درس
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
                                        اطلاعاتی یافت نشد.
                                    </div>';
													}
													?>
												</div>

											</div>
											<div role="tabpanel" class="tab-pane fade" id="tab2">
												<form
													action="<?php echo base_url(); ?>index.php/exam/add_course"
													method="POST"
												>
													<div class="form-group">
														<label for="coursename">نام درس</label>
														<input
															type="text"
															class="form-control"
															placeholder="نام درس مورد نظر را وارد کنید"
															id="coursename"
															name="coursename"
															required
															autocomplete="off"
														/>
													</div>
													<div class="form-group">
														<label for="coursecode">کد درس</label>
														<input
															type="number"
															class="form-control"
															placeholder="کد درس مورد نظر را وارد کنید"
															id="coursecode"
															name="coursecode"
															required
															autocomplete="off"
														/>
													</div>
													<!--                                                    <div class="form-group">-->
													<!--                                                        <label for="exampleInputEmail1">Select Teacher</label>-->
													<!--                                                        <select class="form-control" name="teacherid" required>-->
													<!--                                                            <option value="" selected disabled>-Select Teacher</option>-->
													<!--                                                            --><?php
													//
													//                                                            $result = $teachers;
													//
													//                                                            if (count($result) > 0) {
													//
													//                                                                foreach($result as $row) {
													//                                                                    print '<option value="'.$row->user_id.'">'.$row->firstname.' '.$row->lastname.'</option>';
													//                                                                }
													//                                                            } else {
													//
													//                                                            }
													//                                                            ?>
													<!---->
													<!--                                                        </select>-->
													<!--                                                    </div>-->
													<button type="submit" class="btn btn-primary">ثبت</button>
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
                                                 <th>نام</th>
												<th>تاریخ آزمون</th>
												<th>زمان آزمون (دقیقه)</th>
                                                <th>نمره قبولی</th>
                                                <th>امتحان مجدد (روز)</th>
												<th>وضعیت</th>
                                                <th>عملیات</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>نام</th>
												<th>تاریخ پایان آزمون</th>
												<th>زمان آزمون (دقیقه)</th>
                                                <th>نمره قبولی</th>
                                                <th>امتحان مجدد (روز)</th>
												<th>وضعیت</th>
                                                <th>عملیات</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>';

														foreach ($result as $row) {
															$status = $row->exam_status;
															if ($status == "1") {
																$st = '<p class="text-success">فعال</p>';
																$stl = '
																<a href="' . base_url() . 'index.php/exam/inactive_ex/' . $row->exam_id . '">
																غیرفعال کردن
																</a>';
															} else {
																$st = '<p class="text-danger">غیرفعال</p>';
																$stl = '
																<a href="' . base_url() . 'index.php/exam/active_ex/' . $row->exam_id . '">
																فعال کردن
																</a>';
															}
															print '
										       <tr>
                                                <td>' . $row->exam_title . '</td>
												<td>' . convert_gregorian_to_jalali($row->exam_date) . '</td>
                                                <td>' . $row->exam_duration . ' دقیقه' . '</td>
                                                <td>' . $row->passmark . '</td>
												<td>' . $row->re_exam . '</td>
												<td>' . $st . '</td>
                                                <td>
                                                <div class="btn-group" role="group">
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
                                                    <li>' . $stl . '</li>
													<li>
													<a href="' . base_url() . 'index.php/exam/edit_exam/' . $row->exam_id . '">
													ویرایش آزمون
													</a>
													</li>
													<li>
													<a href="' . base_url() . 'index.php/question/view_question/' . $row->exam_id . '">
													نمایش سوالات
													</a>
													</li>
													<li>
													<a href="' . base_url() . 'index.php/exam/question/' . $row->exam_id . '">
													افزودن سوال
													</a>
													</li>
                                                    <li>
                                                    <a'; ?> onclick = "return confirm('Drop <?php echo $row->exam_title; ?> ?')" <?php print ' href="' . base_url() . 'index.php/exam/drop_exam/' . $row->exam_id . '">
 													 حذف آزمون
 													</a>
 													</li>
                                                </ul>
                                            </div>
                                            </td>
          
                                            </tr>';
														}

														print '
									   </tbody>
                                       </table>  ';
													} else {
														print '
												<div class="alert alert-info" role="alert">
                                        اطلاعاتی جهت نمایش پیدا نشد.
                                    </div>';
													}
													?>
												</div>
											</div>
											<div role="tabpanel" class="tab-pane fade" id="tab6">
												<form action="<?php echo base_url(); ?>index.php/exam/add_exam"
													  method="POST">
													<div class="form-group">
														<label for="class_name">انتخاب درس</label>
														<select
															class="form-control"
															name="class_name"
															id="class_name"
															required
														>
															<option value="" selected disabled>
																-انتخاب درس فعال
															</option>
															<?php
															$result = $showActiveClass;

															if (count($result) > 0) {
																foreach ($result as $row) {
																	print '
																	<option value="' . $row->class_id . '">
																	' . $row->course_name . '
																	</option>
																	';
																}
															}
															?>
														</select>
													</div>
													<div class="form-group">
														<label for="title">نام آزمون</label>
														<input
															id="title"
															type="text"
															class="form-control"
															placeholder="نام آزمون را واررد کنید"
															name="title"
															required
															autocomplete="off"
														/>
													</div>
													<div class="form-group">
														<label for="duration">زمان آزمون (دقیقه)</label>
														<input
															id="duration"
															type="number"
															class="form-control"
															placeholder="زمان آزمون را وارد کنید"
															name="duration"
															required
															autocomplete="off"
														/>
													</div>
													<div class="form-group">
														<label for="passmark">امتیاز قبولی</label>
														<input
															id="passmark"
															type="number"
															class="form-control"
															placeholder="حداقل نمره برای قبولی"
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
															class="form-control"
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
															id="date"
															name="date"
															required
															autocomplete="off"
															placeholder="تاریخ پایان را انتخاب کنید"
														/>
													</div>
													<div class="form-group">
														<label for="terms">قوانین و مقررات</label>
														<textarea
															style="resize: none;"
															rows="6"
															class="form-control"
															placeholder="قوانین و مققرات امتحان را وارد کنید"
															id="terms"
															name="terms"
															required
															autocomplete="off"
														></textarea>
													</div>
													<button type="submit" class="btn btn-primary">ثبت</button>

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

<script src="https://unpkg.com/persian-date@1.1.0/dist/persian-date.min.js"></script>
<script src="https://unpkg.com/persian-datepicker@1.2.0/dist/js/persian-datepicker.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $(".persian-date-picker").pDatepicker({
            initialValue : false,
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
