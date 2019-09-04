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

    public function showVendorList(){
        Session::put('DocId', 'vendorlist');
        return View::make('tech_dashboard.pages.vendor.vendorlist');



    }

    public function getDataVendorList(){

        $vendorData = Vendor::all();

        foreach($vendorData as $vendor){

            $services = $vendor->services;
            foreach($services as $service){
                $service->serviceCategory;
                $service->serviceSubCategory;
            }
        }

        return $vendorData;
    }

    public function getDataVendorStatus($vendorId){

        $vendor = Vendor::find($vendorId);
        $status = $vendor->vendor_enlistment_status;

        return $status;

    }

    public function saveVendor(){

        $vendorData = Input::get('vendor');
        $vendor = new Vendor();

        try{

            $vendor->vendor_name = $vendorData['vendorName'];
            $vendor->vendor_specialization = $vendorData['vendorSpecialization'];
            $vendor->vendor_product_line = $vendorData['vendorProductLine'];
            $vendor->vendor_enlistment_status = $vendorData['vendorEnlistmentStatus'];
            $vendor->vendor_contact_person = $vendorData['vendorContactPerson'];
            $vendor->vendor_contact_designation = $vendorData['vendorContactDesignation'];
            $vendor->vendor_contact_phone = $vendorData['vendorContactPhone'];
            $vendor->vendor_office_address = $vendorData['vendorOfficeAddress'];
            $vendor->vendor_office_phone = $vendorData['vendorOfficePhone'];
//            $vendor->vendor_initial_meeting_date = date('Y-m-d', strtotime($vendorData['vendorInitMeetingDate']));

            $vendor->vendor_remarks = $vendorData['vendorRemarks'];
            $vendor->vendor_enlistment_date = date('Y-m-d', strtotime($vendorData['vendorEnlistmentDate']));

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

    public function redVendorDetails($vendorId){

        Session::put('VENDOR_ID', $vendorId);

        return Redirect::to('/vendordetails');


    }

    public function vendorDetails(){

        Session::put('DocId', 'vendordetails');
        $vendor = Vendor::find(Session::get('VENDOR_ID'));

        return View::make('tech_dashboard.pages.vendor.vendordetails')
                        ->with('vendor', $vendor);



    }

    public function getDataVendorServiceList($vendorId){
        $vendor = Vendor::Find($vendorId);

        if($vendor->vendor_enlistment_status == 'Enlisted'){
            $services = $vendor->services;
            return $services;
        }





    }
}
