'use strict';


jQuery(document).ready(function() {



});



function confirmAddIssue(){

    var issue = {};

    issue.vendorId = $('#vendor_id').text();
    issue.serviceId = $('#service_id').text();

    issue.issueName = $('#issue_name').val();
    issue.issueStatus = $('#issue_status').val();
    issue.issueResponsible = $('#responsible_name').val();
    issue.issueRaisingDate = $('#raising_date').val();
    issue.issueSolvingDate = $('#solving_date').val();
    issue.issueAging = $('#aging').val();
    issue.issueSla = $('#sla').val();
    issue.issueSlaStatus = $('#sla_status').val();
    issue.issueRemarks = $('#remarks').val();


    if(issue.issueName == null || issue.issueName == '' || issue.issueName == undefined){
        swal.fire(
            'Issue Name',
            'Please Give a Name to this issue.',
            'error'
        );
    } else {

        swal.fire({
            title: 'Are you sure??',
            text: 'Are you sure you want to add this issue?',
            type: 'warning',
            confirmButtonText: 'Yes, Add',
            showCancelButton: true,
            cancelButtonText: 'No, cancel!',
        }).then(function(result) {
            if(result.value){
                saveIssue(issue);
            } else {
                swal.fire(
                    'Cancel!',
                    'Adding Issue Cancelled!',
                    'error'
                );
            }
        });
    }




}

function saveIssue(issue){
    $.ajax({
        type : 'POST',
        url : './saveissue',
        data : {

            issue : issue

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
                    text: 'You successfully added the issue!!',
                    type: 'success',
                    confirmButtonText: 'Continue!'
                });

            }
        }
    });
}







