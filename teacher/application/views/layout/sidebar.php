<div class=<?php echo $horizontal === true ? 'horizontal-bar sidebar' : 'page-sidebar sidebar' ?>>
	<div class="page-sidebar-inner slimscroll">
		<div class="sidebar-header">
			<div class="sidebar-profile">
				<a href="javascript:void(0);" id="profile-menu-link">
					<div class="sidebar-profile-image">
						<?php
						if ($myavatar == NULL) {
							print'
							 <img class="img-circle img-responsive" src="' . $url . '/assets/images/' . $mygender . '.png" alt="' . $myfname . '">
							 ';
						} else {
							print '
							<img  src="' . $url . '/assets/images/' . $myavatar . '" class="img-circle img-responsive"  alt="' . $myfname . '"/>
							';
						}
						?>
					</div>
					<div class="sidebar-profile-details">
						<span><?php echo "$myfname"; ?> <?php echo "$mylname"; ?>
							<br>
							<small>او تی | آموزگار</small>
						</span>
					</div>
				</a>
			</div>
		</div>
		<ul class="menu accordion-menu">
			<li class="<?php echo $active_sidebar_item === 'dashboard' ? 'active' : 'not-active' ?>">
				<a href="<?php echo base_url(); ?>index.php/dashboard" class="waves-effect waves-button">
					<span class="menu-icon glyphicon glyphicon-home"></span>
					<p>داشبورد</p>
				</a>
			</li>
			<li class="<?php echo $active_sidebar_item === 'students' ? 'active' : 'not-active' ?>">
				<a href="<?php echo base_url(); ?>index.php/students" class="waves-effect waves-button">
					<span class="menu-icon glyphicon glyphicon glyphicon-education"></span>
					<p>دانش آموزان</p>
				</a>
			</li>
			<li class="<?php echo $active_sidebar_item === 'exam' ? 'active' : 'not-active' ?>">
				<a href="<?php echo base_url(); ?>index.php/exam" class="waves-effect waves-button">
					<span class="menu-icon glyphicon glyphicon-book"></span>
					<p>آزمون ها</p>
				</a>
			</li>
			<li class="<?php echo $active_sidebar_item === 'question' ? 'active' : 'not-active' ?>">
				<a href="<?php echo base_url(); ?>index.php/question" class="waves-effect waves-button">
					<span class="menu-icon glyphicon glyphicon-question-sign"></span>
					<p>سوالات</p>
				</a>
			</li>
			<li class="<?php echo $active_sidebar_item === 'result' ? 'active' : 'not-active' ?>">
				<a href="<?php echo base_url(); ?>index.php/results" class="waves-effect waves-button">
					<span class="menu-icon glyphicon glyphicon-certificate"></span>
					<p>نتایج امتحانات</p>
				</a>
			</li>
		</ul>
	</div>
</div>
