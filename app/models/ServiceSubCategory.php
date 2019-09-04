<?php

class ServiceSubCategory extends Eloquent {


    public function services(){
        return $this->hasMany('Service');
    }


}