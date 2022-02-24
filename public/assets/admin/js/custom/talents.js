"use strict";
// Class definition
var datatable;
var KTAppsUsersListDatatable = function() {
	// Private functions

	// basic demo
    var summernotes = function () {
        $('.summernote').summernote({
            height: 200,
            tabsize: 2
        });
    }

	var initTalentsDatatable = function() {
		datatable = $('#talents_datatable').KTDatatable({
			// datasource definition
			data: {
				type: 'remote',
				source: {
					read: {
						url: TALENTS_DATA_URL,
						method: 'GET',
						headers: {
						    'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
						},
						contentType: 'application/json',
						params: {
						  _token: $('meta[name="csrf_token"]').attr('content')
						}
					},
				},
				pageSize: 10, // display 20 records per page
				serverPaging: true,
				serverFiltering: true,
				serverSorting: true,
				autoColumns: true
			},

			// layout definition
			layout: {
				scroll: false, // enable/disable datatable scroll both horizontal and vertical when needed.
				footer: false, // display/hide footer
			},

			// column sorting
			sortable: true,

			pagination: true,

			search: {
				input: $('#talents_search_form'),
				delay: 400,
				key: 'generalSearch'
			},

			// columns definition
			columns: [
				{
					field: 'id',
					title: '#',
					sortable: 'asc',
					width: 40,
					type: 'number',
					selector: false,
					textAlign: 'left',
					template: function(data) {
						return '<span class="font-weight-bolder">' + data.id + '</span>';
					}
				}, {
					field: 'name',
					title: 'Name',
					sortable: 'asc',
					autoHide: false,
					template: function(data) {
	                    var stat_class = ((data.permission === "yes") ? 'label-light-success' : 'label-light-warning'); 
	                    return '<span class="label font-weight-bold label-lg ' + stat_class + ' label-inline">' + data.name + '</span>';
					},
				}, {
					field: 'email',
					title: 'Email',
					sortable: 'asc',
					width: 200,
					autoHide: false,
					template: function(data) {
	                    var stat_class = ((data.permission === "yes") ? 'label-light-success' : 'label-light-warning'); 
	                    return '<span class="label font-weight-bold label-lg ' + stat_class + ' label-inline">' + data.email + '</span>';
					},
				}, {
					field: 'gender',
					title: 'Gender',
					textAlign: 'center',
					widget: 30,
					template: function(data) {
						var stat_class = ((data.permission === "yes") ? 'label-light-success' : 'label-light-warning');
						var gender = (data.gender == 'male' ? 'M' : 'F');
 						return '<span class="label font-weight-bold label-lg ' + stat_class + ' label-inline">' + gender + '</span>';
					}
				}, {
					field: 'phone',
					title: 'Phone',
					template: function(data) {
	                    var stat_class = ((data.permission === "yes") ? 'label-light-success' : 'label-light-warning'); 
	                    return '<span class="label font-weight-bold label-lg ' + stat_class + ' label-inline">' + data.phone + '</span>';
					}
				}, {
					field: 'category',
					title: 'Category',
					widget: 70,
					// callback function support for column rendering
					template: function(data) {
	                    var stat_class = ((data.permission === "yes") ? 'label-light-success' : 'label-light-warning'); 
	                    return '<span class="label font-weight-bold label-lg ' + stat_class + ' label-inline">' + data.category + '</span>';
					},
				}, {
	                field: 'permission',
	                title: 'Allowed',
	                sortable: 'asc',
	                width: 70,
	                textAlign: 'center',
	                template: function(data) {
	                    var output, btn_class, status;
	                    btn_class = ( (data.permission == 'yes') ? 'btn btn-sm btn-success' : 'btn btn-sm btn-warning' );
	                    status = ( (data.permission == 'yes') ? 'Yes' : 'No' );
	                    output = "<button class='" + btn_class + " permissionBtn' data-id='" + data.id +  "' data-val='" + data.permission +  "' >" + status + "</button>";
	                    return output;
	                },
            	}, {
					field: 'Actions',
					title: 'Actions',
					sortable: false,
					width: 130,
					overflow: 'visible',
					autoHide: false,
					template: function(data) {
						return '\
	                        <a href="javascript:;" class="edit_talents_btn btn btn-sm btn-default btn-text-primary btn-hover-primary btn-icon mr-2" data-val = "' + data.id +  '" title="Edit details">\
	                            <span class="svg-icon svg-icon-md">\
									<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\
										<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
											<rect x="0" y="0" width="24" height="24"/>\
											<path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953) "/>\
											<path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>\
										</g>\
									</svg>\
	                            </span>\
	                        </a>\
	                        <a href="javascript:;" class="delete_talents_btn btn btn-sm btn-default btn-text-primary btn-hover-primary btn-icon" data-val = "' + data.id +  '" title="Delete">\
								<span class="svg-icon svg-icon-md">\
									<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\
										<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
											<rect x="0" y="0" width="24" height="24"/>\
											<path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"/>\
											<path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"/>\
										</g>\
									</svg>\
								</span>\
	                        </a>\
	                    ';
					},
				}],
		});
	};

	var talentsCrudHandlers = function() {
		$(document).on('click', '.view_talents_btn', function() {
			$('#talents_datatable').hide();
			$('.edit_talents_section').hide();
			$('.view_talents_section').show();

			// get detail from server
			var id = $(this).attr('data-val');

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                },
                data: {
                    id : id
                },
                type: "GET",
                url: GET_TALENT_DETAIL_URL,
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
                    	var talent = data.data;
                        $('#name').val(talent.name);
                        $('#email').val(talent.email);
                        // $('#gender').val(talent.gender);
                        $('#phone').val(talent.phone);
                        $('#birthday_year').val(talent.birthday_year);
                        $('#height').val(talent.height);
                        $('#weight').val(talent.weight);
                        $('#chest').val(talent.chest);
                        $('#hips').val(talent.hips);
                        $('#shoes').val(talent.shoes);
                        $('#job_description').summernote('code',talent.job_reference);
                    } else {
                        swal.fire({
                            text: 'Oops! Something went wrong!',
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

		$(document).on('click', '.edit_talents_btn', function() {
			$('#talents_datatable').hide();
			$('.view_talents_section').hide();
			$('.edit_talents_section').show();

			var id = $(this).attr('data-val');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                },
                data: {
                    id : id
                },
                type: "GET",
                url: GET_TALENT_DETAIL_URL,
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
                    	var talent = data.data;
                    	$('#talents_hidden_id').val(id);
                        $('#name').val(talent.name);
                        $('#email').val(talent.email);
                        $('#gender').val(talent.gender);
                        $('#phone').val(talent.phone);
                        $('#birthday_year').val(talent.birthday_year);
                        $('#height').val(talent.height);
                        $('#weight').val(talent.weight);
                        $('#chest').val(talent.chest);
                        $('#hips').val(talent.hips);
                        $('#shoes').val(talent.shoes);
                        $('#category').val(talent.cat_id);
                        $('#job_description').summernote('code',talent.job_reference);

                        var photos = data.photos;
                        var photoContents = "";
                        photos.forEach((photo) => {
                        	var state = photo.permission;
                        	var state_class = (photo.permission === 'yes') ? 'permissionStateBtn btn btn-primary' : 'permissionStateBtn btn btn-warning';
                            photoContents += "<div class='col-lg-3 col-md-4 col-sm-6 image-card'><div>";
                            photoContents += "<button class='" + state_class + "' data-id='" + photo.id + "' data-val='" + photo.permission + "'><i class='flaticon2-correct'></i></button>";
                            photoContents += "<button class='delete_photo btn btn-danger' data-id='" + photo.id + "'><i class='flaticon-delete'></i></button></div>"
                            photoContents += ("<img src='" + BASE_URL + "/" + photo.path + "'  />");
                            photoContents += "</div>";
                        });
                        if (photoContents == "") {
                            photoContents = "<h1>No photos uploded for " + talent.name + "!</h1>";
                        }
                        $('.talent_uploaded_photos').html(photoContents);
                    } else {
                        swal.fire({
                            text: 'Oops! Something went wrong!',
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

		// update permission state of user photo

		$(document).on('click', '.permissionStateBtn', function() {
			var elem = $(this);
			var photo_id = elem.attr('data-id');
			var photo_state = elem.attr('data-val');

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                },
                data: {
                    photo_id : photo_id,
                    photo_state : photo_state
                },
                type: "POST",
                url: CHANGE_PHOTO_STATE_URL,
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
                        	if (photo_state === 'yes') {	// yes -> no
                        		elem.attr('data-val', 'no');
                        		elem.removeClass('btn-primary');
                        		elem.addClass('btn-warning');
                        	} else { 	// no -> yes
                        		elem.attr('data-val', 'yes');
                        		elem.removeClass('btn-warning');
                        		elem.addClass('btn-primary');
                        	}
                        });
                    } else {
                        swal.fire({
                            text: 'Oops! Something went wrong!',
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

        $(document).on('click', '.delete_photo', function() {
        	var elem = $(this);
        	var photo_id = elem.attr('data-id');

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                },
                data: {
                    photo_id : photo_id
                },
                type: "POST",
                url: DELETE_PHOTO_URL,
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
                            elem.parent().parent().remove();
                            if ( $('.talent_uploaded_photos').html() === null || 
                            	$('.talent_uploaded_photos').html() === undefined ||
                            	$('.talent_uploaded_photos').html() === "" ) {
                            	$('.talent_uploaded_photos').html("<h1>No photo exists!</h1>");
                            }
                        });
                    } else {
                        swal.fire({
                            text: 'Oops! Something went wrong!',
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
        })

		// update talent info
		$(document).on('click', '.save_talents_btn', function() {

			if (addEditTalentsValidation() === false) {
                KTUtil.scrollTop();
                return;
			}

			var name = $('#name').val();
			var email = $('#email').val();
			var gender = $('#gender').val();
            var phone = $('#phone').val();
			var birthday_year = $('#birthday_year').val();
			var height = $('#height').val();
			var weight = $('#weight').val();
			var chest = $('#chest').val();
			var hips = $('#hips').val();
            var shoes = $('#shoes').val();
            var cat_id = $('#category').val();
			var job_reference = $('#job_description').summernote('code');
			var id = $('#talents_hidden_id').val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                },
                data: {
                	id : id,
                    name : name,
                    email : email,
                    gender : gender,
                    phone : phone,
                    birthday_year : birthday_year,
                    height : height,
                    weight : weight,
                    chest : chest,
                    hips : hips,
                    shoes : shoes,
                    cat_id : cat_id,
                    job_reference : job_reference
                },
                type: "POST",
                url: UPDATE_TALENT_URL,
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
                            $('.cancel_talents_btn').trigger('click');
                            datatable.reload();
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

		// delete talent user
		$(document).on('click', '.delete_talents_btn', function() {
			// delete talent user
			var id = $(this).attr('data-val');

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                },
                data: {
                    id : id
                },
                type: "POST",
                url: DELETE_TALENT_URL,
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
                            datatable.reload();
                            console.log("Failed");
                        });
                    } else {
                        swal.fire({
                            text: 'Oops! Something went wrong!',
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

		// change permission state
		$(document).on('click', '.permissionBtn', function() {
			var id = $(this).attr('data-id');
			var state = $(this).attr('data-val');
           	$.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                },
                data: {
                    id: id,
                    state: state
                },
                type: "POST",
                url: UPDATE_TALENT_STATE_URL,
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
                        datatable.reload();
                    } else {
                        swal.fire({
                            text: 'Oops! Something went wrong!',
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn font-weight-bold btn-light-primary"
                            }
                        }).then(function() {
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

		$(document).on('click', '.return_talents_btn', function() {
			$('.view_talents_section').hide();
			$('.edit_talents_section').hide();
			$('#talents_datatable').show();
			datatable.reload();
		});

		$(document).on('click', '.cancel_talents_btn', function() {
			$('.view_talents_section').hide();
			$('.edit_talents_section').hide();
			$('#talents_datatable').show();
			datatable.reload();
		});



		var addEditTalentsValidation = function() {
			var name = $('#name').val();
			var email = $('#email').val();
			var gender = $('#gender').val();
            var phone = $('#phone').val();
			var birthday_year = $('#birthday_year').val();
			var height = $('#height').val();
			var weight = $('#weight').val();
			var chest = $('#chest').val();
			var hips = $('#hips').val();
            var shoes = $('#shoes').val();
            var cat_id = $('#category').val();
			var job_reference = $('#job_description').summernote('code');
			var id = $('#talents_hidden_id').val();         

            var output = true;

            if (name == "") {
                output = false;
                $('.name_error').fadeIn();
                setTimeout(() => {
                    $('.name_error').fadeOut();
                }, 10000);
            }
            if (email == "") {
                output = false;
                $('.email_error').fadeIn();
                setTimeout(() => {
                    $('.email_error').fadeOut();
                }, 10000);
            }
            if (gender == "") {
                output = false;
                $('.gender_error').fadeIn();
                setTimeout(() => {
                    $('.gender_error').fadeOut();
                }, 10000);
            }
            if (phone == "") {
                output = false;
                $('.phone_error').fadeIn();
                setTimeout(() => {
                    $('.phone_error').fadeOut();
                }, 10000);
            }
            if (birthday_year == "") {
                output = false;
                $('.birthday_year_error').fadeIn();
                setTimeout(() => {
                    $('.birthday_year_error').fadeOut();
                }, 10000);
            }
            if (height == "") {
                output = false;
                $('.height_error').fadeIn();
                setTimeout(() => {
                    $('.height_error').fadeOut();
                }, 10000);
            }
            if (weight == "") {
                output = false;
                $('.weight_error').fadeIn();
                setTimeout(() => {
                    $('.weight_error').fadeOut();
                }, 10000);
            }
            if (chest == "") {
                output = false;
                $('.chest_error').fadeIn();
                setTimeout(() => {
                    $('.chest_error').fadeOut();
                }, 10000);
            }
            if (hips == "") {
                output = false;
                $('.hips_error').fadeIn();
                setTimeout(() => {
                    $('.hips_error').fadeOut();
                }, 10000);
            }
            if (shoes == "") {
                output = false;
                $('.shoes_error').fadeIn();
                setTimeout(() => {
                    $('.shoes_error').fadeOut();
                }, 10000);
            }
            if (cat_id == "") {
                output = false;
                $('.category_error').fadeIn();
                setTimeout(() => {
                    $('.category_error').fadeOut();
                }, 10000);
            }
            if (job_reference === "<p><br></p>" || job_reference === "" || job_reference === null || job_reference === undefined) {
                output = false;
                $('.job_description_error').fadeIn();
                setTimeout(() => {
                    $('.job_description_error').fadeOut();
                }, 10000);
            }

            return output;
        }

	};

	return {
		// public functions
		init: function() {
			summernotes();
			initTalentsDatatable();
			talentsCrudHandlers();
		},
	};
}();

jQuery(document).ready(function() {
	KTAppsUsersListDatatable.init();
});
