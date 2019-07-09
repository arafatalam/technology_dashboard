<?php

class DefaultMilestone extends Eloquent {


    protected $table = 'project_default_milestones';
    public function user(){
        return $this->belongsTo('User', 'updated_by')->select(['user_name']);
    }
    public function module(){
        return $this->belongsTo('Module');
    }

}