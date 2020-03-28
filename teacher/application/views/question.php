<?php
$url = 'http://otee.ir';

$ms = $ms;
$description = $description;

$myavatar = (count($query1)>0 ? $query1[0]->picture : NULL);
$myfname = (count($query1)>0 ? $query1[0]->firstname : "");
$mylname = (count($query1)>0 ? $query1[0]->lastname : "");
$mygender = (count($query1)>0 ? $query1[0]->gender : null);

?>
<!DOCTYPE html>
<html>

<head>

    <title>او تی | افزودن سوالات آزمون</title>

	<?php require_once 'shared/links.php'?>

    <link href="<?php echo $url; ?>/assets/plugins/datatables/css/jquery.datatables.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo $url; ?>/assets/plugins/datatables/css/jquery.datatables_themeroller.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo $url; ?>/assets/plugins/x-editable/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet" type="text/css">
    <link href="<?php echo $url; ?>/assets/plugins/bootstrap-datepicker/css/datepicker3.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo $url; ?>/assets/css/snack.css" rel="stylesheet" type="text/css"/>

</head>
<body <?php if ($ms == "1") { print 'onload="myFunction()"'; } ?>  class="page-header-fixed">

<?php require_once 'layout/profile-menu.php' ?>


<main class="page-content content-wrap">

	<?php require_once 'layout/navbar.php' ?>

	<?php
	$active_sidebar_item = 'question';
	$horizontal = false;
	require_once('layout/sidebar.php');
	?>

    <div class="page-inner">
        <div class="page-title">
            <h3>افزودن سوال</h3>
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
													چند گزینه ای
												</a>
											</li>
<!--                                            <li role="presentation"><a href="#tab6" role="tab" data-toggle="tab">Filling Blanks</a></li>-->
                                        </ul>

                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane active fade in" id="tab5">
                                                <form action="<?php echo base_url();?>index.php/question/add_question" method="POST">
                                                    <div class="form-group">
                                                        <label for="exam">نام آزمون</label>
                                                        <select class="form-control" name="exam" id="exam" required>
                                                            <option value="" selected disabled>-انتخاب آزمون</option>
                                                            <?php

                                                            $result = $exam;
                                                            if (count($result) > 0) {

                                                                foreach ($result as $row) {
                                                                    print '
                                                                    <option value="'.$row->exam_id.'">
                                                                    '.$row->exam_title.'
                                                                    </option>';
                                                                }
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
														<label for="question">سوال</label>
														<input
															type="text"
															class="form-control"
															placeholder="سوال مورد نظر خود را وارد کنید"
															id="question"
															name="question"
															required
															autocomplete="off"
														/>
                                                    </div>

													<div class="form-group">
														<label for="point">نمره سوال</label>
														<input
															required
															type="text"
															class="form-control"
															placeholder="نمره سوال را بصورت عدد وارد کنید"
															name="point"
															id="point"
															autocomplete="off"
														>
													</div>

                                                    <table class="table table-bordered">
                                                        <thead>
                                                        <tr>
															<th width="100">شماره</th>
															<th>گزینه</th>
															<th  width="100" >جواب</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <th scope="row" >1</th>
                                                            <td>
                                                                <div class="form-group">
																	<label for="opt1">گزینه 1</label>
																	<input
																		type="text"
																		class="form-control"
																		placeholder="گزینه اول را وارد کنید"
																		id="opt1"
																		name="opt1"
																		required
																		autocomplete="off"
																	/>
                                                                </div>
                                                            </td>
                                                            <td>
																<input
																	type="radio"
																	name="answer"
																	value="option1"
																	required
																/>
															</td>

                                                        </tr>
                                                        <tr>
                                                            <th scope="row">2</th>
                                                            <td>
                                                                <div class="form-group">
																	<label for="opt2">گزینه 2</label>
																	<input
																		type="text"
																		class="form-control"
																		placeholder="گزینه دوم را وارد کنید"
																		id="opt2"
																		name="opt2"
																		required
																		autocomplete="off"
																	/>
                                                                </div>
                                                            </td>
															<td>
																<input
																	type="radio"
																	name="answer"
																	value="option2"
																	required
																/>
															</td>

                                                        </tr>
                                                        <tr>
                                                            <th scope="row">3</th>
															<td>
																<div class="form-group">
																	<label for="opt3">گزینه 3</label>
																	<input
																		type="text"
																		class="form-control"
																		placeholder="گزینه سوم را وارد کنید"
																		id="opt3"
																		name="opt3"
																		required
																		autocomplete="off"
																	/>
																</div>
															</td>
															<td>
																<input
																	type="radio"
																	name="answer"
																	value="option3"
																	required
																/>
															</td>

                                                        </tr>

                                                        <tr>
                                                            <th scope="row">3</th>
															<td>
																<div class="form-group">
																	<label for="opt4">گزینه 4</label>
																	<input
																		type="text"
																		class="form-control"
																		placeholder="گزینه چهارم را وارد کنید"
																		id="opt4"
																		name="opt4"
																		required
																		autocomplete="off"
																	/>
																</div>
															</td>
															<td>
																<input
																	type="radio"
																	name="answer"
																	value="option4"
																	required
																/>
															</td>

                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                    <button type="submit" class="btn btn-primary">ثبت سوال</button>
                                                </form>
                                            </div>
<!--                                            <div role="tabpanel" class="tab-pane fade" id="tab6">-->
<!--                                                <form action="pages/add_question2.php?type=fib" method="POST">-->
<!--                                                    <div class="form-group">-->
<!--                                                        <label for="exampleInputEmail1">Exam Name</label>-->
<!--                                                        <select class="form-control" name="exam" required>-->
<!--                                                            <option value="" selected disabled>-Select exam</option>-->
<!--                                                            --><?php
//
//                                                            $result = $exam;
//
//                                                            if (count($result) > 0) {
//
//                                                                foreach ($result as $row) {
//                                                                    print '<option value="'.$row->exam_id.'">'.$row->exam_title.'</option>';
//                                                                }
//                                                            } else {
//
//                                                            }
//                                                            ?>
<!--                                                        </select>-->
<!--                                                    </div>-->
<!---->
<!--                                                    <div class="form-group">-->
<!--                                                        <label for="exampleInputEmail1">Question</label>-->
<!--                                                        <input type="text" class="form-control" placeholder="Enter question" name="question" required autocomplete="off">-->
<!--                                                    </div>-->
<!--                                                    <div class="form-group">-->
<!--                                                        <label for="exampleInputEmail1">Answer</label>-->
<!--                                                        <input type="text" class="form-control" placeholder="Enter answer" name="answer" required autocomplete="off">-->
<!--                                                    </div>-->
<!---->
<!--                                                    <button type="submit" class="btn btn-primary">Submit</button>-->
<!--                                                </form>-->
<!--                                            </div>-->
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
            <p class="no-s"><?php echo date('Y'); ?> &copy; Developed by <a href="https://www.instagram.com/afsoonaslanii/" target="_blank">afsoon aslanii</a>.</p>
        </div>
    </div>
</main>
<?php if ($ms == "1") {
    ?> <div class="alert alert-success" id="snackbar"><?php echo "$description"; ?></div> <?php
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

<script>
    function myFunction() {
        var x = document.getElementById("snackbar");
        x.className = "show";
        setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
    }
</script>
</body>

</html>
