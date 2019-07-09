<?php

class CommonField extends Eloquent {

    protected $table = 'project_common_fields';
    public $timestamps = false;

    public function user(){
        return $this->belongsTo('User', 'updated_by')->select(['user_name']);
    }

    public function fieldDataType(){
        return $this->belongsTo('FieldDataType');
    }

}