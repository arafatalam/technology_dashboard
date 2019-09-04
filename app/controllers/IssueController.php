<?php

class IssueController extends BaseController {

    public function redShowAddIssue($serviceId){

        Session::put('SERVICE_ID', $serviceId);
        return Redirect::to('/showaddissue');


    }

    public function showAddIssue(){
        $service = Service::find(Session::get('SERVICE_ID'));
        $vendor = $service->vendor;

        return View::make('tech_dashboard.pages.issue.addissue')
            ->with('service', $service);

    }

}
