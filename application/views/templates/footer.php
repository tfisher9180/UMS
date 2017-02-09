		
		
		<script src="<?php echo base_url('vendor/components/jquery/jquery.min.js'); ?>"></script>
		<script src="<?php echo base_url('vendor/twbs/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
		<script src="<?php echo base_url('vendor/assets/js/main.js'); ?>"></script>
<?php if (isset($scripts)) { foreach($scripts as $script) { ?>
		<script src="<?php echo base_url('vendor/assets/js/'.$script); ?>"></script>
<?php }} ?>

	</body>
</html>