<?php

class FieldDataType extends Eloquent {

    protected $table = 'project_field_data_types';
    public function user(){
        return $this->belongsTo('User', 'updated_by')->select(['user_name']);
    }
    public function commonFields(){
        return $this->hasMany('ModuleField');
    }
    public function moduleFields(){
        return $this->hasMany('ModuleField');
    }

}