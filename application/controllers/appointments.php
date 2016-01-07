<?php

/**
 * Created by PhpStorm.
 * User: Sanjib
 * Date: 1/5/2016
 * Time: 4:57 PM
 */
class appointments extends MY_Controller
{

    function __construct()
    {
        parent::__construct();

    }

    public function index(){
        $this->load->view('doctor_dashboard/appointment');
    }

}