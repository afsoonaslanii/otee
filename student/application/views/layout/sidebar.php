<div class="page-sidebar sidebar">
	<div class="page-sidebar-inner slimscroll">
		<div class="sidebar-header">
			<div class="sidebar-profile">
				<a href="javascript:void(0);" id="profile-menu-link">
					<div class="sidebar-profile-image">
						<?php
						if ($myavatar == NULL) {
							print'<img class="img-circle img-responsive" src="http://otee.ir/assets/images/' . $mygender . '.png" alt="' . $myfname . '">';
						} else {
							print '<img  src="http://otee.ir/assets/images/' . $myavatar . '" class="img-circle img-responsive"  alt="' . $myfname . '"/>';
						}

						?>
					</div>
					<div class="sidebar-profile-details">
						<span>
							<?php echo "$myfname"; ?> <?php echo "$mylname"; ?>
							<br>
							<small> او-تی | ادمین</small>
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
			<li class="<?php echo $active_sidebar_item === 'exam' ? 'active' : 'not-active' ?>">
				<a href="<?php echo base_url(); ?>index.php/exam" class="waves-effect waves-button">
					<span class="menu-icon glyphicon glyphicon-book"></span>
					<p>امتحانت</p>
				</a>
			</li>
			<li class="<?php echo $active_sidebar_item === 'result' ? 'active' : 'not-active' ?>">
				<a href="<?php echo base_url(); ?>index.php/result" class="waves-effect waves-button">
					<span class="menu-icon glyphicon glyphicon-certificate"></span>
					<p>نتایج امتحانات</p>
				</a>
			</li>
		</ul>

	</div>
</div>
