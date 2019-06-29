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

    public function showModuleList(){

        Session::put('DocId', 'modulelist');
        Session::put('Header', 'header_administration');

        return View::make('tech_dashboard.pages.module.modulelist');
    }

    public function saveModule(){

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

            try{
                $module->save();
//                $module->id = 1;
                $result['id'] = 1;
                $result['module_id'] = $module->id;
                $result['text']['module']['message'][0]= "Module Created Sucessfully!!";
            }catch (Exception $e){
                $result['id'] = 0;
                $result['text']['module']['message']= $e->getMessage();
            }
        }
        return $result;
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

            try{
                $newModuleField->save();
//                $newModuleField->id = 1;
                $result['id'] = 1;
                $result['text']['field'][$newModuleField->field_name][0]= "FIELD : " . $newModuleField->field_name . " Created Sucessfully!!";
            }catch (Exception $e){
                $result['id'] = 0;
                $result['text']['field']['message']= $e->getMessage();
            }
        }
        return $result;
    }

    public function saveMilestone(){

        $result = $this->valiDateMilestone(Input::all());
        if($result['id'] == 0){
            $result['milestone_name'] = Input::get('milestone_name');
            return $result;
        } else {

            $defaultMilestone = new DefaultMilestone();

            $defaultMilestone->module_id = Input::get('module_id');
            $defaultMilestone->milestone_name = Input::get('milestone_name');
            $defaultMilestone->remarks = Input::get('remarks');
            $defaultMilestone->updated_by = Session::get('USER_ID');

            try{
                $defaultMilestone->save();
//                $defaultMilestone->id = 1;
                $result['id'] = 1;
                $result['text']['milestone'][$defaultMilestone->field_name][0]= "FIELD : " . $defaultMilestone->field_name . " Created Sucessfully!!";
            }catch (Exception $e){
                $result['id'] = 0;
                $result['text']['milestone']['message']= $e->getMessage();
            }

        }

        return $result;



    }

    public function valiDateMilestone( $values ){
        $validationRule = array(
            'module_id' => 'required',
            'milestone_name' => 'required',
            'remarks' => 'required',
        );

        $validator = Validator::make($values, $validationRule);

        if($validator->fails()){
            $result['id'] = 0;
            $result['text']['milestone'] = $validator->messages();
        } else {
            $result['id'] = 1;
        }

        return $result;
    }

    public function getDataModuleList(){

        $modules = Module::all();

        foreach($modules as $module){
            $module->user;
        }

        return $modules;

    }

}
