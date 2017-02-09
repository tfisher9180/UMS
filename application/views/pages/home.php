	
		<div id="home-page">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h1>Welcome, authenticated user!</h1>
						<h4>Enter your site content here</h4>
						<div class="buttons">
							<a href="<?php echo site_url('users/logout'); ?>" class="btn btn-primary btn-rounded btn-outline">Logout</a>
							<a href="<?php echo site_url('users/change_password'); ?>" class="btn btn-default btn-rounded">Change Password</a>
						</div>
					</div>
				</div>
			</div>
		</div>