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
        $module->moduleFields;

        $statuses = Status::all();

//        return $module;
        return View::make('tech_dashboard.pages.project.createproject')
            ->with('module', $module)
            ->with('statuses', $statuses)
            ->with('hasDefaultMilestone', count($module->defaultMilestones));

    }

    public function saveProject(){
        $moduleId = Input::get('module_id');

        $module = Module::find($moduleId);
        $tableName = $module->db_table_name;
        $milestoneTableName = $module->milestone_table_name;
        $projectData = Input::get('project_data');
        $statusId = Input::get('status_id');

        $projectId = DatabaseOperations::insertData($tableName, 'status_id', $statusId);

        foreach($projectData as $colName => $colValue){

            DatabaseOperations::updateData($tableName, $projectId, $colName, $colValue);

        }

        if(Input::has('milestone_data')){


            $milestones = $this->processMilestoneData(Input::get('milestone_data'));


            if(count($milestones > 0)){
                $count = 0;
                foreach ($milestones as $milestone){

                  



                    $singleMilestone = new Milestone();
                    $singleMilestone->setTable($milestoneTableName);
                    $singleMilestone->project_id = $projectId;
                    $singleMilestone->milestone_name = $milestone['['. $count. '][milestone_name]'];
                    $singleMilestone->status_id = $milestone['[' . $count . '][milestone_status]'];


                    $singleMilestone->milestone_start_date = $milestone['['. $count. '][milestone_start_date]'];
                    $singleMilestone->milestone_end_date = $milestone['['. $count. '][milestone_end_date]'];

                    $singleMilestone->save();


                    $count++;
                }
            }
        }




//        return $projectId;
    }

    public function processMilestoneData($milestoneData){

        $result = array();
        $count = 0;
        $milestones = $milestoneData;

        foreach( $milestones as $milestoneData){
            $i[$milestoneData['name']] = $milestoneData['value'];
            $count++;
            if($count == 5){
                array_push($result, $i);
                $i = array();
                $count = 0;
            }
        }

        return $result;
    }



}
