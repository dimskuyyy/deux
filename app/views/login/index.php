<img class="wave" src="<?= BASEURL; ?>/assets/image/wave1.png">
<div class="login-container">
    <div class="img">
        <img src="<?= BASEURL; ?>/assets/image/undraw_photo_album_e8hj.svg">
    </div>
    <div class="login-content">
        <form action="<?= BASEURL; ?>/login" method="POST" class="form">
            <img src="<?= BASEURL; ?>/assets/image/undraw_male_avatar_323b.svg">
            <h2 class="title">Welcome</h2>
            <div class="input-div one">
                <div class="i">
                    <i class="user icon"></i>
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
                    <input type="password" class="input" name="password" required autocomplete="off">

                </div>
                <div class="i i-eye i-eye-display-none">
                    <i class="eye icon"></i>
                </div>
            </div>
            <div class="pass-condition">
                <div class="remember-pass mt-2">
                    <input type="checkbox" name="remember" id="rememberCheck" class="remember">
                    <label for="rememberCheck" class="remember-label">
                        <span>Remember Me</span>
                    </label>
                </div>
                <!-- <a href="" class="a-forget-pass mt-2">Forgot Password?</a> -->

            </div>
            <button type="submit" class="btn" name="login">Sign in</button>
            <!-- <input type="submit" class="btn" value="Login">  -->
            <p>Don't have any account? <a href="<?= BASEURL; ?>/join">Sign up now</a></p>
        </form>
    </div>
</div>