var is_new; 
var talents_per_page = TALENTS_PER_PAGE;
var current_page = 1;
var golbal_cat_id = getUrlParameter('cat_id');
var golbal_keyword = getUrlParameter('keyword');

function getUrlParameter(sParam) {
    var sPageURL = window.location.search.substring(1),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
        }
    }
    return false;
}


var searchHandlers = function() {

	var searchButtonEventHandler = function () {
		$('#searchBtn').on('click', function(e) {
			e.preventDefault();

			var cat_id = $('#categories').val();
			var keyword = $('#keyword').val();
			current_page = 1;
			golbal_cat_id = cat_id;
			golbal_keyword = keyword;

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                },
                data: {
                    cat_id : cat_id,
                    keyword : keyword,
                    page: current_page
                },
                type: "GET",
                url: SEARCH_URL,
                beforeSend: function() {
                    $.blockUI({ message: 'Please wait...<span class="spinner spinner-primary"></span>' });
                },
                success: function(data) {
                    data = $.parseJSON(data);
                    $.unblockUI();
                    if (data.status == "success") {
                    	talents = data.data;
                    	paths = data.paths;
                		var talents_content = "";
                		for ( let i = 0; i < talents.length; i++) {
            				talents_content += "<div class='grid'>";
            				talents_content += "<img src='" + paths[i] + "' alt ='" + talents[i].name + "' title= '" + talents[i].name + "' />";
            				talents_content += "<div class='talent-info'>";
            				talents_content += ("<h5>" + talents[i].name + "</h5>");
            			//	talents_content += ("<p>" + talents[i].job_reference + "</p>");
            				talents_content += "<div class='text-right'>";
            				talents_content += "<a href='" + DETAIL_PAGE_URL + "/" + "?id=" + talents[i].id + "' >Detail</a>";
            				talents_content += "</div></div></div>";
                		}
                		$('.talent-list').html(talents_content);
                		if (talents.length < talents_per_page) {
                			$('#loadmoreBtn').hide();
                		} else  {
                			$('#loadmoreBtn').show();
                		}
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
	}

	var loadmorehandler = function () {
		$('#loadmoreBtn').on('click', function (e) {
			e.preventDefault();
			var cat_id = golbal_cat_id;
			var keyword = golbal_keyword;
			current_page = current_page + 1;

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                },
                data: {
                    cat_id : cat_id,
                    keyword : keyword,
                    page: current_page
                },
                type: "GET",
                url: SEARCH_URL,
                beforeSend: function() {
                    $.blockUI({ message: 'Please wait...<span class="spinner spinner-primary"></span>' });
                },
                success: function(data) {
                    data = $.parseJSON(data);
                    $.unblockUI();
                    if (data.status == "success") {
                    	talents = data.data;
                    	paths = data.paths;
                		var talents_content = "";
                		for ( let i = 0; i < talents.length; i++) {
            				talents_content += "<div class='grid'>";
            				talents_content += "<img src='" + paths[i] + "' alt ='" + talents[i].name + "' title= '" + talents[i].name + "' />";
            				talents_content += "<div class='talent-info'>";
            				talents_content += ("<h5>" + talents[i].name + "</h5>");
            			//	talents_content += ("<p>" + talents[i].job_reference + "</p>");
            				talents_content += "<div class='text-right'>";
            				talents_content += "<a href='" + DETAIL_PAGE_URL + "/" + "?id=" + talents[i].id + "' >Detail</a>";
            				talents_content += "</div></div></div>";
                		}
                		$('.talent-list').append(talents_content);
                		if (talents.length < talents_per_page) {
                			$('#loadmoreBtn').hide();
                		} else  {
                			$('#loadmoreBtn').show();
                		}
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
	}

	return {
		init: function() {
			searchButtonEventHandler();
			loadmorehandler();
		},
	};
}();

jQuery(document).ready(function() {
	searchHandlers.init();
});