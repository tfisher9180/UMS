		
		<div id="reset-page">
			<div id="reset-box">
				<h1 class="header text-center">Create new password</h1>
				<?php echo $this->session->flashdata('msg'); ?>
				<form id="reset-form" method="POST">
					<div class="form-group <?php echo (form_error('password')) ? 'has-error' : ''; ?>">
						<input id="new_password" type="password" name="password" placeholder="New password" class="form-control" autocomplete="off" spellcheck="false">
						<?php echo form_error('password'); ?>
	 				</div>
	 				<div class="form-group <?php echo (form_error('confirm_password')) ? 'has-error' : ''; ?>">
						<input type="password" name="confirm_password" placeholder="Confirm password" class="form-control" autocomplete="off" spellcheck="false">
						<?php echo form_error('confirm_password'); ?>
	 				</div>
	 				<?php echo form_hidden('user_id', $user_id); ?>
	 				<div class="form-group">
	 					<button type="submit" class="btn btn-primary btn-block">Change Password</button>
	 				</div>
				</form>
			</div>
			<?php echo $this->session->flashdata('confirmation'); ?>
		</div>