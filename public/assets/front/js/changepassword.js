var changePasswordEventHandlers = function() {

	var changePassword = function() {
		$('#changePasswordBtn').on('click', function () {
			if (changePasswordValdiation() === false) {
				return;
			}
			var password = $('#password').val();
			var new_password = $('#new_password').val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                },
                data: {
                    password : password,
                    new_password : new_password
                },
                type: "POST",
                url: DO_CHANGE_PASSWORD_URL,
                beforeSend: function() {
                    $.blockUI({ message: 'Please wait...<span class="spinner spinner-primary"></span>' });
                },
                success: function(data) {
                    data = $.parseJSON(data);
                    $.unblockUI();
                    if (data.status == "success") {
                        swal({
                            title: data.message,
                            type: 'success',
                            confirmButtonText: "Ok, got it!",
                            confirmButtonClass: 'btn-primary',
                            showConfirmButton: false,
                            timer: 3000,
                        });
                    } else {
                        swal({
                            title: data.message,
                            type: 'error',
                            confirmButtonText: "Ok, got it!",
                            confirmButtonClass: 'btn-warning',
                            showConfirmButton: false,
                            timer: 3000,
                        });
                        console.log('failed');
                    }
                },
                error: function(error) {
                    $.unblockUI();
                    swal({
                        title: 'Server Error!',
                        type: 'error',
                        confirmButtonText: "Ok, got it!",
                        confirmButtonClass: 'btn-warning',
                        showConfirmButton: false,
                        timer: 3000,
                    });
                }
            });
		});

		var changePasswordValdiation = function() {
			var password = $('#password').val();
			var new_password = $('#new_password').val();
			var verify_password = $('#verify_password').val();

			var rlt = true;

			if (password == "") {
				rlt = false;
				$('.password_error').fadeIn();
				setTimeout(() => {
					$('.password_error').fadeOut();
				}, 3000);
			}
			if (new_password == "") {
				rlt = false;
				$('.new_password_error').fadeIn();
				setTimeout(() => {
					$('.new_password_error').fadeOut();
				}, 3000);
			}
			if (verify_password == "") {
				rlt = false;
				$('.verify_password_error').fadeIn();
				setTimeout(() => {
					$('.verify_password_error').fadeOut();
				}, 3000);
			}

			if (new_password !== verify_password) {
				rlt = false;
				$('.same_password_error').fadeIn();
				setTimeout(() => {
					$('.same_password_error').fadeOut();
				}, 3000);
			}
			return rlt;
		};
	};

	return {
		init: function() {
			changePassword();
		}
	};
}();

jQuery(document).ready(function() {
	changePasswordEventHandlers.init();
});