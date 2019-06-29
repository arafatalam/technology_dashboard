<?php

class ModuleField extends Eloquent {


    public function user(){
        return $this->belongsTo('User', 'updated_by')->select(['user_name']);
    }
    public function module(){
        return $this->belongsTo('Module');
    }

}