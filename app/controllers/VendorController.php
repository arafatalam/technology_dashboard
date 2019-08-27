<?php

class VendorController extends BaseController {

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

    public function showAddVendor(){

        Session::put('DocId', 'addvendor');
        return View::make('tech_dashboard.pages.vendor.addvendor');
    }

    public function saveVendor(){

        $vendorData = Input::get('vendor');
        $vendor = new Vendor();

        try{

            $vendor->vendor_name = $vendorData['vendorName'];
            $vendor->vendor_specialization = $vendorData['vendorSpecialization'];
            $vendor->vendor_product_line = $vendorData['vendorProductLine'];
            $vendor->vendor_communication = $vendorData['vendorCommunication'];
            $vendor->vendor_document_sharing = $vendorData['vendorDocumentSharing'];
            $vendor->vendor_technical_discussion = $vendorData['vendorTechnicalDiscussion'];
            $vendor->vendor_tech_feasibility_analysis = $vendorData['vendorTechFeasibilityAnalysis'];
            $vendor->vendor_meeting_plan = date('Y-m-d', strtotime($vendorData['vendorMeetingPlan']));
            $vendor->vendor_status = $vendorData['vendorStatus'];
            $vendor->vendor_contact_person = $vendorData['vendorContactPerson'];
            $vendor->vendor_contact_designation = $vendorData['vendorContactDesignation'];
            $vendor->vendor_contact_phone = $vendorData['vendorContactPhone'];
            $vendor->vendor_office_address = $vendorData['vendorOfficeAddress'];
            $vendor->vendor_office_phone = $vendorData['vendorOfficePhone'];
            $vendor->vendor_initial_meeting_date = date('Y-m-d', strtotime($vendorData['vendorInitMeetingDate']));
            $vendor->vendor_last_meeting_date = date('Y-m-d', strtotime($vendorData['vendorLastMeetingDate']));
            $vendor->vendor_remarks = $vendorData['vendorRemarks'];
            $vendor->vendor_onboarding_date = date('Y-m-d', strtotime($vendorData['vendorOnboardingDate']));

            $vendor->updated_by = Session::get('USER_ID');

            $vendor->save();

            $result['id'] = 1;
            $result['vendor_id'] = $vendor->id;
            $result['text']['vendor']['message'][0]= "Vendor : " . $vendor->vendor_name . " Added Sucessfully!!";

        } catch (Expection $e){

            $result['id'] = 0;
            $result['text']['module']['message']= $e->getMessage();

        }
        return $result;

    }


}
