3<?php

/**
 * Created by PhpStorm.
 * User: Sanjib
 * Date: 12/24/2015
 * Time: 8:29 PM
 */
class home_model extends CI_Model
{
     public $main_content;

    public function __construct()
    {
        parent::__construct();
    }

    public function set_main_content($page){
        $main_content = $page;
    }



}