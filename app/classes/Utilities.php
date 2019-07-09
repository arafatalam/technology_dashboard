<?php

class Utilities{

    public function removeSpecialCharacters( $inputString){

        $resultString = $inputString;
        $resultString = strtolower($resultString);
        $resultString = preg_replace('/[^A-Za-z0-9\-]/', ' ', $resultString);
        $resultString = str_replace(' ', '_', $resultString);

        return $resultString;

    }

}