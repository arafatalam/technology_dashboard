<?php

class CommonField extends Eloquent {

    public $timestamps = false;

    public function user(){
        return $this->belongsTo('User', 'updated_by')->select(['user_name']);
    }

    public function fieldDataType(){
        return $this->belongsTo('FieldDataType');
    }

}