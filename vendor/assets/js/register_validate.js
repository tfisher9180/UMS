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

$('#register-form').validate({
	onfocusout: false,
	onkeyup: false,
	rules: {
		fname: {
			required: true,
			maxlength: 35,
			minlength: 2
		},
		lname: {
			required: true,
			maxlength: 35,
			minlength: 2
		},
		email: {
			required: true,
			email: true,
			maxlength: 254,
			minlength: 3
		},
		password: {
			required: true,
			maxlength: 20,
			minlength: 6
		}
	},
	messages: {
		fname: {
			required: 'This field is required',
			maxlength: jQuery.validator.format("Maximum {0} characters"),
			minlength: jQuery.validator.format("Minimum {0} characters")
		},
		lname: {
			required: 'This field is required',
			maxlength: jQuery.validator.format("Maximum {0} characters"),
			minlength: jQuery.validator.format("Minimum {0} characters")
		},
		email: {
			required: 'Please enter your email',
			email: 'Please enter a valid email',
			maxlength: jQuery.validator.format("Maximum {0} characters"),
			minlength: jQuery.validator.format("Minimum {0} characters")
		},
		password: {
			required: 'Please enter your password',
			maxlength: jQuery.validator.format("Password can only be {0} characters"),
			minlength: jQuery.validator.format("Password must be at least {0} characters")
		}
	}
});

$('#register-email').on('blur', function() {
	var email_field = $(this);
	if ($(this).val()) {
		$.ajax({
			url: site_url('/users/ajax_email_check'),
			data: { email: email_field.val() },
			dataType: 'JSON',
			type: 'POST',
			success: function(unique) {
				if (unique.success) {
					email_field.parent().addClass('has-success has-feedback');
					email_field.parent().removeClass('has-error');
					$('#email-status-message').html('<i class="fa fa-check-circle"></i> &nbsp;Email is available').fadeIn().css('display', 'block');

					$('#email-taken').remove();
					$('<span id="email-not-taken" class="glyphicon glyphicon-ok form-control-feedback"></span>').insertAfter(email_field);
				} else {
					$(email_field).parent().addClass('has-error has-feedback');
					$(email_field).parent().removeClass('has-success');
					$('#email-status-message').html('<i class="fa fa-envelope"></i> &nbsp; This email is already taken!').fadeIn().css('display', 'block');

					$('#email-not-taken').remove();
					$('<span id="email-taken" class="glyphicon glyphicon-remove form-control-feedback"></span>').insertAfter(email_field);
				}
			}
		});
	} else {
		$('#email-status-message').hide();
		email_field.parent().removeClass('has-success has-feedback has-error');
		$('#email-not-taken').hide();
		$('#email-taken').hide();
	}
});