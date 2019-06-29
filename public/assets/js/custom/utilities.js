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