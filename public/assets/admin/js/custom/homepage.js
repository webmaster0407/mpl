"use strict";
// Class definition

var KTSummernoteDemo = function () {
    // Private functions
    var demos = function () {
        $('.summernote').summernote({
            height: 300,
            tabsize: 2
        });
    }

    return {
        // public functions
        init: function() {
            demos();
        }
    };
}();

// Initialization
jQuery(document).ready(function() {
    
    KTSummernoteDemo.init();

    // start init section editors with locale
    $('#section1_language').val(LOCALE_VAL);
    $('#section2_language').val(LOCALE_VAL);
    $('#section3_language').val(LOCALE_VAL);
    $('#section4_language').val(LOCALE_VAL);
    // end init section editors with locale

    // start get data with localized language
    handle_section1_language_changed();
    handle_section2_language_changed();
    handle_section3_language_changed();
    handle_section4_language_changed();
    // end get data with localized language

    // start section 1
    $(document).on('click', '#section1_submitBtn', function(e) {
        e.preventDefault();

        var lang = $('#section1_language').val();
        var desc = $('#section1_description').summernote('code');
        var title = $("#section1_title").val();
        var link = $("#section1_link").val();
        var newtab = $("#section1_newtab").prop('checked') ? "1" : "0";


        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
            },
            method: "POST",
            url: UPDATE_SECTION_DATA_URL,
            data: {
                _token: $('meta[name="csrf_token"]').attr('content'),
                section_number : 1,
                lang: lang,
                title: title,
                link: link,
                description: desc,
                newtab: newtab,
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
                if (data.status == 'success') {     // updated successfully !
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
                    });
                } else {                            // update failed
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
    });

    $(document).on('change', '#section1_language', handle_section1_language_changed );


    $(document).on('click', '#section1_cancelBtn', function() {
        $('#section1_language').trigger('change');
    });
    // end section 1

    // start section 2
    $(document).on('click', '#section2_submitBtn', function(e) {
        e.preventDefault();


        var lang = $('#section2_language').val();
        var desc = $('#section2_description').summernote('code');
        var title = $("#section2_title").val();
        var link = $("#section2_link").val();
        var newtab = $("#section2_newtab").prop('checked') ? "1" : "0";

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
            },
            method: "POST",
            url: UPDATE_SECTION_DATA_URL,
            data: {
                _token: $('meta[name="csrf_token"]').attr('content'),
                section_number : 2,
                lang: lang,
                title: title,
                link: link,
                description: desc,
                newtab: newtab,
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
                if (data.status == 'success') {     // updated successfully !
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
                    });
                } else {                            // update failed
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
    });

    $(document).on('change', '#section2_language', handle_section2_language_changed );

    $(document).on('click', '#section2_cancelBtn', function() {
        $('#section2_language').trigger('change');
    });
    // end section 2

    // start section 3
    $(document).on('click', '#section3_submitBtn', function(e) {
        e.preventDefault();


        var lang = $('#section3_language').val();
        var desc = $('#section3_description').summernote('code');
        var title = $("#section3_title").val();
        var link = $("#section3_link").val();
        var newtab = $("#section3_newtab").prop('checked') ? "1" : "0";


        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
            },
            method: "POST",
            url: UPDATE_SECTION_DATA_URL,
            data: {
                _token: $('meta[name="csrf_token"]').attr('content'),
                section_number : 3,
                lang: lang,
                title: title,
                link: link,
                description: desc,
                newtab: newtab,
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
                if (data.status == 'success') {     // updated successfully !
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
                    });
                } else {                            // update failed
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
    });

    $(document).on('change', '#section3_language', handle_section3_language_changed );

    $(document).on('click', '#section3_cancelBtn', function() {
        $('#section3_language').trigger('change');
    });
    // end section 3

    // start section 4
    $(document).on('click', '#section4_submitBtn', function(e) {
        e.preventDefault();


        var lang = $('#section4_language').val();
        var desc = $('#section4_description').summernote('code');
        var title = $("#section4_title").val();
        var link = $("#section4_link").val();
        var newtab = $("#section4_newtab").prop('checked') ? "1" : "0";


        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
            },
            method: "POST",
            url: UPDATE_SECTION_DATA_URL,
            data: {
                _token: $('meta[name="csrf_token"]').attr('content'),
                section_number : 4,
                lang: lang,
                title: title,
                link: link,
                description: desc,
                newtab: newtab,
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
                if (data.status == 'success') {     // updated successfully !
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
                    });
                } else {                            // update failed
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
    });

    $(document).on('change', '#section4_language', handle_section4_language_changed );

    $(document).on('click', '#section4_cancelBtn', function() {
        $('#section4_language').trigger('change');
    });
    // end section 4


    // start handlers
    function handle_section1_language_changed() {
        var lang = $('#section1_language').val();
        var section_number = 1;

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
            },
            method: "POST",
            url: GET_SECTION_DATA_URL,
            data: {
                _token: $('meta[name="csrf_token"]').attr('content'),
                section_number : 1,
                lang: lang
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
                if (data.status == 'success') {     // get successfully !
                    var newSectionData = data.data;
                    if (newSectionData == null || newSectionData == "") {
                        $('#section1_description').summernote('code',"");
                        $("#section1_title").val("");
                        $("#section1_link").val("");
                        $('#section1_newtab').prop('checked', false);
                    } else {
                        $('#section1_description').summernote('code',newSectionData.description);
                        $("#section1_title").val(newSectionData.title);
                        $("#section1_link").val(newSectionData.link);
                        $('#section1_newtab').prop('checked', newSectionData.newtab == "1" ? true : false);
                    }
                } else {                            // get failed
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
    }

    function handle_section2_language_changed() {

        var lang = $('#section2_language').val();
        var section_number = 2;

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
            },
            method: "POST",
            url: GET_SECTION_DATA_URL,
            data: {
                _token: $('meta[name="csrf_token"]').attr('content'),
                section_number : section_number,
                lang: lang
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
                if (data.status == 'success') {     // get successfully !
                    var newSectionData = data.data;
                    if (newSectionData == null || newSectionData == "") {
                        $('#section2_description').summernote('code',"");
                        $("#section2_title").val("");
                        $("#section2_link").val("");
                        $('#section2_newtab').prop('checked', false);
                    } else {
                        $('#section2_description').summernote('code',newSectionData.description);
                        $("#section2_title").val(newSectionData.title);
                        $("#section2_link").val(newSectionData.link);
                        $('#section2_newtab').prop('checked', newSectionData.newtab == "1" ? true : false);
                    }
                } else {                            // get failed
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
    }

    function handle_section3_language_changed() {

        var lang = $('#section3_language').val();
        var section_number = 3;

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
            },
            method: "POST",
            url: GET_SECTION_DATA_URL,
            data: {
                _token: $('meta[name="csrf_token"]').attr('content'),
                section_number : section_number,
                lang: lang
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
                if (data.status == 'success') {     // get successfully !
                    var newSectionData = data.data;
                    if (newSectionData == null || newSectionData == "") {
                        $('#section3_description').summernote('code',"");
                        $("#section3_title").val("");
                        $("#section3_link").val("");
                        $('#section3_newtab').prop('checked', false);
                    } else {
                        $('#section3_description').summernote('code',newSectionData.description);
                        $("#section3_title").val(newSectionData.title);
                        $("#section3_link").val(newSectionData.link);
                        $('#section3_newtab').prop('checked', newSectionData.newtab == "1" ? true : false);
                    }
                } else {                            // get failed
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
    }

    function handle_section4_language_changed() {

        var lang = $('#section4_language').val();
        var section_number = 4;

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
            },
            method: "POST",
            url: GET_SECTION_DATA_URL,
            data: {
                _token: $('meta[name="csrf_token"]').attr('content'),
                section_number : section_number,
                lang: lang
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
                if (data.status == 'success') {     // get successfully !
                    var newSectionData = data.data;
                    if (newSectionData == null || newSectionData == "") {
                        $('#section4_description').summernote('code',"");
                        $("#section4_title").val("");
                        $("#section4_link").val("");
                        $('#section4_newtab').prop('checked', false);
                    } else {
                        $('#section4_description').summernote('code',newSectionData.description);
                        $("#section4_title").val(newSectionData.title);
                        $("#section4_link").val(newSectionData.link);
                        $('#section4_newtab').prop('checked', newSectionData.newtab == "1" ? true : false);
                    }
                } else {                            // get failed
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
    }

    // end handlers
});
