"use strict";
// Class definition


var KTDropzoneDemo = function() {
    // Private functions
    var imageUploadHandler = function() {
        // single file upload
        $('#kt_dropzone_1').dropzone({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
            },
            renameFile: function(file) {
                var dt = new Date();
                var time = dt.getTime();
                return time + file.name;
            },
            sending: function(file, xhr, formData) {
                formData.append("_token", $('meta[name="csrf_token"]').attr('content'));
            },
            url: UPLOAD_FT_PHOTOS_URL, // Set the url for your upload script location
            paramName: "file", // The name that will be used to transfer the file
            maxFiles: 1,
            maxFilesize: 5, // MB
            addRemoveLinks: true,
            accept: function(file, done) {
                if (file.name == "justinbieber.jpg") {
                    done("Naha, you don't.");
                } else {
                    done();
                }
            }
        });

        // multiple file upload
        $('#kt_dropzone_2').dropzone({
            url: UPLOAD_FT_PHOTOS_URL, // Set the url for your upload script location
            paramName: "file", // The name that will be used to transfer the file
            maxFiles: 10,
            maxFilesize: 10, // MB
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
            },
            renameFile: function(file) {
                var dt = new Date();
                var time = dt.getTime();
                return time + file.name;
            },
            sending: function(file, xhr, formData) {
                formData.append("_token", $('meta[name="csrf_token"]').attr('content'));
            },
            accept: function(file, done) {
                if (file.name == "justinbieber.jpg") {
                    done("Naha, you don't.");
                } else {
                    done();
                }
            }
        });

        // file type validation
        $('#kt_dropzone_3').dropzone({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
            },
            renameFile: function(file) {
                var dt = new Date();
                var time = dt.getTime();
                return time + file.name;
            },
            sending: function(file, xhr, formData) {
                formData.append("_token", $('meta[name="csrf_token"]').attr('content'));
                formData.append("cat_id", $('#category').val());
            },
            url: UPLOAD_FT_PHOTOS_URL, // Set the url for your upload script location
            paramName: "file", // The name that will be used to transfer the file
            maxFiles: 50,
            maxFilesize: 500, // MB
            addRemoveLinks: true,
            timeout: 50000,
            acceptedFiles: "image/*",
            accept: function(file, done) {
                if (file.name == "justinbieber.jpg") {
                    done("Naha, you don't.");
                } else {
                    done();
                }
            },
            removedfile: function(file) {

            }
        });
    }


    var getImagesHandler = function() {
        $(document).on('click', '#call_ft_images', function() {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                    },
                    datatype: "json",
                    data: {
                        cat_id: $('#banner_category').val()
                    },
                    type: "GET",
                    url: GET_UPLOADED_FT_PHOTOS_URL,
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
                            var images = data.data;
                            var htmlContents = "";
                            images.forEach((image) => {
                                var photoPath = image.path;
                                var photoPathItemArray  = photoPath.split('/');
                                var item_length = photoPathItemArray.length;
                                if (photoPathItemArray[item_length - 1] != 'default.jpg')
                                    photoPathItemArray[item_length - 2] = photoPathItemArray[item_length - 2] + '/thumbnail';
                                photoPath = photoPathItemArray.join('/');

                                htmlContents += "<div class='col-lg-3 col-md-4 col-sm-6 image-card'><div>";
                                htmlContents += "<button class='select_as_banner btn btn-primary' data-val='" + image.id + "'><i class='flaticon2-correct'></i></button>";
                                htmlContents += "<button class='delete_image btn btn-danger' data-val='" + image.id + "'><i class='flaticon-delete'></i></button></div>"
                                htmlContents += ("<img src='" + BASE_URL + "/" + photoPath + "'  />");
                                htmlContents += "</div>";
                            });
                            if (htmlContents == "") {
                                htmlContents = "<h1>No images uploded for " + $('#banner_category option:selected').text() + "!</h1>";
                            }
                            $('#banner-images-wrapper').html(htmlContents);

                            var current_banner_ft_image_content = "<h1>Banner Image for " + $('#banner_category option:selected').text() + " is not selected!</h1>";
                            var current_banner_ft_image = data.current_banner_ft_image;
                            if (current_banner_ft_image !== null) {
                                var photoPath = current_banner_ft_image.path;
                                var photoPathItemArray  = photoPath.split('/');
                                var item_length = photoPathItemArray.length;
                                if (photoPathItemArray[item_length - 1] != 'default.jpg')
                                    photoPathItemArray[item_length - 2] = photoPathItemArray[item_length - 2] + '/thumbnail';
                                photoPath = photoPathItemArray.join('/');
                                current_banner_ft_image_content = "<img src='" + BASE_URL  + '/' + photoPath + "' alt='banner image' />";
                            }
                            $('#current_banner').html(current_banner_ft_image_content);
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

        $(document).on('change', '#banner_category', function() {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                    },
                    datatype: "json",
                    data: {
                        cat_id: $(this).val()
                    },
                    type: "GET",
                    url: GET_UPLOADED_FT_PHOTOS_URL,
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
                            var images = data.data;
                            var htmlContents = "";
                            images.forEach((image) => {
                                var photoPath = image.path;
                                var photoPathItemArray  = photoPath.split('/');
                                var item_length = photoPathItemArray.length;
                                if (photoPathItemArray[item_length - 1] != 'default.jpg')
                                    photoPathItemArray[item_length - 2] = photoPathItemArray[item_length - 2] + '/thumbnail';
                                photoPath = photoPathItemArray.join('/');

                                htmlContents += "<div class='col-lg-3 col-md-4 col-sm-6 image-card'><div>";
                                htmlContents += "<button class='select_as_banner btn btn-primary' data-val='" + image.id + "'><i class='flaticon2-correct'></i></button>";
                                htmlContents += "<button class='delete_image btn btn-danger' data-val='" + image.id + "'><i class='flaticon-delete'></i></button></div>"
                                htmlContents += ("<img src='" + BASE_URL + "/" + photoPath + "'  />");
                                htmlContents += "</div>";
                            });
                            if (htmlContents == "") {
                                htmlContents = "<h1>No images uploded for " + $('#banner_category option:selected').text() + "!</h1>";
                            }
                            $('#banner-images-wrapper').html(htmlContents);

                            var current_banner_ft_image_content = "<h1>Banner Image for " + $('#banner_category option:selected').text() + " is not selected!</h1>";
                            var current_banner_ft_image = data.current_banner_ft_image;
                            if (current_banner_ft_image !== null) {
                                var photoPath = current_banner_ft_image.path;
                                var photoPathItemArray  = photoPath.split('/');
                                var item_length = photoPathItemArray.length;
                                if (photoPathItemArray[item_length - 1] != 'default.jpg')
                                    photoPathItemArray[item_length - 2] = photoPathItemArray[item_length - 2] + '/thumbnail';
                                photoPath = photoPathItemArray.join('/');
                                current_banner_ft_image_content = "<img src='" + BASE_URL + '/' + photoPath + "' alt='banner image' />";
                            }
                            $('#current_banner').html(current_banner_ft_image_content);
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
    }

    var deleteImagesHandler = function() {
        $(document).on('click', '.delete_image', function() {
            var imageId = $(this).attr('data-val');
            // var grandParent = $(this).parent().parent();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                },
                data: {
                    id : imageId
                },
                type: "POST",
                url: DELETE_FT_PHOTO_URL,
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
                        // grandParent.remove();
                        $('#banner_category').trigger('change');
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
    }

    var recommandImageHandler = function() {
        $(document).on('click', '.select_as_banner', function() {
            var imageId = $(this).attr('data-val');
            var cat_id = $('#banner_category').val();        // should fix this part

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                },
                data: {
                    id : imageId,
                    cat_id: cat_id
                },
                type: "POST",
                url: SELECT_AS_BANNER_URL,
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
                            KTUtil.scrollTop();
                            $('#banner_category').trigger('change');
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
    }

    var buttonShowHideHandler = function() {
        $('#banner-images-wrapper').find('button').each(function() {
            var button = $(this);
            button.hide();
        });

        $(document).on('mouseover', '.image-card', function() {
            $(this).find('button').show();
        });

        $(document).on('mouseleave', '.image-card', function() {
            $(this).find('button').hide();
        });
    }


    return {
        // public functions
        init: function() {
            imageUploadHandler();
            getImagesHandler();
            deleteImagesHandler();
            recommandImageHandler();
            buttonShowHideHandler();
        }
    };
}();

KTUtil.ready(function() {
    KTDropzoneDemo.init();
});