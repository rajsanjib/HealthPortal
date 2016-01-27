<?php

/**
 * Created by PhpStorm.
 * User: Sanjib
 * Date: 1/17/2016
 * Time: 8:31 PM
 */
class User_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function get_user_id(){
        $user_id = 1;
        return $user_id;
    }

}