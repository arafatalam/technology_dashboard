<?php

class Vendor extends Eloquent {


    public function services(){
        return $this->hasMany('Service');
    }

    public function issues(){
        return $this->hasMany('Issue');
    }


}