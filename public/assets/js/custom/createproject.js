'use strict';
var commonFieldList = [];
var moduleFieldList = [];

jQuery(document).ready(function() {

    getDataCommonFields();

});

function createProject(){
    //Saving Project Field Data. Milestones will be saved later




    var project_data = {};
    var moduleId = $('#module_id').text();
    var milestoneData = $('#milestone_data_form').serializeArray();
    console.log(milestoneData);
    $.each(commonFieldList, function(index, item){

        project_data[item.html_id_and_db_column_name] = $('#' + item.html_id_and_db_column_name ).val();


    });
    $.each(moduleFieldList, function (index, item) {

        project_data[item.html_id_and_db_column_name] = $('#' + item.html_id_and_db_column_name ).val();

    });

    // project_data['status_id'] = $('#project_status').val();

    var statusId = $('#project_status').val();

    swal.fire({
        title: 'Are you sure??',
        text: 'Are you sure you want to save the project?',
        type: 'warning',
        confirmButtonText: 'Yes, Save',
        showCancelButton: true,
        cancelButtonText: 'No, cancel!',
    }).then(function(result) {
        if(result.value){
            saveProject(moduleId, statusId, project_data, milestoneData);
        } else {
            swal.fire(
                'Cancel!',
                'Project Saving Canceled!',
                'error'
            );
        }
    });
    // var milestone_data = $('#milestone_data_form').serializeArray();




}


function saveProject(moduleId, statusId, projectData, milestoneData){

    $.ajax({
        type : 'POST',
        url : './saveproject',
        data : {
            module_id : moduleId,
            status_id  : statusId,
            project_data : projectData,
            milestone_data : milestoneData

        },
        dataType : 'text',
        success : function(data){

            console.log(data);

        }
    });



}

function getDataCommonFields(){

    $.ajax({
        type : 'GET',
        url : './getdatacommonfields',
        dataType : 'JSON',
        success : function(data){

            createMarkups(data);
            setCommonFieldList(data);
            getDataModuleFields();

        }
    });




}



function setCommonFieldList(data){

    commonFieldList = data;

}

function getDataModuleFields(){

    var moduleId = $('#module_id').text();

    $.ajax({
       type : 'GET',
       url : './getdatamodulefields/' + moduleId,
       dataType: 'JSON',
       success : function(data){
           createMarkups(data);
           setModuleFieldList( data )
       }
    });
}
function setModuleFieldList( data ){

    moduleFieldList = data;

}

function createMarkups(data){

    var rowStart ='<div class="form-group row">';
    var innerElement = '';
    var rowEnd = '</div>';
    var count = 1;


    $.each(data, function(index, item){

        var tempInnerElement = item.field_data_type.html_element;
        tempInnerElement = tempInnerElement.replace('##FIELD_NAME##', item.field_name);
        tempInnerElement = tempInnerElement.replace('##FIELD_ID##', item.html_id_and_db_column_name);
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

            $('#' + item.html_id_and_db_column_name).append(dropDownListMarkup);


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