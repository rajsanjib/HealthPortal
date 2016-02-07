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
            'password' => md5($this->input->post('password'))
        );


        $result = $this->Login_model->login($login_data);
        if($result){
            echo "result returned true";
            foreach($result->result() as $row){
                $login_id = $row->id;
                $username = $row->username;
                $account = $row->account;
            }
            echo "username is " . $username;
            echo "account type is ". $account;
            $this->set_session($username, $account, $login_id);
            $this->redirect_to();
        }else {
            echo "Username or password doesn't match. Please try to login again";

        }
    }

    public function set_session($username, $account, $login_id){
        $array = array(
            'login_id' => $login_id,
            'username' => $username,
            'account' => $account
        );
        $this->session->set_userdata($array);
    }

    public function redirect_to(){
        if($_SESSION['account'] == 'Doctor'){
            redirect('doctor_dashboard/index');
        }
        if($_SESSION['account'] == "Patient"){
            header(base_url('user_dashboard/index'));
        }
        else if($_SESSION['account'] == "hospital"){
            header(base_url("hospital_dashboard"));
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