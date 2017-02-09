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

$('#login-form').validate({
	onfocusout: false,
	onkeyup: false,
	rules: {
		email: {
			required: true,
			email: true
		},
		password: {
			required: true
		}
	},
	messages: {
		email: {
			required: 'Please enter your email',
			email: 'Please enter a valid email'
		},
		password: {
			required: 'Please enter your password'
		}
	}
});