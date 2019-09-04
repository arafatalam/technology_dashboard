<?php

class ServiceController extends BaseController {

    /*
    |--------------------------------------------------------------------------
    | Default Home Controller
    |--------------------------------------------------------------------------
    |
    | You may wish to use controllers instead of, or in addition to, Closure
    | based routes. That's great! Here is an example controller method to
    | get you started. To route to this controller, just add the route:
    |
    |	Route::get('/', 'HomeController@showWelcome');
    |
    */

    public function showAddServiceBack(){

        Session::put('DocId', 'addservice');

        return View::make('tech_dashboard.pages.service.addservice');

    }

    public function showAddService(){

        Session::put('DocId', 'addservice');

        $vendors = Vendor::all();
        $categories = ServiceCategory::all();
        $subCategories = ServiceSubCategory::all();
        return View::make('tech_dashboard.pages.service.addservicenew')
            ->with('vendors', $vendors)
            ->with('categories', $categories)
            ->with('subCategories', $subCategories);
    }

    public function showServiceList(){

        Session::put('DocId', 'servicelist');
        return View::make('tech_dashboard.pages.service.servicelist');
    }

    public function saveService(){

        $serviceData = Input::get("service");

        $service = new Service();

        try{
            $service->service_name = $serviceData["serviceName"];
            $service->service_category_id = $serviceData["serviceCategory"];
            $service->service_sub_category_id = $serviceData["serviceSubCategory"];

            $service->vendor_id = $serviceData["vendor"];
            $service->user_department = $serviceData["serviceUserDepartment"];

            $service->vendor_onboarding_status = $serviceData["vendorOnboardingStatus"];
            $service->vendor_onboarding_date = date('Y-m-d', strtotime($serviceData["vendorOnboardingDate"]));
            $service->vendor_communication = $serviceData["vendorCommunication"];

            $service->vendor_document_sharing = $serviceData["vendorDocumentSharing"];
            $service->vendor_technical_discussion = $serviceData["vendorTechnicalDiscussion"];
            $service->vendor_tech_feasibility_analysis = $serviceData["vendorTechFeasibilityAnalysis"];

            $service->vendor_meeting_plan = date('Y-m-d', strtotime($serviceData["vendorMeetingPlan"]));
            $service->vendor_initial_meeting_date = date('Y-m-d', strtotime($serviceData["vendorInitialMeeting"]));
            $service->vendor_last_meeting_date = date('Y-m-d', strtotime($serviceData["vendorLastMeeting"]));

            $service->service_nda_expiry_date = date('Y-m-d', strtotime($serviceData["ndaExpiry"]));
            $service->service_contract_date = date('Y-m-d', strtotime($serviceData["serviceContractDate"]));
            $service->contract_expiry_date = date('Y-m-d', strtotime($serviceData["contractExpiry"]));

            $service->service_sla = $serviceData["serviceSla"];
            $service->service_pr_status = $serviceData["prStatus"];
            $service->service_po_status = $serviceData["poStatus"];

            $service->service_remarks = $serviceData["remarks"];

            $service->updated_by = Session::get('USER_ID');

            $service->save();

            $result['id'] = 1;
            $result['vendor_id'] = $service->id;
            $result['text']['service']['message'][0]= "Service : " . $service->vendor_name . " Saved Sucessfully!!";

        } catch (Expection $e){

            $result['id'] = 0;
            $result['text']['module']['message']= $e->getMessage();

        }

        return $result;

    }

    public function getDataServiceList(){


        $services = Service::all();

        return $services;
    }

}
