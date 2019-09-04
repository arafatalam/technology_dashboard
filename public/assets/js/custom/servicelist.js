'use strict';

jQuery(document).ready(function() {
    init();
});


//TODO Module Related Functions

function populateServiceListTable(){

    $.ajax({
        type : 'GET',
        url : './getdataservicelist',
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
                        field: 'service_name',
                        title: 'Service Name',
                        autoHide: false,
                        textAlign: 'center',
                    },
                    {
                        field: 'vendor_name',
                        title: 'Vendor Name',
                        autoHide: false,
                        textAlign: 'center',
                    },
                    {
                        field: 'service_category',
                        title: 'Service Category',
                        textAlign: 'center',
                        autoHide: false,

                    },
                    {
                        field: 'service_sub_category',
                        title: 'Sub Category',
                        textAlign: 'center',
                        autoHide: false,

                    },
                    {
                        field: 'user_department',
                        title: 'User Department',
                        textAlign: 'center',
                        autoHide: false,

                    },
                    {
                        field: 'service_nda_expiry_date',
                        title: 'Nda Expiry',
                        type: 'date',
                        format: 'MM/DD/YYYY',
                        textAlign: 'center',
                    },
                    {
                        field: 'service_contract_date',
                        title: 'Contract Date',
                        type: 'date',
                        format: 'MM/DD/YYYY',
                        textAlign: 'center',
                    },
                    {
                        field: 'contract_expiry_date',
                        title: 'Contract Expiry',
                        type: 'date',
                        format: 'MM/DD/YYYY',
                        textAlign: 'center',
                    },
                    {
                        field: 'service_sla',
                        title: 'SLA',
                        textAlign: 'center',
                        autoHide: false,

                    },
                    {
                        field: 'service_pr_status',
                        title: 'PR Status',
                        textAlign: 'center',
                        autoHide: false,

                    },
                    {
                        field: 'service_po_status',
                        title: 'PO Status',
                        textAlign: 'center',
                        autoHide: false,

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
                                        <a href="javascript:;"  data-service_id="' + row.id + '" class="btn btn-sm btn-clean btn-icon btn-icon-md" \
                                            title="Edit details"" >\
                                            <i class="la la-edit"></i>\
                                        </a>\
                                        ';
                        },
                    }
                ],
            });

            dataTable.on('click', '[data-service_id]', function() {
                // showModuleData($(this).data('module_id'));
            });
        }
    });
}


function init(){

    //TODO Populate Module List Datatable
    populateServiceListTable();

}
