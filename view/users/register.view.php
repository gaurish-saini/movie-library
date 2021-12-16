<div class="container col s12 md12" style="padding-top: 40px;">
	<div class="row card-panel grey lighten-4 center">
		<div class="col s6 md6 register-view">
			<h5>Register.</h5>
			<div class="divider"></div>
			</br>
			<form action="/registration"  method="POST" onsubmit="return (checkFieldName('rname') && checkFieldEmail('remailid') && checkFieldPassword('rpassword') && passwordMatch('rpassword','password1'))">
				<div class="input-field indigo-text text-darken-4 ">
					<i class="material-icons prefix">person</i>
					<label for="email">Enter Full Name*</label>
					<input id="icon_prefix" type="text" class="validate" value="<?php echo htmlspecialchars( $rname ); ?>" id="rname" name="rname" onkeyup="checkFieldName('rname')" onblur="checkFieldName('rname')">
				</div>
				<?php if ( $msg1 ) : ?>
				<small class="red-text left label-margin" id='errorrname'><?php echo $msg1; ?></small>
				</br>
				<?php endif ?>
				<div class="input-field indigo-text text-darken-4 ">
					<i class="material-icons prefix">email</i>
					<label for="email">Enter Email*</label>
					<input id="icon_prefix" type="email" class="validate" value="<?php echo htmlspecialchars( $emailid ); ?>" id="remailid" name="remailid" onkeyup="checkFieldEmail('remailid')" onblur="checkFieldEmail('remailid')">
				</div>
				<?php if ( $msg2 ) : ?>
				<small class="red-text left label-margin" id='errorremailid'><?php echo $msg2; ?></small>
				</br>
				<?php endif ?>
				<div class="input-field indigo-text text-darken-4 ">
					<i class="material-icons prefix">lock_outline</i>
					<label for= "password">Create Password*</label>
					<input id="icon_prefix" type="password" class="validate" value="<?php echo htmlspecialchars( $password ); ?>" id="rpassword" name="rpassword"  onkeyup="checkFieldPassword('rpassword')" onblur="checkFieldPassword('rpassword')">
				</div>
				<?php if ( $msg3 ) : ?>
				<small class="red-text left label-margin" id="errorrpassword"><?php echo $msg3; ?></small>
				</br>
				<?php endif ?>
				<div class="input-field indigo-text text-darken-4 ">
					<i class="material-icons prefix">lock</i>
					<label for= "password">Confirm Password*</label>
					<input id="icon_prefix" type="password" class="validate" value="<?php echo htmlspecialchars( $password1 ); ?>" id="password1" name="password1" onkeyup="passwordMatch('rpassword','password1')" onblur="passwordMatch('rpassword','password1')">
				</div>
				<small id="errorpassword1" class="red-text left label-margin"></small>
				<div class="center">
					<input type="submit" name="signup" value="sign up" class="btn indigo-text tab-color z-depth-0">
				</div></br>
				<div class="divider"></div>
				<div><label class="portal-label">Already Registered ? <a href="/" class="indigo-text">Log In</a></label></br></div>
			</form>
		</div>
		<!-- <div class=" col s6 md6 white">
			<img src="resources\uploads\illustraton.png" alt="illustration">
			<h4 class="indigo-text">Once you learn to read, you will be forever free</h4>
		</div> -->
	</div>
</div>
