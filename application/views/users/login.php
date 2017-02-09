
		<div id="login-page">
			<div id="header">
				
			</div>
			<div id="login-box">
				<h1 class="header text-center">Login</h1>
				<?php echo $this->session->flashdata('msg'); ?>
				<form id="login-form" method="POST">
					<div class="form-group <?php echo (form_error('email')) ? 'has-error' : ''; ?>">
						<input type="text" name="email" placeholder="Email" class="form-control" autocomplete="off" spellcheck="false" value="<?php echo set_value('email'); ?>">
						<?php echo form_error('email'); ?>
					</div>
					<div class="form-group <?php echo (form_error('password')) ? 'has-error' : ''; ?>">
						<input type="password" name="password" placeholder="Password" class="form-control" autocomplete="off" spellcheck="false">
						<?php echo form_error('password'); ?>
	 				</div>
	 				<div class="form-group">
	 					<button type="submit" class="btn btn-primary btn-block">Login</button>
	 				</div>
	 				<p class="form-text">Not registered? <a href="<?php echo site_url('users/register'); ?>">Create an account</a></p>
	 				<p class="form-text forgot-my-password"><a href="<?php echo site_url('users/forgot_password'); ?>">I forgot my password</a></p>
				</form>
			</div>
			<?php echo $this->session->flashdata('confirmation'); ?>
		</div>