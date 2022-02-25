"use strict";
// Class definition
var datatable;
var is_edit_mode = true;
var KTDatatableRemoteAjaxDemo = function() {
    // Private functions
    var summernotes = function () {
        $('.summernote').summernote({
            height: 300,
            tabsize: 2
        });
    }

    // basic demo
    var demo = function() {

        datatable = $('#kt_datatable').KTDatatable({
            // datasource definition
            data: {
                type: 'remote',
                source: {
                    read: {
                        url: CMS_DATA_URL,
                        method: 'GET',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                        },
                        contentType: 'application/json',
                        params: {
                          _token: $('meta[name="csrf_token"]').attr('content')
                        },
                        // sample custom headers
                        // headers: {'x-my-custom-header': 'some value', 'x-test-header': 'the value'},
                        map: function(raw) {
                            // sample data mapping
                            var dataSet = raw;
                            if (typeof raw.data !== 'undefined') {
                                dataSet = raw.data;
                            }
                            return dataSet;
                        },
                    },
                },
                pageSize: 10,
                serverPaging: true,
                serverFiltering: true,
                serverSorting: true,
            },

            // layout definition
            layout: {
                scroll: false,
                footer: false,
            },

            // column sorting
            sortable: true,

            pagination: true,

            search: {
                input: $('#kt_datatable_search_query'),
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
                textAlign: 'center', 
                template: function(data) {
                    var stat_class = ((data.is_active === "yes") ? 'label-light-success' : 'label-light-warning') 
                    return '<span class="label font-weight-bold label-lg ' + stat_class + ' label-inline">' + data.id + '</span>';
                },
            }, {
                field: 'slug',
                title: 'Slug',
                sortable: 'asc',
                template: function(data) {
                    var stat_class = ((data.is_active === "yes") ? 'label-light-success' : 'label-light-warning') 
                    return '<span class="label font-weight-bold label-lg ' + stat_class + ' label-inline">' + data.slug + '</span>';
                },
            }, {
                field: 'is_active',
                title: 'Active',
                sortable: 'asc',
                width: 70,
                textAlign: 'center',
                template: function(data) {
                    var output, btn_class, status;
                    btn_class = ( (data.is_active == 'yes') ? 'btn btn-sm btn-success' : 'btn btn-sm btn-warning' );
                    status = ( (data.is_active == 'yes') ? 'Yes' : 'No' );
                    output = "<button class='" + btn_class + " is_activeBtn' data-id='" + data.id +  "' data-val='" + data.is_active +  "' >" + status + "</button>";
                    return output;
                },
            }, {
                field: 'is_menu',
                title: 'Menu',
                sortable: 'asc',
                width: 70,
                textAlign: 'center',
                template: function(data) {
                    var output, btn_class, status;
                    btn_class = ( (data.is_menu == 'yes') ? 'btn btn-sm btn-success' : 'btn btn-sm btn-warning' );
                    status = ( (data.is_menu == 'yes') ? 'Yes' : 'No' );
                    output = "<button class='" + btn_class + " is_menuBtn' data-id='" + data.id +  "' data-val='" + data.is_menu +  "' >" + status + "</button>";
                    return output;
                },
            }, {
                field: 'is_header',
                title: 'Header',
                sortable: 'asc',
                width: 70,
                textAlign: 'center',
                template: function(data) {
                    var output, btn_class, status;
                    btn_class = ( (data.is_header == 'yes') ? 'btn btn-sm btn-success' : 'btn btn-sm btn-warning' );
                    status = ( (data.is_header == 'yes') ? 'Yes' : 'No' );
                    output = "<button class='" + btn_class + " is_headerBtn' data-id='" + data.id +  "' data-val='" + data.is_header +  "' >" + status + "</button>";
                    return output;
                },
            }, {
                field: 'is_footer',
                title: 'Footer',
                sortable: 'asc',
                width: 70,
                textAlign: 'center',
                template: function(data) {
                    var output, btn_class, status;
                    btn_class = ( (data.is_footer == 'yes') ? 'btn btn-sm btn-success' : 'btn btn-sm btn-warning' );
                    status = ( (data.is_footer == 'yes') ? 'Yes' : 'No' );
                    output = "<button class='" + btn_class + " is_footerBtn' data-id='" + data.id +  "' data-val='" + data.is_footer +  "' >" + status + "</button>";
                    return output;
                },
            }, {
                field: 'Actions',
                title: 'Actions',
                sortable: false,
                width: 125,
                overflow: 'visible',
                autoHide: false,
                template: function(data) {
                    return '\
                        <a href="javascript:;" class="btn btn-sm btn-clean btn-icon mr-2 edit-cms" data-val="' + data.id + '" title="Edit details">\
                            <span class="svg-icon svg-icon-md">\
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
                                        <rect x="0" y="0" width="24" height="24"/>\
                                        <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero"\ transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/>\
                                        <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/>\
                                    </g>\
                                </svg>\
                            </span>\
                        </a>\
                        <a href="javascript:;" class="btn btn-sm btn-clean btn-icon del-cms" data-val="' + data.id + '" title="Delete">\
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

    var ActiveBtnEventHandlers = function() {
        // update is_active state
        $(document).on('click', '.is_activeBtn', function() {
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
                url: UPDATE_IS_ACTIVE_STATE_URL,
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

        // update is_footer state
        $(document).on('click', '.is_footerBtn', function() {
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
                url: UPDATE_IS_FOOTER_STATE_URL,
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

        // update is_menu state
        $(document).on('click', '.is_menuBtn', function() {
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
                url: UPDATE_IS_MENU_STATE_URL,
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

        // update is_header state
        $(document).on('click', '.is_headerBtn', function() {
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
                url: UPDATE_IS_HEADER_STATE_URL,
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
    }
    var languageSelectEventHandler = function() {

        $('#lang').on('change', function() {
            if (is_edit_mode === false) {
                return;
            }
            var elem = $(this);
            var lang = elem.val();
            var id = $('#cms_hidden_id').val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                },
                data: {
                    id: id,
                    lang: lang
                },
                type: "GET",
                url: GET_CMS_DETAIL_BY_LANGUAGE,
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
                        var cms = data.data;
                        $('#cms_hidden_id').val(cms.id);
                        $('#lang').val(cms.lang);
                        $('#slug').val(cms.slug);
                        $('#page_title').val(cms.page_title);
                        $('#meta_title').val(cms.meta_title);
                        $('#meta_keyword').val(cms.meta_keyword);
                        $('#meta_description').val(cms.meta_description);
                        $('#page_sub_title').val(cms.page_sub_title);
                        $('#page_sub_group').val(cms.page_sub_group);
                        $('#short_desc').val(cms.short_desc);
                        $('#cms_description').summernote('code',cms.description);
                        $('#is_active').prop('checked', (cms.is_active === 'yes'));
                        $('#is_menu').prop('checked', (cms.is_menu === 'yes'));
                        $('#is_header').prop('checked', (cms.is_header === 'yes'));
                        $('#is_footer').prop('checked', (cms.is_footer === 'yes'));
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
    };

    var AddEditDeleteCmsPageHandler = function() {

        // add cms page
        $('.add_new_cms_btn').on('click', function() {

            $('#kt_datatable').hide();
            $('#add_edit_cms_section').show();
            $('.cms_search_section').hide();
            $('.cms_save_btn').hide();
            $('.cms_add_btn').show();
            is_edit_mode = false;
            $('#lang').val(LANGUAGE);
        });
        // cancel btn handler
        $('.cms_cancel_btn').on('click', function() {

            var inputs, textareas, checkboxs;
            // format all input form controls
            if (inputs = $('#add_edit_cms_section').find("input[type='text']")) {
                inputs.each(function() {
                    $(this).val('');
                });
            }
            // format all textarea form controls
            if (textareas = $('#add_edit_cms_section').find('textarea')) {
                textareas.each(function() {
                    $(this).val('');
                });
            }
            // format summernote
            $('#cms_description').summernote('code',"");
            // for all checkboxes
            if (checkboxs = $('#add_edit_cms_section').find("input[type='checkbox']")) {
                checkboxs.each(function() {
                    $(this).prop('checked', false);
                })
            }
            
            $('#add_edit_cms_section').hide();
            $('#kt_datatable').show();
            $('.cms_search_section').show();

            // reload datatable
            datatable.reload();
            is_edit_mode = false;
        });

        // add cms page
        $('.cms_add_btn').on('click', function() {

            if (addEditFormValidation() === false) {
                KTUtil.scrollTop();
                return;
            }

            var slug = $('#slug').val();
            var lang = $('#lang').val();
            var page_tite = $('#page_title').val();
            var meta_title = $('#meta_title').val();
            var meta_keyword = $('#meta_keyword').val();
            var meta_description = $('#meta_description').val();
            var page_sub_title = $('#page_sub_title').val();
            var page_sub_group = $('#page_sub_group').val();
            var short_desc = $('#short_desc').val();
            var description = $('#cms_description').summernote('code');
            var is_active =  ($('#is_active').is(":checked") ? 'yes' : 'no');
            var is_menu =  ($('#is_menu').is(":checked") ? 'yes' : 'no');
            var is_header =  ($('#is_header').is(":checked") ? 'yes' : 'no');
            var is_footer =  ($('#is_footer').is(":checked") ? 'yes' : 'no');

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                },
                data: {
                    slug : slug,
                    lang : lang,
                    page_tite : page_tite,
                    meta_title : meta_title,
                    meta_keyword : meta_keyword,
                    meta_description : meta_description,
                    page_sub_title : page_sub_title,
                    page_sub_group : page_sub_group,
                    short_desc : short_desc,
                    description : description,
                    is_active : is_active,
                    is_menu : is_menu,
                    is_header : is_header,
                    is_footer : is_footer
                },
                type: "POST",
                url: ADD_NEW_CMS_PAGE_URL,
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

        // get cms detail info before update data
        $(document).on('click', '.edit-cms', function() {
            $('#kt_datatable').hide();
            $('#add_edit_cms_section').show();
            $('.cms_search_section').hide();

            $('.cms_save_btn').show();
            $('.cms_add_btn').hide();
            is_edit_mode = true;

            var id = $(this).attr('data-val');
            $('#cms_hidden_id').val(id);

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                },
                data: {
                    id : id
                },
                type: "GET",
                url: GET_CMS_DETAIL_URL,
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
                        var cms = data.data;
                        $('#cms_hidden_id').val(cms.id);
                        $('#lang').val(cms.lang);
                        $('#slug').val(cms.slug);
                        $('#page_title').val(cms.page_title);
                        $('#meta_title').val(cms.meta_title);
                        $('#meta_keyword').val(cms.meta_keyword);
                        $('#meta_description').val(cms.meta_description);
                        $('#page_sub_title').val(cms.page_sub_title);
                        $('#page_sub_group').val(cms.page_sub_group);
                        $('#short_desc').val(cms.short_desc);
                        $('#cms_description').summernote('code',cms.description);
                        $('#is_active').prop('checked', (cms.is_active === 'yes'));
                        $('#is_menu').prop('checked', (cms.is_menu === 'yes'));
                        $('#is_header').prop('checked', (cms.is_header === 'yes'));
                        $('#is_footer').prop('checked', (cms.is_footer === 'yes'));
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


        // update cms page
        $('.cms_save_btn').on('click', function() {

            if (addEditFormValidation() === false) {
                KTUtil.scrollTop();
                return;
            }
            var id = $('#cms_hidden_id').val();
            var lang = $('#lang').val();
            var slug = $('#slug').val();
            var page_tite = $('#page_title').val();
            var meta_title = $('#meta_title').val();
            var meta_keyword = $('#meta_keyword').val();
            var meta_description = $('#meta_description').val();
            var page_sub_title = $('#page_sub_title').val();
            var page_sub_group = $('#page_sub_group').val();
            var short_desc = $('#short_desc').val();
            var description = $('#cms_description').summernote('code');
            var is_active =  ($('#is_active').is(":checked") ? 'yes' : 'no');
            var is_menu =  ($('#is_menu').is(":checked") ? 'yes' : 'no');
            var is_header =  ($('#is_header').is(":checked") ? 'yes' : 'no');
            var is_footer =  ($('#is_footer').is(":checked") ? 'yes' : 'no');

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                },
                data: {
                    id: id,
                    lang: lang,
                    slug : slug,
                    page_tite : page_tite,
                    meta_title : meta_title,
                    meta_keyword : meta_keyword,
                    meta_description : meta_description,
                    page_sub_title : page_sub_title,
                    page_sub_group : page_sub_group,
                    short_desc : short_desc,
                    description : description,
                    is_active : is_active,
                    is_menu : is_menu,
                    is_header : is_header,
                    is_footer : is_footer
                },
                type: "POST",
                url: UPDATE_CMS_PAGE_URL,
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
                            $('.cms_cancel_btn').trigger('click');
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

        // delete cms page
        $(document).on('click', '.del-cms', function() {
            var id = $(this).attr('data-val');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                },
                data: {
                    id : id
                },
                type: "POST",
                url: DELETE_CMS_PAGE_URL,
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

        var addEditFormValidation = function() {
            var slug = $('#slug').val();
            var page_tite = $('#page_title').val();
            var meta_title = $('#meta_title').val();
            var meta_keyword = $('#meta_keyword').val();
            var meta_description = $('#meta_description').val();
            var page_sub_title = $('#page_sub_title').val();
            var page_sub_group = $('#page_sub_group').val();
            var short_desc = $('#short_desc').val();
            var description = $('#cms_description').summernote('code');            

            var output = true;

            if (slug == "") {
                output = false;
                $('.slug_error').fadeIn();
                setTimeout(() => {
                    $('.slug_error').fadeOut();
                }, 10000);
            }
            if (page_tite == "") {
                output = false;
                $('.page_title_error').fadeIn();
                setTimeout(() => {
                    $('.page_title_error').fadeOut();
                }, 10000);
            }
            if (meta_title == "") {
                output = false;
                $('.meta_title_error').fadeIn();
                setTimeout(() => {
                    $('.meta_title_error').fadeOut();
                }, 10000);
            }
            if (meta_keyword == "") {
                output = false;
                $('.meta_keyword_error').fadeIn();
                setTimeout(() => {
                    $('.meta_keyword_error').fadeOut();
                }, 10000);
            }
            if (meta_description == "") {
                output = false;
                $('.meta_description_error').fadeIn();
                setTimeout(() => {
                    $('.meta_description_error').fadeOut();
                }, 10000);
            }
            if (page_sub_title == "") {
                output = false;
                $('.page_sub_title_error').fadeIn();
                setTimeout(() => {
                    $('.page_sub_title_error').fadeOut();
                }, 10000);
            }
            if (page_sub_group == "") {
                output = false;
                $('.page_sub_group_error').fadeIn();
                setTimeout(() => {
                    $('.page_sub_group_error').fadeOut();
                }, 10000);
            }
            if (short_desc == "") {
                output = false;
                $('.short_desc_error').fadeIn();
                setTimeout(() => {
                    $('.short_desc_error').fadeOut();
                }, 10000);
            }
            if (description === "<p><br></p>" || description === "" || description === null || description === undefined) {
                output = false;
                $('.cms_description_error').fadeIn();
                setTimeout(() => {
                    $('.cms_description_error').fadeOut();
                }, 10000);
            }

            return output;
        }
    }



    return {
        // public functions
        init: function() {
            summernotes();
            demo();
            ActiveBtnEventHandlers();
            AddEditDeleteCmsPageHandler();
            languageSelectEventHandler();
        },
    };
}();

jQuery(document).ready(function() {
    KTDatatableRemoteAjaxDemo.init();
});
