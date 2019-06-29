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

        Session::put('DocId', 'commonfields');
        Session::put('Header', 'header_administration');

        return View::make('tech_dashboard.pages.administration.commonfields');
    }

    public function getDataCommonFields(){

        $commonFields = CommonField::all();
        foreach($commonFields as $commonField){
            $commonField->user;
        };

        return $commonFields;
    }

    public function getDataCommonField($fieldId){

        return CommonField::find($fieldId);

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
        $commonField->field_data_type = $values['field_data_type'];

        if($values['field_data_type'] == 'DROPDOWN'){
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

        $commonField->save();

        $result['id'] = 1;
        $result['text'][0] = "Common Field Saved Successfully";


        return $result;

    }

    public function validateFieldValues( $values ){

        $validationRule = array(
            'field_id' => 'required',
            'field_name' => 'required',
            'field_data_type' => 'required',
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
