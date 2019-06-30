<?php

class FieldDataType extends Eloquent {

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