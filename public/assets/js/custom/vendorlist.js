'use strict';
// Class definition
var neededData;
function setData(data){
    neededData = data;
    console.log(neededData);
}
var KTDatatableChildDataLocalDemo = function() {
    // Private functions

    var subTableInit = function(e) {
        $('<div/>').attr('id', 'child_data_local_' + e.data.id).appendTo(e.detailCell).KTDatatable({
            data: {
                type: 'local',
                source: e.data.services,
                pageSize: 10,
            },

            // layout definition
            layout: {
                scroll: true,
                height: 300,
                footer: false,

                // enable/disable datatable spinner.
                spinner: {
                    type: 1,
                    theme: 'default',
                },
            },

            sortable: true,

            // columns definition
            columns: [
                {
                    field: 'id',
                    title: '<strong>Service Name</strong>',
                    template: function(row) {

                        return '<span>' + row.service_name + '</span>';
                    },
                },
                {
                    field: 'service_category.category_name',
                    title: '<strong>Category</strong>',
                    // width: 100
                },
                {
                    field: 'service_sub_category.sub_category_name',
                    title: '<strong>Sub Category</strong>',
                },
                {
                    field: 'vendor_onboarding_status',
                    title: '<strong>Vendor Onboarding Status</strong>',
                },
                {
                    field: 'service_remarks',
                    title: '<strong>Remarks</strong>',
                },
                {
                    field: 'Actions',
                    title: 'Actions',
                    sortable: false,
                    width: 110,
                    overflow: 'visible',
                    autoHide: false,
                    template: function(row) {
                        return '\
						<div class="dropdown">\
							<a href="javascript:;" class="btn btn-sm btn-clean btn-icon btn-icon-md" data-toggle="dropdown">\
                                <i class="la la-cog"></i>\
                            </a>\
						  	<div class="dropdown-menu dropdown-menu-right">\
						    	<a class="dropdown-item" href="./redshowaddissue/' + row.id +' "><i class="la la-warning"></i>Create Issue</a>\
						    	<a class="dropdown-item" href="./redshowaddcr/' + row.id +' "><i class="la la-warning"></i>Raise CR</a>\
						    	<a class="dropdown-item" href="#"><i class="la la-edit"></i> Edit Details</a>\
						  	</div>\
						</div>\
					';
                    },
                },
            ],
        });
    };

    // demo initializer
    var mainTableInit = function() {


        $.ajax({
            type : 'GET',
            url : './getdatavendorlist',
            datatType : 'json',
            success : function(data){
                // Toaster Notifiation or something else


                var datatable = $('.all_vendor_list_table').KTDatatable({
                    // datasource definition
                    data: {
                        type: 'local',
                        source: data,
                        pageSize: 10, // display 20 records per page
                    },

                    // layout definition
                    layout: {
                        scroll: false,
                        height: null,
                        footer: false,
                    },

                    sortable: true,

                    filterable: false,

                    pagination: true,

                    detail: {
                        title: 'Load sub table',
                        content: subTableInit,
                    },

                    search: {
                        input: $('#generalSearch'),
                    },

                    // columns definition
                    columns: [
                        {
                            field: 'id',
                            title: '',
                            sortable: false,
                            width: 30,
                            textAlign: 'center',
                        }, {
                            field: 'vendor_name',
                            title: '<strong>Vendor Name</strong>',
                        }, {
                            field: 'vendor_specialization',
                            title: '<strong>Specialization</strong>',
                        }, {
                            field: 'vendor_product_line',
                            title: '<strong>Product Line</strong>',
                        }, {
                            field: 'vendor_contact_person',
                            title: '<strong>Contact person</strong>',
                        },
                        {
                            field: 'vendor_enlistment_status',
                            title: '<strong>Enlistment Status</strong>',
                        },
                        {
                            field: 'Actions',
                            // width: 130,
                            title: '<strong>Actions</strong>',
                            sortable: false,
                            overflow: 'visible',
                            template: function(row) {
                                return '<a href="./redvendordetails/' + row.id +' "class="btn btn-sm btn-clean btn-icon btn-icon-md" title="View details"><i class="la la-edit"></i> ';
                                //     <a href="./editproject/' + + '" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Edit details">\
                                //         <i class="la la-edit"></i>\
                                //     </a>\
                                // ';
                            },
                        }],
                });
                // $('#kt_form_status').on('change', function() {
                //     datatable.search($(this).val().toLowerCase(), 'status_id');
                // });

                // $('#kt_form_type').on('change', function() {
                //     datatable.search($(this).val().toLowerCase(), 'Type');
                // });

                $('#kt_form_status,#kt_form_type').selectpicker();
            }
        });
    };

    return {
        // Public functions
        init: function() {
            // init dmeo
            mainTableInit();
        },
    };
}();

jQuery(document).ready(function() {
    KTDatatableChildDataLocalDemo.init();
});