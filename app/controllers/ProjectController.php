<?php

class ProjectController extends BaseController {

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

    public function redCreateProject( $moduleId ){
        Session::put('MODULE_ID', $moduleId);
        return Redirect::to('/createproject');
    }

    public function showCreateProject(){
        Session::put('DocId', 'createproject');
        Session::put('Header', 'header_project');

        $moduleId = Session::get('MODULE_ID');

        $commonFields = CommonField::all();
        $module = Module::find($moduleId);

        $module->moduleFields;
        $module->defaultMilestones;
        $module->user;


//        return View::make('tech_dashboard.pages.project.createproject')
//            ->with('common_fields', $commonFields);

        $result['common_fields'] = $commonFields;
        $result['module'] = $module;


        return $result;




    }
    public function showCreateModule(){

        Session::put('DocId', 'createmodule');
        Session::put('Header', 'header_administration');

        return View::make('tech_dashboard.pages.module.createmodule');
    }



}
