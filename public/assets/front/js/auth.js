var AuthEventsHandlers = function() {

	var loginEventHandlers = function() {
		$('#loginBtn').on('click', function(e) {
			
			e.preventDefault();
			if ( loginEventValidation() === false ) {
				return;
			}
			var email = $('#email').val();
			var password = $('#password').val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                },
                data: {
                    email : email,
                    password : password
                },
                type: "POST",
                url: LOGIN_URL,
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
                        window.location = BASE_URL;
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

		var loginEventValidation = function() {
			var email = $('#email').val();
			var password = $('#password').val();
			var rlt = true;
			if ( email === undefined || email === null || email === "" ) {
				rlt = false;
				$('.email_error').fadeIn();
				setTimeout(() => {
					$('.email_error').fadeOut();
				}, 3000);
			}

			if ( password === undefined || password === null || password === "" ) {
				rlt = false;
				$('.password_error').fadeIn();
				setTimeout(() => {
					$('.password_error').fadeOut();
				}, 3000);
			}
			return rlt;
		}
	};

	var RegisterAsClientEventHandlers = function() {

		$('#registerAsClientBtn').on('click', function (e) {
			e.preventDefault();
			if ( registerAsClientEventValidation() === false ) {
				return;
			}

            var name = $('#name').val();
            var email = $('#email').val();
            var password = $('#password').val();
            var company = $('#company').val();
            var telephone = $('#telephone').val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                },
                data: {
                	mode : 'CLIENT_MODE',
                	name : name,
                    email : email,
                    password : password,
                    company : company,
                    telephone : telephone
                },
                type: "POST",
                url: DO_REGISTER_URL,
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
                            confirmButtonClass: 'btn-primary',
                            showConfirmButton: false,
                            timer: 2000,
                        });
                        window.location = LOGIN_URL;
                    } else {
                        swal({
                            title: data.message,
                            type: 'error',
                            confirmButtonText: "Ok, got it!",
                            confirmButtonClass: 'btn-warning',
                            showConfirmButton: false,
                            timer: 3000,
                        });
                    }
                },
                error: function(error) {
                    $.unblockUI();
                    swal({
                        title: 'Server Error',
                        type: 'error',
                        confirmButtonText: "Ok, got it!",
                        confirmButtonClass: 'btn-warning',
                        showConfirmButton: false,
                        timer: 3000,
                    });
                }
            });
		});

		var registerAsClientEventValidation = function () {
            var name = $('#name').val();
            var email = $('#email').val();
            var password = $('#password').val();
            var verify_password = $('#verify_password').val();
            var company = $('#company').val();
            var telephone = $('#telephone').val();

            var rlt = true;

            if ( name === undefined || name === null || name === "" ) {
            	rlt = false;
				$('.name_error').fadeIn();
				setTimeout(() => {
					$('.name_error').fadeOut();
				}, 3000);
            }

            if ( email === undefined || email === null || email === "" ) {
            	rlt = false;
				$('.email_error').fadeIn();
				setTimeout(() => {
					$('.email_error').fadeOut();
				}, 3000);
            }

            if ( telephone === undefined || telephone === null || telephone === "" ) {
            	rlt = false;
				$('.telephone_error').fadeIn();
				setTimeout(() => {
					$('.telephone_error').fadeOut();
				}, 3000);
            }

            if ( password === undefined || password === null || password === "" ) {
            	rlt = false;
				$('.password_error').fadeIn();
				setTimeout(() => {
					$('.password_error').fadeOut();
				}, 3000);
            }

            if ( verify_password === undefined || verify_password === null || verify_password === "" ) {
            	rlt = false;
				$('.verify_password_error').fadeIn();
				setTimeout(() => {
					$('.verify_password_error').fadeOut();
				}, 3000);
            }

            if ( password !== verify_password ) {
            	rlt = false;
				$('.same_password_error').fadeIn();
				setTimeout(() => {
					$('.same_password_error').fadeOut();
				}, 3000);
            }

            if ( company === undefined || company === null || company === "" ) {
            	rlt = false;
				$('.company_error').fadeIn();
				setTimeout(() => {
					$('.company_error').fadeOut();
				}, 3000);
            }

            return rlt;
		}
	};

	var RegisterAsTalentEventHandlers = function() {

		$('#registerAsTalentBtn').on('click', function(e) {
			e.preventDefault();
			if ( RegisterAsTalentEventValidation() === false ) {
				return;
			}
            var name = $('#name').val();
            var email = $('#email').val();
            var password = $('#password').val();
            var cat_id = $('#cat_id').val();
            var phone = $('#phone').val();
            var birthday_year = $('#birthday_year').val();
            var height = $('#height').val();
            var weight = $('#weight').val();
            var chest = $('#chest').val();
            var hips = $('#hips').val();
            var shoes = $('#shoes').val();
            var job_reference = $('#job_reference').val();
            var gender = $("input[name='gender']:checked").val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                },
                data: {
                	mode : 'TALENT_MODE',
            		email : email,
                    name : name,
            		password : password,
            		cat_id : cat_id,
            		phone : phone,
            		birthday_year : birthday_year,
            		height : height,
            		weight : weight,
            		chest : chest,
            		hips : hips,
            		shoes : shoes,
            		job_reference : job_reference,
            		gender : gender
                },
                type: "POST",
                url: DO_REGISTER_URL,
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
                            confirmButtonClass: 'btn-primary',
                            showConfirmButton: false,
                            timer: 2000,
                        });
                        window.location = LOGIN_URL;
                    } else {
                        swal({
                            title: data.message,
                            type: 'error',
                            confirmButtonText: "Ok, got it!",
                            confirmButtonClass: 'btn-warning',
                            showConfirmButton: false,
                            timer: 3000,
                        });
                    }
                },
                error: function(error) {
                    $.unblockUI();
                    swal({
                        title: 'Server Error',
                        type: 'error',
                        confirmButtonText: "Ok, got it!",
                        confirmButtonClass: 'btn-warning',
                        showConfirmButton: false,
                        timer: 3000,
                    });
                }
            });
		});

		var RegisterAsTalentEventValidation = function () {
            var name = $('#name').val();
            var email = $('#email').val();
            var password = $('#password').val();
            var verify_password = $('#verify_password').val();
            var cat_id = $('#cat_id').val();
            var phone = $('#phone').val();
            var birthday_year = $('#birthday_year').val();
            var height = $('#height').val();
            var weight = $('#weight').val();
            var chest = $('#chest').val();
            var hips = $('#hips').val();
            var shoes = $('#shoes').val();
            var job_reference = $('#job_reference').val();
            var gender = $("input[name='gender']:checked").val();
            var cat_id = $('#cat_id').val();

            var rlt = true;

            if ( name === undefined || name === null || name === "" ) {
            	rlt = false;
				$('.name_error').fadeIn();
				setTimeout(() => {
					$('.name_error').fadeOut();
				}, 3000);
            }

            if ( email === undefined || email === null || email === "" ) {
            	rlt = false;
				$('.email_error').fadeIn();
				setTimeout(() => {
					$('.email_error').fadeOut();
				}, 3000);
            }

            if ( cat_id === undefined || cat_id === null || cat_id === "" ) {
                rlt = false;
                $('.cat_id_error').fadeIn();
                setTimeout(() => {
                    $('.cat_id_error').fadeOut();
                }, 3000);
            }

            if ( password === undefined || password === null || password === "" ) {
            	rlt = false;
				$('.password_error').fadeIn();
				setTimeout(() => {
					$('.password_error').fadeOut();
				}, 3000);
            }

            if ( verify_password === undefined || verify_password === null || verify_password === "" ) {
            	rlt = false;
				$('.verify_password_error').fadeIn();
				setTimeout(() => {
					$('.verify_password_error').fadeOut();
				}, 3000);
            }

            if ( password !== verify_password ) {
            	rlt = false;
				$('.same_password_error').fadeIn();
				setTimeout(() => {
					$('.same_password_error').fadeOut();
				}, 3000);
            }

            if ( cat_id === undefined || cat_id === null || cat_id === "" ) {
            	rlt = false;
				$('.cat_id_error').fadeIn();
				setTimeout(() => {
					$('.cat_id_error').fadeOut();
				}, 3000);
            }

            if ( phone === undefined || phone === null || phone === "" ) {
            	rlt = false;
				$('.phone_error').fadeIn();
				setTimeout(() => {
					$('.phone_error').fadeOut();
				}, 3000);
            }

            if ( birthday_year === undefined || birthday_year === null || birthday_year === "" ) {
            	rlt = false;
				$('.birthday_year_error').fadeIn();
				setTimeout(() => {
					$('.birthday_year_error').fadeOut();
				}, 3000);
            }

            if ( height === undefined || height === null || height === "" ) {
            	rlt = false;
				$('.height_error').fadeIn();
				setTimeout(() => {
					$('.height_error').fadeOut();
				}, 3000);
            }

            if ( weight === undefined || weight === null || weight === "" ) {
            	rlt = false;
				$('.weight_error').fadeIn();
				setTimeout(() => {
					$('.weight_error').fadeOut();
				}, 3000);
            }

            if ( chest === undefined || chest === null || chest === "" ) {
            	rlt = false;
				$('.chest_error').fadeIn();
				setTimeout(() => {
					$('.chest_error').fadeOut();
				}, 3000);
            }

            if ( hips === undefined || hips === null || hips === "" ) {
            	rlt = false;
				$('.hips_error').fadeIn();
				setTimeout(() => {
					$('.hips_error').fadeOut();
				}, 3000);
            }

            if ( shoes === undefined || shoes === null || shoes === "" ) {
            	rlt = false;
				$('.shoes_error').fadeIn();
				setTimeout(() => {
					$('.shoes_error').fadeOut();
				}, 3000);
            }

            if ( job_reference === undefined || job_reference === null || job_reference === "" ) {
            	rlt = false;
				$('.job_reference_error').fadeIn();
				setTimeout(() => {
					$('.job_reference_error').fadeOut();
				}, 3000);
            }

            if ( gender === undefined || gender === null || gender === "" ) {
            	rlt = false;
				$('.gender_error').fadeIn();
				setTimeout(() => {
					$('.gender_error').fadeOut();
				}, 3000);
            }
    		return rlt;
		}
	};

    var uploadDeletePhotosBeforeRegister = function() {
        $('#kt_dropzone_3').dropzone({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
            },
            sending: function(file, xhr, formData) {
                formData.append("_token", $('meta[name="csrf_token"]').attr('content'));
            },
            url: UPLOAD_PHOTO_BEFORE_REGISTER_URL, // Set the url for your upload script location
            paramName: "file", // The name that will be used to transfer the file
            maxFiles: 50,
            maxFilesize: 500, // MB
            addRemoveLinks: true,
            timeout: 50000,
            acceptedFiles: "image/*",
            renameFile: function(file) {
                var dt = new Date();
                var time = dt.getTime();
                return time + file.name;
            },
            accept: function(file, done) {
                if (file.name == "justinbieber.jpg") {
                    done("Naha, you don't.");
                } else {
                    done();
                }
            },
            removedfile: function(file) {
                var name = file.upload.filename;
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                    },
                    type: 'POST',
                    url: DELETE_PHOTO_DROPZONE_URL,
                    data: { 
                        filename: name 
                    },
                    beforeSend: function() {
                        $.blockUI({ message: 'Please wait...<span class="spinner spinner-primary"></span>' });
                    },
                    success: function(data) {
                        $.unblockUI();

                    },
                    error: function(e) {
                        $.unblockUI();
                        console.log(e);
                    }
                });
                var fileRef;
                return (fileRef = file.previewElement) != null ?
                    fileRef.parentNode.removeChild(file.previewElement) : void 0;
            },
        });
    };


	return {
		init: function() {
			loginEventHandlers();
			RegisterAsClientEventHandlers();
			RegisterAsTalentEventHandlers();
            uploadDeletePhotosBeforeRegister();
		},
	};
}();

jQuery(document).ready(function() {
	AuthEventsHandlers.init();
});