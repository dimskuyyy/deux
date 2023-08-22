<nav class="navigasi nav_scroll_visible">
	<div class="row m-0">
		<div class="group_1_navigasi">
			<div class="logo">
				<a class="d-inline-block link_deux_logo" href="<?= BASEURL; ?>/home">
					<img src="<?= BASEURL; ?>/assets/image/logo_deux.png" alt="Deux Icon" class="deux_logo d-inline-block">
					<div class="deux_name">Deux</div>
				</a>
			</div>
			<div class="nav_search srch_scroll_visible">
				<form class="nav_form position-relative" action="" method="" style="opacity:0;visibility:hidden;">
					<button class="nav_srch_btn whitebtn"><i class="search icon sh_nav text-center"></i></button>
					<input type="search" class="nav_input_srch" placeholder="Search here" required>
				</form>
			</div>
		</div>
		<div class="nav_link text-right">
			<div class="navigation_link">
				<div class="basic_link d-inline-block">
					<div class="points_menu">
						<div class="points_menu_icon">
							<svg class="three_points" width="22px" height="6.0923px" viewBox="0 0 650 180" fill="none" xmlns="http://www.w3.org/2000/svg">
								<circle id="c_1" cx="90" cy="90" r="80" stroke="white" fill="" stroke-width="20" />
								<circle id="c_2" cx="560" cy="90" r="80" stroke="white" fill="" stroke-width="20" />
								<circle id="c_3" cx="325" cy="90" r="80" stroke="white" fill="" stroke-width="20" />
							</svg>
						</div>
						<div class="points_menu_navigation">
							<div class="arrow_dropdown">
								<svg width="13.571px" height="10px" viewBox="0 0 76 56" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M33.1347 2.74158C35.5295 -0.576779 40.4705 -0.576784 42.8653 2.74157L74.4371 46.4888C77.3009 50.4569 74.4655 56 69.5718 56H6.42818C1.53453 56 -1.30092 50.457 1.56287 46.4888L33.1347 2.74158Z" fill="#FBFBFB" />
								</svg>
							</div>
							<ul class="points_menu_list" style="min-width:190px">
								<?php
								if (isset($_SESSION['login'])) {
									$usname = str_replace(" ", "-", $_SESSION['UN']);
									echo "
									<li class='points_menu_link'>
										<a href='" . BASEURL . "/member/user/" . $_SESSION['UID'] . "-" . $usname . "'>Profile</a>
									</li>
									<li class='points_menu_link'>
										<a href='" . BASEURL . "/edit_profile/index/" . $_SESSION['UID'] . "-" . $usname . "'>Profile Settings</a>
									</li>
									<li class='points_menu_link'>
										<a href='" . BASEURL . "/member/user/" . $_SESSION['UID'] . "-" . $usname . "/post_settings'>Post Settings</a>
									</li>
									<li class='points_menu_link'>
										<a href='" . BASEURL . "/upload'>Upload</a>
									</li>
									<li class='points_menu_link'>
										<a href='" . BASEURL . "/home/signout'>Logout</a>
									</li>
										";
								} else {
									echo "
									<li class='points_menu_link'>
										<a href='<?= BASEURL; ?>/login'>Sign In</a>
									</li>
									<li class='points_menu_link'>
										<a href='<?= BASEURL; ?>/join'>Join</a>
									</li>";
								}
								?>
								<li class="points_menu_link points_menu_link_explore">
									<a href="<?= BASEURL; ?>/explore">Explore</a>
									<ul class="explore_drop_list">
										<li class="explore_drop_link">
											<a href="<?= BASEURL; ?>/explore">Photos</a>
										</li>
										<li class="explore_drop_link">
											<a href="<?= BASEURL; ?>/explore/vector">Vectors</a>
										</li>
									</ul>
								</li>
								<!-- <li class="points_menu_link">
										<a href="<?= BASEURL; ?>/other">About Us
										</a>
									</li>
									<li class="points_menu_link">
										<a href="<?= BASEURL; ?>/other/faq">FAQ
										</a>
									</li>
									<li class="points_menu_link">
										<a href="<?= BASEURL; ?>/other/privacy">Privacy & Terms
										</a>
									</li>
									<ul class="social_media">
										<li class="other_link">
											<a href="https://www.instagram.com/dimas_fauzan890/"><i class="instagram icon"></i>
											</a>
										</li>
										<li class="other_link">
											<a href="https://www.facebook.com/profile.php?id=100006926894966"><i class="facebook square icon"></i>
											</a>
										</li>
										<li class="other_link">
											<a href="https://twitter.com/DimasFauzan890"><i class="twitter square icon"></i>
											</a>
										</li>
									</ul> -->
							</ul>
						</div>
					</div>
					<div class="another" style="opacity:0;visibility:hidden">
						<a href="<?= BASEURL; ?>/other" class="link_navigation">Other</a>
						<div class="other_navigation">
							<div class="arrow_dropdown">
								<svg width="13.571px" height="10px" viewBox="0 0 76 56" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M33.1347 2.74158C35.5295 -0.576779 40.4705 -0.576784 42.8653 2.74157L74.4371 46.4888C77.3009 50.4569 74.4655 56 69.5718 56H6.42818C1.53453 56 -1.30092 50.457 1.56287 46.4888L33.1347 2.74158Z" fill="#FBFBFB" />
								</svg>
							</div>
							<ul class="other_list">
								<li class="other_link">
									<a href="<?= BASEURL; ?>/other">About Us</a>
								</li>
								<li class="other_link">
									<a href="<?= BASEURL; ?>/other/faq">FAQ</a>
								</li>
								<li class="other_link">
									<a href="<?= BASEURL; ?>/other/privacy">Privacy & Terms</a>
								</li>
								<hr>
								<ul class="social_media">
									<li class="other_link">
										<a href="https://www.instagram.com/dimas_fauzan890/"><i class="instagram icon"></i>
										</a>
									</li>
									<li class="other_link">
										<a href="https://www.facebook.com/profile.php?id=100006926894966"><i class="facebook square icon"></i>
										</a>
									</li>
									<li class="other_link">
										<a href="https://twitter.com/DimasFauzan890"><i class="twitter icon"></i>
										</a>
									</li>
								</ul>
							</ul>
						</div>
					</div>
					<div class="explore">
						<a href="<?= BASEURL; ?>/explore" class="link_navigation ">Explore</a>
						<div class="explore_navigation">
							<div class="arrow_dropdown">
								<svg width="13.571px" height="10px" viewBox="0 0 76 56" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M33.1347 2.74158C35.5295 -0.576779 40.4705 -0.576784 42.8653 2.74157L74.4371 46.4888C77.3009 50.4569 74.4655 56 69.5718 56H6.42818C1.53453 56 -1.30092 50.457 1.56287 46.4888L33.1347 2.74158Z" fill="#FBFBFB" />
								</svg>
							</div>
							<ul class="explore_list">
								<li class="explore_link">
									<a href="<?= BASEURL; ?>/explore/vector">Vector</a>
								</li>
								<!-- <li class="explore_link">
									<a href="<?= BASEURL; ?>/explore/icon">Icons</a>
								</li> -->
								<li class="explore_link">
									<a href="<?= BASEURL; ?>/explore/index">Photos</a>
								</li>
								<!-- <li class="explore_link">
										<a href="<?= BASEURL; ?>/explore/author">Author</a>
									</li> -->
							</ul>
						</div>
					</div>
				</div>
				<?php if ($data['role'] == 'guest') : ?>
					<div class="login_link d-inline-block">
						<div class="sign_in">
							<a href="<?= BASEURL; ?>/login" class="link_navigation ">Sign in</a>
						</div>
						<div class="join">
							<a href="<?= BASEURL; ?>/join" class="link_navigation bg_join">Join</a>
						</div>
					</div>
				<?php endif; ?>
				<?php if ($data['role'] == 'member') : ?>
					<?php foreach ($data['user'] as $user) : ?>
						<div class="login_link d-inline-block">
							<div class="sign_in" id="user_nav">
								<a href="<?= BASEURL; ?>/member/user/<?= $user['id']; ?>" class="link_navigation ">
									<i class="angle down icon" style="color:white;"></i> <span class="d-inline-block" style="border-radius:50%; width:28px; height:28px;">
										<?php if ($user['user_avatar'] != "") {
											echo '<img src="' . BASEURL . '/assets/avatar/' . $user["user_avatar"] . '" style="border-radius:50%; width:25px!important;height:25px!important"alt="">';
										} else {
											echo '<img src="' . BASEURL . '/assets/avatar/undraw_male_avatar_323b.svg" style="border-radius:50%;width:25px!important;height:25px!important"alt="">';
										} ?>
									</span>
								</a>
								<ul class="explore_list ui custom popup bottom left p-0 pt-2" id="user_list">
									<li class="explore_link pr-4 pl-4">
										<a href="<?= BASEURL; ?>/member/user/<?= $user['id']; ?>-<?= $usname ?>">Profile</a>
									</li>
									<li class="explore_link pr-4 pl-4">
										<a href="<?= BASEURL; ?>/edit_profile/index/<?= $user['id'] ?>-<?= $usname ?>">Profile Settings</a>
									</li>
									<li class="explore_link pr-4 pl-4">
										<a href="<?= BASEURL ?>/member/user/<?= $user['id'] ?>-<?= $usname ?>/post_settings">Post Settings</a>
									</li>
									<li class="explore_link pr-4 pl-4">
										<a href="<?= BASEURL; ?>/upload/">Upload</a>
									</li>
									<li class="explore_link pr-4 pl-4">
										<a href="<?= BASEURL; ?>/home/signout">Logout</a>
									</li>
								</ul>
							</div>
							<div class="join">
								<a href="<?= BASEURL; ?>/upload" class="link_navigation bg_join">Upload</a>
							</div>
						</div>
					<?php endforeach; ?>
				<?php endif; ?>
				<div class="nav_button">
					<div class="humberger_button">
						<svg width="26" height="20" viewBox="0 0 650 500" fill="none" xmlns="http://www.w3.org/2000/svg">
							<rect class="line_1" width="650" height="110" rx="55" fill="white" />
							<rect class="line_2" y="195" width="500" height="110" rx="55" fill="white" />
							<rect class="line_3" y="390" width="570" height="110" rx="55" fill="white" />
						</svg>
					</div>
					<div class="humberger_navigation" class="height:100vh">
						<ul class="humberger_list">
							<!-- <li class="humberger_link">
									<a href="<?= BASEURL; ?>/join">Join</a>
								</li>
								<li class="humberger_link">
									<a href="<?= BASEURL; ?>/login">Sign in</a>
								</li>
								<hr> -->
							<!-- <li class="humberger_link">
									<a href="<?= BASEURL; ?>/explore/author">Author</a>
								</li> -->
							<?php
							if (isset($_SESSION['login'])) {
								echo "
									<li class ='humberger_link'>
										<a href='" . BASEURL . "/upload'>Upload</a>
									</li>
									<hr>
									<li class ='humberger_link'>
										<a href='" . BASEURL . "/member/user/" . $_SESSION['UID'] . "-" . $usname . "'>Profile</a>
									</li>
									<li class ='humberger_link'>
										<a href='" . BASEURL . "/edit_profile/index/" . $_SESSION['UID'] . "-" . $usname . "'>Profile Settings</a>
									</li>
									<li class ='humberger_link'>
										<a href='" . BASEURL . "/member/user/" . $_SESSION['UID'] . "-" . $usname . "/post_settings'>Post Settings</a>
									</li>
									<li class ='humberger_link'>
										<a href='" . BASEURL . "/home/signout'>Logout</a>
									</li>
									";
							} else {
								echo "
									<li class='humberger_link'>
										<a href='" . BASEURL . "/login'>Login</a>
									</li>
									<li class='humberger_link'>
										<a href='" . BASEURL . "/join'>Join</a>
									</li>
								";
							}
							?>
							<hr>
							<li class="humberger_link">
								<a href="<?= BASEURL; ?>/explore/index">Photos</a>
							</li>
							<li class="humberger_link">
								<a href="<?= BASEURL; ?>/explore/vector">Vectors</a>
							</li>
							<!-- <li class="humberger_link">
								<a href="<?= BASEURL; ?>/explore/icon">Icons</a>
							</li>
							<hr> -->
							<!-- <li class="humberger_link">
									<a href="<?= BASEURL; ?>/other/index">About Us</a>
								</li>
								<li class="humberger_link">
									<a href="<?= BASEURL; ?>/other/faq">FAQ</a>
								</li>
								<li class="humberger_link">
									<a href="<?= BASEURL; ?>/other/privacy">Privacy & Terms</a>
								</li>
								<hr>
								<ul class="humberger_social_media_list">
									<li class=" humberger_social_media_link">
										<a href="https://www.instagram.com/dimas_fauzan890/" class="instagram_hvr"><i class="instagram icon"></i></a>
									</li>
									<li class="humberger_social_media_link">
										<a href="https://www.facebook.com/profile.php?id=100006926894966" class="facebook_hvr"><i class="facebook square icon"></i></a>
									</li>
									<li class="humberger_social_media_link">
										<a href="https://twitter.com/DimasFauzan890" class="twitter_hvr"><i class="twitter icon"></i></a>
									</li>
								</ul> -->
						</ul>
					</div>
				</div>
			</div>

		</div>
	</div>
</nav>