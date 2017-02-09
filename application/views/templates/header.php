<!DOCTYPE html>
<html lang="en">
	<head>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>User Management</title>

		<link rel="stylesheet" href="<?php echo base_url('vendor/twbs/bootstrap/dist/css/bootstrap.min.css'); ?>">
		<link rel="stylesheet" href="<?php echo base_url('vendor/fortawesome/font-awesome/css/font-awesome.min.css'); ?>">
		<link rel="stylesheet" href="<?php echo base_url('vendor/assets/css/main.css'); ?>">

		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400">

		<script type="text/javascript">
			var base_url_string = '<?php echo base_url(); ?>';
			function base_url(string) {
				return base_url_string + string;
			}
			var site_url_string = '<?php echo site_url(); ?>';
			function site_url(string) {
				return site_url_string + string;
			}
		</script>
		
	</head>
	<body <?php echo isset($page) ? 'class="'.$page.'"' : ''; ?>>
	