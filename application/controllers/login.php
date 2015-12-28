<?php

/**
 * Created by PhpStorm.
 * User: Sanjib
 * Date: 12/26/2015
 * Time: 7:46 PM
 */

session_start();  //we need to start session in order to access it through CI
class login extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        // Load form helper library
        $this->load->helper('form');

        // Load session library
        $this->load->library('session');

        // Load database
        $this->load->model('login_model');
    }

    public function index()
    {
        $data['main_content'] = 'modules/login';
        $this->load->view('template', $data);
    }

    public function validate_login()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            if (isset($this->session->userdata['logged_in'])) {
                $this->load->view('admin_page');
            } else {
                $data['main_content'] = 'modules/login';
                $this->load->view('template', $data);            }
        } else {
            $data = array(
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password')
            );

            $result = $this->login_model->login($data);
            if($result == TRUE){
                $username = $this->input->post('username');
                $result = $this->login_model->read_user_information($username);
                if($result == FALSE){
                    $session_data = array(
                        'username' => $result[0]->user_name,
                        'email' => $result[0]->user_email,
                    );

                    //Add user data in session
                    $this->session->set_userdata('logged_in' , $data);
                    $this->load->view('admin_page');
                } else {
                    $data = array(
                        'error_message' => 'Invalid Username or Password',
                        'main_content' => 'modules/login',
                    );
                    $this->load->view('template', $data);
                }
            }
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