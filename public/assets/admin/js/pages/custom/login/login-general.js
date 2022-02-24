"use strict";

// Class Definition
var KTLogin = function() {
    var _login;

    var _showForm = function(form) {
        var cls = 'login-' + form + '-on';
        var form = 'kt_login_' + form + '_form';

        _login.removeClass('login-forgot-on');
        _login.removeClass('login-signin-on');
        _login.removeClass('login-signup-on');

        _login.addClass(cls);

        KTUtil.animateClass(KTUtil.getById(form), 'animate__animated animate__backInUp');
    }

    var _handleSignInForm = function() {
        var validation;

        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        validation = FormValidation.formValidation(
			KTUtil.getById('kt_login_signin_form'),
			{
				fields: {
					username: {
						validators: {
							notEmpty: {
								message: 'Username is required'
							}
						}
					},
					password: {
						validators: {
							notEmpty: {
								message: 'Password is required'
							}
						}
					}
				},
				plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    submitButton: new FormValidation.plugins.SubmitButton(),
                    //defaultSubmit: new FormValidation.plugins.DefaultSubmit(), // Uncomment this line to enable normal button submit after form validation
					bootstrap: new FormValidation.plugins.Bootstrap()
				}
			}
		);

        $('#kt_login_signin_submit').on('click', function (e) {
            e.preventDefault();

            console.log(loginUrl);
            console.log(adminHomeUrl);

            validation.validate().then(function(status) {
		        if (status == 'Valid') {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                        },
                        method: "POST",
                        url: loginUrl,
                        data: {
                            _token: $('meta[name="csrf_token"]').attr('content'),
                            username: $("#username").val(),
                            password: $("#password").val(),
                            remember: $('#remember').is(':checked') ? 1 : 0
                        },
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
                            if (data.status == 'success') {     // login successfully!
                                $("#username").val("");
                                $("#password").val("");
                                $("#remember").val()
                                swal.fire({
                                    text: data.message,
                                    icon: "success",
                                    buttonsStyling: false,
                                    confirmButtonText: "Ok, got it!",
                                    customClass: {
                                        confirmButton: "btn font-weight-bold btn-light-primary"
                                    }
                                }).then(function() {
                                    KTUtil.scrollTop();
                                    window.location = adminHomeUrl;
                                    console.log(data.message); 
                                });
                            } else {                            // login failed
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
                                    console.log(data.message);
                                });
                            }
                        },
                        error: function(e) {
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


				} else {
					swal.fire({
		                text: "Sorry, looks like there are some errors detected, please try again.",
		                icon: "error",
		                buttonsStyling: false,
		                confirmButtonText: "Ok, got it!",
                        customClass: {
    						confirmButton: "btn font-weight-bold btn-light-primary"
    					}
		            }).then(function() {
						KTUtil.scrollTop();
					});
				}
		    });
        });

    }

  //   var _handleSignUpForm = function(e) {
  //       var validation;
  //       var form = KTUtil.getById('kt_login_signup_form');

  //       // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
  //       validation = FormValidation.formValidation(
		// 	form,
		// 	{
		// 		fields: {
		// 			fullname: {
		// 				validators: {
		// 					notEmpty: {
		// 						message: 'Username is required'
		// 					}
		// 				}
		// 			},
		// 			email: {
  //                       validators: {
		// 					notEmpty: {
		// 						message: 'Email address is required'
		// 					},
  //                           emailAddress: {
		// 						message: 'The value is not a valid email address'
		// 					}
		// 				}
		// 			},
  //                   password: {
  //                       validators: {
  //                           notEmpty: {
  //                               message: 'The password is required'
  //                           }
  //                       }
  //                   },
  //                   cpassword: {
  //                       validators: {
  //                           notEmpty: {
  //                               message: 'The password confirmation is required'
  //                           },
  //                           identical: {
  //                               compare: function() {
  //                                   return form.querySelector('[name="password"]').value;
  //                               },
  //                               message: 'The password and its confirm are not the same'
  //                           }
  //                       }
  //                   },
  //                   agree: {
  //                       validators: {
  //                           notEmpty: {
  //                               message: 'You must accept the terms and conditions'
  //                           }
  //                       }
  //                   },
		// 		},
		// 		plugins: {
		// 			trigger: new FormValidation.plugins.Trigger(),
		// 			bootstrap: new FormValidation.plugins.Bootstrap()
		// 		}
		// 	}
		// );

  //       $('#kt_login_signup_submit').on('click', function (e) {
  //           e.preventDefault();

  //           validation.validate().then(function(status) {
		//         if (status == 'Valid') {
  //                   swal.fire({
		//                 text: "All is cool! Now you submit this form",
		//                 icon: "success",
		//                 buttonsStyling: false,
		//                 confirmButtonText: "Ok, got it!",
  //                       customClass: {
  //   						confirmButton: "btn font-weight-bold btn-light-primary"
  //   					}
		//             }).then(function() {
		// 				KTUtil.scrollTop();
		// 			});
		// 		} else {
		// 			swal.fire({
		//                 text: "Sorry, looks like there are some errors detected, please try again.",
		//                 icon: "error",
		//                 buttonsStyling: false,
		//                 confirmButtonText: "Ok, got it!",
  //                       customClass: {
  //   						confirmButton: "btn font-weight-bold btn-light-primary"
  //   					}
		//             }).then(function() {
		// 				KTUtil.scrollTop();
		// 			});
		// 		}
		//     });
  //       });

  //       // Handle cancel button
  //       $('#kt_login_signup_cancel').on('click', function (e) {
  //           e.preventDefault();

  //           _showForm('signin');
  //       });
  //   }

    // Public Functions
    return {
        // public functions
        init: function() {
            _login = $('#kt_login');

            _handleSignInForm();
           // _handleSignUpForm();
        }
    };
}();

// Class Initialization
jQuery(document).ready(function() {
    KTLogin.init();
});
