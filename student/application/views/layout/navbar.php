<div class="navbar">
	<div class="navbar-inner">
		<div class="sidebar-pusher">
			<a href="javascript:void(0);" class="waves-effect waves-button waves-classic push-sidebar">
				<i class="fa fa-bars"></i>
			</a>
		</div>
		<div class="logo-box">
			<a href="./" class="logo-text"><span>او تی</span></a>
		</div>
		<div class="search-button">
			<a href="javascript:void(0);" class="waves-effect waves-button waves-classic show-search">
				<i class="fa fa-search"></i>
			</a>
		</div>
		<div class="topmenu-outer">
			<div class="top-menu">
				<ul class="nav navbar-nav navbar-right">
<!--					<li>-->
<!--						<a href="javascript:void(0);" class="waves-effect waves-button waves-classic show-search">-->
<!--							<i class="fa fa-search"></i>-->
<!--						</a>-->
<!--					</li>-->

					<li class="dropdown">
						<a href="#" class="dropdown-toggle waves-effect waves-button waves-classic"
						   data-toggle="dropdown">
							<span class="user-name">
								<?php echo "$myfname"; ?> <?php echo "$mylname"; ?>
								<i class="fa fa-angle-down"></i>
							</span>
							<?php
							if ($myavatar == NULL) {
								print' <img class="img-circle avatar"  width="40" height="40" src="' . $url . '/assets/images/' . $mygender . '.png" alt="' . $myfname . '">';
							} else {
								print '<img width="40" height="40" class="img-circle avatar" src="' . $url . '/assets/images/' . $myavatar . '" alt="' . $myfname . '">';
							}

							?>
						</a>
						<ul class="dropdown-menu dropdown-list" role="menu">
							<li role="presentation">
								<a href="<?php echo base_url(); ?>index.php/profile">
									<i class="fa fa-user"></i>
									پروفایل
								</a>
							</li>
							<li role="presentation">
								<a href="<?php echo base_url(); ?>index.php/logout">
									<i class="fa fa-sign-out m-r-xs"></i>
									خروج
								</a>
							</li>
						</ul>
					</li>
					<li>
						<a
							href="<?php echo base_url(); ?>index.php/logout"
							class="log-out waves-effect waves-button waves-classic"
						>
							<span><i class="fa fa-sign-out m-r-xs"></i>خروج</span>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>
