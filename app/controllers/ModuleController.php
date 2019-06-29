<?php

class ModuleController extends BaseController {

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

    public function showCreateModule(){

        Session::put('DocId', 'createmodule');
        Session::put('Header', 'header_administration');

        return View::make('tech_dashboard.pages.module.createmodule');
    }

    public function saveEntireModule(){

       $moduleSavingResult = $this->saveModule(Input::get('module'));

       if($moduleSavingResult['id'] == 1 ){ // Moduled Saved Successfully

            if( Input::get('field_count') > 0){
                $fieldSavingResult = $this->saveFields($moduleSavingResult, Input::get('module_fields'));
            }
            if( Input::get('milestone_count') > 0){

            }

           return Input::get('module_fields');

       } else { // Module Saving Failed
           return $moduleSavingResult;
       }

    }

    public function saveModule(){


//        $result['id'] = 1;
//        $result['text']['module']['message'][0]= "Module Created Sucessfully!!";
//        $result['module_id'] = 1;

        // TODO UNCOMMENT THE FOLLOWING LINES

        $validationRule = array(
            'module_name' => 'required',
            'module_remarks' => 'required'
        );

        $validator = Validator::make(Input::all(), $validationRule);

        if($validator->fails()){
            $result['id'] = 0;
            $result['text']['module']= $validator->messages();
        } else {

            $module = new Module();
            $module->module_name = Input::get('module_name');
            $module->module_milestone_type = Input::get('module_milestone_type');
            $module->remarks = Input::get('module_remarks');
            $module->updated_by = Session::get('USER_ID');
            $module->save();
            if($module->id > 0){
                $result['id'] = 1;
                $result['module_id'] = $module->id;
                $result['text']['module']['message'][0]= "Module Created Sucessfully!!";
            } else {
                $result['id'] = 0;
                $result['text']['module']['message'][0]= "Module Not Created!!";
            }
        }
        return $result;
    }

    public function saveFields($result, $fieldList){

    }
}
