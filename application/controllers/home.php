<?php

/**
 * Created by PhpStorm.
 * User: Sanjib
 * Date: 12/24/2015
 * Time: 8:23 PM
 */
class home extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('string');
        $this->load->helper('url_helper');
    }

    public function index(){
        $data['main_content'] = 'modules/main_body';
        $this->load->view('template.php' , $data);
    }

}

