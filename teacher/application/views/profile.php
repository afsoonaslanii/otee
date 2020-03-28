<?php

//$qrcodetxt = 'ID:'.$myid.', NAME: '.$myfname.' '.$mylname.', GENDER: '.$mygender.', DEPARTMENT : Administration';
$url = 'http://otee.ir';
$qrcodetxt = '';
$myavatar = (count($query) > 0 ? $query[0]->picture : NULL);
$myfname = (count($query) > 0 ? $query[0]->firstname : "");
$mylname = (count($query) > 0 ? $query[0]->lastname : "");
$mygender = (count($query) > 0 ? $query[0]->gender : NULL);
$myemail = (count($query) > 0 ? $query[0]->email : "");
$myphone = (count($query) > 0 ? $query[0]->phone : "");

$ms = $ms;
$description = $description;
?>
<!DOCTYPE html>
<html>

<head>

	<title>او تی | پروفایل آموزگار</title>

	<?php require_once 'shared/links.php' ?>

	<link href="<?php echo $url; ?>/assets/plugins/waves/waves.min.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo $url; ?>/assets/plugins/3d-bold-navigation/css/style.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo $url; ?>/assets/plugins/weather-icons-master/css/weather-icons.min.css" rel="stylesheet"
		  type="text/css"/>
	<link href="<?php echo $url; ?>/assets/plugins/metrojs/MetroJs.min.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo $url; ?>/assets/plugins/toastr/toastr.min.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo $url; ?>/assets/css/snack.css" rel="stylesheet" type="text/css"/>

</head>
<body <?php if ($ms == "1") {
	print 'onload="myFunction()"';
} ?> class="page-header-fixed">
<body>

<?php require_once 'layout/profile-menu.php' ?>


<main class="page-content content-wrap">

	<?php require_once 'layout/navbar.php' ?>

	<?php
	$active_sidebar_item = 'dashboard';
	$horizontal = false;
	require_once('layout/sidebar.php');
	?>

	<div class="page-inner">
		<div class="page-title">
			<h3>teacher Profile</h3>
			<div class="page-breadcrumb">
				<ol class="breadcrumb">
					<li><a href="./">خانه</a></li>
					<li class="active">پروفایل آموزگار</li>
				</ol>
			</div>
		</div>
		<div id="main-wrapper">
			<div class="row">
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-5">

							<div class="panel panel-white">
								<div class="panel-body">
									<div class="col-md-6">
										<?php
										if ($myavatar == NULL) {
											print'
											 <img class="img-responsive" src="' . $url . '/assets/images/' . $mygender . '.png" alt="' . $myfname . '">
											 ';
										} else {
											print '
											<img src="' . $url . '/assets/images/' . $myavatar . '" class="img-responsive"  alt="' . $myfname . '"/>
											';
										}
										?>
									</div>

								</div>
								<table class="table">
									<form action="<?php echo base_url(); ?>index.php/profile/updateProfile"
										  method="POST">
										<tbody>
										<tr>
											<th scope="row">1</th>
											<td>نام</td>
											<td>
												<input
													type="text"
													value="<?php echo "$myfname"; ?>"
													class="form-control"
													name="fname"
													placeholder="نام خود را وارد کنید"
													required
													autocomplete="off"
												/>
											</td>

										</tr>
										<tr>
											<th scope="row">2</th>
											<td>نام خانوادگی</td>
											<td>
												<input
													type="text"
													value="<?php echo "$mylname"; ?>"
													class="form-control"
													name="lname"
													placeholder="نام خانوادگی خود را وارد کنید"
													required
													autocomplete="off"
												/>
											</td>

										</tr>
										<tr>
											<th scope="row">4</th>
											<td>جنسیت</td>
											<td>
												<select
													name="gender"
													required
													class="form-control"
												>
													<option selected disbaled value="">-انتخاب جنسیت-</option>
													<option <?php if ($mygender == "Male") {
														print ' selected ';
													} ?> value="Male">
														مرد
													</option>
													<option <?php if ($mygender == "Female") {
														print ' selected ';
													} ?>value="Female">
														زن
													</option>
												</select>
											</td>

										</tr>

										<tr>
											<th scope="row">6</th>
											<td>آدرس ایمیل</td>
											<td>
												<input
													type="email"
													value="<?php echo "$myemail"; ?>"
													class="form-control"
													name="email"
													placeholder="ایمیل خود را وارد کنید"
													autocomplete="off"
												/>
											</td>

										</tr>
										<tr>
											<th scope="row">7</th>
											<td>تلفن همراه</td>
											<td>
												<input
													type="text"
													value="<?php echo "$myphone"; ?>"
													class="form-control"
													name="phone"
													placeholder="تتلفن همراه خود را وارد کنید"
													required
													autocomplete="off"
												/>
											</td>

										</tr>
										<tr>
											<th scope="row"></th>
											<td colspan="2">
												<button type="submit" class="btn btn-primary">ذخیره تغییرات</button>
											</td>

										</tr>
									</form>
									</tbody>
								</table>
							</div>

						</div>

						<div class="col-md-7">

							<div class="panel panel-white">
								<div class="panel-body">
									<h3>تفییر تصویر پروفایل</h3>
									<form
										action="<?php echo base_url(); ?>index.php/profile/updatePicture"
										method="POST"
										enctype="multipart/form-data"
									>
										<div class="form-group">
											<label for="image">انتخاب عکس</label>
											<input
												type="file"
												name="image"
												id="image"
												accept="image/*"
												required
												autocomplete="off"
											>
										</div>
										<button type="submit" class="btn btn-primary">بارگذاری</button>
										<?php
										if ($myavatar == NULL) {

										} else {
											print '<a'; ?> onclick="return confirm('Delete image ?')" <?php print ' class="btn btn-danger" href="pages/drop_dp.php">Delete Image</a>';
										}

										?>
									</form>

								</div>
							</div>
						</div>


						<div class="col-md-7">

							<div class="panel panel-white">
								<div class="panel-body">
									<h3>تغییر پسورد</h3>
									<form action="<?php echo base_url(); ?>index.php/profile/new_password"
										  method="POST">
										<div class="form-group">
											<label for="password">پسورد جدید را وارد کنید</label>
											<input
												type="password"
												id="password"
												class="form-control"
												name="pass1"
												required
												placeholder="پسورد جدید"
											>
										</div>

										<div class="form-group">
											<label for="confirm_password">تایید پسورد جدید</label>
											<input
												type="password"
												id="confirm_password"
												class="form-control"
												name="pass2"
												required
												placeholder="تایید پسورد جدید"
											>
										</div>
										<button type="submit" class="btn btn-primary">تغییر پسورد</button>
										<script>
                                            var password = document.getElementById("password")
                                                , confirm_password = document.getElementById("confirm_password");

                                            function validatePassword() {
                                                if (password.value != confirm_password.value) {
                                                    confirm_password.setCustomValidity("کلمات عبور مطابقت ندارند");
                                                } else {
                                                    confirm_password.setCustomValidity('');
                                                }
                                            }

                                            password.onchange = validatePassword;
                                            confirm_password.onkeyup = validatePassword;
										</script>
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
					href="https://www.instagram.com/afsoonaslanii/" target="_blank">afsoon aslanii</a>.</p>
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
<script src="<?php echo $url; ?>/assets/plugins/waypoints/jquery.waypoints.min.js"></script>
<script src="<?php echo $url; ?>/assets/plugins/jquery-counterup/jquery.counterup.min.js"></script>
<script src="<?php echo $url; ?>/assets/plugins/toastr/toastr.min.js"></script>
<script src="<?php echo $url; ?>/assets/plugins/flot/jquery.flot.min.js"></script>
<script src="<?php echo $url; ?>/assets/plugins/flot/jquery.flot.time.min.js"></script>
<script src="<?php echo $url; ?>/assets/plugins/flot/jquery.flot.symbol.min.js"></script>
<script src="<?php echo $url; ?>/assets/plugins/flot/jquery.flot.resize.min.js"></script>
<script src="<?php echo $url; ?>/assets/plugins/flot/jquery.flot.tooltip.min.js"></script>
<script src="<?php echo $url; ?>/assets/plugins/curvedlines/curvedLines.js"></script>
<script src="<?php echo $url; ?>/assets/plugins/metrojs/MetroJs.min.js"></script>
<script src="<?php echo $url; ?>/assets/js/modern.js"></script>

<script src="<?php echo $url; ?>/assets/js/canvasjs.min.js"></script>

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
