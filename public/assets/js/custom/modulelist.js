'use strict';

jQuery(document).ready(function() {

    KTDatatableDataLocalDemo.init();


});

var KTDatatableDataLocalDemo = function() {
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
