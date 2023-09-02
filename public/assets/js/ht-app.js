var validation = {
    required: function () {
        $('.required').each(function() {
            var element = $(this).find('.input-group');
            html = '<span class="input-group-text"><i class="text-danger fa-xs fas fa-star-of-life"></i></span>';
            $(element).append(html);
        });
    },
    info: function () {
        $('.info').each(function() {
            var element = $(this).find('.input-group-append');
            $(element).append('<span class="input-group-text"><i class="text-info fa-xs fas fa-info"></i></span>');
        });
    },
    error: function (errors, message) {
        $('.alert-danger').remove();
        $.each(errors, function (errorKey, errorValue) {
            var keyReplace = errorKey.replace(/[.]/g,'_');
            var element = $('#' + keyReplace);
            $(element).addClass("is-invalid");
            if (keyReplace == 'file'){
                $('#file-row').append('<p class="alert alert-danger rounded-0 mb-0 p-1">' + errorValue + '</p>');
            }else{
                $(element).parent("div").after('<small class="invalid-feedback">' + errorValue + '</small>');
            }
        });
    }
}

function string_to_slug(str) {
    str = str.replace(/^\s+|\s+$/g, '');d
    str = str.toLowerCase();
    var from = 'ÜĞŞİÇÖüğşıçöàáäâèéëêìíïîòóöôùúüûñç·/_,:;';
    var to   = 'UHSICOugsicoaaaaeeeeiiiioooouuuunc------';
    for (var i=0, l=from.length ; i<l ; i++) { str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i)); }
    str = str.replace(/[^a-z0-9 -]/g, '').replace(/\s+/g, '-').replace(/-+/g, '-');
    return str;
}

$(document).on('click', '#button-getForm', function(e) {
    $('#right_modal').remove();
    let baseUrl = $('base').attr('data-action');
    let route = baseUrl + $(this).attr('data-action');
    $.ajax({
        url: route,
        dataType: 'html',
        success: function(data) {
            $('body').append(data);
            $('#right_modal').modal('show');
        },
        error: function (err) {

        }
    });
});

$(document).on('click', '#button-editForm', function(e)
{
    $('#right_modal').remove();
    let baseUrl = $('base').attr('data-action');
    let route = baseUrl + $(this).attr('data-action');
    $.ajax({
        url: route,
        dataType: 'html',
        success: function (data) {
            $('body').append(data);
            $('#right_modal').modal('show');
        },
        error: function (err) {

        }


    });

});

$(document).on('click', '#button-deleteFrom', function(e)
{
    let baseUrl = $('base').attr('data-action');
    let route = baseUrl + $(this).attr('data-action');
    $.ajax({
        url: route,
        dataType: 'html',
        success: function (data) {
            console.log("test");
        },
        error: function (err) {

        }


    });

});


$(document).on('click', '#data-submit', function (e)
{
    console.log("test");

})

$(document).on('click', '#button-filter', function(e) {
    $.ajax({
        url: $(this).attr('data-action'),
        dataType: 'html',
        success: function(html) {
            $('.container-fluid').append(html);
            validation.required();
            validation.info();
            $('#button-filter').modal('show');
        }
    });
});

/*$(document).on('click', '#data-submit', function(e) {
    var element = this;
    $.ajax({
        url: $(this).attr('data-action'),
        method: 'post',
        data: $('#' + $(this).attr('data-form')).serialize(),
        beforeSend: function() {},
        error: function(data) {
            if( data.status === 422 ) {
                console.log(data)
                var data = $.parseJSON(data.responseText);
                validation.error(data['errors'], data['message']);
            }
        },
        complete: function() {},
        success: function(result) {
            $('.alert-danger').hide();
          //  $('#modal-right').modal('hide');
           // document.location.reload();
        }
    });
});*/
$(document).on('submit', '#form-data', function(e) {
    e.preventDefault();
    var element = this;
    var route  = $(this).attr('data-action')
    $.ajax({
        type: 'POST',
        url: route,
        data: new FormData(this),
        contentType:false,
        processData:false,
        cache:false,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        beforeSend: function() {
            $('#data-submit').attr('disabled', 'disabled')
            // $('#data-submit').children('i').remove();
            // html = '<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>';
            // $('#data-submit').text('');
            // html += '<span className="sr-only">Save...</span>';
            // $('#data-submit').append(html);
        },
        error: function(data) {
            $('.invalid-feedback').remove();
            if ($('.is-invalid').val() != null){
                $('.is-invalid').removeClass('is-invalid');
            }
            $('#data-submit').attr('disabled', null)
            if( data.status === 422 ) {
                var data = $.parseJSON(data.responseText);
                validation.error(data['errors'], data['message']);
            }
            // $('#data-submit').children('span').remove();
            // html = '<i class="fa fa-save mr-1"></i>';
            // html += '<span class="line">Save</span>';
            // $('#data-submit').append(html);
        },
        success: function(result) {
            $.each(result, function(key, value){
                var html = '<h2>' + value +'</h2>'
                $("#" + key).next(html)
            })
            console.log(result)
        },
        complete: function() {
            $('#data-submit').attr('disabled', null)
            $('.alert-danger').hide();
            $('#modal-right').modal('hide');
            //document.location.reload();
        },

    });
});
$(document).on('click', '#data-submit', function (e){
    $('#form-data').trigger('submit');
});
$(document).on('click', '.refresh', function(e) {
    document.location.reload();
});


/*
$(document).on('click', '[data-toggle=\'basicSubmitPop\']', function(e) {
	var element = this;
	$action=$('.input-action').val();
	$description=$('.input-description').val();
	$date=$('.input-date').val();
	$orientation_id=$('.orientation_id').val();
	$.ajax({
		url: $(this).attr('data-action'),
		method: 'post',
		data: {action:$action,description:$description,date:$date,orientation_id:$orientation_id},
		beforeSend: function() {},
		error: function(data) {
			if( data.status === 422 ) {
				var data = $.parseJSON(data.responseText);
				validation.error(data['errors'], data['message']);
			}
		},
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		},
		complete: function() {},
		success: function(result) {
			$('.alert-danger').hide();
			$('#modal-basic').modal('hide');
			 document.location.reload();
		}
	});
});
*/



$(document).ready(function() {

    $(document).on('click', '[data-toggle=\'filter\']', function(e) {
        location = $(this).attr('data-action') + '?' + $('#' + $(this).attr('data-form')).serialize().replace(/[^=&]+=(&|$)/g,"").replace(/&$/,"");
    });

    $("#table-selected").on("click", function(e) {
        $('input[name*=\'table_selected\']').trigger('click');
    });

    $("#table-show").on("change", function(e) {
        if ( location.search >= 0 ) {
            window.location = '?limit=' + $(this).val();
        } else {
            var reExp = /limit=\\d+/;
            var url = window.location.href;
            url = url.toString();
            var hrpid = $(this).val();
            var reExp = new RegExp("[\\?&]" + 'limit' + "=([^&#]*)"),
                delimeter = reExp.exec(url)[0].charAt(0),
                newUrl = url.replace(reExp, delimeter + 'limit' + "=" + hrpid);
            window.location.href = newUrl;
        }
    });

    $("#table-collective").on("change", function(e) {
        $('#form-collective').submit();
    });

    html_body = '';
    $('.cardList .headline th').each(function( index ) {
        if( $(this).hasClass('thPass') != true ){
            html_body += '<li class="list-group-item">';
            html_body += '	<div class="form-check">';
            html_body += '		<input class="form-check-input" type="checkbox" name="column" id="table_column_' + (index + 1) + '" value="' + (index + 1) + '" checked />';
            html_body += '		<label class="form-check-label" for="table_column_' + (index + 1) + '">' + $( this ).text() + '</label>';
            html_body += '	</div>';
            html_body += '</li>';
        }
    });
    $('.listColumn').html(html_body);
    var $chk = $(".dropdownColumn .dropdown-menu input:checkbox");
    $chk.click(function () {
        $('.cardList table td:nth-child(' + $(this).val() + ')').toggle();
        $('.cardList table th:nth-child(' + $(this).val() + ')').toggle();
    });

});

$(document).on('click', '[data-toggle=\'select_demand_type\']', function(e) {
    var element = this;
    $('#loader').remove();
    $('#modalSelect').remove();
    $.ajax({
        url: $(this).attr('data-action'),
        dataType: 'html',
        beforeSend: function() {
            $('body').append('<div id="loader" class="ajaxLoader"><div class="lds-ripple"><div></div><div></div></div></div>');
        },
        success: function(html) {
            $('#loader').remove();
            $('body').append(html);
            $('#modalSelect').modal('show');
        },
        complete: function() {
            $('#loader').remove();
        },
    });
});
$(document).on('click', '[data-toggle=\'select_routing_type\']', function(e) {
    var element = this;
    $('#modalSelect').remove();
    $('#loader').remove();
    $.ajax({
        url: $(this).attr('data-action'),
        dataType: 'html',
        beforeSend: function() {
            $('body').append('<div id="loader" class="ajaxLoader"><div class="lds-ripple"><div></div><div></div></div></div>');
        },
        success: function(html) {
            $('#loader').remove();
            $('body').append(html);
            $('#modalSelect').modal('show');
        },
        complete: function() {
            $('#loader').remove();
        },
    });
});
$(document).on('click','.button_Close',function (){
    $('#loader').remove();
    document.location.reload();
});



$(document).on('click', 'th input[type="checkbox"]', function () {
    $('td input[type="checkbox"]').prop('checked', $(this).prop('checked'));
    if ($(this).prop('checked')) {
        $('td input[type="checkbox"]').closest('tr').css({"background":"#ebebebb5"});
        $('button[data-checkbox="select-all"]').removeClass('d-none');
    } else {
        $('td input[type="checkbox"]').closest('tr').removeAttr('style');
        $('button[data-checkbox="select-all"]').addClass('d-none');
    }
});

$(document).on('click', 'td input[type="checkbox"]', function () {
    if ($(this).prop('checked')) {
        $(this).closest('tr').css({"background":"#ebebebb5"});
        $('button[data-checkbox="select-all"]').removeClass('d-none');
    } else {
        $(this).closest('tr').removeAttr('style');
        $('button[data-checkbox="select-all"]').addClass('d-none');
    }
});

$(document).on('click', '[data-checkbox=\'select-all\']', function (e){
    var value = [];
    var route = $(this).data('action');
    $.each($("input[name='select[]']:checked"), function (k,v) {
       value.push($(v).val());
    });
    console.log($("input[name='select[]']:checked").length);
    console.log(value);
    var arrStr = encodeURIComponent(JSON.stringify(value));
    if (value.length > 0) {
        $.ajax({
            type:'GET',
            url: route + "?data=" + arrStr,
            contentType:false,
            processData:false,
            cache:false,
            headers: {f
            },
            error : function (data){

            },
            success: function (data){
                window.location.reload();
            }
        })
    } else {
        console.log("no");
    }
})

$(document).on('click', '#button-detail', function (e) {
    $.ajax({
        url:$(this).attr('data-action'),
        type:'GET',
        dataType: 'html',
        beforeSend:function (){

        },
        success:function (html){
            $('#button-detail').attr('disabled', 'disabled');
            $('.app-content-body').append(html)
            if (!$(e.target).is('.custom-control, .custom-control *, a, a *')) {
                $('.app-detail').addClass('show').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function () {
                    $('.app-block .app-content .app-content-body .app-detail .app-detail-article').niceScroll().resize();
                });
            }
        }
    })
});

$(document).on('click', 'a.app-detail-close-button', function () {
    $('#button-detail').removeAttr('disabled');
    $('.app-detail').remove();
    return false;
});

$(document).on('click', '.app-sidebar-menu-button', function () {
    $('.app-block .app-sidebar, .app-content-overlay').addClass('show');
    // $('.app-block .app-sidebar .app-sidebar-menu').niceScroll().resize();
    return false;
});

$(document).on('click', '.app-content-overlay', function () {
    $('.app-block .app-sidebar, .app-content-overlay').removeClass('show');
    return false;
});


(function ($) {
    "use strict";

    $(document).ready(function () {
        var contactForm = $(".ajax-send-form");
        contactForm.submit(function (e) {
            e.preventDefault();

            var that = this;
            var url = 'ajaxmail.php';
            var processData = true;
            var contentType = "application/x-www-form-urlencoded; charset=UTF-8";
            if ($("input[name=type]", this).val() == "career") {
                var formData = new FormData(that);
                processData = false;
                contentType = false;
            } else {
                var formData = $(that).serialize();
            }
            $.ajax({
                type: 'POST',
                url: url,
                data: formData,
                processData: processData,
                contentType: contentType,
                beforeSend: function (xhr) {
                    contactForm.find("button[type=submit]").html("Gönderiliyor...");
                    contactForm.find("button[type=submit]").attr("disabled", "");
                },
                error: function (xhr) {
                    alert('Form gönderilemedi, lütfen tekrar deneyiniz.')
                },
                success: function (content) {
                    content = JSON.parse(content);
                    alert(content.msg);

                    if (content.result == true) {
                        contactForm.trigger("reset");
                        contactForm.find('#get_file [data-text]').text("");
                    }
                },
                complete: function () {
                    contactForm.find("button[type=submit]").html("Gönder");
                    contactForm.find("button[type=submit]").removeAttr("disabled");
                }
            });

            return false;
        });
    });

})(jQuery);

$(document).on('change', '.form-control', function (e){
    var value = $.trim($(this).val());
    if (value.length > 0){
        if ($(this).hasClass('is-invalid')){
            $(this).parent('div').next('small').css('display', 'none');
            $(this).removeClass('is-invalid')
        }
        $(this).addClass('is-valid')
    }
    else{
        $(this).removeClass('is-valid')
        if ($(this).parent('div').next('small').hasClass('invalid-feedback')){
            $(this).parent('div').next('small').css('display', 'block');
            $(this).addClass('is-invalid')
        }
    }
});

function toggleStatus(id) {
    var element = $('#' + id);
    var value = element.data('value');
    console.log(value)
    console.log(element.attr('data-action') +"?status=" + value)
    $.ajax({
        'type':'GET',
        'url': element.attr('data-action') +"?status=" + value,
        beforeSend: function(){
            element.attr('disabled', 'disabled');
        },
        error: function(data){
            element.attr('disabled', null);
        },
        success: function (data){
            element.data('value', data.data)
        },
        complete: function (){
            element.attr('disabled', null);
        }
    });
}








$ (document).ready (function () {
    $ (".modal a").not (".dropdown-toggle").on ("click", function () {
        $ (".modal").modal ("hide");
    });
});
