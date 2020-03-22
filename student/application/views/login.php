<?php
$url = 'http://otee.ir';
$ms = $ms;
$description = $description;
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

	<title>iQuiz | Login </title>

    <link href="<?php echo $url; ?>/assets/plugins/pace-master/themes/blue/pace-theme-flash.css" rel="stylesheet"/>
    <link href="<?php echo $url; ?>/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo $url; ?>/assets/css/modern.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo $url; ?>/assets/css/snack.css"/>

</head>
<body <?php if ($ms == "1") { print 'onload="myFunction()"'; } ?>  class="page-login">

<main class="page-content">
    <div class="page-inner text-center">
        <div id="main-wrapper">
            <div class="row">
                <div class="col-md-4 center">
                    <h2>آی کوییز</h2>
                    <h5>آزمون انلاین</h5>

                    <?php
                    $this->load->helper('form');

                    echo form_open('/login/auth');
                    $username = form_input(array('name'=>'username','placeholder'=>'نام کاربری یا ایمیل','class'=>'form-control','required'=>'required'));
                    $password = form_password(array('name'=>'password','placeholder'=>'رمز ورود','class'=>'form-control','required'=>'required'));
                    $submit = form_submit(array('name'=>'submit','value'=>'وارد شو','class'=>'btn btn-success btn-block'));
                    ?>
                    <p>وارد اکانتت شو</p>

                    <?php echo validation_errors(); ?>
                    <div class="form-group">
                        <p class=""><?=$username; ?></p>
                    </div>
                    <div class="form-group">
                        <p><?=$password; ?></p>
                    </div>
                    <div class="form-group">
                        <p><?=$submit; ?></p>
                    </div>
                    <?php echo form_close();?>
                    <a href="">پسوردتو فراموش کردی؟</a>
                    <p>اکانت نداری؟ همین الان <a href="<?php echo base_url();?>index.php/register">عضو شو</a></p>
                </div>
            </div>
        </div>
    </div>


</main>
<?php if ($ms == "1") {
    ?> <div class="alert alert-success" id="snackbar"><?php echo "$description"; ?></div> <?php
}else{

}
?>
<script src="<?php echo $url; ?>/assets/plugins/pace-master/pace.min.js"></script>
<script src="<?php echo $url; ?>/assets/plugins/jquery/jquery-2.1.4.min.js"></script>
<script src="<?php echo $url; ?>/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo $url; ?>/assets/js/modern.js"></script>

<script>
    function myFunction() {
        var x = document.getElementById("snackbar");
        x.className = "show";
        setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
    }
</script>
</body>
</html>
