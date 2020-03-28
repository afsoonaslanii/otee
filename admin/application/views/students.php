<?php
$url = 'http://otee.ir';

$myavatar = (count($query1) > 0 ? $query1[0]->picture : NULL);
$myfname = (count($query1) > 0 ? $query1[0]->firstname : "");
$mylname = (count($query1) > 0 ? $query1[0]->lastname : "");
$mygender = (count($query1) > 0 ? $query1[0]->gender : null);

$ms = $ms;
$description = $description;

?>
<!DOCTYPE html>
<html>

<head>

	<title>او تی | مدیریت دانش آموزان</title>

	<?php require('shared/links.php') ?>

	<link href="<?php echo $url; ?>/assets/plugins/offcanvasmenueffects/css/menu_cornerbox.css" rel="stylesheet"
		  type="text/css"/>

	<link href="<?php echo $url; ?>/assets/plugins/summernote-master/summernote.css" rel="stylesheet" type="text/css"/>

	<?php require('shared/plugins.php') ?>
</head>
<body <?php if ($ms == "1") {
	print 'onload="myFunction()"';
} ?> class="page-header-fixed">
<body>

<?php require('layout/profile-menu.php') ?>


<main class="page-content content-wrap">

	<?php require('layout/navbar.php'); ?>

	<?php
	$active_sidebar_item = 'students';
	$horizontal = false;
	require('layout/sidebar.php');
	?>

	<div class="page-inner">
		<div class="page-title">
			<h3>مدیریت دانش آموزان</h3>
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
												<a href="#tab5" role="tab" data-toggle="tab">
													دانش آموزان
												</a>
											</li>
											<li role="presentation">
												<a href="#tab6" role="tab" data-toggle="tab">
													افزودن دانش آموز جدید
												</a>
											</li>
										</ul>

										<div class="tab-content">
											<div role="tabpanel" class="tab-pane active fade in" id="tab5">
												<div class="table-responsive">
													<?php
													$result = $query2;

													if (count($result) > 0) {
														print '
										<table id="example" class="display table" style="width: 100%; cellspacing: 0;">
                                        <thead>
                                            <tr>
                                                <th>نام</th>
												<th>جنسیت</th>
												<th>نام کاربری</th>
												<th>شناسه آموزگار</th>
                                                <th>وضعیت</th>
                                                <th>عملیات</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>نام</th>
												<th>جنسیت</th>
												<th>نام کاربری</th>
												<th>شناسه آموزگار</th>
                                                <th>وضعیت</th>
                                                <th>عملیات</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>';
														foreach ($result as $row) {

															$status = $row->status;
															if ($status == "1") {
																$st = '<p class="text-success">فعال</p>';
																$stl = '
													<a href="' . base_url() . 'index.php/students/inactive_st/' . $row->user_id . '">
														غیرفعال کردن
													</a>';
															} else {
																$st = '<p class="text-danger">غیرفعال</p>';
																$stl = '
													<a href="' . base_url() . 'index.php/students/active_st/' . $row->user_id . '">
													فعال کردن
													</a>';
															}
															print '
										       <tr>
                                                <td>' . $row->firstname . ' ' . $row->lastname . '</td>
												<td>' . $row->gender . '</td>
                                                <td>' . $row->username . '</td>
                                                <td>' . $row->teacher_id .'</td>
                                                <td>' . $st . '</td>
                                                <td><div class="btn-group" role="group">
                                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                    انتخاب
                                                    <span class="caret"></span>
                                                </button>
                                                 <ul class="dropdown-menu" role="menu">
                                                    <li>' . $stl . '</li>
                                                    
													<li>
													<a href="' . base_url() . 'index.php/students/edit_student/' . $row->user_id . '">
													ویرایش دانش آموز
													</a>
													</li>
													
													<li>
													<a href="' . base_url() . 'index.php/students/view_student/' . $row->user_id . '/' . $row->user_id . '">
													اطلاعات دانش آموز
													</a>
													</li>
													
                                                    <li>
                                                    <a'; ?> onclick = "return confirm('حذف <?php echo $row->firstname; ?> ?')" <?php print ' href="' . base_url() . 'index.php/students/drop_sd/' . $row->user_id . '">
 													حذف دانش آموز
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
                                        اطلاعاتی برای نمایش پیدا نشد.
                                    </div>';
													}
													?>
												</div>

											</div>
											<div role="tabpanel" class="tab-pane fade" id="tab6">
												<form
													action="<?php echo base_url(); ?>index.php/students/addStudent"
													method="POST"
												>
													<label for="teacher">آموزگار مربوط به دانش آموز</label>
													<select class="form-control" name="teacher_id" id="teacher" required>
														<option value="" selected disabled>-- انتخاب آموزگار --</option>
														<?php
														$active_teachers = $active_teachers;
														if (count($active_teachers) > 0) {

															foreach ($active_teachers as $row) {
																print '
																	<option value="' . $row->user_id . '">
																	' . $row->firstname . ' ' . $row->lastname . '
																	</option>';
															}
														}
														?>
													</select>
													<div class="form-group">
														<label for="fname">نام</label>
														<input
															type="text"
															class="form-control"
															placeholder="نام خود را وارد کنید"
															id="fname"
															name="fname"
															required
															autocomplete="off"
														/>
													</div>
													<div class="form-group">
														<label for="lname">نام خانوادگی</label>
														<input
															type="text"
															class="form-control"
															placeholder="نام خانوادگی خودرا وارد کنید"
															id="lname"
															name="lname"
															required
															autocomplete="off"
														/>
													</div>
													<div class="form-group">
														<label for="Male">مرد</label>
														<input
															type="radio"
															name="gender"
															id="Male"
															value="Male"
															required
														/>
														<label for="Female">زن</label>
														<input
															type="radio"
															name="gender"
															id="Female"
															value="Female"
															required
														/>
													</div>
													<div class="form-group">
														<label for="email">آدرس ایمیل</label>
														<input
															type="email"
															class="form-control"
															placeholder="ایمیل خودرا وارد کنید"
															id="email"
															name="email"
															autocomplete="off"
														/>
													</div>
													<div class="form-group">
														<label for="phone">نلفن همراه</label>
														<input
															type="text"
															class="form-control"
															placeholder="تلفن همراه خودرا وارد کنید"
															id="phone"
															name="phone"
															required
															autocomplete="off"
														/>
													</div>
													<!--													<div class="form-group">-->
													<!--														<label for="exampleInputEmail1">Select Department</label>-->
													<!--                                                        <select class="form-control" name="department" required>-->
													<!--                                                            <option value="" selected disabled>-Select department-</option>-->
													<!--                                                            --><?php
													//                                                            include '../database/config.php';
													//                                                            $sql = "SELECT * FROM tbl_departments WHERE status = 'Active' ORDER BY name";
													//                                                            $result = $conn->query($sql);
													//
													//                                                            if ($result->num_rows > 0) {
													//
													//                                                                while($row = $result->fetch_assoc()) {
													//                                                                    print '<option value="'.$row['name'].'">'.$row['name'].'</option>';
													//                                                                }
													//                                                            } else {
													//
													//                                                            }
													//                                                            $conn->close();
													//                                                            ?>
													<!---->
													<!--                                                        </select>-->
													<!--													</div>-->

													<!--													<div class="form-group">-->
													<!--														<label for="exampleInputEmail1">Select Category</label>-->
													<!--                                                        <select class="form-control" name="category" required>-->
													<!--                                                            <option value="" selected disabled>-Select category-</option>-->
													<!--                                                            --><?php
													//                                                            include '../database/config.php';
													//                                                            $sql = "SELECT * FROM tbl_categories WHERE status = 'Active' ORDER BY name";
													//                                                            $result = $conn->query($sql);
													//
													//                                                            if ($result->num_rows > 0) {
													//
													//                                                                while($row = $result->fetch_assoc()) {
													//                                                                    print '<option value="'.$row['name'].'">'.$row['name'].'</option>';
													//                                                                }
													//                                                            } else {
													//
													//                                                            }
													//                                                            $conn->close();
													//                                                            ?>
													<!---->
													<!--                                                        </select>-->
													<!--													</div>-->

													<div class="form-group">
														<label for="username">نام کاربری</label>
														<input
															type="text"
															class="form-control "
															id="username"
															name="username"
															required
															autocomplete="off"
															placeholder="نام کاربری (یکتا)"
														>
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
					href="https://www.instagram.com/afsoonaslanii/" target="_blank">afsoon aslanii</a>.</p>
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
