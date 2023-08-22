<img class="wave" src="<?= BASEURL; ?>/assets/image/wave1.png">
<div class="login-container">
	<div class="img">
		<img src="<?= BASEURL; ?>/assets/image/undraw_photo_album_e8hj.svg">
	</div>
	<div class="login-content">
		<form action="<?= BASEURL; ?>/join" method="post" class="form">
			<!-- <img src="<?= BASEURL; ?>/assets/image/undraw_male_avatar_323b.svg">
				<h2 class="title">Welcome</h2> -->
			<div class="input-div 1">
				<div class="i">
					<i class="user icon"></i>
				</div>

				<div class="div">
					<h5>Username</h5>
					<input type="text" class="input" name="username" required autocomplete="off" pattern="[A-Za-z0-9_\.\-]{5,25}" title="Only allow characters from A-Z, a-z, 0-9, underscore, period and dash. can't be less than 5 characters and maximal 25 charachters" maxlength="25">
				</div>
			</div>

			<div class="input-div one">
				<div class="i">
					<i class="id badge icon d-block mr-3"></i>
				</div>
				<div class="div">
					<h5>Email</h5>
					<input type="email" class="input" name="email" required autocomplete="off">
				</div>
			</div>
			<div class="input-div pass">
				<div class="i">
					<i class="lock icon"></i>
				</div>
				<div class="div">
					<h5>Password</h5>
					<input type="password" class="input" name="password" required autocomplete="off" pattern="^(?=.*[0-9]+.*)(?=.*[a-z]+.*)(?=.*[A-Z]+.*)[0-9a-zA-Z]{8,}$" title="Password must contain at least one uppercase letter, at least one lowercase letter, at least one number, and be longer than seven characters">
				</div>
				<div class="i i-eye i-eye-display-none">	
					<i class="eye icon"></i>
				</div>
			</div>
			<div class="input-div pass">
				<div class="i">
					<i class="lock icon"></i>
				</div>
				<div class="div">
					<h5>Repeat Password</h5>
					<input type="password" class="input" name="confirmPassword" required autocomplete="off" pattern="^(?=.*[0-9]+.*)(?=.*[a-z]+.*)(?=.*[A-Z]+.*)[0-9a-zA-Z]{8,}$" title="Password must contain at least one uppercase letter, at least one lowercase letter, at least one number, and be longer than seven characters">
				</div>
			</div>
			<!-- <a href="#" class="a-forget-pass">Forgot Password?</a> -->
			<button type="submit" class="btn" name="join">Sign up</button>
			<!-- <input type="submit" class="btn" value="Login">  -->
			<p>Already have an account? <a href="<?= BASEURL; ?>/login"> Login </a></p>
		</form>
	</div>
</div>