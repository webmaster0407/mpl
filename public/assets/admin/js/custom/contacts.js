"use strict";
// Class definition
var datatable;
var is_edit_mode = true;
var KTDatatableRemoteAjaxDemo = function() {
    // Private functions


    // basic demo
    var demo = function() {

        datatable = $('#contacts_datatable').KTDatatable({
            // datasource definition
            data: {
                type: 'remote',
                source: {
                    read: {
                        url: CONTACTS_DATA_URL,
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
                input: $('#contacts_search_form'),
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
                    var stat_class = ((data.visited === "yes") ? 'label-light-primary' : 'label-light-danger') 
                    return '<span class="label font-weight-bold label-lg ' + stat_class + ' label-inline">' + data.id + '</span>';
                },
            }, {
                field: 'name',
                title: 'Name',
                width: 70,
                sortable: 'asc',
                // template: function(data) {
                //     var stat_class = ((data.visited === "yes") ? 'label-light-success' : 'label-light-danger') 
                //     return '<span class="label font-weight-bold label-lg ' + stat_class + ' label-inline">' + data.name + '</span>';
                // },
            }, {
                field: 'email',
                title: 'Email',
                width: 200,
                sortable: 'asc',
                textAlign: 'center',
                // template: function(data) {
                //     var stat_class = ((data.visited === "yes") ? 'label-light-success' : 'label-light-danger') 
                //     return '<span class="label font-weight-bold label-lg ' + stat_class + ' label-inline">' + data.email + '</span>';
                // },
            }, {
                field: 'phone',
                title: 'Phone',
                sortable: 'asc',
                textAlign: 'center',
                // template: function(data) {
                //     var stat_class = ((data.visited === "yes") ? 'label-light-success' : 'label-light-danger') 
                //     return '<span class="label font-weight-bold label-lg ' + stat_class + ' label-inline">' + data.phone + '</span>';
                // },
            }, {
                field: 'subject',
                title: 'Subject',
                sortable: 'asc',
                textAlign: 'center',
                // template: function(data) {
                //     var stat_class = ((data.visited === "yes") ? 'label-light-success' : 'label-light-danger') 
                //     return '<span class="label font-weight-bold label-lg ' + stat_class + ' label-inline">' + data.subject + '</span>';
                // },
            }, { // text.substr(1, 4);
                field: 'message',
                title: 'Message',
                sortable: 'asc',
                textAlign: 'center',
                template: function(data) {
                    var stat_class = ((data.visited === "yes") ? 'label-light-success' : 'label-light-danger') 
                    // return '<span class="label font-weight-bold label-lg ' + stat_class + ' label-inline">' + data.message.substr(0, 10) + '...' + '</span>';
                    return data.message.substr(0, 15) + '...';
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
                        <a href="javascript:;" class="btn btn-sm btn-clean btn-icon mr-2 view-contact" data-val="' + data.id + '" title="View details">\
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
                        <a href="javascript:;" class="btn btn-sm btn-clean btn-icon delete-contact" data-val="' + data.id + '" title="Delete">\
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

    var deleteContactHandler = function () {
        $(document).on('click', '.delete-contact', function() {
            var elem = $(this);
            var id = elem.attr('data-val');

           $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                },
                data: {
                    id: id
                },
                type: "POST",
                url: DELETE_CONTACT_URL,
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
    };

    var viewContactHandler = function() {

        $(document).on('click', '.view-contact', function() {
            var id = $(this).attr('data-val');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                },
                data: {
                    id: id
                },
                type: "GET",
                url: GET_CONTACT_DETAIL_URL,
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
                        var contact = data.data;
                        $('#name').text(contact.name);
                        $('#email').text(contact.email);
                        $('#phone').text(contact.phone);
                        $('#subject').text(contact.subject);
                        $('#message').text(contact.message);

                        $('#contacts_datatable').hide();
                        $('.view_contact_section').show();
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

            // change visited status

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                },
                data: {
                    id: id
                },
                type: "POST",
                url: UPDATE_VISITED_STATUS_URL,
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
                        console.log(data.message);
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

        $('.back_contacts_btn').on('click', function() {
            $('.view_contact_section').hide();
            $('#contacts_datatable').show();
            datatable.reload();
        });
    };

    var changeVisitedStatusHandler = function() {
        // $(document).on('click', '.is_headerBtn', function() {
        //     var id = $(this).attr('data-id');
        //     var state = $(this).attr('data-val');

        //    $.ajax({
        //         headers: {
        //             'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
        //         },
        //         data: {
        //             id: id,
        //             state: state
        //         },
        //         type: "POST",
        //         url: UPDATE_IS_HEADER_STATE_URL,
        //         beforeSend: function() {
        //             KTApp.blockPage({
        //                 overlayColor: '#000000',
        //                 state: 'primary',
        //                 message: 'Processing...'
        //             });
        //         },
        //         success: function(data) {
        //             data = $.parseJSON(data);
        //             KTApp.unblockPage();
        //             if (data.status == "success") {
        //                 datatable.reload();
        //             } else {
        //                 swal.fire({
        //                     text: 'Oops! Something went wrong!',
        //                     icon: "error",
        //                     buttonsStyling: false,
        //                     confirmButtonText: "Ok, got it!",
        //                     customClass: {
        //                         confirmButton: "btn font-weight-bold btn-light-primary"
        //                     }
        //                 }).then(function() {
        //                     console.log("Failed");
        //                 });
        //             }
        //         },
        //         error: function(error) {
        //             KTApp.unblockPage();
        //             swal.fire({
        //                 text: "Server error!",
        //                 icon: "error",
        //                 buttonsStyling: false,
        //                 confirmButtonText: "Ok, got it!",
        //                 customClass: {
        //                     confirmButton: "btn font-weight-bold btn-light-primary"
        //                 }
        //             }).then(function() {
        //                 KTUtil.scrollTop();
        //                 console.log("server error");
        //             });
        //         }
        //     });
        // });
    };





    return {
        // public functions
        init: function() {
            demo();
            viewContactHandler();
            deleteContactHandler();
        },
    };
}();

jQuery(document).ready(function() {
    KTDatatableRemoteAjaxDemo.init();
});
