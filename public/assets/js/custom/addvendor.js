'use strict';


jQuery(document).ready(function() {



});

function confirmSaveVendor(){

    var vendor = {};

    vendor.vendorName = $('#vendor_name').val();
    vendor.vendorSpecialization = $('#vendor_specialization').val();
    vendor.vendorProductLine = $('#vendor_product_line').val();
    // vendor.vendorCommunication = $('#vendor_communication').val();
    // vendor.vendorDocumentSharing = $('#vendor_document_sharing').val();
    // vendor.vendorTechnicalDiscussion = $('#vendor_technical_discussion').val();
    // vendor.vendorTechFeasibilityAnalysis = $('#vendor_tech_feasibility_analysis').val();
    // vendor.vendorMeetingPlan = $('#vendor_meeting_plan').val();
    vendor.vendorEnlistmentStatus = $('#vendor_enlistment_status').val();
    vendor.vendorContactPerson = $('#vendor_contact_person').val();
    vendor.vendorContactDesignation = $('#vendor_contact_designation').val();
    vendor.vendorContactPhone = $('#vendor_contact_phone').val();
    vendor.vendorOfficeAddress = $('#vendor_office_address').val();
    vendor.vendorOfficePhone = $('#vendor_office_phone').val();

    vendor.vendorRemarks = $('#vendor_remarks').val();
    vendor.vendorEnlistmentDate = $('#vendor_enlistment_date').val();

    console.log(vendor);


    if(vendor.vendorName == null || vendor.vendorName == '' || vendor.vendorName == undefined){
        swal.fire(
            'Vendor Name',
            'Please Give a Name to this vendor.',
            'error'
        );
    } else {

        swal.fire({
            title: 'Are you sure??',
            text: 'Are you sure you want to add this vendor?',
            type: 'warning',
            confirmButtonText: 'Yes, Add',
            showCancelButton: true,
            cancelButtonText: 'No, cancel!',
        }).then(function(result) {
            if(result.value){
                saveVendor(vendor);
            } else {
                swal.fire(
                    'Cancel!',
                    'Adding Vendor Cancelled!',
                    'error'
                );
            }
        });
    }
}

function saveVendor(vendor){

    $.ajax({
        type : 'POST',
        url : './savevendor',
        data : {

            vendor : vendor

        },
        dataType : 'JSON',
        success : function(data){

            console.log(data);

            if(data.id == 0){
                showModuleFailureAlert(data);
            } else {

                var message = getNotificationMessage(data);
                showNotification('success', message, 'SUCCESS');

                swal.fire({
                    title: 'Well Done',
                    text: 'You successfully saved the vendor!!',
                    type: 'success',
                    confirmButtonText: 'Continue!'
                });

                // populateModuleListTable();
                // clearModuleEditForm();

                //Clear and/or Redirect to another page
            }
        }
    });

}







