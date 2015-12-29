<?php

/**
 * Created by PhpStorm.
 * User: Sanjib
 * Date: 12/26/2015
 * Time: 7:46 PM
 */

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
        $this->load->model('Login_model');
    }

    public function index()
    {
        $data['main_content'] = 'modules/login';
        $this->load->view('template', $data);
    }

    public function validate_login()
    {

        $login_data = array(
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password')
        );


        $logged_in = $this->Login_model->login($login_data);
        if($logged_in){
        }else {

            echo "Please try to login again";
        }
        /*
        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');


        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password')
            );

            $result = $this->Login_model->login($data);
            if($result == TRUE){
                $username = $this->input->post('username');
                $user_details = $this->Login_model->read_user_information($username);
                if($result == FALSE){ //
                    $session_data = array(
                        'username' => $user_details[0]->user_name,
                        'email' => $user_details[0]->email,
                    );

                    //Add user data in session
                    $this->session->set_userdata('logged_in' , $session_data);
                    $data['main_content'] = "home/index";
                    $this->load->view('template', $data);
                } else {
                    $data = array(
                        'error_message' => 'Invalid Username or Password',
                        'main_content' => 'modules/login',
                    );
                    $this->load->view('template', $data);
                }
            }
        }*/
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