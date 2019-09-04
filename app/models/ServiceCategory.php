<?php

class ServiceCategory extends Eloquent {

    public function services(){
        return $this->hasMany('Service');
    }


}