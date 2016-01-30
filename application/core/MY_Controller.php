<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');
class MY_Controller extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->helper('security');
        $this->load->helper('language');
        $this->load->library('form_validation');
        $this->load->helper('date');
        $this->load->helper('string');
        $this->load->helper('functions');


        // Load language file
        $this->lang->load('en_admin', 'english');
    }
}