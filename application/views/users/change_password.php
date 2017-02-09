
		<div id="change-page">
			<div id="change-box">
				<h1 class="header text-center">Change password</h1>
				<?php echo $this->session->flashdata('msg'); ?>
				<form id="change-form" method="POST">
					<div class="form-group <?php echo (form_error('old_password')) ? 'has-error' : ''; ?>">
						<input id="old_password" type="password" name="old_password" placeholder="Old password" class="form-control" autocomplete="off" spellcheck="false">
						<?php echo form_error('old_password'); ?>
	 				</div>
	 				<div class="form-group <?php echo (form_error('password')) ? 'has-error' : ''; ?>">
						<input id="new_password" type="password" name="password" placeholder="New password" class="form-control" autocomplete="off" spellcheck="false">
						<?php echo form_error('password'); ?>
	 				</div>
	 				<div class="form-group <?php echo (form_error('confirm_password')) ? 'has-error' : ''; ?>">
						<input id="confirm_new_password" type="password" name="confirm_password" placeholder="Confirm new password" class="form-control" autocomplete="off" spellcheck="false">
						<?php echo form_error('confirm_password'); ?>
	 				</div>
	 				<button type="submit" class="btn btn-primary btn-block">Update Password</button>
	 				</div>
				</form>
			</div>
			<?php echo $this->session->flashdata('confirmation'); ?>
		</div>