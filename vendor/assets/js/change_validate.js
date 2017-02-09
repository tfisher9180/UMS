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

$('#change-form').validate({
	onfocusout: false,
	onkeyup: false,
	rules: {
		old_password: {
			required: true,
			remote: {
				url: "ajax_check_password",
				type: 'POST',
				data: {
					old_password: function() {
						return $('#old_password').val();
					}
				}
			}
		},
		password: {
			required: true,
			maxlength: 20,
			minlength: 6
		},
		confirm_password: {
			required: true,
			equalTo: '#new_password'
		}
	},
	messages: {
		old_password: {
			required: 'Please enter your old password',
			remote: 'Your password did not match'
		},
		password: {
			required: 'Please enter a new password',
			maxlength: jQuery.validator.format("Password can only be {0} characters"),
			minlength: jQuery.validator.format("Password must be at least {0} characters")
		},
		confirm_password: {
			required: 'Please confirm your password',
			equalTo: 'Your passwords did not match'
		}
	}
});