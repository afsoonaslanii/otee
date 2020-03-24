<div class="overlay"></div>
<div class="menu-wrap">
	<nav class="profile-menu">
		<div class="profile">
			<?php
			if ($myavatar == NULL) {
				print'<img width="60" src="' . $url . '/assets/images/' . $mygender . '.png" alt="' . $myfname . '">';
			} else {
				print '<img width="60" height="60" src="' . $url . '/assets/images/' . $myavatar . '" alt="' . $myfname . '">';
			}

			?>
			<span><?php echo "$myfname"; ?><?php echo "$mylname"; ?></span></div>
		<div class="profile-menu-list">
			<a href='<?php echo base_url(); ?>index.php/profile'><i class="fa fa-user"></i><span>پروفایل</span></a>
			<a href="<?php echo base_url(); ?>index.php/logout"><i class="fa fa-sign-out"></i><span>خروج</span></a>
		</div>
	</nav>
	<button class="close-button" id="close-button">خروج</button>
</div>
