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

        $module = Module::find($moduleId);
        $module->defaultMilestones;

        $statuses = Status::all();

//        return $module;
        return View::make('tech_dashboard.pages.project.createproject')
            ->with('module', $module)
            ->with('statuses', $statuses)
            ->with('hasDefaultMilestone', count($module->defaultMilestones));

    }
    public function showCreateModule(){

        Session::put('DocId', 'createmodule');
        Session::put('Header', 'header_administration');

        return View::make('tech_dashboard.pages.module.createmodule');
    }



}
