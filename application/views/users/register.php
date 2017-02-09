
		<div id="register-page">
			<div id="register-box">
				<h1 class="header text-center">Register</h1>
				<form id="register-form" method="POST">
					<div class="form-group">
						<div class="col-md-6 form-inline <?php echo (form_error('fname')) ? 'has-error' : ''; ?>">
							<input type="text" name="fname" placeholder="First name" class="form-control" autocomplete="off" spellcheck="false" value="<?php echo set_value('fname'); ?>">
							<?php echo form_error('fname'); ?>
						</div>
						<div class="col-md-6 form-inline <?php echo (form_error('lname')) ? 'has-error' : ''; ?>">
							<input type="text" name="lname" placeholder="Last name" class="form-control" autocomplete="off" spellcheck="false" value="<?php echo set_value('lname'); ?>">
							<?php echo form_error('lname'); ?>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="form-group <?php echo (form_error('email')) ? 'has-error' : ''; ?>">
						<input id="register-email" type="text" name="email" placeholder="Email" class="form-control" autocomplete="off" spellcheck="false" value="<?php echo set_value('email'); ?>">
						<span id="email-status-message" class="help-block fade-in-form-message text-left"></span>
						<?php echo form_error('email'); ?>
					</div>
					<div class="form-group <?php echo (form_error('password')) ? 'has-error' : ''; ?>">
						<input type="password" name="password" placeholder="Password" class="form-control" autocomplete="off" spellcheck="false">
						<?php echo form_error('password'); ?>
	 				</div>
	 				<div class="form-group">
	 					<button type="submit" class="btn btn-primary btn-block">Create Account</button>
	 				</div>
	 				<p class="form-text">Already registered? <a href="<?php echo site_url('users/login'); ?>">Sign in</a></p>
				</form>
			</div>
		</div>