jQuery(document).ready(function() {

    KTBootstrapDatepicker.init();
    autoResizeTextArea();
    select2dropdown();
    // $('form').keypress(function(event) {
    //     return event.keyCode != 13;
    // });
});
$.ajaxSetup({
    headers: {
        'X-CSRF-Token': $("meta[name=_token]").attr("content")
    },
    error : function(XMLHttpRequest, textStatus, errorThrown){
        console.log('Status : ' + textStatus);
        console.log('ERROR : ' + errorThrown);
        console.log(XMLHttpRequest.responseText);
        // alert("Status: " + textStatus); alert("Error: " + errorThrown)
        swal.fire(
            textStatus,
            errorThrown,
            'error'
        )

    }
});

function select2dropdown(){
    $('.kt-select2').select2({});
}

function autoResizeTextArea(){

    var demo = $('.autoresize');
    autosize(demo);
    autosize.update(demo);
}

function getNotificationMessage( data ){
    var message = '';
    $.each(data.text, function(index, item){
        $.each(item, function (index, text) {
            message = message + text + '</br>'
        })
    });

    return message;
}

function showNotification( type, message, title){

    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": true,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "10000",
        "extendedTimeOut": "0",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };

    if(type == 'success'){
        toastr.success(message, title);
    } else {
        toastr.error(message, title);
    }

}


function showFailureAlert( data ){

    var message = getNotificationMessage(data)

    swal.fire(
        'Failed!',
        message,
        'error'
    );
    KTApp.unprogress(buttonObject);

}
var KTBootstrapDatepicker = function () {

    var arrows;
    if (KTUtil.isRTL()) {
        arrows = {
            leftArrow: '<i class="la la-angle-right"></i>',
            rightArrow: '<i class="la la-angle-left"></i>'
        }
    } else {
        arrows = {
            leftArrow: '<i class="la la-angle-left"></i>',
            rightArrow: '<i class="la la-angle-right"></i>'
        }
    }

    // Private functions
    var initDatePicker = function () {

        $('.date-picker').datepicker({
            rtl: KTUtil.isRTL(),
            todayBtn: "linked",
            clearBtn: true,
            todayHighlight: true,
            templates: arrows,
            format: 'dd-mm-yyyy'
        });
    }

    return {
        // public functions
        init: function() {
            initDatePicker();
        }
    };
}();