<?php

class ModuleField extends Eloquent {

    protected $table = 'project_module_fields';
    public function user(){
        return $this->belongsTo('User', 'updated_by')->select(['user_name']);
    }

    public function module(){
        return $this->belongsTo('Module');
    }

    public function fieldDataType(){
        return $this->belongsTo('FieldDataType');
    }

}