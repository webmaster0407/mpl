var editProfileEventHandlers = function() {

	var viewClientEditProfileFormChagneHandler = function() {
		$('#edit_client_profile_form_btn').on('click', function() {
			$('#client_profile_info').hide();
			$('#edit_client_profile_form').show();
		});

		$('#back_to_view_profile_btn').on('click', function() {
			$('#edit_client_profile_form').hide();
			$('#client_profile_info').show();
		});
	};

	var submitClientEditFormHandler = function() {
		$('#edit_client_profile_form_submit_btn').on('click', function(e) {
			e.preventDefault();

			if (editProfileFormValidationHandler() === false) {
				return;
			}

            var name = $('#name').val();
            var email = $('#email').val();
            var company = $('#company').val();
            var telephone = $('#telephone').val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                },
                data: {
                    name : name,
                    email : email,
                    company : company,
                    telephone : telephone
                },
                type: "POST",
                url: EDIT_PROFILE_URL,
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
                            timer: 3000,
                        });
			            $('#name').val(name);
			            $('#email').val(email);
			            $('#company').val(company);
			            $('#telephone').val(telephone);
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

		var editProfileFormValidationHandler = function () {
            var name = $('#name').val();
            var email = $('#email').val();
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

	var submitTalentEditFormHandler = function() {
		
		$('#edit_talent_profile_form_submit_btn').on('click', function(e) {
			e.preventDefault();
			if (editTalentProfileEventValidation() === false) {
				return ;
			}
            var name = $('#name').val();
            var email = $('#email').val();
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

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                },
                data: {
                    name : name,
            		email : email,
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
                url: EDIT_PROFILE_URL,
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
                            timer: 3000,
                        });
			            $('#name').val(name);
			            $('#email').val(email);
			            $('#cat_id').val(cat_id);
			            $('#phone').val(phone);
			            $('#birthday_year').val(birthday_year);
			            $('#height').val(height);
			            $('#weight').val(weight);
			            $('#chest').val(chest);
			            $('#hips').val(hips);
			            $('#shoes').val(shoes);
			            $('#job_reference').val(job_reference);
			            $('#cat_id').val(cat_id);
			            $("input[name='gender'][value=" + gender + "]").prop('checked', true);
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

		var editTalentProfileEventValidation = function () {
            var name = $('#name').val();
            var email = $('#email').val();
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

	var talentImageUploadHandler = function() {
		// upload image

        $('#kt_dropzone_3').dropzone({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
            },
            sending: function(file, xhr, formData) {
                formData.append("_token", $('meta[name="csrf_token"]').attr('content'));
            },
            url: UPLOAD_PHOTO_URL, // Set the url for your upload script location
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

		// remove image
		$(document).on('click', '.photo_action_btn', function(e) {
            e.preventDefault();
			var photo_id = $(this).attr('data-val');
            var elem = $(this);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                },
                data: {
                	id: photo_id
                },
                type: "POST",
                url: DELETE_PHOTO_URL,
                beforeSend: function() {
                    $.blockUI({ message: 'Please wait...<span class="spinner spinner-primary"></span>' });
                },
                success: function(data) {
                    data = $.parseJSON(data);
                    $.unblockUI();
                    if (data.status == "success") {
                        elem.parent().remove();
                        if ($('.uploaded_photos').html() == '' || $('.uploaded_photos').html() == null) {
                            $('.uploaded_photos').html('<h5>No photos uploaded</h5>');
                        }
                        swal({
                            title: data.message,
                            type: 'success',
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
	};

	return {
		init: function() {
			viewClientEditProfileFormChagneHandler();
			submitClientEditFormHandler();
			submitTalentEditFormHandler();
			talentImageUploadHandler();
		},
	};
}();

jQuery(document).ready(function() {
	editProfileEventHandlers.init();
});