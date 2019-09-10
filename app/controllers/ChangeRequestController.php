<?php

class ChangeRequestController extends BaseController {

    public function redShowAddCR($serviceId){

        Session::put('SERVICE_ID', $serviceId);
        return Redirect::to('/showaddcr');

    }

    public function showAddCR(){

        Session::put('DocId', 'addcr');

        $service = Service::find(Session::get('SERVICE_ID'));
        $vendor = $service->vendor;

        return View::make('tech_dashboard.pages.cr.addcr')
            ->with('service', $service);

    }

    public function saveIssue(){

        $issueData = Input::get('issue');
        $issue = new Issue();

        try{
            $issue->issue_details = $issueData['issueName'];
            $issue->vendor_id = $issueData['vendorId'];
            $issue->service_id = $issueData['serviceId'];
            $issue->issue_status = $issueData['issueStatus'];
            $issue->responsible_person = $issueData['issueResponsible'];
            $issue->solving_date = date('Y-m-d', strtotime($issueData['issueSolvingDate']));
            $issue->raising_date = date('Y-m-d', strtotime($issueData['issueRaisingDate']));
            $issue->aging = $issueData['issueAging'];
            $issue->sla = $issueData['issueSla'];
            $issue->sla_status = $issueData['issueSlaStatus'];
            $issue->remarks = $issueData['issueRemarks'];
            $issue->updated_by = Session::get('USER_ID');

            $issue->save();

            $result['id'] = 1;
            $result['issue_id'] = $issue->id;
            $result['text']['issue']['message'][0]= "Vendor : " . $issue->vendor_name . " Added Sucessfully!!";


        } catch( Exception $e){

            $result['id'] = 0;
            $result['text']['issue']['message']= $e->getMessage();

        }

        return $result;
    }

}
