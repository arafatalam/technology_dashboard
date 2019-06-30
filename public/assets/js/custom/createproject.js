'use strict';


jQuery(document).ready(function() {

    getDataCommonFields();
    getDataModuleFields();



});

function getDataCommonFields(){

    $.ajax({
        type : 'GET',
        url : './getdatacommonfields',
        dataType : 'JSON',
        success : function(data){

            createMarkups(data);

        }
    });

}

function getDataModuleFields(){

    var moduleId = $('#module_id').text();

    $.ajax({
       type : 'POST',
       url : './getdatamodulefields/' + moduleId,
       dataType: 'JSON',
       success : function(data){
           createMarkups(data);
       }
    });


}

function createMarkups(data){

    var rowStart ='<div class="form-group row">';
    var innerElement = '';
    var rowEnd = '</div>';
    var count = 1;

    $.each(data, function(index, item){

        var tempInnerElement = item.field_data_type.html_element;
        tempInnerElement = tempInnerElement.replace('##FIELD_NAME##', item.field_name);
        tempInnerElement = tempInnerElement.replace('##FIELD_ID##', item.html_class);
        innerElement = innerElement + tempInnerElement;
        if( count === 4 ){
            $('#project_data_form_body').append(rowStart + innerElement + rowEnd);
            innerElement = '';
            count = 1;
        }
        count++


    });

    $('#project_data_form_body').append(rowStart + innerElement + rowEnd);


    // Add dropdown options.
    $.each(data, function(index, item){

        if(item.is_dropdown == 1){

            var dropDownListMarkup = createDropDownMarkup(item.dropdown_values);

            $('#' + item.html_class).append(dropDownListMarkup);


        }
    });

    autoResizeTextArea();
    select2dropdown();
    KTBootstrapDatepicker.init();
}

function createDropDownMarkup( $dropdownValues ){

    var valuesArray = $dropdownValues.split(",");
    var markUp = '';

    $.each(valuesArray, function (index, item) {

        markUp = markUp + '<option value="' + item + '">' + item + '</option>';

    })

    return markUp;

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
            format: 'yyyy-mm-dd'
        });
    }

    return {
        // public functions
        init: function() {
            initDatePicker();
        }
    };
}();