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


    public function saveModule(){


        $result['id'] = 1;
        $result['text']['module']['message'][0]= "Module Created Sucessfully!!";
        $result['module_id'] = 2;

        // TODO UNCOMMENT THE FOLLOWING LINES

//        $validationRule = array(
//            'module_name' => 'required',
//            'module_remarks' => 'required'
//        );
//
//        $validator = Validator::make(Input::all(), $validationRule);
//
//        if($validator->fails()){
//            $result['id'] = 0;
//            $result['text']['module']= $validator->messages();
//        } else {
//
//            $module = new Module();
//            $module->module_name = Input::get('module_name');
//            $module->module_milestone_type = Input::get('module_milestone_type');
//            $module->remarks = Input::get('module_remarks');
//            $module->updated_by = Session::get('USER_ID');
//            $module->save();
//            if($module->id > 0){
//                $result['id'] = 1;
//                $result['module_id'] = $module->id;
//                $result['text']['module']['message'][0]= "Module Created Sucessfully!!";
//            } else {
//                $result['id'] = 0;
//                $result['text']['module']['message'][0]= "Module Not Created!!";
//            }
//        }
        return $result;
    }

    public function saveFields(){

        $fields = Input::get('fields');
        $i = 0;
        foreach ($fields as $moduleField){
            $result =  $this->saveField($moduleField);
        }

    }

    public function saveField(){

        $result = CommonFieldController::validateFieldValues(Input::all());

        if($result['id'] == 0){
            $result['field_name'] = Input::get('field_name');
            return $result;
        } else {
            $newModuleField = new ModuleField();

            $newModuleField->module_id = Input::get('module_id');
            $newModuleField->field_name = Input::get('field_name');
            $newModuleField->field_data_type = Input::get('field_data_type');
            if(Input::get('field_data_type') == 'DROPDOWN'){
                $newModuleField->is_dropdown = 1;
                $newModuleField->dropdown_values = Input::get('dropdown_values');
            }
            if(Input::get('serial') >0 ){
                $newModuleField->serial = Input::get('serial');
            } else {
                $newModuleField->serial = ModuleField::max('serial') + 1;
            }
            $newModuleField->remarks = Input::get('remarks');
            $newModuleField->updated_by = Session::get('USER_ID');

            $newModuleField->save();

            if($newModuleField->id > 0){
                $result['id'] = 1;
                $result['text']['field'][$newModuleField->field_name][0]= "FIELD : " . $newModuleField->field_name . " Created Sucessfully!!";
            } else {
                $result['id'] = 0;
                $result['text']['field'][$newModuleField->field_name][0]= "FIELD : " . $newModuleField->field_name . " Not Created!!";
            }

        }

        return $result;

    }

}
