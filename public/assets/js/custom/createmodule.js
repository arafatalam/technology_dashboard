

var module = new Object();
var module_field = new Object();
var module_milestone = new Object();
var module_fields_array = [];
var module_milestones_array = [];
var moduleCount = 0;
var fieldCount = 0;
var milestoneCount = 0;

var fieldIdTemp = 0;
var milestoneIdTemp = 0;

jQuery(document).ready(function() {

    init();
    document.getElementById('button_add_module').classList.remove('kt-hidden');

});

// TODO Module Entry Related Codes Begin

function addModule(){

    module.module_name = $('#module_name').val();
    module.milestone_type_name = $('#module_milestone_type option:selected').text();
    module.milestone_type_id = $('#module_milestone_type').val();
    module.module_remarks = $('#module_remarks').val();

    var markup =    '<tr id="module_row">' +
                        '<td>' + module.module_name + '</td>' +
                        '<td>' + module.milestone_type_name + '</td>' +
                        '<td>' + module.module_remarks + '</td>' +
                        '<td>' +
                            '<i onclick="removeModule();" class="la la-trash"></i>' +
                        '</td>'+
                    '</tr>';

    $("#module_table tbody").append(markup);

    clearModuleEntryForm();
    document.getElementById('button_add_module').classList.add('kt-hidden');
    moduleCount = 1;
}

function removeModule(){
    $('#module_row').remove();
    module = {};
    document.getElementById('button_add_module').classList.remove('kt-hidden');
    moduleCount = 0;
}

function clearModuleEntryForm(){

    $('#module_name').val("");
    $('#module_milestone_type').val(1);
    $('#module_remarks').val("");

}

//TODO Fields Creation Related Codes Begin

function addField(){

    fieldCount ++;

    module_field.field_id_temp = fieldIdTemp;
    module_field.field_name = $('#field_name').val();
    module_field.field_data_type = $('#field_data_type').val();
    module_field.serial = $('#field_serial').val();
    module_field.dropdown_values = $('#field_dropdown_values').val();
    module_field.field_remarks = $('#field_remarks').val();

    module_fields_array.push(module_field);

    var markup =    '<tr id="field_row_' + fieldIdTemp +'">' +
                        '<td>' + module_field.field_name + '</td>' +
                        '<td>' + module_field.field_data_type + '</td>' +
                        '<td>' + module_field.serial + '</td>' +
                        '<td>' + module_field.dropdown_values + '</td>' +
                        '<td>' + module_field.field_remarks + '</td>' +
                        '<td>' +
                            '<i onclick="removeField(' + fieldIdTemp + ')" class="la la-trash"></i>' +
                        '</td>'+
                    '</tr>';

    $("#module_fields_table tbody").append(markup);
    clearModuleFieldEntryForm();
    fieldIdTemp ++;

}

function removeField( rowId ) {

    $('#field_row_' + rowId).remove();
    fieldCount--;
    module_fields_array = module_fields_array.filter((item) => item.field_id_temp !== rowId);

}

function clearModuleFieldEntryForm(){

    module_field = {};
    $('#field_name').val("");
    $('#field_data_type').val("TEXT");
    $('#field_serial').val("");
    $('#field_dropdown_values').val("");
    $('#field_remarks').val("");

}

//TODO Default Milestone Related Codes Begin

function addMilestone() {

    milestoneCount++;

    module_milestone.milestone_id_temp = milestoneIdTemp;
    module_milestone.milestone_name = $('#milestone_name').val();

    module_milestones_array.push(module_milestone);

    var markup =    '<tr id="milestone_row_' + milestoneIdTemp +'">' +
                        '<td>' + module_milestone.milestone_name + '</td>' +
                        '<td>' +
                            '<i onclick="removeMilestone(' + milestoneIdTemp + ')" class="la la-trash"></i>' +
                        '</td>'+
                    '</tr>';

    $("#module_milestone_table tbody").append(markup);
    clearMilestoneEntryForm();
    milestoneIdTemp++;

}

function removeMilestone( rowId ) {

    $('#milestone_row_' + rowId).remove();
    milestoneCount--;
    module_milestones_array = module_milestones_array.filter((item) => item.milestone_id_temp !== rowId);
}

function clearMilestoneEntryForm(){

    module_milestone = {};
    $('#milestone_name').val("");

}

//TODO Entire Module Saving Codes Begin

function saveEntireModule( buttonObject ){ // this function is called from /assets/js/demo4/pages/wizard/wizard-3.js"

    if(moduleCount == 0){
        swal.fire({
                "title": "No Module!!",
                "text": "You didnt add any modul to create",
                "type": "error",
                "confirmButtonClass": "btn btn-primary"
            });
    } else {
        $.ajax({
            type : 'POST',
            url : './savemodule',
            data : {

                module_name : module.module_name,
                module_remarks : module.module_remarks,
                module_milestone_type : module.milestone_type_id

            },
            dataType : 'JSON',
            success : function(data){

                if(data.id == 0){
                    showModuleFailureAlert(data);
                } else {

                    var message = getNotificationMessage(data);
                    showNotification('success', message, "SUCCESS");

                    if(fieldCount > 0){
                        // Adding Module id to all the fields and send to save
                        $.each(module_fields_array, function(index, item){
                            //Set Milestone id for the fields
                           item.module_id = data.module_id;
                           //Save fields individually
                            saveField(item);
                        });
                    }
                    if(milestoneCount > 0){
                        // Adding Module id to all the milestones and send to save
                        $.each(module_milestones_array, function(index, item){
                            //Set Milestone id for the fields
                            item.module_id = data.module_id;
                            //Save fields individually
                            saveMilestone(item);
                        });
                    }


                    swal.fire({
                        title: 'Well Done',
                        text: "You successfully added a new module!!",
                        type: 'success',
                        confirmButtonText: 'Ok, Let\'s Finish!'
                    }).then(function(result) {
                        KTApp.unprogress(buttonObject);
                        // Reload or redirect to another page
                        window.location.reload();
                    });
                }
            }
        });
    }



}
function saveField( field ){

    $.ajax({
        type : 'POST',
        url : './savefield',
        data : {
            module_id : field.module_id,
            field_id : 0,
            field_name : field.field_name,
            field_data_type : field.field_data_type,
            serial : field.serial,
            dropdown_values : field.dropdown_values,
            remarks : field.field_remarks
        },
        dataType: 'JSON',
        success : function (data) {
            var message = getNotificationMessage(data);

            if (data.id == 0){
                showNotification('error', message, "FIELD : "  + data.field_name);
            } else {
                showNotification('success', message, "SUCCESS");
            }
        }
    });
}

function saveMilestone( milestone ) {

    $.ajax({
        type : 'POST',
        url : './savemilestone',
        data : {
            module_id : milestone.module_id,
            milestone_name : milestone.milestone_name,
            remarks : "Initial Adding",
        },
        dataType: 'JSON',
        success : function (data) {
            var message = getNotificationMessage(data);

            if (data.id == 0){
                showNotification('error', message, "MILESTONE : " + data.field_name);
            } else {
                showNotification('success', message, "SUCCESS");
            }
        }
    });

}

function showModuleFailureAlert( data ){

    var message = '';
    $.each(data.text, function(index, item){
        $.each(item, function (index, text) {
            message = message + text + '</br>'
        })
    });

    swal.fire(
        'Failed!',
        message,
        'error'
    );
    KTApp.unprogress(buttonObject);

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
        "timeOut": "0",
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



function init(){
    module = new Object();
    module_field = new Object();
    module_milestone = new Object();

    module_fields_array = [];
    module_milestones_array = [];

    moduleCount = 0
    fieldCount = 0;
    milestoneCount = 0;

    fieldIdTemp = 0;
    milestoneIdTemp = 0;

    clearModuleEntryForm();
    clearModuleFieldEntryForm();
    clearMilestoneEntryForm();
}