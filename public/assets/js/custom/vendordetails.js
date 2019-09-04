'use strict';
// Class definition

var KTDatatableDataLocalDemo = function() {
    // Private functions


    var initTable = function(e){
        var vendorId = $("#vendor_id").text();
        $.ajax({

            type : 'GET',
            url : './getdatavendorservicelist/' + vendorId,
            datatType : 'JSON',
            success : function(data){
                var datatable = $('#current_engagement_table').KTDatatable({
                    // datasource definition
                    data: {
                        type: 'local',
                        source: data,
                        pageSize: 10,
                    },

                    // layout definition
                    layout: {
                        scroll: true, // enable/disable datatable scroll both horizontal and vertical when needed.
                        //height: 450, // datatable's body's fixed height
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
                            field: 'ServiceId',

                            sortable: false,
                            width: 20,
                            type: 'number',
                            textAlign: 'center',
                        }, {
                            field: 'service_name',
                            title: 'Service Name',
                        }, {
                            field: 'user_department',
                            title: 'User Department',

                        }, {
                            field: 'service_contract_date',
                            title: 'Contract Date',
                            type: 'date',
                            format: 'MM/DD/YYYY',
                        }, {
                            field: 'contract_expiry_date',
                            title: 'Contract Expiry Date',
                        },

                    ],
                });

                $('#kt_form_status').on('change', function() {
                    datatable.search($(this).val().toLowerCase(), 'Status');
                });

                $('#kt_form_type').on('change', function() {
                    datatable.search($(this).val().toLowerCase(), 'Type');
                });

                $('#kt_form_status,#kt_form_type').selectpicker();
            }
        });
    };




    return {
        // Public functions
        init: function() {
            // init dmeo
            initTable();
        },
    };
}();

jQuery(document).ready(function() {
    KTDatatableDataLocalDemo.init();
});