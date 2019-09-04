'use strict';


jQuery(document).ready(function() {


    $("#vendor_name").change(function () {

        var vendorId = this.value;
        setVendorStatus(vendorId);

    });
});

function setVendorStatus(vendorId){

    $.ajax({
        type : 'Get',
        url : './getdatavendorstatus/'+ vendorId,

        dataType : 'text',
        success : function(data){
            $("#vendor_enlistment_status").val(data);
        }
    });


}

function confirmAddService(){

    var service = {};
    var userDepartment = $('#service_user_department').val();
    // console.log(userDepartment);

    service.serviceName = $('#service_name').val();
    service.serviceCategory = $('#service_category').val();
    service.serviceSubCategory = $('#service_sub_category').val();

    service.vendor = $('#vendor_name').val();
    // service.vendorStatus = $('#vendor_status').val();
    service.serviceUserDepartment = $('#service_user_department').val();

    service.vendorOnboardingStatus = $('#vendor_onboarding_status').val();
    service.vendorOnboardingDate = $('#vendor_onboarding_date').val();
    service.vendorCommunication = $('#vendor_communication').val();

    service.vendorDocumentSharing = $('#vendor_document_sharing').val();
    service.vendorTechnicalDiscussion = $('#vendor_technical_discussion').val();
    service.vendorTechFeasibilityAnalysis = $('#vendor_tech_feasibility_analysis').val();

    service.vendorMeetingPlan = $('#vendor_meeting_plan').val();
    service.vendorInitialMeeting = $('#vendor_initial_meeting_date').val();
    service.vendorLastMeeting = $('#vendor_last_meeting_date').val();

    service.ndaExpiry = $('#service_nda_expiry_date').val();
    service.serviceContractDate = $('#service_contract_date').val();
    service.contractExpiry = $('#contract_expiry_date').val();

    service.serviceSla = $('#sla').val();
    service.prStatus = $('#pr_status').val();
    service.poStatus = $('#po_status').val();

    service.remarks = $('#service_remarks').val();


    console.log(service);




    if(service.serviceName == null || service.serviceName == '' || service.serviceName == undefined){
        swal.fire(
            'Vendor Name',
            'Please Give a Name to this service.',
            'error'
        );
    } else {

        swal.fire({
            title: 'Are you sure??',
            text: 'Are you sure you want to add this service?',
            type: 'warning',
            confirmButtonText: 'Yes, Add',
            showCancelButton: true,
            cancelButtonText: 'No, cancel!',
        }).then(function(result) {
            if(result.value){
                saveService(service);
            } else {
                swal.fire(
                    'Cancel!',
                    'Adding Service Cancelled!',
                    'error'
                );
            }
        });
    }
}

function saveService(service){

    $.ajax({
        type : 'POST',
        url : './saveservice',
        data : {

            service : service

        },
        dataType : 'JSON',
        success : function(data){




            if(data.id == 0){
                showFailureAlert(data);
            } else {

                var message = getNotificationMessage(data);
                showNotification('success', message, 'SUCCESS');

                swal.fire({
                    title: 'Well Done',
                    text: 'You successfully added the service!!',
                    type: 'success',
                    confirmButtonText: 'Continue!'
                });

            }
        }
    });

}







