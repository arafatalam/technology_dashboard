'use strict';

jQuery(document).ready(function() {
    init();
});


//TODO Module Related Functions

function populateModuleListTable(){

    $.ajax({
        type : 'GET',
        url : './getdatamodulelist',
        dataType : 'JSON',
        success : function(data){
            $('#table_module_list').KTDatatable('destroy');
            var dataTable = $('#table_module_list').KTDatatable({
                // datasource definition
                data: {
                    type: 'local',
                    source: data,
                    pageSize: 5,
                },

                // layout definition
                layout: {
                    scroll: false, // enable/disable datatable scroll both horizontal and vertical when needed.
                    // height: 450, // datatable's body's fixed height
                    footer: false, // display/hide footer
                },

                // column sorting
                sortable: true,

                pagination: true,

                search: {
                    input: $('#generalSearch'),
                },

                // columns definition
                columns: [
                    {
                        field: 'module_name',
                        title: 'Module Name',
                        autoHide: false,
                        textAlign: 'center',
                    },
                    {
                        field: 'module_milestone_type',
                        title: 'Milestone Type',
                        autoHide: false,
                        textAlign: 'center',
                    },
                    {
                        field: 'user.user_name',
                        title: 'Added / Edited By',
                        textAlign: 'center',
                        autoHide: false,

                    },
                    {
                        field: 'updated_at',
                        title: 'Added / Edited On',
                        type: 'date',
                        format: 'MM/DD/YYYY',
                        textAlign: 'center',
                    },
                    {
                        field: 'remarks',
                        title: 'Remarks',
                        textAlign: 'center',
                        width: 'auto',
                    },
                    {
                        field: 'Actions',
                        title: 'Actions',
                        sortable: false,
                        textAlign: 'center',
                        // width: 110,
                        // overflow: 'visible',
                        autoHide: false,
                        template: function(row) {
                            return '\
                                        <a href="javascript:;"  data-module_id="' + row.id + '" class="btn btn-sm btn-clean btn-icon btn-icon-md" \
                                            title="Edit details"" >\
                                            <i class="la la-edit"></i>\
                                        </a>\
                                        ';
                        },
                    }
                ],
            });

            dataTable.on('click', '[data-module_id]', function() {
                showModuleData($(this).data('module_id'));
            });
        }
    });
}

function showModuleData( moduleId ) {

    KTUtil.scrollTop();

    // TODO Populate Module Edit Form
    $.ajax({
        type : 'GET',
        url : './getdatamodule/' + moduleId,
        dataType : 'JSON',
        success : function(data){

            $('#module_id').text(data.id);

            $('#module_name').val(data.module_name);
            $('#module_milestone_type').val(data.module_milestone_type);
            select2dropdown();

            // TODO Set Fields List Table Title
            $('#module_fields_table_title').text('Field List of : ' + data.module_name);

            //TODO Set Milestone List Table Title
            $('#default_milestone_table_title').text('Milestone List of : ' + data.module_name);
        }
    });

    document.getElementById('module_edit_form_buttons').classList.remove('kt-hidden');
    document.getElementById('module_fields_row').classList.remove('kt-hidden');
    document.getElementById('default_milestone_row').classList.remove('kt-hidden');

    clearFieldEditForm()
    populateModuleFieldsTable(moduleId);
    populateDefaultMilestoneTable(moduleId);

}

function confirmSaveModule(){

    var module = {};

    module.moduleId = $('#module_id').text();
    module.moduleName = $('#module_name').val();
    module.moduleMilestoneType = $('#module_milestone_type').val();
    module.moduleRemarks = $('#module_remarks').val();

    if(module.moduleRemarks == null || module.moduleRemarks == '' || module.moduleRemarks == undefined){
        swal.fire(
            'Remarks',
            'Please write some remarks.',
            'error'
        );
    } else {

        swal.fire({
            title: 'Are you sure??',
            text: 'Are you sure you want to update this module?',
            type: 'warning',
            confirmButtonText: 'Yes, Update',
            showCancelButton: true,
            cancelButtonText: 'No, cancel!',
        }).then(function(result) {
            if(result.value){
                saveModule(module);
            } else {
                swal.fire(
                    'Cancel!',
                    'Module Update Canceled!',
                    'error'
                );
            }
        });
    }
}

function saveModule( module ){

    $.ajax({
        type : 'POST',
        url : './savemodule',
        data : {

            module_id : module.moduleId,
            module_name : module.moduleName,
            module_remarks : module.moduleRemarks,
            module_milestone_type : module.moduleMilestoneType

        },
        dataType : 'JSON',
        success : function(data){

            if(data.id == 0){
                showModuleFailureAlert(data);
            } else {

                var message = getNotificationMessage(data);
                showNotification('success', message, 'SUCCESS');

                swal.fire({
                    title: 'Well Done',
                    text: 'You successfully updated the module!!',
                    type: 'success',
                    confirmButtonText: 'Continue!'
                });

                populateModuleListTable();
                clearModuleEditForm();
            }
        }
    });
}

function deleteModule(){

}

function clearModuleEditForm(){

    $('#module_id').text('');
    $('#module_name').val('');
    $('#module_milestone_type').val('Fixed Milestone');
    $('#module_ramrks').val('');
    select2dropdown();

    document.getElementById('module_fields_row').classList.add('kt-hidden');
    document.getElementById('module_edit_form_buttons').classList.add('kt-hidden');
    document.getElementById('default_milestone_row').classList.add('kt-hidden');
}


//TODO Field Related Functions

function populateModuleFieldsTable( moduleId ){


    //TODO SETTING UP FIELD DATA TABLE BEGINS

    $('#table_module_fields').KTDatatable('destroy');

    var options ={
        data: {
            type: 'remote',
            source: {
                read: {

                    url: './getdatamodulefields/' + moduleId,
                },
            },
            pageSize: 5,
        },

        // layout definition
        layout: {
            scroll: false, // enable/disable datatable scroll both horizontal and vertical when needed.
            // height: 450, // datatable's body's fixed height
            footer: false, // display/hide footer
        },

        // column sorting
        sortable: true,

        pagination: true,

        search: {
            input: $('#generalSearch'),
        },

        // columns definition
        columns: [
            {
                field: 'field_name',
                title: 'Field Name',
                autoHide: false,
                textAlign: 'center',
            },
            {
                field: 'field_data_type',
                title: 'Data Type',
                autoHide: false,
                textAlign: 'center',
            },
            {
                field: 'serial',
                title: 'Serial',
                autoHide: false,
                textAlign: 'center',
            },
            {
                field: 'dropdown_values',
                title: 'Drop Down Values',
                textAlign: 'center',
                width: 'auto',

            },
            {
                field: 'user.user_name',
                title: 'Added / Edited By',
                textAlign: 'center',
                autoHide: false,

            },
            {
                field: 'updated_at',
                title: 'Added / Edited On',
                type: 'date',
                format: 'MM/DD/YYYY',
                textAlign: 'center',
            },
            {
                field: 'remarks',
                title: 'Remarks',
                textAlign: 'center',
                width: 'auto',
            },
            {
                field: 'Actions',
                title: 'Actions',
                sortable: false,
                // width: 110,
                // overflow: 'visible',
                autoHide: false,
                template: function(row) {
                    return '\
                                <a href="javascript:;"  data-field_id="' + row.id + '" class="btn btn-sm btn-clean btn-icon btn-icon-md" \
                                    title="Edit details" >\
                                    <i class="la la-edit"></i>\
                                </a>\
                                ';
                },
            }
        ],
    };
    var datatable = $('#table_module_fields').KTDatatable(options);

    //TODO SETTING UP FIELD DATA TABLE ENDS

    datatable.on('click', '[data-field_id]', function() {

        showFieldData($(this).data('field_id'));
    });

}

function showFieldData( fieldId ) {

    $.ajax({
        type : 'GET',
        url : './getdatamodulefield/' + fieldId,
        dataType : 'JSON',
        success : function(data){

            $('#module_field_id').text(data.id);
            $('#module_field_form_name').text('Edit Field');

            $('#module_field_name').val(data.field_name);
            if(data.is_dropdown){
                $('#module_field_data_type').val('DROPDOWN');
            } else {
                $('#module_field_data_type').val(data.field_data_type);
            }
            select2dropdown();
            $('#module_field_serial').val(data.serial);
            $('#module_field_dropdown_values').val(data.dropdown_values);
        }
    });

}

function confirmSaveField(){

    var field = {}

    field.module_id = $('#module_id').text();
    field.module_field_id = $('#module_field_id').text();
    field.module_field_name = $('#module_field_name').val();
    field.module_field_data_type = $('#module_field_data_type').val();
    field.module_field_serial = $('#module_field_serial').val();
    field.module_field_dropdown_values = $('#module_field_dropdown_values').val();
    field.module_field_remarks = $('#module_field_remarks').val();

    if(field.module_field_remarks == null || field.module_field_remarks == null || field.module_field_remarks == ''){
        swal.fire(
            'Remarks',
            'Please write some remarks.',
            'error'
        );
    } else {

        swal.fire({
            title: 'Are you sure??',
            text: 'Are you sure you want to save this field?',
            type: 'warning',
            confirmButtonText: 'Yes, Save',
            showCancelButton: true,
            cancelButtonText: 'No, cancel!',
        }).then(function(result) {
            if(result.value){
                saveField(field);
            } else {
                swal.fire(
                    'Cancel!',
                    'Field Update Canceled!',
                    'error'
                );
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
            field_id : field.module_field_id,
            field_name : field.module_field_name,
            field_data_type : field.module_field_data_type,
            serial : field.module_field_serial,
            dropdown_values : field.module_field_dropdown_values,
            remarks : field.module_field_remarks
        },
        dataType: 'JSON',
        success : function (data) {
            var message = getNotificationMessage(data);

            if (data.id == 0){
                showNotification('error', message, 'FIELD : '  + data.field_name);
            } else {
                showNotification('success', message, 'SUCCESS');
            }

        }

    });
    populateModuleFieldsTable(field.module_id);
    clearFieldEditForm();
}

function deleteField(){

    var field = {}

    field.module_id = $('#module_id').text();
    field.module_field_id = $('#module_field_id').text();
    field.module_field_remarks = $('#module_field_remarks').val();

    if(field.module_field_remarks == null || field.module_field_remarks == null || field.module_field_remarks == ''){
        swal.fire(
            'Remarks',
            'Please write some remarks.',
            'error'
        );
    } else {

        swal.fire({
            title: 'Are you sure??',
            text: 'Are you sure you want to delete this field?',
            type: 'warning',
            confirmButtonText: 'Yes, Delete',
            showCancelButton: true,
            cancelButtonText: 'No, cancel!',
        }).then(function(result) {
            if(result.value){

                $.ajax({
                    type : 'POST',
                    url : './deletefield',
                    data : {
                        field_id : field.module_field_id,
                        remarks : field.module_field_remarks
                    },
                    dataType : 'JSON',
                    success : function (data) {
                        var message = getNotificationMessage(data);

                        if (data.id == 0){
                            showNotification('error', message, 'FIELD : '  + data.field_name);
                        } else {
                            showNotification('success', message, 'SUCCESS');
                        }
                    }

                });
                populateModuleFieldsTable(field.module_id);
                clearFieldEditForm();


            } else {
                swal.fire(
                    'Cancel!',
                    'Field Delete Canceled!',
                    'error'
                );
            }
        });

    }
}

function clearFieldEditForm(){

    $('#module_field_id').text('0');
    $('#module_field_form_name').text('Add New Field');

    $('#module_field_name').val('');
    $('#module_field_data_type').val('TEXT');
    $('#module_field_serial').val('');
    $('#module_field_dropdown_values').val('');
    $('#module_field_remarks').val('');
    select2dropdown();



}


//TODO Milestone Related Functions

function populateDefaultMilestoneTable( moduleId ){

    $.ajax({
        type : 'GET',
        url : './getdatadefaultmilestones/' + moduleId,
        dataType : 'JSON',
        success : function(data){
            $('#table_default_milestone_list').KTDatatable('destroy');
            var dataTable = $('#table_default_milestone_list').KTDatatable({
                // datasource definition
                data: {
                    type: 'local',
                    source: data,
                    pageSize: 5,
                },

                // layout definition
                layout: {
                    scroll: false, // enable/disable datatable scroll both horizontal and vertical when needed.
                    // height: 450, // datatable's body's fixed height
                    footer: false, // display/hide footer
                },

                // column sorting
                sortable: true,

                pagination: true,

                search: {
                    input: $('#generalSearch'),
                },

                // columns definition
                columns: [
                    {
                        field: 'milestone_name',
                        title: 'Milestone Name',
                        autoHide: false,
                        textAlign: 'center',
                    },
                    {
                        field: 'user.user_name',
                        title: 'Added / Edited By',
                        textAlign: 'center',
                        autoHide: false,

                    },
                    {
                        field: 'updated_at',
                        title: 'Added / Edited On',
                        type: 'date',
                        format: 'MM/DD/YYYY',
                        textAlign: 'center',
                    },
                    {
                        field: 'remarks',
                        title: 'Remarks',
                        textAlign: 'center',
                        width: 'auto',
                    },
                    {
                        field: 'Actions',
                        title: 'Actions',
                        sortable: false,
                        textAlign: 'center',
                        // width: 110,
                        // overflow: 'visible',
                        autoHide: false,
                        template: function(row) {
                            return '\
                                        <a href="javascript:;"  data-default_milestone_id="' + row.id + '" class="btn btn-sm btn-clean btn-icon btn-icon-md" \
                                            title="Edit details"" >\
                                            <i class="la la-edit"></i>\
                                        </a>\
                                        ';
                        },
                    }
                ],
            });

            dataTable.on('click', '[data-default_milestone_id]', function() {
                showDefaultMilestoneData($(this).data('default_milestone_id'));
            });
        }
    });
}

function showDefaultMilestoneData( defaultMilestoneId ){

    $.ajax({
        type : 'GET',
        url : './getdatadefaultmilestone/' + defaultMilestoneId,
        dataType : 'JSON',
        success : function(data){

            $('#default_milestone_id').text(data.id);
            $('#default_milestone_form_name').text('Edit Milestone');
            $('#default_milestone_name').val(data.milestone_name);

        }
    });
}

function confirmSaveMilestone(){

    var milestone = {};

    milestone.module_id = $('#module_id').text();
    milestone.default_milestone_id = $('#default_milestone_id').text();
    milestone.default_milestone_name = $('#default_milestone_name').val();
    milestone.default_milestone_remarks = $('#default_milestone_remarks').val();

    if(milestone.default_milestone_remarks == null || milestone.default_milestone_remarks == null || milestone.default_milestone_remarks == ''){
        swal.fire(
            'Remarks',
            'Please write some remarks.',
            'error'
        );
    } else {

        swal.fire({
            title: 'Are you sure??',
            text: 'Are you sure you want to save this milestone?',
            type: 'warning',
            confirmButtonText: 'Yes, Save',
            showCancelButton: true,
            cancelButtonText: 'No, cancel!',
        }).then(function(result) {
            if(result.value){
                saveMilestone(milestone);
            } else {
                swal.fire(
                    'Cancel!',
                    'Field Update Canceled!',
                    'error'
                );
            }
        });

    }

}

function saveMilestone( milestone ){

    $.ajax({
        type : 'POST',
        url : './savemilestone',
        data : {
            module_id : milestone.module_id,
            milestone_id : milestone.default_milestone_id,
            milestone_name : milestone.default_milestone_name,
            remarks : milestone.default_milestone_remarks
        },
        dataType: 'JSON',
        success : function (data) {
            var message = getNotificationMessage(data);

            if (data.id == 0){
                showNotification('error', message, 'FIELD : '  + data.field_name);
            } else {
                showNotification('success', message, 'SUCCESS');
            }

        }

    });
    populateDefaultMilestoneTable(milestone.module_id);
    clearMilestoneEditForm();

}

function deleteMilestone(){

    var milestone = {};

    milestone.module_id = $('#module_id').text();
    milestone.milestone_id = $('#default_milestone_id').text();
    milestone.milestone_remarks = $('#default_milestone_remarks').val();

    if(milestone.milestone_remarks == null || milestone.milestone_remarks == null || milestone.milestone_remarks == ''){
        swal.fire(
            'Remarks',
            'Please write some remarks.',
            'error'
        );
    } else {

        swal.fire({
            title: 'Are you sure??',
            text: 'Are you sure you want to delete this milestone?',
            type: 'warning',
            confirmButtonText: 'Yes, Delete',
            showCancelButton: true,
            cancelButtonText: 'No, cancel!',
        }).then(function(result) {
            if(result.value){

                $.ajax({
                    type : 'POST',
                    url : './deletemilestone',
                    data : {
                        milestone_id : milestone.milestone_id,
                        remarks : milestone.milestone_remarks
                    },
                    dataType : 'JSON',
                    success : function (data) {
                        var message = getNotificationMessage(data);

                        if (data.id == 0){
                            showNotification('error', message, 'Milestone : '  + data.field_name);
                        } else {
                            showNotification('success', message, 'SUCCESS');
                        }
                    }

                });
                populateDefaultMilestoneTable(milestone.module_id);
                clearMilestoneEditForm();


            } else {
                swal.fire(
                    'Cancel!',
                    'Field Delete Canceled!',
                    'error'
                );
            }
        });

    }


}

function clearMilestoneEditForm(){

    $('#default_milestone_id').text('0');
    $('#default_milestone_form_name').text('Add New Field');

    $('#default_milestone_name').val('');
    $('#default_milestone_remarks').val('');

}

function showModuleFailureAlert( data ){

    var message = getNotificationMessage(data)

    swal.fire(
        'Failed!',
        message,
        'error'
    );
    KTApp.unprogress(buttonObject);

}

function init(){

    //TODO Populate Module List Datatable
    populateModuleListTable();

}
