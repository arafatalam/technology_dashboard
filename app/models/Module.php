<?php

class Module extends Eloquent {
    protected $table = 'project_modules';

    public function user(){
        return $this->belongsTo('User', 'updated_by')->select(['user_name']);
    }
    public function moduleFields(){
        return $this->hasMany('ModuleField');
    }
    public function defaultMilestones(){
        return $this->hasMany('DefaultMilestone');
    }

}