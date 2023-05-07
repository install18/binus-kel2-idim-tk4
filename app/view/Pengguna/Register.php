	<div class="limiter">
	  <div class="container-login100">
	    <div class="wrap-login100">
	      <div class="login100-pic js-tilt" data-tilt>
	        <img src="<?= ASSETS; ?>images/img-01.png" alt="IMG">
	      </div>

	      <form class="login100-form validate-form" action="<?= BASEURL; ?>Pengguna/processRegister" method="post">
	        <span class="login100-form-title">
	          Member Register
	        </span>

	        <div class="wrap-input100 validate-input" data-validate="First Name is required">
	          <input class="input100" type="text" name="namaDepan" placeholder="First Name">
	          <span class="focus-input100"></span>
	          <span class="symbol-input100">
	            <i class="fa fa-user" aria-hidden="true"></i>
	          </span>
	        </div>

	        <div class="wrap-input100 validate-input" data-validate="Last Name is required">
	          <input class="input100" type="text" name="namaBelakang" placeholder="Last Name">
	          <span class="focus-input100"></span>
	          <span class="symbol-input100">
	            <i class="fa fa-user" aria-hidden="true"></i>
	          </span>
	        </div>

	        <div class="wrap-input100 validate-input" data-validate="Phone No is required">
	          <input class="input100" type="text" name="noHp" placeholder="Phone Number">
	          <span class="focus-input100"></span>
	          <span class="symbol-input100">
	            <i class="fa fa-address-book" aria-hidden="true"></i>
	          </span>
	        </div>

	        <div class="wrap-input100 validate-input" data-validate="Username is required">
	          <input class="input100" type="text" name="namaPengguna" placeholder="Username">
	          <span class="focus-input100"></span>
	          <span class="symbol-input100">
	            <i class="fa fa-fw fa-at" aria-hidden="true"></i>
	          </span>
	        </div>

	        <div class="wrap-input100 validate-input" data-validate="Password is required">
	          <input class="input100" type="password" name="password" placeholder="Password">
	          <span class="focus-input100"></span>
	          <span class="symbol-input100">
	            <i class="fa fa-lock" aria-hidden="true"></i>
	          </span>
	        </div>

	        <div class="wrap-input100 validate-input" data-validate="Address is required">
	          <input class="input100" type="text" name="alamat" placeholder="Address">
	          <span class="focus-input100"></span>
	          <span class="symbol-input100">
	            <i class="fa fa-address-book" aria-hidden="true"></i>
	          </span>
	        </div>

	        <?php Flasher::flash(); ?>

	        <div class="container-login100-form-btn">
	          <button type="submit" class="login100-form-btn" href="<?= ASSETS; ?>Pengguna/processRegister">
	            Register
	          </button>
	        </div>

	        <div class="text-center p-t-136">
	          <a class="txt2" href="<?= ASSETS; ?>Pengguna/login">
	            Already have an account? Login here
	            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
	          </a>
	        </div>
	      </form>
	    </div>
	  </div>
	</div>