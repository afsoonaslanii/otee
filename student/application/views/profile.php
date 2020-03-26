<?php

//$qrcodetxt = 'ID:'.$myid.', NAME: '.$myfname.' '.$mylname.', GENDER: '.$mygender.', DEPARTMENT : '.$mydepartment.', CATEGORY : '.$mycategory.'';
$url = 'http://otee.ir';
$qrcodetxt = '';
$myid = (count($query)>0 ? $query[0]->user_id : "");
$myavatar = (count($query)>0 ? $query[0]->picture : NULL);
$myfname = (count($query)>0 ? $query[0]->firstname : "");
$mylname = (count($query)>0 ? $query[0]->lastname : "");
$mygender = (count($query)>0 ? $query[0]->gender : NULL);
$myemail = (count($query)>0 ? $query[0]->email : "");
$myphone = (count($query)>0 ? $query[0]->phone: "");

$ms = $ms;
$description = $description;

?>
<!DOCTYPE html>
<html>

<head>
    <title>OES | Student Profile</title>

	<?php require('shared/links.php'); ?>

    <link href="<?php echo $url; ?>/assets/plugins/weather-icons-master/css/weather-icons.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo $url; ?>/assets/plugins/metrojs/MetroJs.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo $url; ?>/assets/plugins/toastr/toastr.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo $url; ?>/assets/css/snack.css" rel="stylesheet" type="text/css"/>

</head>
<body <?php if ($ms == "1") { print 'onload="myFunction()"'; } ?>  class="page-header-fixed">

<?php require('layout/profile-menu.php') ?>

<main class="page-content content-wrap">
	<?php require('layout/navbar.php'); ?>

	<?php
	$active_sidebar_item = '';
	$horizontal = false;
	require('layout/sidebar.php');
	?>

    <div class="page-inner">
        <div class="page-title">
            <h3>پروفایل دانش آموز</h3>
            <div class="page-breadcrumb">
                <ol class="breadcrumb">
                    <li><a href="./">خانه</a></li>
                    <li class="active">پروفایل دانش آموز</li>
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
                                            print' <img class="img-responsive" src="' . $url . 'assets/images/'.$mygender.'.png" alt="'.$myfname.'">';
                                        }else{
                                            print '<img src="' . $url . 'assets/images/'.$myavatar.'" class="img-responsive"  alt="'.$myfname.'"/>';
                                        }

                                        ?></div>
<!--                                    <div class="col-md-6">-->
<!--                                        --><?php //print '<img width="150" src="../assets/qrcode/qr_img.php?d='.$qrcodetxt.'">'; ?>
<!--                                    </div>-->

                                </div>
                                <table class="table">
                                    <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>شماره ثبت</td>
                                        <td><b><?php echo "$myid"; ?></b></td>

                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>نام</td>
                                        <td><b><?php echo "$myfname"; ?></b></td>

                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>نام خانوادگی</td>
                                        <td><b><?php echo "$mylname"; ?></b></td>

                                    </tr>
                                    <tr>
                                        <th scope="row">4</th>
                                        <td>جنسیت</td>
                                        <td><b><?php echo "$mygender"; ?></b></td>

                                    </tr>

                                    <tr>
                                        <th scope="row">7</th>
                                        <td>ایمیل</td>
                                        <td><b><?php echo "$myemail"; ?></b></td>

                                    </tr>
                                    <tr>
                                        <th scope="row">8</th>
                                        <td>شماره موبایل</td>
                                        <td><b><?php echo "$myphone"; ?></b></td>

                                    </tr>

                                    </tbody>
                                </table>
                            </div>

                        </div>

                        <div class="col-md-7">

                            <div class="panel panel-white">
                                <div class="panel-body">
                                    <h3>به روز رسانی عکس پروفایل</h3>
                                    <form action="pages/new_dp.php" method="POST" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">تصویر را برای بارگذاری انتخاب کنید</label>
                                            <input type="file" name="image" accept="image/*" required autocomplete="off">
                                        </div>
                                        <button type="submit" class="btn btn-primary">به روز رسانی</button>
                                        <?php
                                        if ($myavatar == NULL) {

                                        }else{
                                            print '<a';?> onclick="return confirm('از حذف عکس اطمینان دارید؟')" <?php print ' class="btn btn-danger" href="pages/drop_dp.php">حذف عکس</a>';
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
                                    <form action="pages/new_pw.php" method="POST">
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

                                            function validatePassword(){
                                                if(password.value != confirm_password.value) {
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
            <p class="no-s">
				<?php echo date('Y'); ?>
				&copy; Developed by
				<a href="https://www.instagram.com/afsoonaslanii/" target="_blank">Afsoon aslani</a>.
			</p>
        </div>
    </div>
</main>
<?php if ($ms == "1") {
    ?> <div class="alert alert-success" id="snackbar"><?php echo "$description"; ?></div> <?php
}else{

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
        setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
    }
</script>

</body>
</html>
