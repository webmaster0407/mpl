"use strict";

// Class definition
var KTContactsEdit = function () {
	// Base elements
	var avatar;

	var initAvatar = function() {
		avatar = new KTImageInput('user_avatar');
	}

	var formSubmitHandler = function() {
		$('#update_profile').on('click', function() {
			if (formValidationHandler() === false) {
				return;
			}

			var name = $('#name').val();
			var email = $('#email').val();
			// var photo = $('.photo')[0].files[0];

	        $.ajax({
	            headers: {
	                'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
	            },
	            data: {
	                name: name,
	                email: email,
	                // photo : photo
	                // photo : photo
	            },
	            type: "POST",
	            url: DO_UPDATE_PROFILE_URL,
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
	                    	//
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

		$('#back_btn').on('click', function() {
			window.history.back();
		});

		var formValidationHandler = function() {
			var name = $('#name').val();
			var email = $('#email').val();
			var photo_url = $('.photo').val();

			var rlt = true;
			if (name === "") {
				rlt = false;
				$('.name_error').fadeIn();
				setTimeout(() => {
					$('.name_error').fadeOut();
				}, 3000);
			}

			if (email === "") {
				rlt = false;
				$('.email_error').fadeIn();
				setTimeout(() => {
					$('.email_error').fadeOut();
				}, 3000);
			}

			if (photo_url === undefined || photo_url === null || photo_url === '') {
				rlt = false;
				$('.photo_error').fadeIn();
				setTimeout(() => {
					$('.photo_error').fadeOut();
				}, 3000);
			}

			return rlt;
		}
	}

	return {
		// public functions
		init: function() {
			initAvatar();
			formSubmitHandler();
		}
	};
}();

jQuery(document).ready(function() {
	KTContactsEdit.init();
});
