<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-pic js-tilt" data-tilt>
                <img src="<?= ASSETS; ?>images/img-01.png" alt="IMG">
            </div>

            <form class="login100-form validate-form" action="<?= BASEURL; ?>/Pengguna/processLogin" method="post">
                <span class="login100-form-title">
                    Member Login
                </span>

                <div class="wrap-input100 validate-input" data-validate="Username is required">
                    <input class="input100" type="text" name="username" placeholder="Username">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-user" aria-hidden="true"></i>
                    </span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Password is required">
                    <input class="input100" type="password" name="password" placeholder="Password">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                    </span>
                </div>

                <?php Flasher::flash(); ?>

                <div class="container-login100-form-btn">
                    <button type="submit" class="login100-form-btn" href="<?= ASSETS; ?>Pengguna/processLogin">
                        Login
                    </button>
                </div>

                <div class="text-center p-t-136">
                    <a class="btn btn-primary" href="<?= ASSETS; ?>Pengguna/register">
                        Register
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>