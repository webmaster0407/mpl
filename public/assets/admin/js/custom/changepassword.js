$(document).ready(function() {
	$('#changePassword').on('click', function() {
		if (changePasswordFormValidator() === false) {
			return;
		}

		var current_password = $('#current_password').val();
		var new_password = $('#new_password').val();

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
            },
            data: {
                current_password: current_password,
                new_password: new_password,
            },
            type: "POST",
            url: CHANGE_PASSWORD_URL,
            beforeSend: function() {
                KTApp.blockPage({
                    overlayColor: '#000000',
                    state: 'primary',
                    message: 'Processing...'
                });
            },
            success: function(data) {
                data = $.parseJSON(data);
                KTApp.unblockPage();
                if (data.status == "success") {
					swal.fire({
                        text: data.message,
                        icon: "success",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn font-weight-bold btn-light-primary"
                        }
                    }).then(function() {
						$('#current_password').val('');
						$('#new_password').val('');
						$('#verify_password').val('');
                    });
                } else {
                    swal.fire({
                        text: data.message,
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn font-weight-bold btn-light-primary"
                        }
                    }).then(function() {
                        KTUtil.scrollTop();
                        console.log("Failed");
                    });
                }
            },
            error: function(error) {
                KTApp.unblockPage();
                swal.fire({
                    text: "Server error!",
                    icon: "error",
                    buttonsStyling: false,
                    confirmButtonText: "Ok, got it!",
                    customClass: {
                        confirmButton: "btn font-weight-bold btn-light-primary"
                    }
                }).then(function() {
                    KTUtil.scrollTop();
                    console.log("server error");
                });
            }
        });
	});

	$('#resetBtn').on('click', function() {
		$('#current_password').val('');
		$('#new_password').val('');
		$('#verify_password').val('');
	});

	var changePasswordFormValidator = function() {
		var current_password = $('#current_password').val();
		var new_password = $('#new_password').val();
		var verify_password = $('#verify_password').val();

		var rlt = true;

		if (current_password == "") {
			rlt = false;
			$('.current_password_error').fadeIn();
			setTimeout(() => {
				$('.current_password_error').fadeOut();
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
	}
});