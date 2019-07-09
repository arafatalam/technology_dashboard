<?php

class Status extends Eloquent {

    protected $table = 'project_statuses';
    public function user(){
        return $this->belongsTo('User', 'updated_by')->select(['user_name']);
    }

}