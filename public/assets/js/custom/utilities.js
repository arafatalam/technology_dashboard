jQuery(document).ready(function() {
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