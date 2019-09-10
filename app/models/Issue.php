<?php

class Issue extends Eloquent {

    public function vendor(){
        return $this->belongsTo('Vendor');
    }

}