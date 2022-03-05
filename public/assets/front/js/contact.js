
var contactUsHandlers = function() {

	var contactUsFormSubmitHandlers = function () {
		$('#contact_btn').on('click', function() {
			if (contactUsFormValideHandler() === false) {
				return;
			}
            var name = $('#contact_name').val();
            var email = $('#contact_email').val();
            var phone = $('#contact_phone').val();
            var subject = $('#contact_subject').val();
            var message = $('#contact_message').val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                },
                data: {
                    name : name,
                    email : email,
                    phone : phone,
                    subject : subject,
                    message : message
                },
                type: "POST",
                url: CONTACT_US_URL,
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
			            $('#name').val("");
			            $('#email').val("");
			            $('#phone').val("");
			            $('#subject').val("");
			            $('#message').val("");
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

		var contactUsFormValideHandler = function () {  //'name', 'email', 'phone', 'subject', 'message'
            var name = $('#contact_name').val();
            var email = $('#contact_email').val();
            var phone = $('#contact_phone').val();
            var subject = $('#contact_subject').val();
            var message = $('#contact_message').val();

            var rlt = true;

            var validateEmail =  function (elementValue){      
               var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
               return emailPattern.test(elementValue); 
            } 

            var validatePhoneNumber = function(input_str) {
                var re = /^[\+]?[(]?[0-9]{3}[)]?[-]?[\s\.]?[0-9]{3}[-]?[\s\.]?[0-9]{2,5}$/im;

                return re.test(input_str);
            }

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
            if ( validateEmail(email) === false ) {
                rlt = false;
                $('.valid_email_error').fadeIn();
                setTimeout(() => {
                    $('.valid_email_error').fadeOut();
                }, 3000);
            }
            if ( phone === undefined || phone === null || phone === "" ) {
            	rlt = false;
				$('.phone_error').fadeIn();
				setTimeout(() => {
					$('.phone_error').fadeOut();
				}, 3000);
            }
            if ( validatePhoneNumber(phone) === false ) {
                rlt = false;
                $('.valid_phone_error').fadeIn();
                setTimeout(() => {
                    $('.valid_phone_error').fadeOut();
                }, 3000);
            }
            if ( subject === undefined || subject === null || subject === "" ) {
            	rlt = false;
				$('.subject_error').fadeIn();
				setTimeout(() => {
					$('.subject_error').fadeOut();
				}, 3000);
            }
            if ( message === undefined || message === null || message === "" ) {
            	rlt = false;
				$('.message_error').fadeIn();
				setTimeout(() => {
					$('.message_error').fadeOut();
				}, 3000);
            }

            return rlt;
		};
	};

	return {
		init: function() {
			contactUsFormSubmitHandlers();
		},
	};
}();

jQuery(document).ready(function() {
	contactUsHandlers.init();
});