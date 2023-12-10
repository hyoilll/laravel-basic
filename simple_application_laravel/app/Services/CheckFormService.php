<?php

namespace App\Services;

class CheckFormService{
    public static function checkGender($input_gender){
        return $input_gender === 0 ? "Male" : "Female";
    }

    public static function checkAge($input_age) {
        switch ($input_age){
            case 1:
                return "~19";
            case 2:
                return "20~29";
            case 3:
                return "30~39";
            case 4:
                return "40~49";
            case 5:
                return "50~59";
            case 6:
                return "60~";
            default:
                return "0";
        }
    }
}