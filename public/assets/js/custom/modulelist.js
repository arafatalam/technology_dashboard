'use strict';

jQuery(document).ready(function() {
    init();
    ModuleListTable.init();
});

var ModuleListTable = function() {
    // Private functions
    // demo initializer
    var demo = function() {
        $.ajax({
            type : 'GET',
            url : './getdatamodulelist',
            dataType : 'JSON',
            success : function(data){

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
                                            title="Edit details" >\
                                            <i class="la la-edit"></i>\
                                        </a>\
                                        ';
                            },
                        }
                    ],
                });

                dataTable.on('click', '[data-module_id]', function() {
                    showModule($(this).data('module_id'));
                });

            }
        });
    };

    return {
        // Public functions
        init: function() {
            demo();
        },
    };
}();

function showModule( moduleId ) {

    KTUtil.scrollTop();
    $.ajax({
        type : 'GET',
        url : './getdatamodule/' + moduleId,
        dataType : 'JSON',
        success : function(data){
            init();
            $('#module_id').text(data.id);
            // TODO Feeding the form with current data
            $('#module_name').val(data.module_name);
            $('#module_milestone_type').val(data.module_milestone_type);
            select2dropdown();
            document.getElementById('module_edit_form_buttons').classList.remove('kt-hidden');
        }
    });

    showModuleFields(moduleId);
}

function saveModule(){

    var moduleId = $('#module_id').text();
    var moduleName = $('#module_name').val();
    var moduleMilestoneType = $('#module_milestone_type').val();
    var moduleRemarks = $('#module_remarks').val();

    if(moduleRemarks == null || moduleRemarks == "" || moduleRemarks == undefined){
        swal.fire(
            'Remarks',
            'Please write some remarks.',
            'error'
        );
    } else {
        $.ajax({
            type : 'POST',
            url : './savemodule',
            data : {

                module_id : moduleId,
                module_name : moduleName,
                module_remarks : moduleRemarks,
                module_milestone_type : moduleMilestoneType

            },
            dataType : 'JSON',
            success : function(data){

                if(data.id == 0){
                    showModuleFailureAlert(data);
                } else {

                    var message = getNotificationMessage(data);
                    showNotification('success', message, "SUCCESS");

                    swal.fire({
                        title: 'Well Done',
                        text: "You successfully updated the module!!",
                        type: 'success',
                        confirmButtonText: 'Continue!'
                    });
                    init();
                }
            }
        });
    }



}



function showModuleFields( moduleId ){

    //TODO SETTING UP FIELD DATA TABLE BEGINS
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
                field: 'updated_on',
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
    $('#table_module_fields').KTDatatable('destroy');
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

            console.log(data);
            $("#module_field_id").text(data.id);
            $("#entry_form_name").text("Edit Field");

            //TODO Feeding the form with current data
            $("#module_field_name").val(data.field_name);
            if(data.is_dropdown){
                $("#module_field_data_type").val("DROPDOWN");
            } else {
                $("#module_field_data_type").val(data.field_data_type);
            }
            select2dropdown();
            $("#module_field_serial").val(data.serial);
            $("#module_field_dropdown_values").val(data.dropdown_values);
            // $("#remarks").text(data.remarks);

            document.getElementById('delete_field_button').classList.remove('kt-hidden');
        }
    });



}








function clearModuleEditForm(){
    init();
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
    $('#module_id').text('');
    // TODO Feeding the form with current data
    $('#module_name').val('');
    $('#module_milestone_type').val('Fixed Milestone');
    $('#module_ramrks').val('');
    select2dropdown();
    document.getElementById('module_edit_form_buttons').classList.add('kt-hidden');
}
