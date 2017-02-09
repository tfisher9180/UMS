$.validator.setDefaults({
    highlight: function(element) {

        $(element).closest('.form-group').addClass('has-error');

    },
    unhighlight: function(element) {

        $(element).closest('.form-group').removeClass('has-error');

    },
    errorElement: 'span',
    errorClass: 'help-block'
});

$('#forgot-form').validate({
	onkeyup: false,
	rules: {
		email: {
			required: true,
			email: true
		}
	},
	messages: {
		email: {
			required: 'Please enter your email',
			email: 'Please enter a valid email'
		}
	}
});

$('#forgot-email').on('blur', function() {
	var email_field = $(this);
	if ($(this).val()) {
		$.ajax({
			url: site_url('/users/ajax_email_check'),
			data: { email: email_field.val() },
			dataType: 'JSON',
			type: 'POST',
			success: function(unique) {
				if (unique.success) {
					email_field.parent().addClass('has-error has-feedback');
					email_field.parent().removeClass('has-success');
					$('#email-status-message').html('<i class="fa fa-envelope"></i> &nbsp; We couldn\'t find an account associated with this email address').fadeIn().css('display', 'block');

					$('#email-not-taken').remove();
					$('<span id="email-taken" class="glyphicon glyphicon-remove form-control-feedback"></span>').insertAfter(email_field);
				} else {
					email_field.parent().addClass('has-success has-feedback');
					email_field.parent().removeClass('has-error');

					$('#email-taken').remove();
					$('#email-status-message').remove();
					$('<span id="email-not-taken" class="glyphicon glyphicon-ok form-control-feedback"></span>').insertAfter(email_field);
				}
			}
		});
	} else {
		$('#email-status-message').hide();
		email_field.parent().removeClass('has-success has-feedback');
		$('#email-not-taken').hide();
		$('#email-taken').hide();
	}
});