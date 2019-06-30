<?php

class CommonFieldController extends BaseController {

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

    public function showCommonFields(){

        Session::put('PROJECT_CATEGORIES', serialize(Module::all()));

        Session::put('DocId', 'commonfields');
        Session::put('Header', 'header_administration');

        $fieldDataTypes = FieldDataType::all();

        return View::make('tech_dashboard.pages.administration.commonfields')
            ->with('fieldDataTypes', $fieldDataTypes);
    }

    public function getDataCommonFields(){

        $commonFields = CommonField::all();
        foreach($commonFields as $commonField){
            $commonField->user;
        };

        $commonFields = $commonFields->sortBy('serial');

        return $commonFields;
    }

    public function getDataCommonField( $fieldId ){
        $commonField = CommonField::find($fieldId);
        $commonField->fieldDataType;
        return $commonField;

    }

    public function saveCommonField(){

        $result = $this->validateFieldValues(Input::all());

        if($result['id'] == 0){
            return $result;
        } else {

            if(Input::get('field_id')>0){
                $commonField = CommonField::find(Input::get('field_id'));
            } else {
                $commonField = new CommonField();
            }

            return $this->addOrUpdateField($commonField, Input::all());
        }
    }

    public function deleteCommonField(){

        $validationRule = array(
            'field_id' => 'required',
            'remarks' => 'required',
        );

        $validator = Validator::make(Input::all(), $validationRule);

        if($validator->fails()){
            $result['id'] = 0;
            $result['text'][0] = ' The remarks field is required';
        } else {

            $commonField = CommonField::find(Input::get('field_id'));
            $commonField->delete();

            $result['id'] = 1;
            $result['text'][0] = "Common Field Deleted Successfully!";
        }

        return $result;
    }

    public function addOrUpdateField( $commonField, $values ){


        $commonField->field_name = $values['field_name'];
        $commonField->field_data_type_id = $values['field_data_type_id'];

        if($values['field_data_type_id'] == 3){
            $commonField->is_dropdown = 1;
            $commonField->dropdown_values = $values['dropdown_values'];
        }

        if($values['serial'] >0 ){
            $commonField->serial = $values['serial'];
        } else {
            $commonField->serial = CommonField::max('serial') + 1;
        }

        $commonField->remarks = $values['remarks'];
        $commonField->updated_by = Session::get('USER_ID');

      //  $stop_date =
        $commonField->updated_on = date('Y-m-d');



        try{
            $commonField->save();
//                $commonField->id = 1;
            $result['id'] = 1;
            $result['text']['field'][$commonField->field_name][0]= "FIELD : " . $commonField->field_name . " Created Sucessfully!!";
        }catch (Exception $e){
            $result['id'] = 0;
            $result['text']['field']['message']= $e->getMessage();
        }
        return $result;

    }

    public function validateFieldValues( $values ){

        $validationRule = array(
            'field_id' => 'required',
            'field_name' => 'required',
            'field_data_type_id' => 'required',
            'serial' => 'sometimes|numeric',
            'remarks' => 'required',
            'module_id' => 'sometimes|required'
        );

        $validator = Validator::make($values, $validationRule);

        if($validator->fails()){
            $result['id'] = 0;
            $result['text']['field'] = $validator->messages();
        } else {
            $result['id'] = 1;
        }

        return $result;
    }
}
