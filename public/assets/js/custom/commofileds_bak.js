'use strict';
// Class definition
jQuery(document).ready(function() {


    KTDatatableDataLocalDemo.init();
    clearFieldEntryForm();


});
var KTDatatableDataLocalDemo = function() {
    // Private functions
    // demo initializer
    var demo = function() {
        $.ajax({
            type : 'GET',
            url : './getdatacommonfields',
            dataType : 'JSON',
            success : function(data){

                var dataTable = $('#kt-datatable').KTDatatable({
                    // datasource definition
                    data: {
                        type: 'local',
                        source: data,
                        pageSize: 10,
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
                            title: 'Updated / Modified By',
                            textAlign: 'center',
                            autoHide: false,

                        },
                        {
                            field: 'updated_on',
                            title: 'Udated / Modified On',
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
                });

                dataTable.on('click', '[data-field_id]', function() {

                    editField($(this).data('field_id'));
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

function addNewField() {

    clearFieldEntryForm();

}

function editField(commonFieldId) {


    $.ajax({
        type : 'GET',
        url : './getdatacommonfield/' + commonFieldId,
        dataType : 'JSON',
        success : function(data){

            clearFieldEntryForm();
            $("#field_id").text(data.id);
            $("#entry_form_name").text("Edit Field");
            //TODO Feeding the form with current data
            $("#field_name").val(data.field_name);
            if(data.is_dropdown){
                $("#field_data_type").val("DROPDOWN");
            } else {
                $("#field_data_type").val(data.field_data_type);
            }
            select2dropdown();
            $("#serial").val(data.serial);
            $("#dropdown_values").val(data.dropdown_values);
            // $("#remarks").text(data.remarks);

            document.getElementById('delete_field_button').classList.remove('kt-hidden');
        }
    });



}

function clearFieldEntryForm(){
    //TODO Clearing any previous data from the field entry form

    $("#field_id").text("");
    $("#entry_form_name").text("Add New Field");
    // $("#field_name").text("");
    $('#field_name').val('');
    $("#field_data_type").val("TEXT");
    $("#serial").val("");
    $("#dropdown_values").val("");
    $("#remarks").val("");
    select2dropdown();
    document.getElementById('delete_field_button').classList.add('kt-hidden');

}

function saveField(){

    var field_id = 0;
    var field_name = $("#field_name").val();
    var field_data_type = $("#field_data_type").val();
    var dropdown_values = "";

    if(field_data_type == 'DROPDOWN');{
        dropdown_values = $("#dropdown_values").val();
    }
    var serial = $("#serial").val();
    var remarks = $("#remarks").val();

    var formName = $("#entry_form_name").text();

    if (formName.toLowerCase().indexOf("add") >= 0){ // TODO New field add
        var beforeActionText = "Are you sure you want to add new field??"

    } else {
        var beforeActionText = "Are you sure you want to update the field??"
        field_id = $("#field_id").text();

    }

    swal.fire({
        title: 'Are you sure?',
        text: beforeActionText,
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, go ahead!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
    }).then(function(result){
        if (result.value) {

            $.ajax({
                type : 'POST',
                url : './savecommonfield',
                data : {

                    field_id : field_id,
                    field_name : field_name,
                    field_data_type : field_data_type,
                    serial : serial,
                    dropdown_values : dropdown_values,
                    remarks : remarks

                },
                dataType : 'JSON',
                success : function(data){

                    var msg = '';
                    var i = 0;
                    $.each(data.text, function(index, item){

                        if(i==0){
                            msg = item;
                        } else {
                            msg = msg + '</br>' + item;
                        }
                        i++;
                    });

                    if(data.id == 1){
                        swal.fire(
                            'Saved!',
                            'Your field has been saved.',
                            'success'
                        )
                    } else {
                        swal.fire(
                            'Failed!',
                            msg,
                            'error'
                        )
                    }
                    // clearFieldEntryForm();
                    window.location.reload();
                }
            });

            // result.dismiss can be 'cancel', 'overlay',
            // 'close', and 'timer'
        } else if (result.dismiss === 'cancel') {
            swal.fire(
                'Cancelled',
                'Field add/edit canceled.',
                'error'
            )
        }
    });
}

function deleteField(){

    var fieldId = $('#field_id').text();
    var remarks = $('#remarks').val();

    swal.fire({
        title: 'Are you sure?',
        text: 'You sure want to delete this field??',
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
    }).then(function(result){
        if (result.value) {

            $.ajax({
                type : 'POST',
                url : './deletecommonfield',
                data : {

                    field_id : fieldId,
                    remarks : remarks

                },
                dataType : 'JSON',
                success : function(data){

                    var msg = '';
                    var i = 0;
                    $.each(data.text, function(index, item){
                        if(i==0){
                            msg = item;
                        } else {
                            msg = msg + '</br>' + item;
                        }
                        i++;
                    });

                    if(data.id == 1){
                        swal.fire(
                            'Deleted!',
                            'Your field has been deleted.',
                            'success'
                        )
                    } else {
                        swal.fire(
                            'Failed!',
                            msg,
                            'error'
                        )
                    }
                    window.location.reload();
                }
            });

            // result.dismiss can be 'cancel', 'overlay',
            // 'close', and 'timer'
        } else if (result.dismiss === 'cancel') {
            swal.fire(
                'Cancelled',
                'Field delete canceled.',
                'error'
            )
        }
    });



}



