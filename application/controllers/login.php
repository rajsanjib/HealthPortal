<?php

/**
 * Created by PhpStorm.
 * User: Sanjib
 * Date: 12/26/2015
 * Time: 7:46 PM
 */

class login extends MY_Controller
{

    public $data = array(
        'main_content' => '',
        'error_message' => '',
        'user_email' => '',
        'user_name' => ''
    );

    public function __construct()
    {
        parent::__construct();

        // Load form helper library
        $this->load->helper('form');

        // Load session library
        $this->load->library('session');

        // Load database
        $this->load->model('Login_model');

    }

    public function index()
    {
        $this->load->view('includes/header', $this->data);
        $this->load->view('modules/login' , $this->data);
        $this->load->view('includes/footer', $this->data);
    }

    public function validate_login()
    {

        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');


        $login_data = array(
            'username' => $this->input->post('username'),
            'password' => password_hash($this->input->post('password'),PASSWORD_BCRYPT)
        );


        $logged_in = $this->Login_model->login($login_data);
        if($logged_in){
            $_SESSION['username'] = $login_data['username'];
            header(base_url('doctor_dashboard/index'));
        }else {
            /*$this->data['error_message'] = "Username or password doesn't match. Please try to login again";
            $this->index();*/
            $this-redirect('');
        }
                }

    public function logout(){
        // Removing session data
        $sess_array = array(
            'username' => ''
        );
        $this->session->unset_userdata('logged_in', $sess_array);
        $data = array(
            'message_display' => 'Successfully Logout',
            'main_content' => 'modules/main_page',
        );
        $this->load->view('template', $data);
    }


}