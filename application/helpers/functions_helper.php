<?php
/**
 * Created by PhpStorm.
 * User: Sanjib
 * Date: 1/27/2016
 * Time: 3:19 PM
 */

function day_to_int($day){
    switch($day){
        case 'Sunday':
            return 1;
        case 'Monday':
            return 2;
        case 'Tuesday':
            return 3;
        case 'Wednesday':
            return 4;
        case 'Thursday':
            return 5;
        case 'Friday':
            return 6;
        case 'Saturday':
            return 7;
        default:
            return 0;
    }
}

function day_to_string($day){
    switch($day){
        case 1:
            return "Sunday";
        case 2:
            return "Monday";
        case 3:
            return "Tuesday";
        case 4:
            return "Wednesday";
        case 5:
            return "Thursday";
        case 6:
            return "Friday";
        case 7;
            return "Saturday";
    }
}
