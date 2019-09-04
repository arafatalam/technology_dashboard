<?php

class Service extends Eloquent {


    public function vendor(){
        return $this->belongsTo('Vendor');
    }

    public function serviceCategory(){
        return $this->belongsTo('ServiceCategory');
    }

    public function serviceSubCategory(){
        return $this->belongsTo('ServiceSubCategory');
    }

}