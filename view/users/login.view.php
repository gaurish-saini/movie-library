<div class="container col s12 md12" style="padding-top: 40px;"> 
	<div class="row card-panel grey lighten-4 center">
		<div class="col s6 md6 login-view">
			<h5>Log In.</h5>
			<div class="divider"></div>
			</br>
			<form action="/login" method="POST">
				<div class="input-field indigo-text text-darken-4 ">
					<i class="material-icons prefix">email</i>
					<input id="icon_prefix" type="email" class="validate" value="<?php echo htmlspecialchars( $emailid ); ?>" id="emailid" name="emailid">
					<label for="email">Enter Email*</label>
				</div>
				<?php if ( $msg1 ) : ?>
				<small class="red-text left label-margin"><?php echo $msg1; ?></small>
				</br>
				<?php endif ?>
				<div class="input-field indigo-text text-darken-4 ">
					<i class="material-icons prefix">lock</i>
					<input id="icon_prefix" type="password" class="validate" value="<?php echo htmlspecialchars( $password ); ?>" id="password" name="password">
					<label for="password">Password*</label>
				</div>
				<?php if ( $msg2 ) : ?>
				<small class="red-text left label-margin"><?php echo $msg2; ?></small>
				</br>
				<?php endif ?>
				<label class="right"><a href="#modal1" class="indigo-text modal-trigger">Forgot Password ?</a></label>
				</br>
				<div class="center">
					<input type="submit" name="login" value="sign in" class="btn indigo-text tab-color z-depth-0 ">          
				</div></br>
				<div class="divider brand-text"></div>
				<div class="center"><label class="portal-label">New Reader? <a href="/index?register=1" class="indigo-text">Create a Account</a></label></br></div>
			</form>
		</div>
		<!-- <div class=" col s6 md6 white">
			<img src="resources\uploads\illustraton.png" alt="illustration">
			<h4 class="indigo-text">Once you learn to read, you will be forever free</h4>
		</div> -->
	</div>
</div>
