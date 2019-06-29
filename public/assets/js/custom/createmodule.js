

var module = new Object();
var module_field = new Object();
var module_milestone = new Object();
var module_field_array = [];
var module_milestone_array = [];
var moduleCount = 0;
var fieldCount = 0;
var milestoneCount = 0;

jQuery(document).ready(function() {

    module = new Object();
    module_field = new Object();
    module_milestone = new Object();

    module_field_array = [];
    module_milestone_array = [];

    moduleCount = 0
    fieldCount = 0;
    milestoneCount = 0;

    clearModuleEntryForm();
    clearModuleFieldEntryForm();
    // clearMilestoneEntryForm();

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

    module_field.filed_name = $('#field_name').val();
    module_field.filed_data_type = $('#field_data_type').val();
    module_field.serial = $('#field_serial').val();
    module_field.dropdown_values = $('#field_dropdown_values').val();
    module_field.field_remarks = $('#field_remarks').val();

    module_field_array.push(module_field);
    var markup =    '<tr id="field_row_' + fieldCount +'">' +
                        '<td>' + module_field.filed_name + '</td>' +
                        '<td>' + module_field.filed_data_type + '</td>' +
                        '<td>' + module_field.serial + '</td>' +
                        '<td>' + module_field.dropdown_values + '</td>' +
                        '<td>' + module_field.field_remarks + '</td>' +
                        '<td>' +
                            '<i onclick="removeField(' + fieldCount + ')" class="la la-trash"></i>' +
                        '</td>'+
                    '</tr>';

    $("#module_fields_table tbody").append(markup);
    clearModuleFieldEntryForm();

}

function removeField( rowId ) {
    $('#field_row_' + rowId).remove();
    fieldCount--;
}

function clearModuleFieldEntryForm(){

    module_field = {};
    $('#field_name').val("");
    $('#field_data_type').val("TEXT");
    $('#field_serial').val("");
    $('#field_dropdown_values').val("");
    $('#field_remarks').val("");

}


//TODO Default Milestone Related Codes begin

function addMilestone() {

    milestoneCount++;

    module_milestone.milestone_name = $('#milestone_name').val();

    module_milestone_array.push(module_milestone);

    var markup =    '<tr id="milestone_row_' + milestoneCount +'">' +
                        '<td>' + module_milestone.milestone_name + '</td>' +
                        '<td>' +
                            '<i onclick="removeMilestone(' + milestoneCount + ')" class="la la-trash"></i>' +
                        '</td>'+
                    '</tr>';

    $("#module_milestone_table tbody").append(markup);
    clearMilestoneEntryForm();

}

function removeMilestone( rowId ) {

    $('#milestone_row_' + rowId).remove();
    milestoneCount--;
}

function clearMilestoneEntryForm(){

    module_milestone = {};
    $('#milestone_name').val("");

}

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
                // field_count : fieldCount,
                // milestone_count : milestoneCount,
                // module_fields : module_field_array,
                // module_milestones : module_milestone_array

            },
            dataType : 'JSON',
            success : function(data){

                console.log(data);





                var message = '';
                $.each(data.text, function(index, item){
                    $.each(item, function (index, text) {
                        message = message + text + '</br>'
                    })
                });
                if(data.id == 1){

                    // Show a toaster notification for success


                    console.log(data.module_id);

                    // swal.fire(
                    //     'Saved!',
                    //     message,
                    //     'success'
                    // )
                } else {
                    swal.fire(
                        'Failed!',
                        message,
                        'error'
                    )
                }






            }
        });
    }





    KTApp.unprogress(buttonObject);






}