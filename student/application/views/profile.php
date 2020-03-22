<?php

//$qrcodetxt = 'ID:'.$myid.', NAME: '.$myfname.' '.$mylname.', GENDER: '.$mygender.', DEPARTMENT : '.$mydepartment.', CATEGORY : '.$mycategory.'';
$url = 'http://otee.ir';
$qrcodetxt = '';
$myid = (count($query)>0 ? $query[0]->student_id : "");
$myavatar = (count($query)>0 ? $query[0]->student_picture : NULL);
$myfname = (count($query)>0 ? $query[0]->student_fname : "");
$mylname = (count($query)>0 ? $query[0]->student_lname : "");
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
	require('layout/sidebar.php');
	?>

    <div class="page-inner">
        <div class="page-title">
            <h3>Student Profile</h3>
            <div class="page-breadcrumb">
                <ol class="breadcrumb">
                    <li><a href="./">Home</a></li>
                    <li class="active">Student Profile</li>
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
                                            print' <img class="img-responsive" src="http://otee.ir/assets/images/'.$mygender.'.png" alt="'.$myfname.'">';
                                        }else{
                                            print '<img src="http://otee.ir/assets/images/'.$myavatar.'" class="img-responsive"  alt="'.$myfname.'"/>';
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
                                        <td>Registration Number</td>
                                        <td><b><?php echo "$myid"; ?></b></td>

                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>First Name</td>
                                        <td><b><?php echo "$myfname"; ?></b></td>

                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>Last Name</td>
                                        <td><b><?php echo "$mylname"; ?></b></td>

                                    </tr>
                                    <tr>
                                        <th scope="row">4</th>
                                        <td>Gender</td>
                                        <td><b><?php echo "$mygender"; ?></b></td>

                                    </tr>

                                    <tr>
                                        <th scope="row">7</th>
                                        <td>Email Address</td>
                                        <td><b><?php echo "$myemail"; ?></b></td>

                                    </tr>
                                    <tr>
                                        <th scope="row">8</th>
                                        <td>Phone Number</td>
                                        <td><b><?php echo "$myphone"; ?></b></td>

                                    </tr>

                                    </tbody>
                                </table>
                            </div>

                        </div>

                        <div class="col-md-7">

                            <div class="panel panel-white">
                                <div class="panel-body">
                                    <h3>Update display picture</h3>
                                    <form action="pages/new_dp.php" method="POST" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Select image to upload</label>
                                            <input type="file" name="image" accept="image/*" required autocomplete="off">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Upload</button>
                                        <?php
                                        if ($myavatar == NULL) {

                                        }else{
                                            print '<a';?> onclick="return confirm('Delete image ?')" <?php print ' class="btn btn-danger" href="pages/drop_dp.php">Delete Image</a>';
                                        }

                                        ?>
                                    </form>

                                </div></div></div>


                        <div class="col-md-7">

                            <div class="panel panel-white">
                                <div class="panel-body">
                                    <h3>Update login password</h3>
                                    <form action="pages/new_pw.php" method="POST">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Enter new password</label>
                                            <input type="password" id="password" class="form-control" name="pass1" required placeholder="Enter new password">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Confirm new password</label>
                                            <input type="password" id="confirm_password" class="form-control" name="pass2" required placeholder="Confirm new password">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Change Password</button>
                                        <script>
                                            var password = document.getElementById("password")
                                                , confirm_password = document.getElementById("confirm_password");

                                            function validatePassword(){
                                                if(password.value != confirm_password.value) {
                                                    confirm_password.setCustomValidity("Passwords Don't Match");
                                                } else {
                                                    confirm_password.setCustomValidity('');
                                                }
                                            }

                                            password.onchange = validatePassword;
                                            confirm_password.onkeyup = validatePassword;
                                        </script>
                                    </form>

                                </div></div></div>
                    </div>


                </div>
            </div>

        </div>
        <div class="page-footer">
            <p class="no-s"><?php echo date('Y'); ?> &copy; Developed by <a href="https://www.instagram.com/beatsbybwire/" target="_blank">Bwire Charles Mashauri</a>.</p>
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
