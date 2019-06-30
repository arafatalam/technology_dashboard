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

        $validationRule = array(
            'module_id' => 'sometimes|required',
            'module_name' => 'required',
            'module_remarks' => 'required',
        );

        $validator = Validator::make(Input::all(), $validationRule);

        if($validator->fails()){
            $result['id'] = 0;
            $result['text']['module']= $validator->messages();
        } else {

            if(Input::has('module_id')){
                $module = Module::find(Input::get('module_id'));
            } else {
                $module = new Module();
            }

            $module->module_name = Input::get('module_name');
            $module->module_milestone_type = Input::get('module_milestone_type');
            $module->remarks = Input::get('module_remarks');
            $module->updated_by = Session::get('USER_ID');

            try{
                $module->save();
//                $module->id = 1;
                $result['id'] = 1;
                $result['module_id'] = $module->id;
                $result['text']['module']['message'][0]= "Module : " . $module->module_name . " Saved Sucessfully!!";
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

            if(Input::has('field_id') && Input::get('field_id') >0){

                $moduleField = ModuleField::find(Input::get('field_id'));
            } else {

                $moduleField = new ModuleField();
            }

            $moduleField->module_id = Input::get('module_id');
            $moduleField->field_name = Input::get('field_name');
            $moduleField->field_data_type = Input::get('field_data_type');
            if(Input::get('field_data_type') == 'DROPDOWN'){
                $moduleField->is_dropdown = 1;
                $moduleField->dropdown_values = Input::get('dropdown_values');
            }
            if(Input::get('serial') >0 ){
                $moduleField->serial = Input::get('serial');
            } else {
                $moduleField->serial = ModuleField::max('serial') + 1;
            }
            $moduleField->remarks = Input::get('remarks');
            $moduleField->updated_by = Session::get('USER_ID');

            try{
                $moduleField->save();
//                $newModuleField->id = 1;
                $result['id'] = 1;
                $result['text']['field'][$moduleField->field_name][0]= "Field : " . $moduleField->field_name . " Saved Sucessfully!!";
            }catch (Exception $e){
                $result['id'] = 0;
                $result['text']['field']['message']= $e->getMessage();
            }
        }
        return $result;
    }

    public function deleteField(){

        $moduleField = ModuleField::find(Input::get('field_id'));

        try{
            $moduleField->delete();

            $result['id'] = 1;
            $result['text']['milestone'][$moduleField->field_name][0]= "Field : " . $moduleField->field_name . "Deleted Sucessfully!!";
        } catch (Exception $e){
            $result['id'] = 0;
            $result['text']['milestone']['message']= $e->getMessage();
        }

        return $result;

    }

    public function saveMilestone(){

        $result = $this->validateMilestone(Input::all());
        if($result['id'] == 0){
            $result['milestone_name'] = Input::get('milestone_name');
            return $result;
        } else {

            if(Input::has('milestone_id') && Input::get('milestone_id') == 0){
                $defaultMilestone = new DefaultMilestone();
            } else {
                $defaultMilestone = DefaultMilestone::find(Input::get('milestone_id'));
            }

            $defaultMilestone->module_id = Input::get('module_id');
            $defaultMilestone->milestone_name = Input::get('milestone_name');
            $defaultMilestone->remarks = Input::get('remarks');
            $defaultMilestone->updated_by = Session::get('USER_ID');

            try{
                $defaultMilestone->save();
//                $defaultMilestone->id = 1;
                $result['id'] = 1;
                $result['text']['milestone'][$defaultMilestone->milestone_name][0]= "Milestone : " . $defaultMilestone->milestone_name . " Saved Sucessfully!!";
            }catch (Exception $e){
                $result['id'] = 0;
                $result['text']['milestone']['message']= $e->getMessage();
            }

        }

        return $result;



    }

    public function deleteMilestone(){

        $defaultMilestone = DefaultMilestone::find(Input::get('milestone_id'));

        try{
            $defaultMilestone->delete();

            $result['id'] = 1;
            $result['text']['milestone'][$defaultMilestone->field_name][0]= "Milestone : " . $defaultMilestone->field_name . "Deleted Sucessfully!!";
        } catch (Exception $e){
            $result['id'] = 0;
            $result['text']['milestone']['message']= $e->getMessage();
        }

        return $result;
    }

    public function validateMilestone( $values ){
        $validationRule = array(
            'milestone_id' => 'sometimes|required',
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

    public function getDataModule( $moduleId ){

        $module = Module::find($moduleId);
        $module->user;
        return $module;

    }

    public function getDataModuleFields( $moduleId ){

        $moduleFields = Module::find($moduleId)->moduleFields;
        foreach ($moduleFields as $moduleField) {
            $moduleField->user;
        }
        return $moduleFields;

    }

    public function getDataModuleField( $moduleFieldId ){

        $moduleField = ModuleField::find($moduleFieldId);
        $moduleField->user;

        return $moduleField;


    }

    public function getDataDefaultMilestones( $moduleId ){

        $defaultMilestones = Module::find($moduleId)->defaultMilestones;
        foreach ($defaultMilestones as $milestone){
            $milestone->user;
        }
        return $defaultMilestones;
    }

    public function getDataDefaultMilestone( $milestoneId ){

        $defaultMilestone = DefaultMilestone::find($milestoneId);
//        $defaultMilestone->user;
        return $defaultMilestone;

    }

}
