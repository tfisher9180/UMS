		
		<div id="forgot-page">
			<div id="forgot-box">
				<h1 class="header text-center">Enter your email</h1>
				<?php echo $this->session->flashdata('msg'); ?>
				<form id="forgot-form" method="POST">
					<div class="form-group <?php echo (form_error('email')) ? 'has-error' : ''; ?>">
						<input id="forgot-email" type="text" name="email" placeholder="Email" class="form-control" autocomplete="off" spellcheck="false" value="<?php echo set_value('email'); ?>">
						<span id="email-status-message" class="help-block fade-in-form-message text-left"></span>
						<?php echo form_error('email'); ?>
					</div>
	 				<div class="form-group">
	 					<button type="submit" class="btn btn-primary btn-block">Reset Password</button>
	 				</div>
	 				<p class="form-text">Not registered? <a href="<?php echo site_url('users/register'); ?>">Create an account</a></p>
				</form>
			</div>
			<?php echo $this->session->flashdata('confirmation'); ?>
		</div>